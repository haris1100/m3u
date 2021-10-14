<?php

namespace App\Http\Controllers;

use App\Channel;
use APP\Exception;
use App\Playlist;
use Carbon\Carbon;
use App\TmpChannels;
use DateTime;
use M3uParser\M3uData;
use M3uParser\M3uEntry;
use M3uParser\M3uParser;
use M3uParser\Tag\ExtTv;
use M3uParser\Tag\ExtInf;
use M3uParser\Tag\ExtLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Response;
//ini_set('memory_limit', '-1');
class ChannelController extends Controller
{
    public function group_store(Request $request)
    {
        if(DB::table('channel_groups')->where('playlist_id','=',$request->playlist_id)->orderBy('no','DESC')->count() > 0){
            $gp = DB::table('channel_groups')->where('playlist_id','=',$request->playlist_id)->orderBy('no','DESC')->first();
            $no = $gp->no;
            $no = $no + 1;
        }
        else{
            $no = 1;
        }
        $group = array();
        $group['title'] = $request->title;
        $group['no'] = $no;
        $group['playlist_id'] = $request->playlist_id;

        DB::table('channel_groups')->insert($group);

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $ch = Channel::where('group_id','=',$request->group_id)->orderBy('no','DESC')->first();
        $gptTitle=DB::table('channel_groups')->where('id',$request->group_id)->pluck('title')->first();
        if($ch)
        $no = $ch->no;
        else
            $no=0;
        $no = $no + 1;
        $channel = new Channel;
        $channel->no = $no;
        $channel->group_id = $request->group_id;
        $channel->title = $request->title;
        $channel->url = $request->url;
        $channel->tvg_id = $request->tvg_id;
        $channel->tvg_name = $request->tvg_name;
        $channel->tvg_channel_number = $request->tvg_number;
        $channel->logo = $request->logo;
        $channel->logo_small = $request->logo_small;
        $channel->audio_track = $request->audio_track;
        $channel->created_by = $_SESSION['userLogined']->id;
        $channel->group_title=$gptTitle;
        $channel->pid=$request->pidForStoringManuallChannels;
        $channel->hide='unhide';
        $channel->save();
        return redirect()->back();
    }

    public function get_channels(Request $request)
    {

        $channels = Channel::where('group_id','=',$request->id)->where('hide','!=','hidden')->orderByRaw('CONVERT(no, SIGNED) asc')->get();
        echo json_encode($channels);

    }

    public function count(Request $request)
    {
        $channels = Channel::where('group_id','=',$request->id)->count();
        echo json_encode($channels);
    }

