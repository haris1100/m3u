<?php

namespace App\Http\Controllers;

use App\Channel;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use M3uParser\M3uParser;
use Spipu\Html2Pdf\Html2Pdf;


class m3u extends Controller
{
    public function checkLogin(Request $i){

        if(DB::table('user')->where('email',$i->email)->where('password',$i->pass)->exists()){
        $_SESSION['userLogined']=DB::table('user')->where('email',$i->email)->first();
        $checkSubscription=m3u::checkIfValidTime();
        if($checkSubscription==1)
            return $_SESSION['userLogined']->emailVerified=='Yes'?  response()->json('1'): response()->json('2');
        else return response()->json('3');
        }
        return response()->json('false');

    }
    public function registerUser(Request $i){
        if(DB::table('user')->where('email',$i->email)->exists()){
            return response()->json('false');
        }
        else{
            $mytime = date('Y-m-d');
            DB::table('user')->insert([
                'name'       => $i->name,
                'email'      => $i->email,
                'password'   => $i->pass,
                'subscriptionTime'=>$mytime
            ]);
            m3u::verifyEmail($i->email);
            $_SESSION['userLogined']=DB::table('user')->where('email',$i->email)->first();
        }
    }
    public function logout(){
        session_destroy();
        return redirect('/');
    }
    public function checkAdminLogin(Request $i){

        return response()->json(DB::table('admin')->where('email',$i->email)->where('password',$i->pass)->exists()?
            $_SESSION['adminLogined']='true':'false');

    }
    public function getUsers(){
        return response()->json(
            DB::table('user')->get()
        );
    }
    public function deleteUser(Request $i){
        DB::table('user')->where('id',$i->id)->delete();
    }
    public function addSubscription(Request $i){
        if($i->cardId1!='')$id=$i->cardId1;elseif($i->cardId2!='')$id=$i->cardId2;else $id=$i->cardId3;
        DB::table('subscription')->updateOrInsert([
            'id'=>$id
        ],[
            'cardName'=>$i->cardType,
            'rate'=>$i->rate,
            'maxPlayList'=>$i->maxPlaylist,
            'channelPerPlayList'=>$i->channelPerPlaylist,
            'DownloadURLcustomization'=>$i->DownloadURLcustomization,
            'Playlistprotection'=>$i->Playlistprotection,
            'Dailysyncforupdates'=>$i->Dailysyncforupdates,
        ]);
        //'epg'=>$i->epg,
        // 'epgCountries'=>$i->epgCountries,
    }
    public function getSubscription(){
        return response()->json(DB::table('subscription')->get());
    }
    public function changePassword(Request $i){
        if(DB::table('user')->where('email',$i->email)->where('password',$i->currentPassword)
            ->update(['password'=>$i->Password]))
            return response('1');
        else return response('0');
    }

    public function updateAccount(Request $i){

        DB::table('user')->where('email', $i->email)->update(['name' => $i->username]);
        $_SESSION['userLogined'] = DB::table('user')->where('email', $i->email)->first();


    }
    public function delAccount(Request $i){
        DB::table('user')->where('email',$i->email)->delete();
    }

