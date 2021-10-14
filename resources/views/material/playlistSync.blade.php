@php
if(isset($_GET['playlist']))
if (\Illuminate\Support\Facades\DB::table('playlists')->where('uid',$_GET['playlist'])->where('created_by',$_SESSION['userLogined']->id)->exists()){
    $id=\Illuminate\Support\Facades\DB::table('playlists')->where('uid',$_GET['playlist'])->pluck('id')->first();
}
else
die();
else
die();

@endphp
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Edit Playlist Information</title>
    <link rel="apple-touch-icon" href="newTemp/app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="newTemp/app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" href="newTemp/app-assets/vendors/select2/select2.min.css" type="text/css">
    <link rel="stylesheet" href="newTemp/app-assets/vendors/select2/select2-materialize.css" type="text/css">

    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/style.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/pages/form-select2.css">

    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark preload-transitions 2-columns   " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-purple-deep-orange gradient-shadow">
                <div class="nav-wrapper">
                    <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                        <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize" data-search="template-list">
                        <ul class="search-list collection display-none"></ul>
                    </div>
                    <ul class="navbar-list right">
                        <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li>
                        <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                        <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                        <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li>
                        <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>
                        <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
                    </ul>
                    <!-- translation-button-->
                    <ul class="dropdown-content" id="translation-dropdown">
                        <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="en"><i class="flag-icon flag-icon-gb"></i> English</a></li>
                        <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a></li>
                        <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></li>
                        <li class="dropdown-item"><a class="grey-text text-darken-1" href="#!" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a></li>
                    </ul>
                    <!-- notifications-dropdown-->
                    <ul class="dropdown-content" id="notifications-dropdown">
                        <li>
                            <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
                        </li>
                        <li class="divider"></li>
                        <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                            <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                        </li>
                        <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                            <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                        </li>
                        <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                            <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                        </li>
                        <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                            <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                        </li>
                        <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                            <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                        </li>
                    </ul>
                    <!-- profile-dropdown-->
                    <ul class="dropdown-content" id="profile-dropdown">
                        <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                        <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chat</a></li>
                        <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li>
                        <li class="divider"></li>
                        <li><a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i> Lock</a></li>
                        <li><a class="grey-text text-darken-1" href="user-login.html"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                    </ul>
                </div>
                <nav class="display-none search-sm">
                    <div class="nav-wrapper">
                        <form id="navbarForm">
                            <div class="input-field search-input-sm">
                                <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                                <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                                <ul class="search-list collection search-list-sm display-none"></ul>
                            </div>
                        </form>
                    </div>
                </nav>
            </nav>
        </div>
    </header>
    <!-- END: Header-->
    <ul class="display-none" id="default-search-main">
        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                <h6 class="search-title">FILES</h6>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="newTemp/app-assets/images/icon/pdf-image.png" width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Two new item submitted</span><small class="grey-text">Marketing Manager</small></div>
                    </div>
                    <div class="status"><small class="grey-text">17kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="newTemp/app-assets/images/icon/doc-image.png" width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">52 Doc file Generator</span><small class="grey-text">FontEnd Developer</small></div>
                    </div>
                    <div class="status"><small class="grey-text">550kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="newTemp/app-assets/images/icon/xls-image.png" width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">25 Xls File Uploaded</span><small class="grey-text">Digital Marketing Manager</small></div>
                    </div>
                    <div class="status"><small class="grey-text">20kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img src="newTemp/app-assets/images/icon/jpg-image.png" width="24" height="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small class="grey-text">Web Designer</small></div>
                    </div>
                    <div class="status"><small class="grey-text">37kb</small></div>
                </div>
            </a></li>
        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                <h6 class="search-title">MEMBERS</h6>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle" src="newTemp/app-assets/images/avatar/avatar-7.png" width="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small class="grey-text">UI designer</small></div>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle" src="newTemp/app-assets/images/avatar/avatar-8.png" width="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small class="grey-text">FontEnd Developer</small></div>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle" src="newTemp/app-assets/images/avatar/avatar-10.png" width="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Milena Gibson</span><small class="grey-text">Digital Marketing</small></div>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="collection-item" href="#">
                <div class="display-flex">
                    <div class="display-flex align-item-center flex-grow-1">
                        <div class="avatar"><img class="circle" src="newTemp/app-assets/images/avatar/avatar-12.png" width="30" alt="sample image"></div>
                        <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small class="grey-text">Web Designer</small></div>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="display-none" id="page-search-title">
        <li class="auto-suggestion-title"><a class="collection-item" href="#">
                <h6 class="search-title">PAGES</h6>
            </a></li>
    </ul>
    <ul class="display-none" id="search-not-found">
        <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
    </ul>

    <!-- BEGIN: SideNav-->
    @include('material.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">

            @if($_SESSION['userLogined']->emailVerified=='Yes' &&  \App\Http\Controllers\m3u::checkIfValidTime()!=0)
                @php
                    if($_SESSION['userLogined']->Paid=='inactive'){
                        $getPlaylistCount=\Illuminate\Support\Facades\DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count();
                       $getfixedPlaylistCount= \Illuminate\Support\Facades\DB::table('admin')->first();
                       $getFixedPlaylistCounts=$getfixedPlaylistCount->trailPlaylists;
                    }
                    else{
                        $getCardNo=$_SESSION['userLogined']->cardNo;
                        $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                        $getPlaylistCount=\Illuminate\Support\Facades\DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count();
                        $getFixedPlaylistCounts=$getFullCard->maxPlayList;
                    }

                @endphp



                <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">

                    <div class="row">
                        <div class="col s10 m6 l6 breadcrumbs-left">
                            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>Playlists</span></h5>
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="index.html">M3U editor</a>
                                </li>
                                <li class=""><a href="#">Playlists</a>
                                </li>
                                <li class="breadcrumb-item active">Edit playlist
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>

            </div>
                <h4 class="ml-2">Edit Playlist info</h4>


                <form method="POST" action="{{route('playlist.update')}}" id="editPlaylistForm">
                    @csrf
                    <input type="hidden" name="pid" id="id">

                        <div class="row">
                            <div class=" col m1 s12"></div>
                            <div class="form-group col m5 s12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control title" name="title" required>
                            </div>
                            @php
                                if($_SESSION['userLogined']->Paid=='inactive'){
                                   $urlCustomization= \Illuminate\Support\Facades\DB::table('admin')->first();
                                   $urlCustomization=$urlCustomization->DownloadURLcustomization;
                                }
                                else{
                                    $getCardNo=$_SESSION['userLogined']->cardNo;
                                    $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                                    $urlCustomization=$getFullCard->DownloadURLcustomization;
                                }
                            @endphp
                            @if($urlCustomization=='Yes')

                                <div class="form-group col m5 s12">
                                    <label for="basic-url">Playlist URL</label>
                                    <input type="text" class="form-control _uid"  value="{{url('/serve')}}/" size="50" name="uid" id="basic-url" aria-describedby="basic-addon3">

                                </div>

                            @else
                                <div class="form-group col m6 s12">
                                    <label for="basic-url">Playlist URL</label>
                                    <input type="text" class="form-control _uid" disabled  value="{{url('/serve')}}/" size="50" name="uid" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <br><br><br>
                                <p > you can't rename url . Get a Subscription To do it . <a
                                        href="{{url('user/account')}}" onclick="localStorage.setItem('account',3)">Click me </a> to Buy Membership</p>
                            @endif
                            <div class=" col m1 s12"></div>
                        </div>
                    <div class=" col m1 s12"></div>
                            <div class="col m5 s12 mt-5">
                                <div class="form-group appendSelectDiv">
                                    <select id="appendSelect" onchange="setHoursforSync($(this).val())" name="appendSelect" class=" select2 browser-default " >
                                    </select>
                                </div>
                            </div>

                                <div class="col m4 s12 mt-5">
                                <div class="form-group timefordailySynceDiv">
                                    <select  class="select2 browser-default " id="timefordailySynce" onchange="changeTimefordailysync($(this).val(),$('#appendSelect').val())" style="width: 100%">
                                        @if($_SESSION['userLogined']->Paid=='active')
                                            <option value="1">Every hour</option>
                                            <option value="2">Every 2 hours</option>
                                            <!-- <option value="6">Every 6 hours</option>
                                            <option value="8">Every 8 hours</option> -->
                                            <option value="12">Every 12 hours</option>
                                            <option selected value="24">Every 24 hours</option>

                                        @else
                                            <option disabled value="1">Every hour(Pro Plus)</option>
                                            <option disabled value="2">Every 2 hours(Pro Plus)</option>
                                            <!-- <option disabled value="6">Every 6 hours(Pro Plus)</option>
                                            <option disabled value="8">Every 8 hours(Pro Plus)</option> -->
                                            <option value="12">Every 12 hours</option>
                                            <option selected value="24">Every 24 hours</option>

                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col m2 s12 mt-5">
                                <a href="javascript:void(0)" id="dfadfa" class="tooltipped waves-effect waves-light btn #e53935 red darken-1 btn-small  mt-5 z-depth-5" onclick="delGapForDailySync($('#appendSelect').val(),$('#id').val())" data-position="left" data-tooltip="Delete selected link"><i class="small material-icons">delete_forever</i></a>
                            </div>
                            <div hidden="">
                                <select hidden name="group_id" class="form-control group ">
                                    <option  value="1">Use inline group titles (recommended)</option>
                                    <option value="2" id="gp_2">Use #EXTGRP tags</option>
                                </select>
                                {{--                                            </div>--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label for="protection">Playlist protection</label>--}}
                                <select  hidden name="protection" class="form-control protection">
                                    <option value="1">Allow downloads from any IP address</option>
                                    <option value="2" id="pt_2">Limit downloads by IP address</option>
                                </select>
                                {{--                                            </div>--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label for="limit">Limit channel embedding</label>--}}
                                <select hidden name="embed_channel" class="form-control limit">
                                    <option value="1">Allow any domain to embed channel display</option>
                                    <option value="2" id="ec">Only allow specific domains</option>
                                </select>

                                {{--                                            <div class="form-group">--}}
                                {{--                                                <input type="checkbox" name="hide_stream_url" value="1" class="hide_stream_url">--}}
                                {{--                                                <label for="hide_stream_url">Hide stream-URLs in M3U file behind redirect URLs</label>--}}
                                {{--                                            </div>--}}
                            </div>


                    <div class="row">
                        <div class="col m12 s12 mt-5 display-flex justify-content-center">
                        <button type="submit" class="waves-effect waves-light btn  darken-1 z-depth-5  mb-5 mt-3">Submit</button>
                        </div>
                    </div>
                </form>

            </div>

            @else
                <div class="card-alert card green lighten-5">
                    <div class="card-content green-text">
                        Buy a  Subscription To add playlists. <a onclick="localStorage.setItem('account',3)" href="{{url('user/account')}}">Click me to Buy Membership</a>

                    </div>
                </div>
            @endif
        </div>
    </div>

    <!--models----------------------------------------------------------------------------->




    <!-- end models-------------------------------------------------------------------------->

    <footer class="page-footer footer footer-static footer-dark gradient-45deg-purple-deep-orange gradient-shadow navbar-border navbar-shadow">
        <div class="footer-copyright">
            <div class="container"><span>&copy; 2020 <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">PIXINVENT</a></span></div>
        </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="newTemp/app-assets/js/vendors.min.js"></script>
    <script src="newTemp/app-assets/vendors/select2/select2.full.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="newTemp/app-assets/js/plugins.js"></script>
    <script src="newTemp/app-assets/js/search.js"></script>
    <script src="newTemp/app-assets/js/custom/custom-script.js"></script>
    <script src="newTemp/app-assets/js/scripts/form-select2.js"></script>
    <link rel="stylesheet" href="{{ asset('public/css/confirmAlert.css') }}">
    <script type="text/javascript" src="{{asset('public/js/confirmAlert.js') }}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <script>


        show_modal({{$id}});

        function show_modal(id) {

            $('#appendSelect').empty();
            $.ajax({
                url: "{{route('playlist.get')}}",
                method: "POST",
                data: {_token:"{{csrf_token()}}" , id:id},
                dataType: "JSON",
                success: function(response)
                {
                    $('#id').val(id);
                    $('.title').val(response[0].title);
                    $('._url').text("{{url('/serve')}}/");
                    var input = $('._uid');
                    input.val( input.val()+response[0].uid )

                    if(response.group_id == 2)
                    {
                        $('#gp_2').attr('selected', 'selected');
                    }
                    else
                    {
                        $('#gp_2').removeAttr('selected');
                    }

                    if(response.protection == 2)
                    {
                        $('#pt_2').attr('selected', 'selected');
                    }
                    else
                    {
                        $('#pt_2').removeAttr('selected');
                    }

                    if(response.embed_channel == 2)
                    {
                        $('#ec_2').attr('selected', 'selected');
                    }
                    else
                    {
                        $('#ec_2').removeAttr('selected');
                    }

                    if(response.hide_stream_url == 1)
                    {
                        $('.hide_stream_url').attr('checked', 'checked');
                    }
                    else
                    {
                        $('.hide_stream_url').removeAttr('checked');
                    }
                    if(response[1])
                        for(var j=0;j<response[1].length;j++){
                            var option = new Option(response[1][j].url+','+response[1][j].PID, response[1][j].url, true, true);
                            var appendSelect=  ' <option value="'+response[1][j].url+','+response[1][j].PID+'">'+response[1][j].url+'</option>' ;
                            $('#appendSelect').append(appendSelect);
                          //  $('#appendSelect').addClass('Select2');

                        }
                    if($('#appendSelect').has('option').length == 0){
                        $('#appendSelect').hide();
                        $('.appendSelectDiv').hide();
                        $('#timefordailySynce').hide();
                        $('.timefordailySynceDiv').hide();
                        $('#dfadfa').hide();
                        $('#LinkedSources').hide();
                        $('#syncButtonForHide').hide();

                    }

                    else {
                        $('#appendSelect').show();
                        $('.appendSelectDiv').show();
                        $('#timefordailySynce').show();
                        $('#dfadfa').show();
                        $('#LinkedSources').show();
                        $('#syncButtonForHide').show();
                    }
                   // $('#edit_playlist').modal('show');
                    setHoursforSync($('#appendSelect').val());
                }
            });
        }
        function makeInitialTextReadOnly(input) {
            var readOnlyLength = input.value.length;
            input.addEventListener('keydown', function(event) {
                var which = event.which;
                if (((which == 8) && (input.selectionStart <= readOnlyLength))
                    || ((which == 46) && (input.selectionStart < readOnlyLength))) {
                    event.preventDefault();
                }
            });
            input.addEventListener('keypress', function(event) {
                var which = event.which;
                if ((event.which != 0) && (input.selectionStart < readOnlyLength)) {
                    event.preventDefault();
                }
            });
            input.addEventListener('cut', function(event) {
                if (input.selectionStart < readOnlyLength) {
                    event.preventDefault();
                }
            });
            input.addEventListener('paste', function(event) {
                if (input.selectionStart < readOnlyLength) {
                    event.preventDefault();
                }
            });
        }

        makeInitialTextReadOnly(document.getElementById('basic-url'));
        function setHoursforSync(url) {

            $.ajax({
                url:'{{url('checksynceurlsentbyplaylist')}}',
                data:{url:url,_token:'{{csrf_token()}}'},
                method:'POST',
                success:function (response) {
                    let split=response.split('"');
                    //alert(split[1]);
                    // alert()
                    $('#timefordailySynce').val(split[1]).change();
                },
                error:function () {
                    toasrt.error('sad');
                }
            })
        }
        function changeTimefordailysync(val,url) {

            $.ajax({
                url:'{{url('checksynceurlsentbyplaylist')}}',
                data:{url:url,val:val,_token:'{{csrf_token()}}'},
                method:'POST',
                success:function (response) {
                    //  alert(response);
                    //  $('#timefordailySynce').val(response).change();
                },
                error:function () {
                    toastr.error('');
                }
            })


        }
        function  delGapForDailySync(url,id) {
            //alert(id);
            var con=confirm('Are you sure to want to delete?');
            // alert(confirm);
            if(con)
                $.ajax({
                    url:'{{url('checksynceurlsentbyplaylist')}}',
                    data:{url:url,del:1,_token:'{{csrf_token()}}'},
                    method:'POST',
                    success:function (response) {
                        var split=url.split(',');
                        // alert(split[1]);
                        //  alert(response);
                        show_modal(id);
                        // $('#timefordailySynce').val(split[1]).change();
                    },
                    error:function () {
                        toasrt.error('sad');
                    }
                })
        }
        function copyMyUrl(id) {
            var path=window.location.href.split('user');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(path[0]+'serve/'+id).select();
            document.execCommand("copy");
            $temp.remove();
            var toastHTML = 'url copied';
            M.toast({html: toastHTML});
        }
        @if(session()->get('playlistExists')==1)
        var toastHTML = 'Playlist url already exists! Please choose another name for url.';
        M.toast({html: toastHTML});
        @endif
    </script>
</body>

</html>