    public function parse_m3u(Request $request)
    {
        Channel::WhereNull('group_id')->orWhere('group_id',0)->orWhereNull('group_title')->delete();
        $getFixedChannelLimits=ChannelController::getFixedPlaylistCounts();
        //DB::table('tmp_channels')->where('created_by','=',$_SESSION['userLogined']->id)->delete();
        if($request->import_type == 1) { // Means import from url
            $_SESSION['url'] = array($request->url, $request->urlSync, $request->fre);

            //$m3ufile =
            //echo $m3ufile[1].'<br>';
            $cno = 1;
            $gid = 0;
            ini_set('max_execution_time', 300);
            ini_set('memory_limit', '-1');
            try{
            foreach (file($request->url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $key => $line) {
                //$totalChannels=DB::table('channels')->where('pid',$request->playId)->count();
                //if($getFixedChannelLimits>$totalChannels) {
                // ini_set('memory_limit', '1k');
                if ($key % 2 != 0 && $key >= 1 && $key <= 60000) {
//                    $getChannel = explode(',', $line);
//                    $group = ChannelController::getBetween($line, 'group-title', ',');
//                    $group = explode('"', $group);
//                    $gpt=$group[0]!=''?$group[0]:'Ungrouped';
//                    $tvg_ID=rand(100000,999999);//ChannelController::getBetween($line, 'tvg-id', ' ');
//                    //$tvg_ID=$tvg_ID!=''?$tvg_ID:
//                    $channels = array(
//
//                        'no' => $cno++,
//                        'title' => $getChannel[1],
//                        'tvg_id' => $tvg_ID,
//                        'tvg_name' => $getChannel[1],
//                        'tvg_language' => 'Default',//ChannelController::getBetween($line, 'tvg-language', ' '),
//                        'tvg_country' => 'Default',//ChannelController::getBetween($line, 'tvg-country', ' '),
//                        'group_title' => $gpt,
//                        'logo' => ChannelController::getBetween($line, 'tvg-logo', ' '),
//                        'created_by' => $_SESSION['userLogined']->id,
//                        'pid' => $request->playId
//                    );
//
                    $channels[] = $line;
                } else if ($key % 2 == 0 && $key > 1 && $key <= 60000) {
                    $channels[] = $line;
                    //Channel::insert($channels);
                } else if ($key > 60000) {
                    break;
                }


            }
            }
            catch (\ErrorException $r){
                $channels[]=null;
            }
        }
        else if($request->import_type == 2) // Means upload m3u file
        {
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move(public_path('/uploads/m3u'), $filename);
            $m3uParser = new M3uParser();
            $m3uParser->addDefaultTags();
            $data = $m3uParser->parseFile(URL::to('/public/uploads/m3u/'.$filename));
            $channels = array();
            ini_set('max_execution_time', 240);
            ini_set('memory_limit', '-1');
            $no=1;
            foreach($data as $key => $entry)
            {

                if($key<30000){
                    //ini_set('memory_limit', '-1');
                    $extTag = $entry->getExtTags();
                    $tv_id = $extTag[0]->getAttribute('tvg-id');
                    if(empty($tv_id)){
                        $tv_id = rand(100000,999999);
                    }
                    $channels[] = array(
                        'no'=>$no++,
                        'url'=>$entry->getPath(),
                        'title'=>$extTag[0]->getTitle(),
                        'tvg_id'=>$tv_id,
                        'tvg_name'=>$extTag[0]->getAttribute('tvg-name'),
                        'tvg_language'=>$extTag[0]->getAttribute('tvg-language'),
                        'tvg_country'=>$extTag[0]->getAttribute('tvg-country'),
                        'group_title'=>$extTag[0]->getAttribute('group-title'),
                        'logo'=>$extTag[0]->getAttribute('tvg-logo'),
                        'created_by'=>$_SESSION['userLogined']->id,
                        'pid' => $request->playId
                    );


                }

            }
            foreach (array_chunk($channels, 1000) as $t) {
                DB::table('channels')->insert($t);
            }
            $channels=null;
        }



       $doneRequested= ChannelController::addChannelsLastFunctionByHaris($channels,$request->playId);
        echo json_encode($doneRequested);
    }
    static function  addChannelsLastFunctionByHaris($array,$pid){
        if($array!=null) {
            $cno = 1;
            ini_set('max_execution_time', 300);
            //ini_set('memory_limit', '-1');
            for ($i = 0; $i < count($array); $i = $i + 2) {
                $getChannel = explode(',', $array[$i]);
                $group = ChannelController::getBetween($array[$i], 'group-title', ',');
                $group = explode('"', $group);
                $gpt = $group[0] != '' ? $group[0] : 'Ungrouped';
                \DB::disableQueryLog();

                $channels[] = array(
                    'url' => isset($array[$i + 1])?$array[$i + 1]:'',
                    'urlDup'=>isset($array[$i + 1])?$array[$i + 1]:'',
                    'no' => $cno++,
                    'title' => isset($getChannel[1])?$getChannel[1]:'unnamed',
                    'tvg_id' => rand(100000, 999999),
                    'tvg_name' => isset($getChannel[1])?$getChannel[1]:'unnamed',
                    'tvg_language' => 'Default',//ChannelController::getBetween($line, 'tvg-language', ' '),
                    'tvg_country' => 'Default',//ChannelController::getBetween($line, 'tvg-country', ' '),
                    'group_title' => $gpt,
                    'logo' => ChannelController::getBetween($array[$i], 'tvg-logo', ' '),
                    'created_by' => $_SESSION['userLogined']->id,
                    'pid' => $pid,

                );
            }
//        Channel::insert($channels);
            foreach (array_chunk($channels, 1000) as $t) {
                DB::table('channels')->insert($t);
            }
        }
        //-----------------------------------------------------------------//
        $chnls = Channel::where('created_by','=',$_SESSION['userLogined']->id)
            ->where('pid',$pid)
            ->orderByRaw('CONVERT(no, SIGNED) asc')
            ->WhereNull('group_id')
            ->whereRaw('group_title != ""')
            ->groupBy('group_title')
            ->get();
        return $chnls;
    }

    public function store_channels(Request $request)
    {
        if(isset($_SESSION['url']))
            if($_SESSION['url'][1]=='1')
                DB::table('dailsync')->updateOrInsert(['PID' => $request->playlist_id, 'url' => $_SESSION['url'][0]], ['date' => date('Y-m-d'), 'time' => date("H:i:s"), 'gap' => $_SESSION['url'][2], 'dt' => date('Y-m-d H:i')]);



        ini_set('max_execution_time', 240);
        ini_set('memory_limit', '-1');
        $gno=1;
        if (is_array($request->groups) || is_object($request->groups))
            foreach($request->groups as $key => $group)
            {
                // echo json_encode($group);
                $gpname = Channel::find($group);

                $id = DB::table('channel_groups')->insertGetId([
                    'no' => $gno++,
                    'title' => $gpname->group_title,
                    'playlist_id' => $request->playlist_id
                ]);
                DB::table('channels')->where(['group_title'=>$gpname->group_title,'pid'=>$request->playlist_id])->whereNull('group_id')->update([
                    'group_id'=>$id
                ]);
                //     if(isset($_SESSION['url']))
                //     if($_SESSION['url'][1]=='1') {
                //         $getChannels = DB::table('channels')->where(['group_id' => $id, 'pid' => $request->playlist_id])->get();
                //         foreach ($getChannels as $channel){
                //             DB::table('savesyncdata')->insert([
                //                 'cid'=>$channel->id,
                //                 'ctitle'=>$channel->title,
                //                 //'curl'=>$channel->url
                //             ]);
                //         }

                // }

            }
        Channel::WhereNull('group_id')->orWhere('group_id',0)->orWhereNull('group_title')->delete();

        // ChannelController::restrictChannels($request->playlist_id);
        ChannelController::restrictChannels($request->playlist_id);


    }
    public static function restrictChannels($pid){
        $total_channels=0;
        $getFixedChannelLimits=ChannelController::getFixedPlaylistCounts();
        //$Countgp = DB::table('channel_groups')->where('playlist_id','=',$pid)->get();
        $total_channels =  \App\Channel::where('pid','=',$pid)->where('hide','=','unhide')->count();

//        foreach ($Countgp as $keys => $groups) {
//            $total_channels += \App\Channel::where('group_id','=',$groups->id)->where('hide','!=','hidden')->get()->count();
//        }
        // echo $total_channels.'<br>';
        if($getFixedChannelLimits>=$total_channels){
            $setValUp=$getFixedChannelLimits-$total_channels;
            DB::table('channels')->where('pid',$pid)->where('hide','=','hidden')->orderByRaw('CONVERT(no, SIGNED) asc')->limit($setValUp)->update([
                'hide'=>'unhide'
            ]);

        }
        else{
            $setValDown=$total_channels-$getFixedChannelLimits;
            DB::table('channels')->where('pid',$pid)->where('hide','=','unhide')->orderByRaw('CONVERT(no, SIGNED) desc')->limit($setValDown)->update([
                'hide'=>'hidden'
            ]);
        }
//       $getChannels= DB::table('channels')->where('pid',$pid)->where('hide','!=','hidden')->orderByRaw('CONVERT(no, SIGNED) asc')->get();
//        foreach($getChannels as $key => $channel){
//            echo $key.' '.$channel->title.' '.$channel->hide.'<br>';
//        }
    }

    public function export($id){
        if(file_exists(public_path()."/exports/".$_SESSION['userLogined']->id.".m3u"))
        {
            unlink(public_path()."/exports/".$_SESSION['userLogined']->id.".m3u");
        }
        $filename = public_path()."/exports/".$_SESSION['userLogined']->id.".m3u";
        $myfile = fopen($filename,"w") or die("Unable to open the file!");
        $mainline = "#EXTM3U \r\n";
        fwrite($myfile, $mainline);
        $playlists = Playlist::where('uid','=',$id)->first();
        $groups = DB::table('channel_groups')->where('playlist_id','=',$playlists->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get();
        foreach($groups as $key => $group):
            foreach(Channel::where('group_id','=',$group->id)->where('hide','=','unhide')->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $k => $channel) :
                $mainline2 ='#EXTINF: -1 tvg-id="'.$channel->tvg_id.'" tvg-name="'.$channel->tvg_name.'" tvg-logo="'.$channel->logo.'" group-title="'.$group->title.'",'.$channel->title."\r\n".$channel->url."\r\n";
                fwrite($myfile, $mainline2);
            endforeach;
        endforeach;
        fclose($myfile);
        $headers = array(
            "Content-Type"=> "audio/x-mpegurl"
        );
        return Response::download($filename,$playlists->title.".m3u", $headers);
    }

    public function export_url($id){
        $p = Playlist::where('uid', '=', $id)->first();
        if($p) {
            if(m3u::checkIfValidTimeForOfflines($id)!=0) {
                if (file_exists(public_path() . "/exports/" . $p->created_by . ".m3u")) {
                    unlink(public_path() . "/exports/" . $p->created_by . ".m3u");
                }
                $filename = public_path() . "/exports/" . $p->created_by . ".m3u";
                $myfile = fopen($filename, "w") or die("Unable to open the file!");
                $mainline = "#EXTM3U \r\n";
                fwrite($myfile, $mainline);
                $playlists = Playlist::where('uid', '=', $id)->first();
                $groups = DB::table('channel_groups')->where('playlist_id', '=', $playlists->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get();
                foreach ($groups as $key => $group):
                    foreach (Channel::where('group_id', '=', $group->id)->where('hide', '=', 'unhide')->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $k => $channel) :
                        $mainline2 = '#EXTINF: -1 tvg-id="' . $channel->tvg_id . '" tvg-name="' . $channel->tvg_name . '" tvg-logo="' . $channel->logo . '" group-title="' . $group->title . '",' . $channel->title . "\r\n" . $channel->url . "\r\n";
                        fwrite($myfile, $mainline2);
                    endforeach;
                endforeach;
                fclose($myfile);

                $headers = array(
                    "Content-Type" => "audio/x-mpegurl"
                );
                return Response::download($filename, $playlists->title . ".m3u", $headers);
            }
            else abort(403,'Unauthorized, please check if your subscription is active');
        }
        else {
            echo abort(404,'Not Found');
        }
    }

    public function download(Request $request){

        if(file_exists(public_path()."/exports/".$_SESSION['userLogined']->id.".m3u"))
        {
            unlink(public_path()."/exports/".$_SESSION['userLogined']->id.".m3u");
        }
        $filename = public_path()."/exports/".$_SESSION['userLogined']->id.".m3u";
        $myfile = fopen($filename,"w") or die("Unable to open the file!");
        $mainline = "#EXTM3U";
        fwrite($myfile, $mainline);
        $playlists = Playlist::where('id','=',$request->id)->first();
        $groups = DB::table('channel_groups')->where('playlist_id','=',$playlists->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get();
        foreach($groups as $key => $group):
            foreach(Channel::where('group_id','=',$group->id)->where('hide','=','unhide')->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $k => $channel) :
                $mainline2 ='#EXTINF: -1 tvg-id="'.$channel->tvg_id.'" tvg-name="'.$channel->tvg_name.'" tvg-logo="'.$channel->logo.'" group-title="'.$group->title.'",'.$channel->title."\r\n";
                fwrite($myfile, $mainline2);
                fwrite($myfile, $channel->url);
            endforeach;
        endforeach;
        fclose($myfile);
        $headers = array(
            "Content-Type: audio/mpegurl",
            "Content-Disposition: attachment; filename=$filename"
        );
        return Response::download($filename,$playlists->title.".m3u", $headers);
    }

    public function group_edit(Request $request){
        echo json_encode(DB::table('channel_groups')->where('id','=',$request->group_id)->first());
    }

    public function group_update(Request $request){
        $data = array(
            'title'=>$request->title
        );
        DB::table('channel_groups')->where(['id'=>$request->g_id])->update($data);
        return redirect()->back();
    }

    public function group_delete(Request $request){
        DB::table('channel_groups')->where(['id'=>$request->g_id])->delete();
        DB::table('channels')->where(['group_id'=>$request->g_id])->delete();

        return redirect()->back();
    }

    public function get_single(Request $request){
        $channels = Channel::where('id','=',$request->id)->first();
        echo json_encode($channels);
    }

    public function update(Request $request){
        $channel = Channel::find($request->id);
        $channel->title = $request->title;
        $channel->url = $request->url;
        $channel->tvg_id = $request->tvg_id;
        $channel->tvg_name = $request->tvg_name;
        $channel->tvg_channel_number = $request->tvg_number;
        $channel->logo = $request->logo;
        $channel->logo_small = $request->logo_small;
        $channel->audio_track = $request->audio_track;
        $channel->save();
        return redirect()->back();
    }

    public function delete(Request $request){
        $channels = Channel::where('id','=',$request->id)->delete();
        return redirect()->back();
    }

    public function search(Request $request){
        $channels = Channel::where('group_id','=',$request->group_id)
            ->where('title','like','%'.$request->search.'%')
            ->get();
        echo json_encode($channels);
    }

    public function sort(Request $request){
        for($i=0; $i<count($request->data); $i++){
            $ch = Channel::findOrFail($request->data[$i]['id']);
            $ch->no = $request->data[$i]['pos'];
            $ch->save();
        }
        echo "success";
    }
    public function bulk_delete(Request $request){
        foreach($request->ids as $key => $row){
            Channel::where('id','=',$row['id'])->delete();
        }
        echo json_encode(['status'=>'success']);
    }
    public function move_copy(Request $request){
        if($_SESSION['userLogined']->Paid=='active'){
            $getCardNo=$_SESSION['userLogined']->cardNo;
            $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
            $getFixedChannelCounts=$getFullCard->channelPerPlayList;
        }
        else{
            $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
            $getFixedChannelCounts=$getfixedChannelCount->Trailchannels;
        }
        $total_channels=0;
        if(DB::table('channel_groups')->where('playlist_id','=',$request->pid)->exists()){
            $gp = DB::table('channel_groups')->where('playlist_id','=',$request->pid)->get();
            foreach ($gp as $key => $group) {
                $total_channels += \App\Channel::where('group_id','=',$group->id)->get()->count();
            }
            $checkIfLimitExceed=$total_channels;
        }
        else $checkIfLimitExceed=$total_channels;

        if($request->action == "move"){
            foreach($request->ids as $key => $row){
                if($getFixedChannelCounts>$checkIfLimitExceed) {
                    $ch = DB::table('channel_groups')->where('id','=',$request->gid)->orderBy('no','DESC')->first();
                    $no = $ch->no;
                    $no = $no + 1;
                    Channel::where('id','=',$row['id'])->update(['group_id'=>$request->gid,'no'=>$no]);
                    $checkIfLimitExceed++;
                }}
        }
        else if($request->action == "copy"){
            $ch = DB::table('channel_groups')->where('id','=',$request->gid)->orderBy('no','DESC')->first();
            $no = $ch->no;

            foreach($request->ids as $key => $row){
                if($getFixedChannelCounts>$checkIfLimitExceed) {
                    $no = $no + 1;
                    $channel = Channel::where('id','=',$row['id'])->first();
                    $channels = array(
                        'no'=> $no,
                        'group_id'=>$request->gid,
                        'title'=>$channel->title,
                        'url'=>$channel->url,
                        'tvg_id'=>$channel->tvg_id,
                        'tvg_name'=>$channel->tvg_name,
                        'tvg_language'=>$channel->tvg_language,
                        'tvg_country'=>$channel->tvg_country,
                        'logo'=>$channel->logo,
                        'created_by'=>$_SESSION['userLogined']->id,
                        'created_at'=> Carbon::now(),
                        'updated_at'=> Carbon::now()
                    );
                    Channel::insert($channels);
                    $checkIfLimitExceed++;
                }}
        }
        if($getFixedChannelCounts>$checkIfLimitExceed)
            echo json_encode(['status'=>'success']);
    }

    public function move_position(Request $request){
            if(Channel::where('group_id',$request->gid)->where('id',$request->id)->exists()){
                $getAllLinks=Channel::where('group_id',$request->gid)->orderByRaw('CONVERT(no, SIGNED) asc')->get();
                $query='UPDATE channels SET `no` = (case ';
                $sort=1;
                $position=$request->new_pos;
                foreach ($getAllLinks as $key=>$link){

                    if($link->id==$request->id){
                        if($sort>$position){
                            $pos=$position-0.5;
                        }
                        else if($sort<$position){
                            $pos=$position+0.5;
                        }
                        else{
                            $pos=$sort;
                        }
                    }
                    else
                        $pos=$sort;
                    $sort++;
//            if($position==$sort)
//                $pos=$sort++;

                    $query .=" WHEN `id` = '".$link->id."' THEN '".$pos."' ";
                }
                $query .="  end)  where group_id='$request->gid' ";
                // else `--`
                DB::statement($query);
                $getAllLinks=DB::table('channels')->where('group_id',$request->gid)->orderByRaw('CONVERT(no, SIGNED) asc')->get();
                $query='UPDATE channels SET `no` = (case ';

                foreach ($getAllLinks as $key=>$link){
                    $query .=" WHEN `id` = '".$link->id."' THEN '".++$key."' ";
                }
                $query .="  end)  where group_id='$request->gid' ";
                // else `--`
                DB::statement($query);
            }
//        if(!$request->exists('nid') && !$request->exists('nno'))
//        {
//            $ch = Channel::where('group_id','=',$request->gid)->orderBy('no','DESC')->first();
//            $no = $ch->no;
//            $no = $no + 1;
//            Channel::where('id','=',$request->id)->update(['no'=>$no]);
//        }
//        else
//        {
//            Channel::where('id','=',$request->nid)->update(['no'=>$request->no]);
//            Channel::where('id','=',$request->id)->update(['no'=>$request->nno]);
//        }
//        echo json_encode(['status'=>'success']);
    }

    public function group_sort(Request $request){
        for($i=0; $i<count($request->data); $i++){
            DB::table('channel_groups')
                ->where('id',$request->data[$i]['id'])
                ->update(['no'=>$request->data[$i]['pos']]);
        }
        echo "success";
    }

    public function bulk_group_delete(Request $request){
        for($i=0; $i<count($request->ids); $i++){
            DB::table('channel_groups')->where('id','=',$request->ids[$i]['id'])->delete();
            DB::table('channels')->where('group_id','=',$request->ids[$i]['id'])->delete();

        }
        echo "success";
    }


    //--------------------------------------------------------------------------------------//


    public static function dailyautosync($id){
        if($_SESSION['userLogined']->Paid=='inactive'){
            $getDailySyncValue=DB::table('admin')->first();
            $getDailySyncVal=$getDailySyncValue->dailysync;
        }
        else{
            $getCardNo=$_SESSION['userLogined']->cardNo;
            $getFullCard=DB::table('subscription')->where('id',$getCardNo)->first();
            $getDailySyncVal=$getFullCard->Dailysyncforupdates;

        }

        if($getDailySyncVal=='Yes') {
            if (DB::table('dailsync')->where('PID', $id)->exists()) {
                $getUrlIfExists = DB::table('dailsync')->where('PID', $id)->get();
                $secureId = 0;
                //if(date($i->date)<date('Y-m-d')){
//             ini_set('memory_limit', '128M');
//             ini_set('max_execution_time',300);

                foreach ($getUrlIfExists as $i) {
//
                    $gap=$i->gap*60;
                    $dateTime = new DateTime($i->dt);
                    $VirtualdateTime=$dateTime->modify('+'.$gap.' minutes');
                    $RealdateTime = new DateTime(date('Y-m-d H:i'));
                    if($VirtualdateTime < $RealdateTime){
                        DB::statement("UPDATE channels SET `title`=`tvg_name` where pid='$id' and `hide`='unhide'");
                        ini_set('memory_limit', '128M');
                        try{
                        foreach (file($i->url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $key => $line) {
                            if ($key % 2 != 0 && $key >= 1 && $key <= 50000) {
                                $array[] = $line;
                            } else if ($key % 2 == 0 && $key > 1 && $key <= 50000) {
                                $array[] = $line;
                            } else if ($key > 50000) {
                                DB::statement("UPDATE channels SET `url`=`urlDup` where pid='$id' and `hide`='unhide'");
                                $array=null;
                                break;
                            }
                        }
                        }
                        catch (\ErrorException $r){
                            $array=null;
                        }
                        m3u::syncLastFunByHaris($id,$array);

//                        ini_set('memory_limit', '-1');
//                            ini_set('max_execution_time', 300);
//                            $m3uParser = new M3uParser();
//                            $m3uParser->addDefaultTags();
//                            $data = $m3uParser->parseFile($i->url);
//                            // $m3ufile = file_get_contents($i->url);
//
//                            $channel=array();
//                            foreach($data as $key=> $entry){
//                                if($key<25000) {
//                                    foreach ($entry->getExtTags() as $extTag) {
//                                        $title = ($extTag->getTitle());
//                                    }
//                                    $channel = ($entry->getPath());
//                                    DB::table('channels')->where(['title' => $title, 'hide' => 'unhide', 'pid' => $id])->update(['url' => $channel]);
//                                }
//                                else break;
//
//                            }


//                        $m3uParser = new M3uParser();
//                        $m3uParser->addDefaultTags();
//                        $data = $m3uParser->parseFile($i->url);
//                        // $m3ufile = file_get_contents($i->url);
//
//                        //$channel=array();
//                        foreach($data as $entry){
//
//                            foreach ($entry->getExtTags() as $extTag) {
//                                $title=($extTag->getTitle());}
//                            $channel=($entry->getPath());
//
//                            DB::table('channels')->where(['PID'=>$id,'hide'=>'unhide','title'=>$title])->update(['url'=>$channel]);
//
//
//                        }
//                        DB::table('dailsync')->where(['PID'=>$id,'url'=>$i->url])->update(['dt'=>date('Y-m-d H:i')]);
//                        // return 1;

//                        ini_set('memory_limit', '128M');
//                                $m3ufile = file($i->url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//                                $getChannel='';
//                                foreach ($m3ufile as $key=> $line) {
//                                    //$totalChannels=DB::table('channels')->where('pid',$request->playId)->count();
//                                    //if($getFixedChannelLimits>$totalChannels) {
//                                    // ini_set('memory_limit', '-1');
//                                    if ($key % 2 != 0 && $key >= 1 && $key <= 50000) {
//                                        $array[] = $line;
//                                    } else if ($key % 2 == 0 && $key > 1 && $key <= 50000) {
//                                        $array[] = $line;
//                                    } else if ($key > 50000) {
//                                        break;
//                                    }
//                                }
//                        ini_set('max_execution_time', 300);
//                        ini_set('memory_limit', '-1');
//                        for ($i = 0; $i < count($array); $i = $i + 2) {
//                            $j=$i+1;
//                            $getChannel = explode(',', $array[$i]);
////                            $group = ChannelController::getBetween($array[$i], 'group-title', ',');
////                            $group = explode('"', $group);
////                            $gpt = $group[0] != '' ? $group[0] : 'Ungrouped';
//                            \DB::disableQueryLog();
////                            DB::table('channels')->where('pid',$id)->where('url',$array[$i+1])->
////                            where('hide','unhide')->update(['title'=>$getChannel[0]]);
//                            Channel::
//                            where(['pid'=>$id,'title'=>$getChannel[0],'hide'=>'unhide'])->
//                            whereRaw("url != '$array[$j]' ")->
//                            limit(1)->
//                            update(['url'=>$array[$i+1]]);
//                        }
//                            $m3uParser = new M3uParser();
//                            $m3uParser->addDefaultTags();
//                            $data = $m3uParser->parseFile($i->url);
//                            // $m3ufile = file_get_contents($i->url);
//
//                            $channel=array();
//                            foreach($data as $entry){
//
//                            foreach ($entry->getExtTags() as $extTag) {
//                                $title=($extTag->getTitle());}
//                            $channel=($entry->getPath());
//
//                            DB::table('channels')->where('pid',$id)->where('title',$title)->update(['url'=>$channel]);
                        //  }
                        // return 1;

                    }

                    //else $tell='false';
                    //echo $tell;
                   DB::table('dailsync')->where('PID',$id)->where('url',$i->url)->update(['dt'=>date('Y-m-d H:i')]);

               }


            }
        }

    }
    static function getBetween($content,$start,$end){
        $r = explode($start, $content);
        if (isset($r[1])){
            $r = explode($end, $r[1]);
            $modify= trim($r[0],'="');
            $modify= trim($modify,'" ');
            // $modify= ltrim($modify);
            return $modify;
        }
        return '';
    }

    public static function getFixedPlaylistCounts(){
        if($_SESSION['userLogined']->Paid=='active'){
            $getCardNo=$_SESSION['userLogined']->cardNo;
            $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
            $getFixedChannelCounts=$getFullCard->channelPerPlayList;
        }
        else{
            $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
            $getFixedChannelCounts=$getfixedChannelCount->Trailchannels;
        }
        return $getFixedChannelCounts;
    }
    static function readTheFile($path) {
        $handle = fopen($path, "r");

        while(!feof($handle)) {
            yield trim(fgets($handle));
        }

        fclose($handle);
    }
    static  function formatBytes($bytes, $precision = 2) {
        $units = array("b", "kb", "mb", "gb", "tb");

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . " " . $units[$pow];
    }

    public  static function testing(){
        foreach (file('https://iptv-org.github.io/iptv/categories/entertainment.m3u', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $key => $line) {
            //$totalChannels=DB::table('channels')->where('pid',$request->playId)->count();
            //if($getFixedChannelLimits>$totalChannels) {
            // ini_set('memory_limit', '1k');
            if ($key % 2 != 0 && $key >= 1 && $key <= 50000) {
//                    $getChannel = explode(',', $line);
//                    $group = ChannelController::getBetween($line, 'group-title', ',');
//                    $group = explode('"', $group);
//                    $gpt=$group[0]!=''?$group[0]:'Ungrouped';
//                    $tvg_ID=rand(100000,999999);//ChannelController::getBetween($line, 'tvg-id', ' ');
//                    //$tvg_ID=$tvg_ID!=''?$tvg_ID:
//                    $channels = array(
//
//                        'no' => $cno++,
//                        'title' => $getChannel[1],
//                        'tvg_id' => $tvg_ID,
//                        'tvg_name' => $getChannel[1],
//                        'tvg_language' => 'Default',//ChannelController::getBetween($line, 'tvg-language', ' '),
//                        'tvg_country' => 'Default',//ChannelController::getBetween($line, 'tvg-country', ' '),
//                        'group_title' => $gpt,
//                        'logo' => ChannelController::getBetween($line, 'tvg-logo', ' '),
//                        'created_by' => $_SESSION['userLogined']->id,
//                        'pid' => $request->playId
//                    );
//
                $channels[] = $line;
            } else if ($key % 2 == 0 && $key > 1 && $key <= 50000) {
                $channels[] = $line;
                //Channel::insert($channels);
            } else if ($key > 50000) {
                break;
            }
        }
            $array=$channels;
                $cno = 1;
                ini_set('max_execution_time', 300);
                //ini_set('memory_limit', '-1');
                for ($i = 0; $i < count($array); $i = $i + 2) {
                    $getChannel = explode(',', $array[$i]);
                   //  if(isset($getChannel[1])) echo $getChannel[1] .'<br>';
                    echo $i.'<br>';
                    $group = ChannelController::getBetween($array[$i], 'group-title', ',');
                    $group = explode('"', $group);
                    $gpt = $group[0] != '' ? $group[0] : 'Ungrouped';
                    \DB::disableQueryLog();
                    $channels[] = array(
                       // 'url' => $array[$i + 1],
                       // 'urlDup'=>$array[$i + 1],
                        'no' => $cno++,
                      //  'title' => $getChannel[1],
                        'tvg_id' => rand(100000, 999999),
                     //   'tvg_name' => $getChannel[1],
                        'tvg_language' => 'Default',//ChannelController::getBetween($line, 'tvg-language', ' '),
                        'tvg_country' => 'Default',//ChannelController::getBetween($line, 'tvg-country', ' '),
                        'group_title' => $gpt,
                        'logo' => ChannelController::getBetween($array[$i], 'tvg-logo', ' '),
                        'created_by' => $_SESSION['userLogined']->id,


                    );
                }
//

//        $workload=' load somw work';
//        $processId=pcntl_fork();
//        if($processId<0){
//            die('form end');
//        }
//        else if($processId==0){
//            trim($workload);
//        }
//        else{
//            pcntl_wait($status);
//        }

       // $file=  fopen('https://iptv-org.github.io/iptv/categories/fashion.m3u','r');

//        $iterator = ChannelController::readTheFile($url);
//        $buffer = "";
//        foreach ($iterator as $key =>$iteration) {
//            if($key<25000){
//            preg_match("/\n{3}/", $buffer, $matches);
//
//            if (count($matches)) {
//                print ".";
//                $buffer = "";
//
//            } else {
//                $itt[]=$iteration;
//
//            }}
//            else break;
//        }
////        for($i=0;$i<count($itt);$i=$i+2){
////            echo $itt[$i].'<br>';
////        }
//        return $itt;
        //print ChannelController::formatBytes(memory_get_peak_usage());
       // echo  $buffer;
        //print_r($line);
//
//        $i=1000;
//        for($j=0;$j<$i;$j++){
//            if($j<300){
//                echo 'i';
//            }
//            else if($j<600)
//                echo 'j<br>';
//            else if($j>600){
//                echo '-';
//                break;
//            }
//        }
//            ini_set('max_execution_time', 240);
//             ini_set('memory_limit', '-1');
//             $m3ufile = new SplFileObject('https://iptv-org.github.io/iptv/categories/fashion.m3u','r');
//
//        echo $m3ufile->fgets();
//
//             foreach (file('https://iptv-org.github.io/iptv/categories/fashion.m3u') as $key=> $line) {
//                 if($key%2!=0)
//                 $a[]=($line);
//                 else if($key%2==0)
//                 $a[]=($line);
//             }
//             print_r($a);
        //       // $a=array();
        //        if($key%2!=0&&$key<500){
        //          //  echo $line."<br>";
        //                 $getChannel= explode(',',$line);
        //         //    echo '
        //         //    Tvg-id:'.ChannelController::getBetween($line,'tvg-id',' ').'<br>
        //         //         lang:'.ChannelController::getBetween($line,'tvg-language',' ').'<br>
        //         //         logo: '.ChannelController::getBetween($line,'tvg-logo',' ').'<br>
        //         //         groupTitle :'.ChannelController::getBetween($line,'group-title',',').'<br>
        //         //         Channel Name :'.$getChannel[1].'<br>

        //         //    ';
        //         //$a[]=$getChannel[1];
        //         $channels =array(

        //             'title'=>$key%2!=0&&$key>1?$getChannel[1]:'',
        //             'tvg_id'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-id',' '):'',
        //             'tvg_name'=>$key%2!=0&&$key>1?$getChannel[1]:'',
        //             'tvg_language'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-language',' '):'',
        //             'tvg_country'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-country',' '):'',
        //             'group_title'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'group-title',','):'',
        //             'logo'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-logo',' '):'',
        //             'created_by'=>$_SESSION['userLogined']->id,
        //         );

        //           // echo  '<b>'.$key.'</b>';//"url :".$line.'<br>-----------------------<br>';
        //         }
        //         if($key%2==0&&$key>1&&$key<500){
        //             //echo  "url :".$line.'<br>-----------------------<br>';
        //             $channels+=array('url'=>$line);
        //             print_r($channels);
        //         }

        // echo $key%2==0&&$key>1&&$key<500? "url :".$line.'<br>-----------------------<br>':'';

        //         $channels = array(
        //             'url'=>$key%2==0&&$key>1?$line:'',
        //             'title'=>$key%2!=0&&$key>1?$getChannel[1]:'',
        //             'tvg_id'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-id',' '):'',
        //             'tvg_name'=>$key%2!=0&&$key>1?$getChannel[1]:'',
        //             'tvg_language'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-language',' '):'',
        //             'tvg_country'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-country',' '):'',
        //             'group_title'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'group-title',','):'',
        //             'logo'=>$key%2!=0&&$key>1?ChannelController::getBetween($line,'tvg-logo',' '):'',
        //             'created_by'=>$_SESSION['userLogined']->id,
        //         );
        //         TmpChannels::insert($channels);

        //     }}


    }

}
