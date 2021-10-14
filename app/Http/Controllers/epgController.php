<?php

namespace App\Http\Controllers;

use App\epg;
use App\Playlist;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class epgController extends Controller
{
   function store(Request $request){
       $string='';
       if($request->pid!=null)
       foreach ($request->pid as $pid){
           $string.=$pid.' ';
       }
       $string2='';
       if($request->cid!=null)
           foreach ($request->cid as $pid){
               $string2.=$pid.',';
           }
       $uid=md5(time());
       DB::table('epgs')->insertGetId(
           [
               'title'=>$request->title ,
               'uid'=>$uid ,
               'playlists_embeded'=>$string,
               'created_by'=>$_SESSION['userLogined']->id ,
               'creation_time'=>date('d-m-Y H:i:s'),
               'countries'=>$string2
           ]
       );

       return redirect()->to('epg');

   }
   function delete(Request $request){
       epg::where('id','=',$request->pid)->delete();
       return redirect()->back();
   }
   function getXml($uid){
   if(epg::where('created_by',$_SESSION['userLogined']->id)->where('uid',$uid)->exists()){
    $file1 = public_path('/exports/mewatch.sg.channels.xml');
    $file2 = public_path('/exports/fashiontv-czechslovak.xml');
    $fileout =public_path('/exports/fileout.xml');
    $xml=simplexml_load_file($file1) or die("Error: Cannot create object");
    print_r($xml->channels->channel->attributes());
  foreach($xml->channels->channel as $ch){
  echo ($ch).'<br>';
  } 
   

   } 
   else  abort(404);
   }
}
