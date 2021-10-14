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
        $no = $ch->no;
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
        $channel->save();
        return redirect()->back();
    }

    public function get_channels(Request $request)
    {

//        if($_SESSION['userLogined']->Paid=='active'){
//            $getCardNo=$_SESSION['userLogined']->cardNo;
//            $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
//            $getFixedChannelCounts=$getFullCard->channelPerPlayList;
//            $countInsertedChannels=Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->count();
//            if($getFixedChannelCounts>=$countInsertedChannels){
            $channels = Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get();
            echo json_encode($channels);
//            else{
//                $channels = Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->take($getFixedChannelCounts)->get();
//                //Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->take($countInsertedChannels-$getFixedChannelCounts)->latest()->delete();
//
//                echo json_encode($channels);
//            }
//        }
//        else{
//            $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
//            $getMAxLimit=$getfixedChannelCount->Trailchannels;
//            $countInsertedChannels=Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->count();
//            if($getMAxLimit>=$countInsertedChannels){
//            $channels = Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->take($countInsertedChannels)->get();
//            echo json_encode($channels);
//            }
//            else{
//              //  Channel::where('group_id','=',$request->id)->orderBy(DB::raw("RAND()"))->take($countInsertedChannels-$getMAxLimit)->delete();
//
//                $channels = Channel::where('group_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->take($getMAxLimit)->get();
//
//                echo json_encode($channels);
//            }
//
//        }

    }

    public function count(Request $request)
    {
        $channels = Channel::where('group_id','=',$request->id)->count();
        echo json_encode($channels);
    }

    public function parse_m3u(Request $request)
    {
        DB::table('tmp_channels')->where('created_by','=',$_SESSION['userLogined']->id)->delete();
        if($request->import_type == 1){ // Means import from url
            ini_set('max_execution_time', 240);
            ini_set('memory_limit', '-1');
            $m3ufile = file($request->url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            //echo $m3ufile[1].'<br>';

            foreach ($m3ufile as $key=> $line) {

            ini_set('memory_limit', '-1');
                //if($key%2!=0&&$key<500){
                    //echo $line."<br>";

                //    echo '
                //         Tvg-id:'.ChannelController::getBetween($line,'tvg-id',' ').'<br>
                //         lang:'.ChannelController::getBetween($line,'tvg-language',' ').'<br>
                //         logo: '.ChannelController::getBetween($line,'tvg-logo',' ').'<br>
                //         groupTitle :'.ChannelController::getBetween($line,'group-title',',').'<br>
                //         Channel Name :'.$getChannel[1].'<br>

                //    ';
                // }

                   // echo $key%2==0&&$key>1&&$key<500? "url :".$line.'<br>-----------------------<br>':'';
                   if($key%2!=0&&$key>=1&&$key<65000){
                   $getChannel= explode(',',$line);
                   $group=ChannelController::getBetween($line,'group-title',',');
                   $group=explode('"',$group);
                  // $url=$key+1;
                $channels=array(
                   // 'url'=>$url%2==0&&$key>1?$line:'',
                    'title'=>$getChannel[1],
                    'tvg_id'=>ChannelController::getBetween($line,'tvg-id',' '),
                    'tvg_name'=>$getChannel[1],
                    'tvg_language'=>ChannelController::getBetween($line,'tvg-language',' '),
                    'tvg_country'=>ChannelController::getBetween($line,'tvg-country',' '),
                    'group_title'=>$group[0],
                    'logo'=>ChannelController::getBetween($line,'tvg-logo',' '),
                    'created_by'=>$_SESSION['userLogined']->id,
                );

            }
            if($key%2==0&&$key>1&&$key<65000){
                $channels+=array('url'=>$line);
                TmpChannels::insert($channels);
            }

            }
//         {   if(strpos($request->url,'username')!=true){
//             $m3uParser = new M3uParser();
//             $m3uParser->addDefaultTags();

//             $data = $m3uParser->parseFile($request->url);
//             $channels = array();

//             $_SESSION['url']=array($request->url,$request->urlSync,$request->fre);
//             foreach($data as $key => $entry)
//             {
//                 $extTag = $entry->getExtTags();
//                 $tv_id = $extTag[0]->getAttribute('tvg-id');
//                 if(empty($tv_id)){
//                     $tv_id = rand(100000,999999);
//                 }
//                 $channels = array(
//                     'url'=>$entry->getPath(),
//                     'title'=>$extTag[0]->getTitle(),
//                     'tvg_id'=>$tv_id,
//                     'tvg_name'=>$extTag[0]->getAttribute('tvg-name'),
//                     'tvg_language'=>$extTag[0]->getAttribute('tvg-language'),
//                     'tvg_country'=>$extTag[0]->getAttribute('tvg-country'),
//                     'group_title'=>$extTag[0]->getAttribute('group-title'),
//                     'logo'=>$extTag[0]->getAttribute('tvg-logo'),
//                     'created_by'=>$_SESSION['userLogined']->id,
//                 );

//                 TmpChannels::insert($channels);
//             }}
//             else {
//              ini_set('max_execution_time', 240);
//         ini_set('memory_limit', '-1');
//         $m3ufile = file_get_contents($request->url);
// //        http://ottbest.net/get.php?username=042D34F77532150&password=C35152540F14D6C&type=m3u_plus&output=mpegts
//       //  http://localhost/m3u/serve/f27669f68125ee67d24f9a8013e619be
//         //$len=strlen($m3ufile);
//         //$split=str_split($m3ufile,$len/24);
//         $words=array('#EXTM3U','#EXTINF:',' tvg-id="','" tvg-name="','" tvg-logo="','" group-title="','#EXTINF :');

//         $cut1=str_replace("#EXTM3U", '', $m3ufile);
//         for($i=0;$i<count($words);$i++){
//             $cut1=str_replace("$words[$i]", '[h]', $cut1);
//         }
//          $breakStr=explode('[h]',$cut1);
//         for($i=1;$i<count($breakStr)-5;$i++){
//             $i++;
//             $getGroup=explode('",',$breakStr[$i+3]);
//             $getUrl=explode('http',$getGroup[1]);
//             $getUrl='http'.$getUrl[1];


//             $channels = array(
//                 'tvg_id'=>$breakStr[$i++],
//                 'title'=>$breakStr[$i],
//                 'tvg_name'=>$breakStr[$i++],
//                 'logo'=>$breakStr[$i++],
//                 'tvg_language'=>'-',
//                 'tvg_country'=>'-',
//                 'group_title'=>$getGroup[0],
//                 'url'=>$getUrl,
//                 'created_by'=>$_SESSION['userLogined']->id,
//             );

//             TmpChannels::insert($channels);

//             }
//             }
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
            foreach($data as $key => $entry)
            {   if($key<30000){
                //ini_set('memory_limit', '-1');
                $extTag = $entry->getExtTags();
                $tv_id = $extTag[0]->getAttribute('tvg-id');
                if(empty($tv_id)){
                    $tv_id = rand(100000,999999);
                }
                $channels = array(
                    'url'=>$entry->getPath(),
                    'title'=>$extTag[0]->getTitle(),
                    'tvg_id'=>$tv_id,
                    'tvg_name'=>$extTag[0]->getAttribute('tvg-name'),
                    'tvg_language'=>$extTag[0]->getAttribute('tvg-language'),
                    'tvg_country'=>$extTag[0]->getAttribute('tvg-country'),
                    'group_title'=>$extTag[0]->getAttribute('group-title'),
                    'logo'=>$extTag[0]->getAttribute('tvg-logo'),
                    'created_by'=>$_SESSION['userLogined']->id,
                );
                TmpChannels::insert($channels);
            }
        }
        }

        $chnls = TmpChannels::where('created_by','=',$_SESSION['userLogined']->id)
                        ->whereRaw('group_title != ""')
                        ->groupBy('group_title')
                        ->get();

        echo json_encode($chnls);
    }

    public function store_channels(Request $request)
    {

        if(isset($_SESSION['url']))
        if($_SESSION['url'][1]=='1')
        DB::table('dailsync')->updateOrInsert(['PID'=>$request->playlist_id,'url'=>$_SESSION['url'][0]],['date'=>date('Y-m-d'),'time'=>date("H:i:s"),'gap'=>$_SESSION['url'][2],'dt'=>date('Y-m-d H:i')]);
       $checkIfLimitExceed=0;
    $getFixedChannelLimits=ChannelController::getFixedPlaylistCounts();
        ini_set('max_execution_time', 240);
        ini_set('memory_limit', '-1');
        foreach($request->groups as $key => $group)
        {

            $total_channels = 0;
                $tmp_channel = TmpChannels::find($group);
                if (DB::table('channel_groups')->where('playlist_id', '=', $request->playlist_id)->orderBy('no', 'DESC')->count() > 0) {
                    $gp = DB::table('channel_groups')->where('playlist_id', '=', $request->playlist_id)->orderBy('no', 'DESC')->first();
                    $Countgp = DB::table('channel_groups')->where('playlist_id','=',$request->playlist_id)->get();
                    foreach ($Countgp as $keys => $groups) {
                        $total_channels += \App\Channel::where('group_id','=',$groups->id)->get()->count();
                    }
                    $checkIfLimitExceed=$total_channels;

                    $no = $gp->no;
                    $no=$no!=""?++$no:1;

                }
                else {
                    $checkIfLimitExceed=0;
                    $no = 1;
                }
            if($getFixedChannelLimits>$checkIfLimitExceed) {
                $id = DB::table('channel_groups')->insertGetId([
                    'no' => $no,
                    'title' => $tmp_channel->group_title,
                    'playlist_id' => $request->playlist_id
                ]);
            }

                $tmp_channls = TmpChannels::where('group_title', '=', $tmp_channel->group_title)->where('created_by', '=', $_SESSION['userLogined']->id)->get();
                $no = 0;
                //$channels = array();

                foreach ($tmp_channls as  $channel) {
                if($getFixedChannelLimits>$checkIfLimitExceed) {
                    $channels = array(
                        'no' => ++$no,
                        'group_id' => $id,
                        'title' => $channel->title,
                        'url' => $channel->url,
                        'tvg_id' => $channel->tvg_id,
                        'tvg_name' => $channel->tvg_name==''?$channel->title:$channel->tvg_name,
                        'tvg_language' => $channel->tvg_language,
                        'tvg_country' => $channel->tvg_country,
                        'logo' => $channel->logo,
                        'created_by' => $_SESSION['userLogined']->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    );
                    $checkIfLimitExceed++;
                    Channel::insert($channels);
                }
                else break;
                }
        }
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
            foreach(Channel::where('group_id','=',$group->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $k => $channel) :
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
               foreach (Channel::where('group_id', '=', $group->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $k => $channel) :
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
            foreach(Channel::where('group_id','=',$group->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $k => $channel) :
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
        if(!$request->exists('nid') && !$request->exists('nno'))
        {
            $ch = Channel::where('group_id','=',$request->gid)->orderBy('no','DESC')->first();
            $no = $ch->no;
            $no = $no + 1;
            Channel::where('id','=',$request->id)->update(['no'=>$no]);
        }
        else
        {
            Channel::where('id','=',$request->nid)->update(['no'=>$request->no]);
            Channel::where('id','=',$request->id)->update(['no'=>$request->nno]);
        }
        echo json_encode(['status'=>'success']);
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
                foreach ($getUrlIfExists as $i) {

                            $gap=$i->gap*60;
                            $dateTime = new DateTime($i->dt);
                            $VirtualdateTime=$dateTime->modify('+'.$gap.' minutes');
                            //print_r($VirtualdateTime);
                            $RealdateTime = new DateTime(date('Y-m-d H:i'));
                            //print_r($RealdateTime);
                            if($VirtualdateTime < $RealdateTime){

                            $m3uParser = new M3uParser();
                            $m3uParser->addDefaultTags();
                            $data = $m3uParser->parseFile($i->url);
                            // $m3ufile = file_get_contents($i->url);

                            $channel=array();
                            foreach($data as $entry){

                            foreach ($entry->getExtTags() as $extTag) {
                                $title=($extTag->getTitle());}
                            $channel=($entry->getPath());
                            //print_r($title);
                            // echo $title;
                            //   $newTitle=DB::table('syncchannels')->where('oldTitle',$title)->pluck('newTitle')->first();
                            // if(DB::table('channels')->where('title',$newTitle)->exists()) {
                            //    $oldTitle=$title;
                            //$title=$newTitle;
                            //   DB::table('channels')->where('title',$newTitle)->take(1)->update(['url'=>$channel,'title'=>$oldTitle]);
                            // DB::table('syncchannels')->updateOrInsert(['newTitle'=>$newTitle],['oldTitle'=>$oldTitle]);
                            //    return $title;
                            //    }
                            //    elseif(DB::table('channels')->where('title',$title)->exists()) {
                            DB::table('channels')->where('title',$title)->update(['url'=>$channel]);
                            //echo $get;//,'title'=>$title.' '.$secureId
                            //        DB::table('syncchannels')->updateOrInsert(['newTitle'=>$title.' '.$secureId],['oldTitle'=>$title]);
                            //     $secureId++;}
                            // return $channel;
                            // }

                            }
                        DB::table('dailsync')->where('PID',$id)->where('url',$i->url)->update(['dt'=>date('Y-m-d H:i')]);
                       // return 1;

                            }
                            //else $tell='false';
                    //echo $tell;
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
    public  static function testing(){
    //    ini_set('max_execution_time', 240);
    //     ini_set('memory_limit', '-1');
    //     $m3ufile = file('https://iptv-org.github.io/iptv/categories/fashion.m3u', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    //     //echo $m3ufile[1].'<br>';
    //     foreach ($m3ufile as $key=> $line) {
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
}
