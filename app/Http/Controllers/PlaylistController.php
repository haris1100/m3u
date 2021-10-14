<?php

namespace App\Http\Controllers;

use App\Playlist;
use Carbon\Carbon;
use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class PlaylistController extends Controller
{
    public function store(Request $request){
        $uid=md5(time());
        $id = DB::table('playlists')->insertGetId(
            [
                'title'=>$request->title ,
                'group_id'=>$request->group_id ,
                'protection'=>$request->protection,
                'embed_channel'=>$request->embed_channel ,
                'hide_stream_url'=>($request->hide_stream_url == 1) ? $request->hide_stream_url : 0,
                'uid'=>$uid ,
                'username'=>substr(str_shuffle(md5(time())),0,8),
                'password'=> substr(str_shuffle(md5(time())),0,8) ,
                'created_by'=>$_SESSION['userLogined']->id ,
                'host'=>URL::to('/').":443"


            ]
        );
        //DB::table('dailsync')->insert(['PID'=>$id,'wholeSync'=>$request->urlSyncWhole]);


        return redirect()->to('playlist/'.$uid.'/edit')->with('indexP',1);
    }

    public function update(Request $request)
    {
        $exist=0;
        if(Playlist::where('id',$request->pid)->exists()){

            if (str_contains($request->uid, 'http://localhost/m3u/serve/')) {
                $uid=explode('/',$request->uid);
                $uid=end($uid);
            }
            else
                $uid=$request->uid;

            if(!Playlist::where('uid',$uid)->where('id','!=',$request->pid)->exists())
            DB::table('playlists')->where('id',$request->pid)->update([
                'uid'=>$uid,
                'title'=>$request->title
            ]);
            else
               $exist=1;
//        $playlist = Playlist::findOrFail($request->pid);
//        $playlist->title = $request->title;
//        $playlist->uid = $request->_uid;
//        $playlist->group_id = $request->group_id;
//        $playlist->protection = $request->protection;
//        $playlist->embed_channel = $request->embed_channel;
//        $playlist->hide_stream_url = ($request->hide_stream_url == 1) ? $request->hide_stream_url : 0;
//        $playlist->save();
        }
        //DB::table('dailsync')->whereNull('url')->updateOrInsert(['PID'=>$request->pid],['wholeSync'=>$request->urlSyncWholeEdit]);
        return redirect()->back()->with('playlistExists',$exist);
    }

    public function delete(Request $request)
    {
        Playlist::where('id','=',$request->pid)->delete();
//        $getGroups=DB::table('channel_groups')->where('playlist_id',$request->pid)->get();
//        foreach ($getGroups as $i){
//            DB::table('channels')->where('group_id',$i->id)->delete();
//
//        }
        DB::table('channel_groups')->where('playlist_id',$request->pid)->delete();
        DB::table('channels')->where('pid',$request->pid)->delete();
        return redirect()->back();
    }

    public function get(Request $request)
    {
       // $wholeSync=DB::table('dailsync')->where('PID',$request->id)->where('wholeSync',1)->exists()?1:0;
        $getLinks=DB::table('dailsync')->where('PID',$request->id)->whereNotNull('url')->get();
        $data=array(Playlist::where('id','=',$request->id)->first(),$getLinks);
        echo json_encode($data);
    }

    public function edit($id)
    {
        if (DB::table('playlists')->where('uid',$id)->where('created_by',$_SESSION['userLogined']->id)->exists()) {
            return redirect(route('edit-playlist', compact('id')));
        }
        else
            return redirect('page-not-found');
            // return view('material.editPlaylist',compact('id'));

    }

    public function clone($id){
        if($_SESSION['userLogined']->Paid=='inactive'){
            $getPlaylistCount=DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count();
            $getfixedPlaylistCount= DB::table('admin')->first();
            $getFixedPlaylistCounts=$getfixedPlaylistCount->trailPlaylists;
        }
        else{
            $getCardNo=$_SESSION['userLogined']->cardNo;
            $getFullCard=DB::table('subscription')->where('id',$getCardNo)->first();
            $getPlaylistCount=DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count();
            $getFixedPlaylistCounts=$getFullCard->maxPlayList;
        }
        if($getFixedPlaylistCounts>DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count()){

        $playlist = Playlist::where('id','=',$id)->first();
        if($playlist){}else echo abort(404);
        $data = array(
            'title'=>$playlist->title."(duplicate)",
            'group_id'=>$playlist->group_id,
            'protection'=>$playlist->protection,
            'embed_channel'=>$playlist->embed_channel,
            'hide_stream_url'=>$playlist->hide_stream_url,
            'uid'=>md5(time()),
            'host'=>URL::to('/').":443",
            'username'=>substr(str_shuffle(md5(time())),0,8),
            'password'=>substr(str_shuffle(md5(time())),0,8),
            'created_by'=>$_SESSION['userLogined']->id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        );
        $playlist_id = Playlist::insertGetId($data);
        $groups = DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->get();
        foreach($groups as $key => $group) {
            $arr = array(
                'title'=>$group->title,
                'no'=>$group->no,
                'playlist_id'=>$playlist_id,
            );
            $group_id = DB::table('channel_groups')->insertGetId($arr);
            foreach(Channel::where('group_id','=',$group->id)->get() as $k => $channel){
                $ch = array(
                    'no'=>$channel->no,
                    'group_id'=>$group_id,
                    'title'=>$channel->title,
                    'url'=>$channel->url,
                    'tvg_id'=>$channel->tvg_id,
                    'tvg_name'=>$channel->tvg_name,
                    'tvg_language'=>$channel->tvg_language,
                    'tvg_country'=>$channel->tvg_country,
                    'tvg_channel_number'=>$channel->tvg_channel_number,
                    'logo'=>$channel->logo,
                    'logo_small'=>$channel->logo_small,
                    'audio_track'=>$channel->audio_track,
                    'created_by'=>$_SESSION['userLogined']->id,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                    'pid'=>$playlist_id,
                    'group_title'=>$group->title
                );
                Channel::insert($ch);
            }
        }
        ChannelController::restrictChannels($playlist_id);
        return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function embed($id){
        $playlist = Playlist::where('uid','=',$id)->first();
    if($playlist)
        return view('user.embed',compact('playlist'));
    else echo abort(404);
    }

    public function embed_link(Request $request){
        $playlist = Playlist::find($request->id);
        $link = route('playlist.embed',$playlist->uid);
$html = '<code>&lt;iframe
    src="'.$link.'"
    width="100%"
    height="800"
    frameborder="0"&gt;
&lt;/iframe&gt;</code>';
        echo json_encode(['link'=>$link,'html'=>$html]);
    }

    public function get_groups(Request $request){
        echo json_encode(DB::table('channel_groups')->where('playlist_id','=',$request->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get());
    }
}
