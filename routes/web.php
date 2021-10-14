<?php

use Illuminate\Support\Facades\Route;
session_start();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/', function () {
        return view('Landing.master-landing');
    })->name('/');
    Route::get('getBlog', 'm3u@getBlog');
    Route::get('getCards','m3u@getSubscription');
    Route::get('logout','m3u@logout');
    Route::get('login', function () {
    return view('Authentication.login');
    })->name('login');
    //------------------------static method-------------
    Route::post('ResendMail','m3u@ResendMail');
    //-------------------------------------------------------
    Route::get('reset',function (){
        return view('Authentication.passwordResetMail');
    });
    Route::get('passwordReset',function (){
        return view('Authentication.makeNewPassword');
    });
    Route::post('resetMyPassword','m3u@resetMyPassword');
    Route::get('verifymyemail','m3u@verifymyemail');
    Route::post('checkMailAndSend','m3u@checkMailAndSend');
    Route::get('myAdmin', function () {
        return view('Authentication.admin-login');

    });
    Route::get('register', function () {
        return view('Authentication.register');
    });
    Route::post('checkLogin','m3u@checkLogin');
    Route::get('termOfUses','m3u@statics')->name('termOfUses');
    Route::get('Refundpolicy','m3u@statics')->name('Refundpolicy');
    Route::get('Privacypolicy','m3u@statics')->name('Privacypolicy');
    Route::get('Aboutus','m3u@statics')->name('Aboutus');
    Route::post('checkAdminLogin','m3u@checkAdminLogin');
    Route::post('registerUser','m3u@registerUser');

    Route::get('blog',function(){
        return view ('Landing.Blog');
    });
    Route::get('EPG',function (){
        return view('Landing.EPG');
     });

    Route::get('november-giveaway-get-6-months-for-free',function (){
        return view('Landing.november-giveaway-get-6-months-for-free');
     });
    Route::get('MyBlog/{id}','m3u@myblogById');
    Route::get('MyBlogs',function (){
        return view('Landing.extendedBlog');
    })->name('MyBlogs');


Route::get('serve/{id}','ChannelController@export_url')->name('playlist.serve');
     //Route::get('Image_expand/{png}','m3u@Image_expand');
Route::group(['middleware'=>['userLogin']],function (){
    Route::post('playlist/store', 'PlaylistController@store')->name('playlist.store');
    Route::post('epg/store', 'epgController@store')->name('epg.store');
    Route::post('playlist/update', 'PlaylistController@update')->name('playlist.update');
    Route::post('epg/delete', 'epgController@delete')->name('epg.delete');
    Route::post('playlist/delete', 'PlaylistController@delete')->name('playlist.delete');
    Route::get('playlist/{id}/edit', 'PlaylistController@edit')->name('playlist.edit');
    Route::post('playlist/get', 'PlaylistController@get')->name('playlist.get');
    Route::get('playlist/clone/{id}', 'PlaylistController@clone')->name('playlist.clone');
    Route::get('playlist/embed/{id}', 'PlaylistController@embed')->name('playlist.embed');
    Route::post('playlist/embed_link', 'PlaylistController@embed_link')->name('playlist.embed_link');
    Route::post('playlist/get_groups', 'PlaylistController@get_groups')->name('playlist.get.groups');


    Route::post('playlist/download', 'ChannelController@download')->name('playlist.download');

    Route::post('channel/group/store', 'ChannelController@group_store')->name('channel.group.store');
    Route::post('channel/group/edit', 'ChannelController@group_edit')->name('channel.group.edit');
    Route::post('channel/group/update', 'ChannelController@group_update')->name('channel.group.update');
    Route::post('channel/group/delete', 'ChannelController@group_delete')->name('channel.group.delete');
    Route::post('channel/store', 'ChannelController@store')->name('channel.store');
    Route::post('channels/store', 'ChannelController@store_channels')->name('channels.store');
    Route::post('channels/update', 'ChannelController@update')->name('channel.update');
    Route::post('channels/delete', 'ChannelController@delete')->name('channel.delete');
    Route::post('channel/get', 'ChannelController@get_channels')->name('channel.get');
    Route::post('channel/count', 'ChannelController@count')->name('channel.count');
    Route::post('channel/get_single', 'ChannelController@get_single')->name('channel.get_single');
    Route::post('channel/parse_m3u', 'ChannelController@parse_m3u')->name('channel.parse_m3u');
    Route::get('channel/parse', 'ChannelController@parse')->name('channel.parse');
    Route::post('channel/search', 'ChannelController@search')->name('channel.search');
    Route::post('channel/sort', 'ChannelController@sort')->name('channel.sort');
    Route::post('channel/group/sort', 'ChannelController@group_sort')->name('channel.group.sort');
    Route::post('channel/bulk_delete', 'ChannelController@bulk_delete')->name('channel.bulk.delete');
    Route::post('channel/move_copy', 'ChannelController@move_copy')->name('channel.bulk.move_copy');
    Route::post('channel/move_position', 'ChannelController@move_position')->name('channel.move.position');

    Route::post('channel/bulk_group_delete', 'ChannelController@bulk_group_delete')->name('group.bulk.delete');
    Route::post('checksynceurlsentbyplaylist','m3u@checksynceurlsentbyplaylist');
    Route::post('selfcallsync','m3u@selfcallsync');
    Route::post('downPdf','m3u@downPdf');
    Route::get('getXml/{uid}','epgController@getXml');

});
    Route::get('AdminPostRequestsDilema','m3u@AdminPostRequestsDilema');

    Route::get('userDashboard', function () {
        return view('user.master-user');
    })->name('userDashboard');