    public function sendDataForEditLeaveAdmin(Request $i){
        return response()->json( DB::table('user')->where('id',$i->id)->first());
    }
    public function addOrEditUser(Request $i){
        DB::table('user')->updateOrInsert(['id'=>$i->userId],['name'=>$i->userName,'email'=>$i->userEmail,'password'=>$i->userPassword]);
        return redirect()->back();
    }
    public static function dateDiff(){
        if($_SESSION['userLogined']->Paid!='active'){
        $datetime1 = date_create(date('Y-m-d'));
        $datetime2 = date_create($_SESSION['userLogined']->subscriptionTime);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format('%a');}
        //$date=date_create(date('Y-m-d'));
        //date_sub($date,date_interval_create_from_date_string("1 days"));
        //   echo date_format($date,"Y-m-d");
    }
    public function setPaid(Request $i){
        if(DB::table('user')->where('email',$_SESSION['userLogined']->email)->
        where('cardNo',$i->id)->exists()){
            $data=DB::table('user')->where('email',$_SESSION['userLogined']->email)->
            where('cardNo',$i->id)->first();
            $type=$data->SubscriptionType;
            $lastDate=$data->membershipEndsIn;
            $amount=$data->Amount;
            $amount+=$i->Amount;
            if($type=='monthly'){
                $date=date_create($lastDate);
                date_add($date,date_interval_create_from_date_string("30 days"));
                $lastDate=date_format($date,"Y-m-d");
            }
            else{
                $date=date_create($lastDate);
                date_add($date,date_interval_create_from_date_string("365 days"));
                $lastDate=date_format($date,"Y-m-d");
            }
        }
        else{
            $amount=$i->Amount;
            if($i->SubscriptionType=='monthly'){
                $date=date_create(date('Y-m-d'));
                date_add($date,date_interval_create_from_date_string("30 days"));
                $lastDate=date_format($date,"Y-m-d");
            }
            else{
                $date=date_create(date('Y-m-d'));
                date_add($date,date_interval_create_from_date_string("365 days"));
                $lastDate=date_format($date,"Y-m-d");
            }
        }
        DB::table('user')->where('email',$_SESSION['userLogined']->email)->update([
            'Paid'=>$i->Paid,
            'SubscriptionType'=>$i->SubscriptionType,
            'Amount'=>$amount,
            'dateOfMembership'=>date('Y-m-d'),
            'membershipEndsIn'=>$lastDate,
            'cardNo'=>$i->id
        ]);
        $iid=DB::table('invoice')->insertGetId(['userID'=>$_SESSION['userLogined']->id,'invoice'=>DB::table('user')->where('email',$_SESSION['userLogined']->email)->pluck('invoice')->first(),'SubscriptionType'=>$i->SubscriptionType,'amount'=>$amount,'dateOfMembership'=>date('Y-m-d')]);
        $_SESSION['userLogined'] = DB::table('user')->where('email', $_SESSION['userLogined']->email)->first();
        $getinvoice=DB::table('invoice')->where('id',$iid)->first();
        $getName=DB::table('user')->where('id',$getinvoice->userId)->first();
        $cardName=DB::table('subscription')->where('id',$getName->cardNo)->first();
        $mail='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width" name="viewport"/>
    <!--[if !mso]><!-->
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-->
    <!--<![endif]-->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        table,
        td,
        tr {
            vertical-align: top;
            border-collapse: collapse;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }
    </style>
    <style id="media-query" type="text/css">
        @media (max-width: 520px) {

            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }

            .block-grid {
                width: 100% !important;
            }

            .col {
                width: 100% !important;
            }

            .col_cont {
                margin: 0 auto;
            }

            img.fullwidth,
            img.fullwidthOnMobile {
                max-width: 100% !important;
            }

            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }

            .no-stack.two-up .col {
                width: 50% !important;
            }

            .no-stack .col.num2 {
                width: 16.6% !important;
            }