Route::group(['middleware'=>['userLogin']],function () {
    Route::prefix('user')->group(function () {
        Route::get('logout', 'm3u@logout');
        Route::get('dashboard', function () {
            return view('user.master-user');
        });
        Route::get('account', function () {
            return view('user.account');
        })->name('user.account');
        Route::post('changePassword', 'm3u@changePassword');
        Route::post('updateAccount', 'm3u@updateAccount');
        Route::post('delAccount', 'm3u@delAccount');
        Route::get('playlist', function () {
            return view('user.playlist');
        })->name('playlists');
        Route::post('saveInvoice', 'm3u@saveInvoice');
        Route::post('setPaid', 'm3u@setPaid');
        Route::get('getInvoice', 'm3u@getInvoice');
        Route::get('checkPayment/{amount}/{type}/{id}','m3u@checkPayment');
        Route::get('myInvoice/{i}/{u}','m3u@getMyInvoice');
        Route::get('playlistSynchronization/{uid}','m3u@playlist_sync');
    });
});
Route::group(['middleware'=>['adminLogin']],function () {
    Route::prefix('admin')->group(function () {
        Route::get('adminDashboard', function () {
            return view('admin.master-admin');
        });
        Route::get('logout', 'm3u@logout');
        Route::get('user', function () {
            return view('admin.userPage');
        });
        Route::get('users', 'm3u@getUsers');
        Route::post('deleteUser', 'm3u@deleteUser');
        Route::get('subscription', function () {
            return view('admin.subscription');
        });
        Route::get('setting', function () {
            return view('admin.setting');
        });
        Route::post('countPlaylist', 'm3u@countPlaylist');
        Route::post('addSubscription', 'm3u@addSubscription');
        Route::post('addOrEditUser', 'm3u@addOrEditUser');
        Route::post('sendDataForEditLeaveAdmin', 'm3u@sendDataForEditLeaveAdmin');
        Route::post('setTrail', 'm3u@setTrail');
        Route::post('setTrailPlaylist', 'm3u@setTrailPlaylist');
        Route::post('setTrailChannels', 'm3u@setTrailChannels');
        Route::post('dailysync', 'm3u@dailysync');
        Route::get('exportCsv', 'm3u@exportCsv');
        Route::post('setEmailVerifyChecked', 'm3u@setEmailVerifyChecked');
        Route::post('setPaidChecked', 'm3u@setPaidChecked');
        Route::post('setSubTypeByAdmin', 'm3u@setSubTypeByAdmin');
        Route::post('adminBlog', 'm3u@adminBlog');
        Route::post('delBlog', 'm3u@delBlog');
        Route::post('getExtendedTextForBlog', 'm3u@getExtendedTextForBlog');
        Route::post('saveExtendedTextForBlog', 'm3u@saveExtendedTextForBlog');
        Route::post('saveStaticData', 'm3u@saveStaticData');
        Route::post('getValBack', 'm3u@getValBack');

        Route::get('connectAsUser/{email}', 'm3u@connectAsUser');
        Route::get('Dynamics', function () {
            return view('admin.blogTou');
        });


    });
});

//-----------------testing-------------------------
Route::get('test',function (){
   return view('material.playlist');
});
Route::get('sub',function (){
   return view('material.subscribe');
});
Route::get('payment-method',function (){
   return view('material.payment-method');
})->name('payment-method');
Route::get('invoice',function (){
   return view('material.invoice');
})->name('invoice');
Route::get('detailed-invoice',function (){
   return view('material.detailed-invoice');
})->name('detailed-invoice');
Route::get('playlist-sync',function (){
   return view('material.playlistSync');
})->name('playlist-sync');
Route::get('edit-playlist',function (){
   return view('material.editPlaylist');
})->name('edit-playlist');
Route::get('epg',function (){
    return view('material.epg');
})->name('epg');



//----------------------------------------

Route::get('page-not-found',function (){
   return view('material.page-404');
})->name('page-not-found');