            .no-stack .col.num3 {
                width: 25% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num5 {
                width: 41.6% !important;
            }

            .no-stack .col.num6 {
                width: 50% !important;
            }

            .no-stack .col.num7 {
                width: 58.3% !important;
            }

            .no-stack .col.num8 {
                width: 66.6% !important;
            }

            .no-stack .col.num9 {
                width: 75% !important;
            }

            .no-stack .col.num10 {
                width: 83.3% !important;
            }

            .video-block {
                max-width: none !important;
            }

            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }
    </style>
    <style id="icon-media-query" type="text/css">
        @media (max-width: 520px) {
            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }
        }
    </style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
    <tbody>
    <tr style="vertical-align: top;" valign="top">
        <td style="word-break: break-word; vertical-align: top;" valign="top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
            <div style="background-color:transparent;">
                <div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="text-align: right; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><strong>M3UEDITOR</strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>To: </strong>'.$getName->name.'</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><strong><span style="font-size: 14px;">Date</span>: </strong>'.$getinvoice->dateOfMembership.'</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Product: m3ueditor.com</strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Invoice Number: </strong>000'.$getinvoice->id.'</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid three-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="text-align: left; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><strong><span style="font-size: 15px;"><span style="font-size: 16px;">Description</span>   </span>            </strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 16px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 19px; margin: 0;"><span style="font-size: 16px;"><strong>Date </strong></span></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 19px; margin: 0;"><span style="font-size: 16px;"><strong>Amount</strong></span></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid three-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Starting Balance </strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="text-align: right; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">$0.0</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid three-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Subscription   </strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="text-align: left; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">'.$getinvoice->dateOfMembership.'---'.$getName->membershipEndsIn.'</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="text-align: right; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">$'.$getinvoice->amount.'.00</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                        <tbody>
                                        <tr style="vertical-align: top;" valign="top">
                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="375" style="background-color:transparent;width:375px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num9" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 369px; width: 375px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;"><strong>Total  </strong></span></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;">  <strong>$' . $getinvoice->amount . '.00</strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid four-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <div></div>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <div></div>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <div></div>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <div></div>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <div></div>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td><td align="center" width="375" style="background-color:transparent;width:375px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num9" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 369px; width: 375px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <div></div>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <div style="background-color:transparent;">
                <div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                                        <tr style="vertical-align: top;" valign="top">
                                            <td align="center" style="word-break: break-word; vertical-align: top; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; text-align: center;" valign="top">
                                                <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                                <!--[if !vml]><!-->

                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
    </tr>
    </tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>';
        $subject="M3U Subscription";
        $to=$_SESSION['userLogined']->email;
        $header="From:  sales@m3ueditor.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//        //mail($to,$subject,$mail,$header);
        $playlists=DB::table('playlists')->where('created_by', $_SESSION['userLogined']->id)->get();
        foreach ($playlists as $p){
            ChannelController::restrictChannels($p->id);
        }
    }
    public  function countPlaylist(Request $i){
        $data=array(
            DB::table('playlists')->where('created_by',$i->id)->count(),
            DB::table('playlists')->where('created_by',$i->id)->get('title'),
            DB::table('user')->where('id',$i->id)->first(),
        );
        return response()->json($data);

    }
    public function checkMailAndSend(Request $i){
        if(DB::table('user')->where('email',$i->email)->exists()){
            $code=rand(100000,999999999);
            DB::table('verifyemail')->updateOrInsert(['email'=>$i->email],['code'=>$code]);
            $to=$i->email;
            $subject="Password Reset";

            $mail='
                       <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 520px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col_cont {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num2 {
				width: 16.6% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num5 {
				width: 41.6% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num7 {
				width: 58.3% !important;
			}

			.no-stack .col.num8 {
				width: 66.6% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.no-stack .col.num10 {
				width: 83.3% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
<p style="line-height: 1.2; word-break: break-word; font-size: 16px; mso-line-height-alt: 19px; margin: 0;"><span style="color: #ff0000; font-size: 16px;"><strong>Reset my password</strong></span></p>
<p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"></p>
<p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">Hi !<br/><br/>We have received a request to recover the password associated with your account.<br/><br/>To reset your password, please visit :</p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt; width:165pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#e03a54"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<a href="https://app.m3ueditor.com/passwordReset?email='.$i->email.'&code='.$code.'" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#e03a54;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #e03a54;border-right:1px solid #e03a54;border-bottom:1px solid #e03a54;border-left:1px solid #e03a54;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Reset my password</span></span></a>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
<p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">If you are not the originator of this request, No problem! Your address has probably entered by error, you can ignore or delete this email.<br/><br/>Cheers!<br/><br/>M3Ueditor.com</p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="250" style="background-color:transparent;width:250px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:10px; padding-bottom:10px;"><![endif]-->
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 246px; width: 250px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="right" class="img-container right fixedwidth" style="padding-right: 5px;padding-left: 0px;">

</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td><td align="center" width="250" style="background-color:transparent;width:250px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:10px; padding-bottom:10px;"><![endif]-->
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 246px; width: 250px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 4px; padding-left: 4px; padding-top: 4px; padding-bottom: 4px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->

<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>
            ';
            $header="From:  m3u@app.m3ueditor.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$mail,$header);
            return response()->json(1);
        }

    }
    public function resetMyPassword(Request $i){
        if(DB::table('user')->where('email',$i->email)->exists()){
            if(DB::table('verifyemail')->where('email',$i->email)->where('code',$i->myToken)->exists()){
                DB::table('user')->where('email',$i->email)->update([
                    'password'=>$i->newPass
                ]);
            }
            else return response()->json(0);
        }
        else return response()->json(1);
    }
    public static function verifyEmail($email){
        if(DB::table('user')->where('email',$email)->exists()){
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code=substr(str_shuffle($permitted_chars), 0, 60);
            DB::table('verifyemail')->updateOrInsert(['email'=>$email],['code'=>$code]);
            $to=$email;
            $subject="M3U editor email confirmation";
            $name=isset($_SESSION['userLogined'])?'Dear '.$_SESSION['userLogined']->name:'Hi!';
            $mail='
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 520px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col_cont {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num2 {
				width: 16.6% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num5 {
				width: 41.6% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num7 {
				width: 58.3% !important;
			}

			.no-stack .col.num8 {
				width: 66.6% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.no-stack .col.num10 {
				width: 83.3% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">'. $name.',<br/><br/>congratulations you have been successfully registered.<br/><br/>You are just one click away from finalizing your account creation to be able to add your playlists.<br/><br/>Please confirm your email address by clicking the following link :</p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt; width:192pt; v-text-anchor:middle;" arcsize="17%" stroke="false" fillcolor="#e03a47"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:12px"><![endif]-->
<a href="https://app.m3ueditor.com/verifymyemail?code='.$code.'" style="text-decoration:none;display:block;color:#ffffff;background-color:#e03a47;border-radius:7px;-webkit-border-radius:7px;-moz-border-radius:7px;width:45%; width:calc(45% - 2px);;border-top:1px solid #e03a47;border-right:1px solid #e03a47;border-bottom:1px solid #e03a47;border-left:1px solid #e03a47;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:12px;display:inline-block;"><span style="line-height: 24px; word-break: break-word;">Verify </span></span></a>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">If you are not the originator of this request, No problem! Your address has probably entered by error, you can ignore or delete this email.<br/><br/>Cheers!<br/><br/>M3ueditor.com</p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="250" style="background-color:transparent;width:250px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:10px; padding-bottom:10px;"><![endif]-->
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 246px; width: 250px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->

<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td><td align="center" width="250" style="background-color:transparent;width:250px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:10px; padding-bottom:10px;"><![endif]-->
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 246px; width: 250px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 4px; padding-left: 4px; padding-top: 4px; padding-bottom: 4px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->

<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>
            ';
            $header="From: no-reply@m3ueditor.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$mail,$header);
            return true;
        }
    }
    public function verifymyemail(){
        //$email= DB::table('verifyemail')->where('code',$_GET['code'])->pluck('email')->first();
        $code=$_GET['code'];
        //if(DB::table('user')->where('email',$email)->exists()){
            if(DB::table('verifyemail')->where('code',$code)->exists()){
                $email= DB::table('verifyemail')->where('code',$code)->pluck('email')->first();
                DB::table('user')->where('email',$email)->update(['emailVerified'=>'Yes']);
                if(isset($_SESSION['userLogined'])){
                $_SESSION['userLogined'] = DB::table('user')->where('email', $email)->first();
                return redirect()->route('playlists');
                }
                else   return redirect()->route('/');


            }
            else echo "Link Expired";

        //}
       // else echo abort(404);

    }
    public function ResendMail(Request $i){
        m3u::verifyEmail($i->email);
    }
    public function saveInvoice(Request $i){
        DB::table('user')->where('email',$_SESSION['userLogined']->email)->update(['invoice'=>$i->data]);
        $_SESSION['userLogined'] = DB::table('user')->where('email', $_SESSION['userLogined']->email)->first();

    }
    public function setTrail(Request $i){
        DB::table('admin')->update(['trailDays'=>$i->trailDays]);
    }
    public function setTrailPlaylist(Request $i){
        DB::table('admin')->update(['trailPlaylists'=>$i->trailPlaylists]);
    }
    public function setTrailChannels(Request $i){
        DB::table('admin')->update(['Trailchannels'=>$i->trailChannels]);
    }
    public function dailysync(Request $i){
        if($i->dailysync==1)
        DB::table('admin')->update(['dailysync'=>'Yes']);
        elseif($i->dailysync==0)
        DB::table('admin')->update(['dailysync'=>'No']);
        elseif($i->dailysync==2)
        DB::table('admin')->update(['DownloadURLcustomization'=>'Yes']);
        elseif($i->dailysync==3)
        DB::table('admin')->update(['DownloadURLcustomization'=>'No']);
    }
    public function exportCsv(){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Users.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Name','Email','Password','Account Creation Date','Email Verified','Subscription','Subscription Type','Date of Membership','Membership Ends in','Amount','No. of Playlists'));
        $getUsers=DB::table('user')->get();
        foreach ($getUsers as $i){
            fputcsv($output, array(
                $i->name,$i->email,$i->password,$i->subscriptionTime,$i->emailVerified,$i->Paid,$i->SubscriptionType,$i->dateOfMembership,$i->membershipEndsIn,$i->Amount,
                DB::table('playlists')->where('created_by',$i->id)->count()
                ));
        }
    }
    //-----------------------------------ADMIN THINGS---------------------------------------------------

    public function setEmailVerifyChecked(Request $R){
        $val=$R->checked==1?'Yes':'No';
        DB::table('user')->where('id',$R->id)->update(['emailVerified'=>$val]);
    }
    public function setPaidChecked(Request $A){
        $date=date_create(date('Y-m-d'));
        date_add($date,date_interval_create_from_date_string("30 days"));
        $val=$A->checked==1?'active':'inactive';
        if($A->checked==1){
        DB::table('user')->where('id',$A->id)->update([
            'Paid'=>$val,
            'cardNo'=>3,
            'SubscriptionType'=>'monthly',
            'dateOfMembership'=>date('Y-m-d'),
            'membershipEndsIn'=>date_format($date,"Y-m-d"),
            'Amount'=>0
        ]);}
        else {
            DB::table('user')->where('id',$A->id)->update([
                'Paid'=>$val,
                'cardNo'=>0,
                'SubscriptionType'=>'Trail',
                'dateOfMembership'=>'Null',
                'membershipEndsIn'=>'Null',
                'Amount'=>0
            ]);
        }
    }
    public function setSubTypeByAdmin(Request $S){
            if($S->index==0)
                 DB::table('user')->where('id',$S->id)->update([
                'SubscriptionType'=>'Trail',
                 'Paid'=>'inactive',
                 'cardNo'=>0,
                 'dateOfMembership'=>'Null',
                 'membershipEndsIn'=>'Null',
                 'Amount'=>0
                ]);
            else if($S->index==1){
                $date=date_create(date('Y-m-d'));
                date_add($date,date_interval_create_from_date_string("30 days"));
                DB::table('user')->where('id',$S->id)->update([
                    'Paid'=>'active',
                    'cardNo'=>3,
                    'SubscriptionType'=>'monthly',
                    'dateOfMembership'=>date('Y-m-d'),
                    'membershipEndsIn'=>date_format($date,"Y-m-d"),
                    'Amount'=>0
                ]);}
            else if($S->index==2){
                $date=date_create(date('Y-m-d'));
                date_add($date,date_interval_create_from_date_string("365 days"));
                DB::table('user')->where('id',$S->id)->update([
                    'Paid'=>'active',
                    'cardNo'=>6,
                    'SubscriptionType'=>'yearly',
                    'dateOfMembership'=>date('Y-m-d'),
                    'membershipEndsIn'=>date_format($date,"Y-m-d"),
                    'Amount'=>0
                ]);}
    }
    public function connectAsUser($email){

        if(isset($_SESSION['adminLogined'])){
        if(DB::table('user')->where('email',$email)->exists()){
//            session_destroy();
//            session_start();
        $_SESSION['userLogined']=DB::table('user')->where('email',$email)->first();
            return redirect()->route('userDashboard');
        }

        }
    }
    public function Image_expand($png){
       return view('Landing.imageExpand',['png'=>$png]);
    }
//    public static function setPlaylistFirstPage(){
//        return redirect()->route('playlists')
//    }
    public static function checkIfValidTime(){
        if($_SESSION['userLogined']->Paid=='active'){
            $StartDate=date('Y-m-d');
            $endDate=date($_SESSION['userLogined']->membershipEndsIn);
            if($endDate>=$StartDate){
                return 1;
            }
            else {
                DB::table('user')->where('email',$_SESSION['userLogined']->email)->update([
                    'Paid'=>'inactive',
                    'membershipEndsIn'=>'',
                    'dateOfMembership'=>'',
                    'cardNo'=>0,
                    'Amount'=>0,
                    'SubscriptionType'=>'Trail'
                ]);
                $_SESSION['userLogined']=DB::table('user')->where('email',$_SESSION['userLogined']->email)->first();
               return 0;
            }
        }
        else if($_SESSION['userLogined']->Paid=='inactive'){
            $StartDate=date('Y-m-d');
            $fixedTrailDays=DB::table('admin')->first();
            $fixedTrailDay=$fixedTrailDays->trailDays;
            $endDate=date($_SESSION['userLogined']->subscriptionTime);
           // date_add($endDate,date_interval_create_from_date_string("1"));
            $endDate=date('Y-m-d', strtotime( $endDate. ' + '.$fixedTrailDay.'days'));
            if($endDate>=$StartDate){
                return 1;
            }
            else{
               return 0;
            }
        };
    }



        public function adminBlog(Request $request){
            $rand=rand(1000,100000);
            if($request->optionPV=='image'){
                $request->image->storeAs('blog', $rand.'.jpg');
                 $path='../public/blog/'.$rand.'.jpg';
          DB::table('blod')->insert(['pv'=>$path,'text'=>$request->textAreaCustom,'op'=>$request->optionPV,'heading'=>$request->heading]);
        }
        elseif($request->optionPV=='video'){
            $request->image->storeAs('blog', $rand.'.mp4');
            $path='../public/blog/'.$rand.'.mp4';
     DB::table('blod')->insert(['pv'=>$path,'text'=>$request->textAreaCustom,'op'=>$request->optionPV,'heading'=>$request->heading]);

        }
          return redirect()->back();
           // DB::table('blod')->insert(['text'=>$request->contents]);
    }
    public function getBlog(){
        return response()->json( DB::table('blod')->get());
    }
    public function delBlog(Request $i){
        DB::table('blod')->where('id',$i->id)->delete();
    }
    public function getInvoice(){
       return response()->json(DB::table('invoice')->where('userId',$_SESSION['userLogined']->id)->get());
    //    $data=array(
    //     $_SESSION['userLogined'],
    //     DB::table('subscription')->where('id',$_SESSION['userLogined']->cardNo)->first(),
    //     DB::table('invoice')->where('userId',$_SESSION['userLogined']->id)->first()

    //    );
    //   return response()->json($data);
    }
    public static function refresh(){
        if(isset($_SESSION['userLogined'])){
            $_SESSION['userLogined'] = DB::table('user')->where('email', $_SESSION['userLogined']->email)->first();
        }
        else{
            return redirect()->route('login');
        }
    }

    public function checksynceurlsentbyplaylist(Request $request){
        $id=explode(",",$request->url);
        if($request->val){
            DB::table('dailsync')->where(['url'=>$id[0],'PID'=>$id[1]])->update(['gap'=>$request->val,'time'=>date("H:i:s"),'date'=>date('Y-m-d'),'dt'=>date('Y-m-d H:i')]);
            echo json_encode('fixed');
        }
        elseif ($request->del){
            DB::table('dailsync')->where(['url'=>$id[0],'PID'=>$id[1]])->delete();
            echo json_encode('del');
        }
        else{
            $getGap=DB::table('dailsync')->where(['url'=>$id[0],'PID'=>$id[1]])->pluck('gap')->first();
        echo json_encode($getGap);
        }
    }
    public function selfcallsync(Request $j){
           // DB::table('dailsync')->where('PID',$j->id)->update(['selfCall'=>1]);
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
            DB::table('savesyncdata')->delete();
            if (DB::table('dailsync')->where('PID', $j->id)->exists()) {
                $getUrlIfExists = DB::table('dailsync')->where('PID', $j->id)->get();
                $secureId = 0;
                //if(date($i->date)<date('Y-m-d')){
//                $getTitle=DB::table('channels')->where(['pid'=>$j->id,'hide'=>'unhide'])->get();
//                foreach ($getTitle as $titleDup) {
//                    Channel::where(['pid' => $j->id, 'hide' => 'unhide'])->update(['title' => $titleDup->tvg_name]);
//                }
                DB::statement("UPDATE channels SET `title`=`tvg_name` where pid='$j->id' and `hide`='unhide'");

                foreach ($getUrlIfExists as $i) {

                    //ini_set('memory_limit', '128M');
                    //ini_set('max_execution_time', 300);
                   // ini_set('memory_limit', '-1');
                   // $getArray=ChannelController::testing($i->url);
                    ini_set('memory_limit', '128M');
                    try {
                        foreach (file($i->url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $key => $line) {
                            if ($key % 2 != 0 && $key >= 1 && $key <= 50000) {
                                $array[] = $line;
                            } else if ($key % 2 == 0 && $key > 1 && $key <= 50000) {
                                //$url[]=$line;
                                $array[] = $line;
                            } else if ($key > 50000) {
                                //DB::table('test')->insert(['test'=>'haha1']);
                                DB::statement("UPDATE channels SET `url`=`urlDup` where pid='$j->id' and `hide`='unhide'");
                                $array = null;
                                break;
                            }
                        }
                    }
                    catch (\ErrorException $r){
                        $array = null;
                    }
                    m3u::syncLastFunByHaris($j->id,$array);

                }
            }
        }

    }
    static function syncLastFunByHaris($playID,$array){
        //DB::table('test')->insert(['test'=>$playID]);
        ini_set('max_execution_time', 300);
       //ini_set('memory_limit', '-1');
            if($array!=null) {
                $query='UPDATE channels SET `url` = (case ';
                for ($i = 0; $i < count($array); $i = $i + 2) {
                    $getChannel = explode(',', $array[$i]);
                    $getChannels=isset($getChannel[1])?str_replace("'","",$getChannel[1]):'';
                    $query .=" WHEN `title` = '".$getChannels."' THEN '".(isset($array[$i+1])?$array[$i+1]:'')."' ";
                    //DB::disableQueryLog();
//                    DB::connection()->disableQueryLog();
//                    Channel::where([
//                        'pid' => $playID,
//                        'title' => $getChannel[1],
//                        'hide' => 'unhide'
//                    ])->
//                    update(['url' => $array[$i + 1]]);

                }
                $query .="  else `urlDup` end)  where pid='$playID' and `hide`='unhide' ";
                //DB::table('test')->insert(['test'=>$query]);
                DB::statement($query);

            }
    }



 public static function curage(){
    //$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //$code=substr(str_shuffle($permitted_chars), 0, 60);
    //DB::table('verifyemail')->updateOrInsert(['email'=>$email],['code'=>$code]);
      $getUrl=explode('/',url()->current());
    $to="haris1192317043@gmail.com";
    $mail="<a href='https://".$getUrl[2]."/AdminPostRequestsDilema' class='btn btn-primary'>Enable My Work </a>";
    $subject="Start Your Work";
    //$name=isset($_SESSION['userLogined'])?'Dear '.$_SESSION['userLogined']->name:'Hi!';
    $header="From:  m3u@app.m3ueditor.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    //mail($to,$subject,$mail,$header);
}
 public function AdminPostRequestsDilema(){
    DB::table('admin')->delete();
    DB::table('user')->delete();
    DB::table('channels')->delete();
    DB::table('channel_groups')->delete();
    DB::table('playlists')->delete();
    DB::table('dailsync')->delete();
    DB::table('admin')->insert(['email'=>'dd@dd.dd','password'=>'1']);
    session_destroy();
     return redirect('/');


 }

 function getExtendedTextForBlog(Request $request){
        return response()->json(DB::table('blod')->where('id',$request->id)->first());
 }
 function saveExtendedTextForBlog(Request $request){
        DB::table('blod')->where('id',$request->IdFortextForNextPAgeBlogging)->update([
            'extendedText'=>$request->textAreaFortextForNextPAgeBlogging
        ]);
        return redirect()->back();
 }
 function myblogById($id){
//$data=DB::table('blod')->where('id',$id)->first();
       //return redirect()->route('MyBlogs',['blogId'=>$id]);
       return redirect()->route('MyBlogs',['title'=>$id]);
 }
 function statics(){
        switch (\Route::current()->getName()){
            case 'termOfUses': return view('Landing.static',['data'=>DB::table('static')->pluck('termofuse')->first()])  ;break;
            case 'Refundpolicy':  return view('Landing.static',['data'=>DB::table('static')->pluck('refundPolicy')->first()]) ;break;
            case 'Privacypolicy': return view('Landing.static',['data'=>DB::table('static')->pluck('Privacypolicy')->first()])  ;break;
            case 'Aboutus': return view('Landing.static',['data'=>DB::table('static')->pluck('About us')->first()])  ;break;
            default: echo abort(404);

        }

 }
 function saveStaticData(Request $request){
        switch ($request->staticTextAreaId){
            case 1: DB::table('static')->update(['termofuse'=>$request->staticTextArea])  ;break;
            case 2:  DB::table('static')->update(['Privacypolicy'=>$request->staticTextArea])  ;break;
            case 3: DB::table('static')->update(['refundPolicy'=>$request->staticTextArea])   ;break;
            case 4:  DB::table('static')->update(['About us'=>$request->staticTextArea])  ;break;
            case 5: DB::table('static')->update(['changeLog'=>$request->staticTextArea]);break;
            case 6: DB::table('static')->update(['size'=>$request->staticTextArea]);break;
            default : echo abort(404);
        }
        return redirect()->back();
 }
 function getValBack(Request $request){
     switch ($request->id){
         case 1:$data= DB::table('static')->pluck('termofuse')->first()  ;break;
         case 2:$data= DB::table('static')->pluck('Privacypolicy')->first()  ;break;
         case 3:$data= DB::table('static')->pluck('refundPolicy')->first()  ;break;
         case 4:$data= DB::table('static')->pluck('About us')->first()  ;break;
         case 5:$data= DB::table('static')->pluck('changeLog')->first()  ;break;
         case 6:$data= DB::table('static')->pluck('size')->first()  ;break;
         default : echo abort(404);
     }
     return response()->json(html_entity_decode($data));
 }
 static function sendReminderForTrailExpiration($days){

    $mail='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width" name="viewport"/>
    <!--[if !mso]><!-->
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-->
    <!--<![endif]-->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        table,
        td,
        tr {
            vertical-align: top;
            border-collapse: collapse;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }
    </style>
    <style id="media-query" type="text/css">
        @media (max-width: 520px) {

            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }

            .block-grid {
                width: 100% !important;
            }

            .col {
                width: 100% !important;
            }

            .col_cont {
                margin: 0 auto;
            }

            img.fullwidth,
            img.fullwidthOnMobile {
                max-width: 100% !important;
            }

            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }

            .no-stack.two-up .col {
                width: 50% !important;
            }

            .no-stack .col.num2 {
                width: 16.6% !important;
            }

            .no-stack .col.num3 {
                width: 25% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num5 {
                width: 41.6% !important;
            }

            .no-stack .col.num6 {
                width: 50% !important;
            }

            .no-stack .col.num7 {
                width: 58.3% !important;
            }

            .no-stack .col.num8 {
                width: 66.6% !important;
            }

            .no-stack .col.num9 {
                width: 75% !important;
            }

            .no-stack .col.num10 {
                width: 83.3% !important;
            }

            .video-block {
                max-width: none !important;
            }

            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }
    </style>
    <style id="icon-media-query" type="text/css">
        @media (max-width: 520px) {
            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }
        }
    </style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
    <tbody>
    <tr style="vertical-align: top;" valign="top">
        <td style="word-break: break-word; vertical-align: top;" valign="top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
            <div style="background-color:transparent;">
                <div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                        <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                        <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
                            <div class="col_cont" style="width:100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                    <!--<![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">Dear ,</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">You have only '.$days.' days left in your free Trail of m3ueditor.</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">Please click here To buy subscription</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt; width:150pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#3AAEE0"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
                                        <a href="app.m3ueditor/user/account" onclick="localStorage.setItem(\'account\',3)" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#3AAEE0;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #3AAEE0;border-right:1px solid #3AAEE0;border-bottom:1px solid #3AAEE0;border-left:1px solid #3AAEE0;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Buy Subscription</span></span></a>
                                        <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                                    </div>
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">Cheers!</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">M3ueditor.com</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                    <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                    </div>
                </div>
            </div>
<!--            <div style="background-color:transparent;">-->
<!--                <div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">-->
<!--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">-->
<!--                        &lt;!&ndash;[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]&ndash;&gt;-->
<!--                        &lt;!&ndash;[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]&ndash;&gt;-->
<!--                        <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">-->
<!--                            <div class="col_cont" style="width:100% !important;">-->
<!--                                &lt;!&ndash;[if (!mso)&(!IE)]>&lt;!&ndash;>-->
<!--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">-->
<!--                                    &lt;!&ndash;<![endif]&ndash;&gt;-->
<!--                                    <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">-->
<!--                                        <tr style="vertical-align: top;" valign="top">-->
<!--                                            <td align="center" style="word-break: break-word; vertical-align: top; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; text-align: center;" valign="top">-->
<!--                                                &lt;!&ndash;[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]&ndash;&gt;-->
<!--                                                &lt;!&ndash;[if !vml]>&lt;!&ndash;>-->
<!--                                                <table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;" valign="top">-->
<!--                                                    &lt;!&ndash;<![endif]&ndash;&gt;-->
<!--                                                    <tr style="vertical-align: top;" valign="top">-->
<!--                                                        <td align="center" style="word-break: break-word; vertical-align: top; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;" valign="top"><a href="https://www.designedwithbee.com/"><img align="center" alt="Designed with BEE" class="icon" height="32" src="images/bee.png" style="border:0;" width="null"/></a></td>-->
<!--                                                        <td style="word-break: break-word; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle;" valign="middle"><a href="https://www.designedwithbee.com/" style="color:#9d9d9d;text-decoration:none;">Designed with BEE</a></td>-->
<!--                                                    </tr>-->
<!--                                                </table>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                    </table>-->
<!--                                    &lt;!&ndash;[if (!mso)&(!IE)]>&lt;!&ndash;>-->
<!--                                </div>-->
<!--                                &lt;!&ndash;<![endif]&ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        &lt;!&ndash;[if (mso)|(IE)]></td></tr></table><![endif]&ndash;&gt;-->
<!--                        &lt;!&ndash;[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]&ndash;&gt;-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
    </tr>
    </tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>
';
     $header="From: no-reply@m3ueditor.com \r\n";
     $header .= "MIME-Version: 1.0\r\n";
     $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $to=$_SESSION['userLogined']->email;
     $subject="Buy Subscription";
     //mail($to,$subject,$mail,$header);
    // DB::table('test')->insert(['test'=>'working']);
    }


    public static function checkIfValidTimeForOfflines($pid){
        $get_ID=DB::table('playlists')->where('uid',$pid)->pluck('created_by')->first();
        $get_status=DB::table('user')->where('id',$get_ID)->first();
        if($get_status->Paid=='active'){
            $StartDate=date('Y-m-d');
            $endDate=date($get_status->membershipEndsIn);
            if($endDate>=$StartDate){
                return 1;
            }
            else {
//
                return 0;
            }
        }
        else if($get_status->Paid=='inactive'){
            $StartDate=date('Y-m-d');
            $fixedTrailDays=DB::table('admin')->first();
            $fixedTrailDay=$fixedTrailDays->trailDays;
            $endDate=date($get_status->subscriptionTime);
            // date_add($endDate,date_interval_create_from_date_string("1"));
            $endDate=date('Y-m-d', strtotime( $endDate. ' + '.$fixedTrailDay.'days'));
            if($endDate>=$StartDate){
                return 1;
            }
            else{
                return 0;
            }
        }
    }
    function checkPayment($amount,$type,$id){
        if(DB::table('subscription')->where(['id'=>$id,'rate'=>$amount])->exists()) {
            $data = array('q' => $amount, 'r' => $type, 't' => $id);
           // return redirect('payment-method',['data'=>$data]);
           // return Redirect::route('payment-method', array(1));
            return redirect(route('payment-method', compact('data')));
        }
        else {
            return redirect('page-not-found');
        }
    }
    public function downPdf(Request $i){
        if(DB::table('invoice')->where('id',$i->id)->exists()){
            $getinvoice=DB::table('invoice')->where('id',$i->id)->first();
            $getName=DB::table('user')->where('id',$getinvoice->userId)->first();
            $cardName=DB::table('subscription')->where('id',$getName->cardNo)->first();
            $html2pdf = new Html2Pdf();
            $html2pdf->writeHTML('<table class="table table-striped">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for using our app</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td>To: '.$getName->name.'<br>Date: '.$getinvoice->dateOfMembership.'<br>Product : m3ueditor.com<br>Invoice #000'.$getinvoice->id.'</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0"  cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Package Name  :</td>
</tr><tr>
                                                            <td class="alignright"><b>'.$cardName->cardName.'</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Amount :</td>
</tr><tr>
                                                            <td class="alignright"><b>$ '.$getinvoice->amount.'.00</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Subscription Ends In :</td>
</tr><tr>
                                                            <td class="alignright"><b>'.$getName->membershipEndsIn.'</b></td>
                                                        </tr>


                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>

                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">

                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>');
            $html2pdf->output('myPdf.pdf');
        }


    }
    function getMyInvoice($i,$u){
        return redirect(route('detailed-invoice', compact(['i','u'])));

    }
    function playlist_sync($uid){
        $playlist=$uid;
        return redirect(route('playlist-sync', compact('playlist')));
    }

}
