@php
    if(isset($_GET['id']) && isset($_SESSION['userLogined']->id))
        if (DB::table('playlists')->where('uid',$_GET['id'])->where('created_by',$_SESSION['userLogined']->id)->exists()) {
        $id=$_GET['id'];
         $playlist = \App\Playlist::where('uid','=',$id)->first();
         $total_channels =  \App\Channel::where('pid','=',$playlist->id)->where('hide','unhide')->whereNotNull('group_id')->count();
         //$getSynchronization=\App\Http\Controllers\ChannelController::dailyautosync($playlist->id);
       if($_SESSION['userLogined']->Paid=='active'){
                $getCardNo=$_SESSION['userLogined']->cardNo;
                $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                $getFixedChannelCounts=$getFullCard->channelPerPlayList;
            }
            else{
                $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
                $getFixedChannelCounts=$getfixedChannelCount->Trailchannels;
            }
    }
    else
die();else
die();
@endphp
@if($_SESSION['userLogined']->emailVerified=='Yes' &&  \App\Http\Controllers\m3u::checkIfValidTime()!=0)

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
    <title>Nestable | Materialize - Material Design Admin Template</title>
    <link rel="apple-touch-icon" href="newTemp/app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="newTemp/app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/vendors/jquery.nestable/nestable.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/vendors/sweetalert/sweetalert.css">

    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/style.css">
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
@include('material.sidebar')    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6 breadcrumbs-left">
                            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>Nestable</span></h5>
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Extra Components</a>
                                </li>
                                <li class="breadcrumb-item active">Nestable
                                </li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6"><a class="btn btn-floating dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons">expand_more </i><i class="material-icons right">arrow_drop_down</i></a>
                            <ul class="dropdown-content" id="dropdown1" tabindex="0">
                                <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span class="new badge red">2</span></a></li>
                                <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
                                <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
                                <li class="divider" tabindex="-1"></li>
                                <li tabindex="0"><a class="grey-text text-darken-2" href="user-login.html">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
                        <div class="card" hidden>
                            <div class="card-content">
                                <p class="caption mb-0"><a href="https://dbushell.com/Nestable/" target="_blank">Nestable</a>
                                    Drag & drop hierarchical list with mouse and touch compatibility (jQuery plugin).</p>
                            </div>
                        </div>
                        <!-- BASIC NESTABLES -->
                        <div class="row" hidden>
                            <div class="col s12 m12 l12">
                                <div id="basic-Netables" class="card card card-default scrollspy">
                                    <div class="card-content">
                                        <h4 class="card-title">Basic Nestables</h4>
                                        <p>Netables and also draggable using touch devices, you can simply create on by with an Ordered list, further
                                            reading please reffer documentation</p>
                                        <div class="dd" id="nestable">
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="1">
                                                    <div class="dd-handle">Item 1</div>
                                                </li>
                                                <li class="dd-item" data-id="2">
                                                    <div class="dd-handle">Item 2</div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="3">
                                                            <div class="dd-handle">Item 3</div>
                                                        </li>
                                                        <li class="dd-item" data-id="4">
                                                            <div class="dd-handle">Item 4</div>
                                                        </li>
                                                        <li class="dd-item" data-id="5">
                                                            <div class="dd-handle">Item 5</div>
                                                            <ol class="dd-list">
                                                                <li class="dd-item" data-id="6">
                                                                    <div class="dd-handle">Item 6</div>
                                                                </li>
                                                                <li class="dd-item" data-id="7">
                                                                    <div class="dd-handle">Item 7</div>
                                                                </li>
                                                                <li class="dd-item" data-id="8">
                                                                    <div class="dd-handle">Item 8</div>
                                                                </li>
                                                            </ol>
                                                        </li>
                                                        <li class="dd-item" data-id="9">
                                                            <div class="dd-handle">Item 9</div>
                                                        </li>
                                                        <li class="dd-item" data-id="10">
                                                            <div class="dd-handle">Item 10</div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="11">
                                                    <div class="dd-handle">Item 11</div>
                                                </li>
                                                <li class="dd-item" data-id="12">
                                                    <div class="dd-handle">Item 12</div>
                                                </li>
                                            </ol>
                                        </div>
                                        <textarea id="nestable-output"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dark Theme -->
                    <div class="row" hidden>
                        <div class="col s12 m12 l12">
                            <div id="dark-Netables" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <h4 class="card-title">Dark Theme</h4>
                                    <p>This configuration allows you to add a handler at the left so you only allowed to move it from the handler
                                    </p>
                                    <div class="dd" id="nestable2">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle">Item 13</div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle">Item 14</div>
                                            </li>
                                            <li class="dd-item" data-id="15">
                                                <div class="dd-handle">Item 15</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="16">
                                                        <div class="dd-handle">Item 16</div>
                                                    </li>
                                                    <li class="dd-item" data-id="17">
                                                        <div class="dd-handle">Item 17</div>
                                                    </li>
                                                    <li class="dd-item" data-id="18">
                                                        <div class="dd-handle">Item 18</div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                    <textarea id="nestable2-output"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Draggable Handles -->
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="draggable-handles" class="card card card-default scrollspy">
                                <div class="card-content">


                                    <h4 style="font-family: Arial, sans-serif"><b>{{$playlist->title}} <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow " data-badge-caption="total Channels">{{$total_channels}}</span> </b></h4>

                                        @if($getFixedChannelCounts>$total_channels)
                                        <div class="col-6 mb-5">
                                            <a onclick="$('#import_channel').modal({dismissible:false,opacity: .6,inDuration: 600});" class="modal-trigger waves-effect waves-light btn  btn-small   z-depth-5" id="callimportModel"  href="#import_channel" style="float: right;"> <i class="large material-icons">file_upload</i></a>
                                            <a class="modal-trigger mr-1  waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5 create-channel" href="#create_channel" onclick="show_add_channel_modal()" style="float: right;">
                                                <i class="material-icons">add</i>
                                            </a>
                                        </div>
                                    @endif

                                    <?php
                                    $getFixedChannelCounts=9999999999999999;$getMAxLimit=9999999999999;
                                    if($_SESSION['userLogined']->Paid=='active'){
                                        $getCardNo=$_SESSION['userLogined']->cardNo;
                                        $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                                        $getFixedChannelCounts=$getFullCard->channelPerPlayList;
                                    }
                                    else{
                                        $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
                                        $getMAxLimit=$getfixedChannelCount->Trailchannels;
                                    }
                                    ?>
                                    @if($getFixedChannelCounts<=$total_channels)
                                        <div class="alert alert-warning" role="alert">
                                            You have reached the maximum number of channels in this playlist. Please <a href="{{url('user/account')}}">Upgrade</a> to manage more channels per playlist.
                                        </div>
                                    @endif
                                    @if($getMAxLimit<=$total_channels)
                                        <div class="alert alert-warning" role="alert">
                                            You have reached the maximum number of channels in this playlist. Please <a href="{{url('user/account')}}">Upgrade</a> to manage more channels per playlist.
                                        </div>
                                    @endif
                                    <div class="row mt-5">
                                        <div class="col s12 m9">
                                    <select class=" select2 groups" >
                                        <option value="" @if(DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->count()>0) disabled @endif>Select Channel Group</option>
                                        @foreach (DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $key => $grp)
                                            <option value="{{$grp->id}}">{{$grp->title}}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    <div class="col s12 m3 right-align mt-1">
                                        <div class="btn-group" style="height: 100%;">
                                            <a type="button" class="dropdown-trigger  waves-effect waves-light btn  btn-small   z-depth-5" href='#' data-target='dropdown2'  >Group actions</a>
{{--                                            <div class="dropdown-menu">--}}
{{--                                                <a class="dropdown-item di" href="#" onclick="show_edit_modal()">Edit</a>--}}
{{--                                                <a class="dropdown-item di" href="#" onclick="show_delete_modal()">Delete</a>--}}
{{--                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_group">Create Group</a>--}}
{{--                                                <div class="dropdown-divider"></div>--}}
{{--                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#manage_group">Manage Group Order</a>--}}
{{--                                            </div>--}}
                                            <ul id='dropdown2' class='dropdown-content'>
                                                <li class="di"><a onclick="show_edit_modal()" href="#!">Edit</a></li>
                                                <li class="di"><a onclick="show_delete_modal()" href="#!">Delete</a></li>
                                                <li><a class="modal-trigger" onclick="$('#add_group').modal()" href="#add_group">Create Group</a></li>
                                                <li class="divider"></li>
                                                <li><a class="modal-trigger" onclick="$('#manage_groups').modal()" href="#manage_groups">Manage Group Order</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                    @if($total_channels==0)
                                        <p class="text-center text-danger">No channels </p>
                                    @endif
                                    <div class="center mt-5 mb-5 loadingGifForChannels" style="display: none">
                                        <img src="newTemp/app-assets/images/icon/Flowinggradient.gif" alt="">
                                    </div>
                                    {{--                                    <h4 class="card-title">Draggable Handles</h4>--}}
{{--                                    <p>This configuration allows you to add a handler at the left so you only allowed to move it from the handler--}}
{{--                                    </p>--}}
                                    <div class="dd" id="nestable3">
{{--                                        <textarea id="nestable3-output"></textarea>--}}
                                        <ol class="dd-list appendChannels">

{{--                                            <li class="dd-item dd3-item" data-id="14">--}}
{{--                                                <div class="dd-handle dd3-handle"></div>--}}
{{--                                                <div class="dd3-content">Item 14</div>--}}
{{--                                            </li>--}}

                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- START RIGHT SIDEBAR NAV -->

                    <!-- END RIGHT SIDEBAR NAV -->
                    <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i class="material-icons">add</i></a>
                        <ul>
                            <li><a href="css-helpers.html" class="btn-floating blue"><i class="material-icons">help_outline</i></a></li>
                            <li><a href="cards-extended.html" class="btn-floating green"><i class="material-icons">widgets</i></a></li>
                            <li><a href="app-calendar.html" class="btn-floating amber"><i class="material-icons">today</i></a></li>
                            <li><a href="app-email.html" class="btn-floating red"><i class="material-icons">mail_outline</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- Modals-->
    <div id="import_channel" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Import channels</h4>
            <form id="import" method="POST" enctype="multipart/form-data">
                <input type="text" name="_token" hidden value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-1">
                            <select name="import_type" id="import_type" class="form-control">
                                <option value="1">Import from M3U URL</option>
                                <option value="2">Import from file upload</option>
                            </select>
                        </div>

                        <div class="form-group text-left mb-5 mt-5" id="import_from_url">
                            <label for="url">M3U URL</label>
                            <input type="url" class="form-control" id="url" name="url" placeholder="http://">
                        </div>
                                @php
                                    if($_SESSION['userLogined']->Paid=='inactive'){
                                       $getDailySyncValue=DB::table('admin')->first();
                                       $getDailySyncVal=$getDailySyncValue->dailysync;
                                   }
                                   else{
                                       $getCardNo=$_SESSION['userLogined']->cardNo;
                                       $getFullCard=DB::table('subscription')->where('id',$getCardNo)->first();
                                       $getDailySyncVal=$getFullCard->Dailysyncforupdates;

                                   }@endphp
                                @if($getDailySyncVal=='Yes')
{{--                                    <div class="form-group text-left" id="urlSyncDiv">--}}
{{--                                        <input type="checkbox" class="mr-1"  onclick="if($(this).is(':checked'))$(this).val(1); else $(this).val(0);" id="urlSync" name="urlSync"><label--}}
{{--                                            for="urlSync"> Enable Sync For Updates</label>--}}
{{--                                    </div>--}}
                            <label  id="urlSyncDiv" >
                                <input type="checkbox" onclick="if($(this).is(':checked'))$(this).val(1); else $(this).val(0);" id="urlSync" name="urlSync" />
                                <span> Enable Sync For Updates</span>
                            </label>
                                    <div class="form-group text-left mt-5" id="freDiv" name="freDiv">
                                        <label for="fre">Sync frequency</label>
                                        @if($_SESSION['userLogined']->Paid=='active')
                                            <select name="fre" id="fre" class="form-control">
                                                <option value="1">Every hour</option>
                                                <option value="2">Every 2 hours</option>
                                                <!-- <option value="6">Every 6 hours</option>
                                                <option value="8">Every 8 hours</option> -->
                                                <option value="12">Every 12 hours</option>
                                                <option selected value="24">Every 24 hours</option>
                                                <!-- <option value="48">Every 48 hours</option> -->
                                            </select>
                                        @else
                                            <select name="fre" id="fre" class="form-control">
                                                <option disabled value="1">Every hour(Pro Plus)</option>
                                                <option disabled value="2">Every 2 hours(Pro Plus)</option>
                                                <!-- <option disabled value="6">Every 6 hours(Pro Plus)</option>
                                                <option disabled value="8">Every 8 hours(Pro Plus)</option> -->
                                                <option value="12">Every 12 hours</option>
                                                <option selected value="24">Every 24 hours</option>
                                                <!-- <option value="48">Every 48 hours</option> -->
                                            </select>
                                        @endif
                                    </div>
                                @endif



                        <input type="text" id="playId" name="playId" hidden value="{{$playlist->id}}">

                        <div class="form-group mt-5" id="upload_m3u" style="display: none;">
                            <div class="card-alert card pink lighten-5">
                                <div class="card-content pink-text darken-1">
                                    <span class="card-title pink-text darken-1">Upload m3u File</span>
                                    <div class="file-field input-field">
{{--                                        <div class="btn">--}}
{{--                                            <span>File</span>--}}
{{--                                            <input type="file" id="validatedCustomFile" name="file">--}}
{{--                                        </div>--}}
{{--                                        <div class="file-path-wrapper">--}}
{{--                                            <input class="file-path"  type="text" >--}}
{{--                                        </div>--}}
                                        <div class="custom-file">
                                            <input type="file" name="file"   id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        </div>
                                    </div>                                </div>

                            </div>

{{--                            <div class="custom-file">--}}
{{--                                <input type="file" name="file" class="custom-file-input" id="validatedCustomFile">--}}
{{--                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>--}}
{{--                            </div>--}}
                        </div>

                        <div  style="display: none; " id="loader" class="mb-1 center">
                            <img src="newTemp/app-assets/images/icon/Flowinggradient.gif"   class="mb-1 " alt="">
                        </div>
                    <div class="center">
                        <button type="submit" class="waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5  mt-5">Submit</button>
{{--                        <a href='#import_modal' id="openGroupModal" onclick="" hidden  class="hidden modal-trigger waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5  mt-5">Submit</a>--}}
                        <button type="button" onclick="$('#import_channel').modal('close')" class="waves-effect waves-light btn buttonCloseForDisable gradient-45deg-purple-deep-orange gradient-shadow  btn-small z-depth-5  mt-5">Close</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div id="import_modal" class="modal modal-fixed-footer">
        <div class="modal-content">

            <h4>Groups</h4>
            <p class="mb-1">
                <label>
                    <input type="checkbox" onclick="checkALLChannels()" id="checkALLChannels" />
                    <span>Select all</span>
                </label>
            </p>
            <div class="progress progress1">
                <div class="determinate" style="width: 0%"></div>
            </div>
            <div class="progress progress2" style="display: none;">
                <div class="indeterminate"></div>
            </div>
            <form id="import_groups"  method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="import_groups"></div>
                        <br><br>
                <div class="center vertical-align-bottom">
                        <button type="submit"  class="waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5  mt-5 vertical-align-bottom">Submit</button>
                        <button type="button" onclick="$('.modal').modal('close')"  class="waves-effect waves-light btn btn-small z-depth-5  mt-5 vertical-align-bottom">Close</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div id="create_channel" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Create Channel</h4>
            <form method="POST" action="{{route('channel.store')}}">
                @csrf
                <input type="hidden" name="group_id" id="gid">
                <div class="row">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="title">URL</label>
                            <input type="text" class="form-control title" name="url" required>
                        </div>
                        <div class="form-group">
                            <label for="title">TVG ID</label>
                            <input type="text" class="form-control title" name="tvg_id" required>
                        </div>
                        <div class="form-group">
                            <label for="title">TVG Name</label>
                            <input type="text" class="form-control title" name="tvg_name" required>
                        </div>
                        <div class="form-group">
                            <label for="title">TVG Channel Number</label>
                            <input type="text" class="form-control title" name="tvg_number" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Logo</label>
                            <input type="text" class="form-control title" name="logo" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Logo Small</label>
                            <input type="text" class="form-control title" name="logo_small" >
                        </div>
                        <div class="form-group">
                            <label for="title">Audio Track</label>
                            <input type="text" class="form-control title" name="audio_track" >
                        </div>
                        <input type="text" hidden name="pidForStoringManuallChannels" value="{{$playlist->id}}" id="pidForStoringManuallChannels">

                </div>
                <div class="mb-5 center mt-5">
                    <button type="submit" class="waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5   center mb-5">Submit</button>
                </div>
            </form>

        </div>

    </div>
    <div id="edit_channel" class="modal modal-fixed-footer">
        <div class="modal-content">

            <h4>Edit Channel</h4>
            <form method="POST" action="{{route('channel.update')}}">
                @csrf
                <input type="hidden" name="id" id="cid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control title" name="title" id="_title" required>
                        </div>
                        <div class="form-group">
                            <label for="title">URL</label>
                            <input type="text" class="form-control title" name="url" id="_url" required>
                        </div>
                        <div class="form-group">
                            <label for="title">TVG ID</label>
                            <input type="text" class="form-control title" name="tvg_id" id="_tvg_id" required>
                        </div>
                        <div class="form-group">
                            <label for="title">TVG Name</label>
                            <input type="text" class="form-control title" name="tvg_name" id="_tvg_name" required>
                        </div>
                        <div class="form-group">
                            <label for="title">TVG Channel Number</label>
                            <input type="text" class="form-control title" name="tvg_number" id="_tvg_number" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Logo</label>
                            <input type="text" class="form-control title" name="logo" id="_logo" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Logo Small</label>
                            <input type="text" class="form-control title" name="logo_small" id="_logo_small" >
                        </div>
                        <div class="form-group">
                            <label for="title">Audio Track</label>
                            <input type="text" class="form-control title" name="audio_track" id="_audio_track" >
                        </div>
                    </div>
                </div>
                <div class="mt-5 mb-5 center">
                    <button class="waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5   center mb-5">Update</button>
                </div>
            </form>
        </div>

    </div>
    <div id="edit_group" class="modal ">
        <div class="modal-content">

            <h4>Edit Group name</h4>
            <form method="POST" action="{{route('channel.group.update')}}">
                @csrf
                <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="hidden" id="g_id" name="g_id">
                            <input type="text" id="g_title" class="form-control" name="title" required>
                        </div>
                        <label>
                            <input type="checkbox"  name="hide_category" value="1" id="hide_category" />
                            <span>Hide in M3U output</span>
                        </label>

                    </div>
                </div>
                <div class="submit-section right mb-3">
                    <button class="btn btn-primary submit-btn">Update</button>
                </div>
            </form>

        </div>

    </div>
    <div id="add_group" class="modal">
        <div class="modal-content">

            <h4>Add Group </h4>
            <form method="POST" action="{{route('channel.group.store')}}">
                @csrf
                <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title" required>
                        </div>

                        <label>
                            <input type="checkbox"  name="hide_category" value="1" id="hide_category" />
                            <span>Hide in M3U output</span>
                        </label>
                    </div>
                </div>
                <div class="mt-5 center">
                    <button class="btn btn-primary submit-btn">Add</button>
                </div>
            </form>

        </div>

    </div>
    <div id="manage_groups" class="modal">
        <div class="modal-content">

            <h4>Manage Groups </h4>
            <div class="w-100 text-right mb-2">
                <button class="btn btn-success " onclick="window.location.reload()">save changes</button>
                <button class="btn btn-danger delete-group" style="display: none;">Delete</button>

                <button class="btn btn-secondary select-group" onclick="select_all_group()">Select All</button>
                <button class="btn btn-secondary unselect-group" style="display: none;" onclick="unselect_all_group()">Unselect All</button>
            </div>

                <div class="dd" id="nestable4">
                    <ol class="dd-list">
                @foreach (DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $grp)
{{--                    <li class="list-group-item lig" data-groupid="{{$grp->id}}" data-groupno="{{$grp->no}}">--}}
{{--                        <span class="float-left" style="width: 8%;"><i class="fa fa-bars"></i></span>--}}
{{--                        <span class="w-50 float-left">{{$grp->title}}</span>--}}
{{--                        <span class="w-25 float-right text-right">--}}
{{--                                                <input type="checkbox" class="custom-group-checkbox" value="{{$grp->id}}" style="width: 18px; height: 18px; border-radius: 0px !important;">--}}
{{--                                            </span>--}}
{{--                    </li>--}}


                    <li class="dd-item dd3-item lig" data-id="{{$grp->id}}"  item-id="" item-no="" >

                    <div class="dd-handle dd3-handle" style="height: 9vh;"></div>
                    <div class="dd3-content" style="width: 100%;height: 9vh">
                        <div class="row">
                            <div class="col mt-5 s12"> {{$grp->title}}</div>
                            <div class="right">
                            <label>
                                <input type="checkbox"  class="custom-group-checkbox gg m0 p-0 top" value="{{$grp->id}}"  />
                                <span></span>
                            </label>
                            </div>
                        </div>
             </div>

        </li>

                @endforeach
                </ol>
        </div>
{{--            <textarea name="" id="jutt" cols="30" rows="10"></textarea>--}}
        </div>

    </div>
    <div id="move_position" class="modal ">
        <div class="modal-content">

            <h4>Edit Channel</h4>
            <form method="POST" id="move_position_form">
                @csrf
                <div class="row">

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">format_list_numbered</i>
                            <input  type="number" class="validate"  id="curpos">
                            <label for="curpos">Enter Position</label>
                        </div>
                        <input type="text" id="id_of_channel"  >
{{--                        <input type="text" id="current_possiton" >--}}
                    </div>

            </div>

                <div class="row">
                    <div class="col-md-6 offset-3 text-center">
                        <small class="bg-white">Current Position: <span class="curr_pos"></span></small>
                    </div>
                    <div class="col-md-6 offset-3 text-center">
                        <small class="bg-white">Max Position: <span class="max_position"></span></small>
                    </div>
                </div>
                <div class="center mb-5 mt-5">
                    <button type="submit" class="waves-effect waves-light btn gradient-45deg-amber-amber  btn-small z-depth-5  ">Move</button>
                </div>
            </form>
        </div>

    </div>


    <!-- End models-->

    <footer class="page-footer footer footer-static footer-dark gradient-45deg-purple-deep-orange gradient-shadow navbar-border navbar-shadow">
        <div class="footer-copyright">
            <div class="container"><span>&copy; 2020 <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">PIXINVENT</a></span></div>
        </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="newTemp/app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="newTemp/app-assets/vendors/jquery.nestable/jquery.nestable.js"></script>
    <script src="newTemp/app-assets/vendors/sweetalert/sweetalert.min.js"></script>

    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="newTemp/app-assets/js/plugins.js"></script>
    <script src="newTemp/app-assets/js/search.js"></script>
    <script src="newTemp/app-assets/js/custom/custom-script.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="newTemp/app-assets/js/scripts/extra-components-nestable.js"></script>
    <script src="newTemp/app-assets/js/scripts/extra-components-sweetalert.js"></script>

    <!-- END PAGE LEVEL JS-->
    <script>
        //fetch_channels();
        function fetch_channels()
        {
            $.ajax({
                url: "{{route('channel.get')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    id: $('.groups').val(),
                    pid:'{{$playlist->id}}'
                },
                dataType: "JSON",
                beforeSend:function(){
                    $('.loadingGifForChannels').show();
                },
                success: function(response){
                    var channels = "";
                    var channel = "";
                    for(var i = 0; i < response.length; i++)
                    {
                        var logo = response[i].logo;
                        if(response[i].logo == null)
                        {
                            logo = "{{url('public/images/placeholder.png')}}";
                        }
                        channels += `
                        <li class="list-group-item px-3 li mb-2" id="li-${response[i].id}" item-id="${response[i].id}" item-no="${response[i].no}">
                            <input type="checkbox" class="custom-checkbox" name="channels[]" value="${response[i].id}">
                            <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <img src="${logo}" style="max-height: 70px;max-width: 70px;">
                                            </div>
                                            <div class="col-sm-3" >
                                                ${response[i].title}
                                            </div>
                                            <div class="col-sm-6" style="max-height: 50px; justify-content: center; align-items: center; overflow-wrap: break-word; word-wrap: break-word; word-break: normal; line-break: strict; hyphens: none;">
                                                ${response[i].url}
                                            </div>
                                            <div class="btn-group btn-group-sm mt-3 col-sm-2" role="group" style="max-height: 50px;  align-items: center;">
                               <button type="button"  class="btn btn-secondary " onclick="edit_channel(${response[i].id})"><i class="fa fa-pencil-alt"></i></button>
                               <button type="button"  class="btn btn-success move_position " data-id="${response[i].id}" data-no="${response[i].no}">#</button>
                              <button type="button"  class="btn btn-secondary "  onclick="delete_channel(${response[i].id})"><i class="fa fa-trash"></i></button></div>

                                        </div>
                            </div>
                        </li>
                        `;
                    // <label>
                    // <input type="checkbox"  class="custom-group-checkbox gg m0 p-0 top" value=""  />
                    //     <span></span>
                    //     </label>
                        channel+=`


                             <li class="dd-item dd3-item" data-id="${response[i].id}  item-id="${response[i].id}" item-no="${response[i].no}" >

                             <input type="checkbox" name="channels[]" value="${response[i].id}">

                                                <div class="dd-handle dd3-handle" style="height: 9vh;"></div>

                                                <div class="dd3-content" style="width: 70vw;height: 9vh">
                                                    <div class="row">
                                                    <div class="col m1 s12"> <img src="${logo}" style="max-height: 65px;max-width: 65px;"></div>
                                                    <div class="col m3 s12"> ${response[i].title}</div>
                                                    <div class="col m6 s12" style=" overflow-wrap: break-word;text-overflow: ellipsis;white-space: nowrap; overflow: hidden; max-width: 40ch;"> ${response[i].url}</div>
                                                    <div class="col m2 s12 right-align right">
                                <button type="button"  class="modal-trigger  waves-effect waves-light btn  btn-small pl-2 pr-2  mt-5 z-depth-5" onclick="edit_channel(${response[i].id})"><i class="small material-icons">create</i></button>
                               <button type="button"  class="modal-trigger  waves-effect waves-light btn  btn-small pl-2 pr-2 #4caf50 green  mt-5 z-depth-5 move_position " onclick="move_position('${response[i].id}','${response[i].no}','${response.length}')"  > <i class="small material-icons">sort</i> </button>
                              <button type="button"  class="  waves-effect waves-light btn  #e53935 red darken-1 btn-small pl-2 pr-2 pt-0 pb-0 mt-5 z-depth-5 "  onclick="delete_channel(${response[i].id})" ><i class="small material-icons">delete_forever</i></div>

                       </div>
                                                    </div>
                                                </div>
                                            </li>
                   `;
                    }
                    $('.appendChannels').html(channel);
                    var channels = "";
                    var channel = "";
                },
                //     <div class="col-2" style="max-height: 50px; display: flex; align-items: center;">
                // <button class="btn btn-sm btn-success text-white mr-1" onclick="edit_channel(${response[i].id})">
                // <i class="fa fa-pencil-alt"></i>
                // </button>
                // <button class="btn btn-sm btn-secondary text-white mr-1 move_position" data-id="${response[i].id}" data-no="${response[i].no}">
                //
                // </button>
                // <button class="btn btn-sm btn-danger" onclick="delete_channel(${response[i].id})">
                // <i class="fa fa-trash"></i>
                // </button>
                // </div>
                error: function(){
                    fetch_channels();
                },
                complete: function(){
                    $('.bulk-action').removeClass('show');
                    $('.bulk-action').hide();
                    $('.loadingGifForChannels').hide();
                }
            });
        }

        function show_add_channel_modal(){
            $('#create_channel').modal({
                dismissible:true,opacity: .6,inDuration: 600
            });
            var $group_id = $('.groups').val();
            $('#gid').val($group_id);

        }
        function show_modal(id)
        {
            $.ajax({
                url: "{{route('playlist.get')}}",
                method: "POST",
                data: {_token:"{{csrf_token()}}" , id:id},
                dataType: "JSON",
                success: function(response)
                {
                    $('#id').val(id);
                    $('.title').val(response.title);

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

                    $('#edit_playlist').modal('show');
                }
            });
        }

        function show_delete_modal(){
            var group_id = $('.groups').val();
           // $('#dg_id').val(group_id);
          delete_group(group_id);
        }

        function show_edit_modal(){
            var group_id = $('.groups').val();
            $.ajax({
                url: "{{route('channel.group.edit')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    group_id:group_id
                },
                dataType: "JSON",
                success: function(response){
                    $('#g_id').val(response.id);
                    $('#g_title').val(response.title);
                },
                complete: function() {
                    $('#edit_group').modal();
                    $('#edit_group').modal('open');
                }
            });
        }

        function edit_channel(id){
            $.ajax({
                url: "{{route('channel.get_single')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    id:id
                },
                dataType: "JSON",
                success: function(response){
                    $('#cid').val(id);
                    $('#_title').val(response.title);
                    $('#_url').val(response.url);
                    $('#_tvg_id').val(response.tvg_id);
                    $('#_tvg_name').val(response.tvg_name);
                    $('#_tvg_number').val(response.tvg_channel_number);
                    $('#_logo').val(response.logo);
                    $('#_logo_small').val(response.logo_small);
                    $('#_audio_track').val(response.autdio_track);
                },
                complete: function() {

                    $('#edit_channel').modal();
                    $('#edit_channel').modal('open');
                }
            });
        }
        function delete_channel(id){
          //  $('#_cid').val(id);
            //$('#delete_channel').modal('show');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this channel!",
                icon: 'warning',
               // dangerMode: true,
                buttons: {
                    cancel: true,
                    delete: 'Yes, Delete It'
                }
            }).then(function (willDelete) {
                if (willDelete) {

                    $.post(
                      "{{route('channel.delete')}}",
                        {id:id,_token:'{{csrf_token()}}'},
                        function(data,status){
                        if(status==='success'){
                            // swal("Poof! channel has been deleted!", {
                            //     icon: "success",
                            // });
                            fetch_channels();
                        }
                        else {
                            swal("Error in deleting channel", {
                                icon: "warning",
                            });
                        }
                        }
                    );
                }
                // } else {
                //     swal("Your imaginary file is safe", {
                //         title: 'Cancelled',
                //         icon: "error",
                //     });
                // }
            });
        }
        function delete_group(gid){
            //  $('#_cid').val(id);
            //$('#delete_channel').modal('show');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Group!",
                icon: 'warning',
                // dangerMode: true,
                buttons: {
                    cancel: true,
                    delete: 'Yes, Delete It'
                }
            }).then(function (willDelete) {
                if (willDelete) {

                    $.post(
                        "{{route('channel.group.delete')}}",
                        {g_id:gid,_token:'{{csrf_token()}}',playlist_id:'{{$playlist->id}}'},
                        function(data,status){
                            if(status==='success'){
                                // swal("Poof! channel has been deleted!", {
                                //     icon: "success",
                                // });
                               // fetch_channels();
                                window.location.reload();
                            }
                            else {
                                swal("Error in deleting channel", {
                                    icon: "warning",
                                });
                            }
                        }
                    );
                }
                // } else {
                //     swal("Your imaginary file is safe", {
                //         title: 'Cancelled',
                //         icon: "error",
                //     });
                // }
            });
        }
    </script>

    <script>
        // let temp=$("#channels");
        // $(window).width()<900?temp.sortable("enable"):"";
        // $(window).resize(function() {
        //     if ($(window).width() < 720) {
        //         $("#channels").sortable("disable");
        //     }
        //     else {
        //         $("#channels").sortable("enable");
        //     }
        // });

       function move_position(id,no,mno) {
           // var id = $(this).attr('data-id');
           //  var no = $(this).attr('data-no');
           // alert(id);
           // alert(no);
          //  var ind = $('#'+id).index() + 1;
            // $('#curpos').attr('data-in',ind);
            // $('#curpos').attr('data-id',id);
            // $('#curpos').attr('data-no',no);
           $('#id_of_channel').val(id);
          // $('#current_possiton').val(no);
            $('.curr_pos').text(no);
            $('.max_position').text(mno);
            $('#move_position').modal();
            $('#move_position').modal('open');
        };
        $(document).ready(function(){
            // $("#channels").sortable({
            //     update: function(e, u){
            //         var order = [];
            //         $(".li").each(function(index,element) {
            //             order.push({
            //                 id: $(this).attr('item-id'),
            //                 no: $(this).attr('item-no'),
            //                 pos: index+1
            //             });
            //         });
            //         $.alert('asd');
            //        ;
            //     }
            // }).disableSelection();

            $("#list-groups").sortable({
                update: function(e, u){
                    var order = [];
                    $(".lig").each(function(index,element) {
                        order.push({
                            id: $(this).attr('data-groupid'),
                            no: $(this).attr('data-groupno'),
                            pos: index+1
                        });
                    });
                    $.ajax({
                        url: "{{ route('channel.group.sort') }}",
                        type: 'post',
                        data: {
                            _token: "{{csrf_token()}}",
                            data:order
                        },
                        success: function (result) {
                            if(result == "success"){
                                toastr.success('Group position changed successfully');
                                //  window.location.reload();
                            }
                            else
                            {
                                toastr.error('Something went wrong');
                            }
                        },
                        complete: function () {

                        }
                    });
                }
            }).disableSelection();
        });

        function update_groups(){
            var pid = $('#_playlist').val();
            $.ajax({
                url: "{{ route('playlist.get.groups') }}",
                type: 'post',
                data: {
                    _token: "{{csrf_token()}}",
                    id:pid
                },
                dataType: "json",
                success: function (result) {
                    var groups = "";
                    for(var i=0; i<result.length; i++)
                    {
                        groups += `<option value="${result[i].id}">${result[i].title}</option>`;
                    }
                    $('#_group').html(groups);
                }
            });
        }

        function update_number(){
            var len = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
            $('.total-selected').text("("+len+")");
        }

        $(document).on('change','.custom-checkbox',function(){
            var len = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
            $('.total-selected').text("("+len+")");
            if($(this).is(':checked')){
                if(!$('.bulk-action').hasClass('show')){
                    $('.bulk-action').addClass('show');
                    $('.bulk-action').fadeIn();
                    return;
                }
            }
            if(len < 1)
            {
                $('.bulk-action').removeClass('show');
                $('.bulk-action').hide();
            }
        });

        function select_all(){
            $('#select-all').hide();
            $('#deselect-all').show();
            $('#channels .list-group-item :checkbox').prop('checked', true);
            $("#channels .list-group-item").find("input[type=checkbox]").attr('checked','true');
            update_number();
        }

        function select_all_group(){
            $('.select-group').hide();
            $('.unselect-group').show();
            $('.delete-group').show();
            $('.gg').prop('checked', true);
           // $(".lig span").find("input[type=checkbox]").attr('checked','true');
        }

        function unselect_all_group(){
            $('.select-group').show();
            $('.unselect-group').hide();
            $('.delete-group').hide();
            $('.gg').prop('checked', false);
           // $(".lig span").find("input[type=checkbox]").attr('checked','false');
        }

        function deselect_all(){
            $('#select-all').show();
            $('#deselect-all').hide();
            $('#channels .list-group-item :checkbox').prop('checked', false).removeAttr('checked');
            var len = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
            $('.bulk-action').removeClass('show');
            $('.bulk-action').hide();
            update_number();
        }

        $('.custom-group-checkbox').on('change',function(){
            var total = $(".custom-group-checkbox").length;
            var total_checked =$(".custom-group-checkbox:checked").length;
            if(total_checked > 0){
                $('.delete-group').show();
            }else{
                $('.delete-group').hide();
            }
            if(total == total_checked){
                $('.select-group').hide();
                $('.unselect-group').show();
            }
            else
            {
                $('.select-group').show();
                $('.unselect-group').hide();
            }
        });

        $(document).on('change','.custom-checkbox',function(){
            var total_channel = $("#channels .list-group-item").find(".custom-checkbox").length;
            var total_selected_channel = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
            if(total_channel == total_selected_channel){
                $('#select-all').hide();
                $('#deselect-all').show();
            }
            else
            {
                $('#select-all').show();
                $('#deselect-all').hide();
            }
        })


        $(document).ready(function(){
            validate();
            function validate(){
                var groups = $('.groups').val();
                if(groups.length == 0)
                {
                    $('.create-channel').attr('disabled','disabled');
                    $('.di').hide();
                }
                else
                {
                    $('.create-channel').removeAttr('disabled');
                    $('.di').show();
                    fetch_channels();
                }
            }

            $('.groups').on('change',function(){
                validate();
            })



            $('#move_position_form').on('submit',function(e){
                e.preventDefault();
               // var index = $('#curpos').attr('data-in');
                var new_pos = $('#curpos').val();
                var id = $('#id_of_channel').val();
                // var no = $('#curpos').attr('data-no');
                // var pos = $('#curpos').val();
                // var nid = $('.li').eq(pos-1).attr('item-id');
                // var nno = $('.li').eq(pos-1).attr('item-no');
                $.ajax({
                    url: "{{route('channel.move.position')}}",
                    method: "POST",
                    data: {
                        _token:"{{csrf_token()}}",
                        id:id,
                        new_pos:new_pos,
                       // pos:pos,
                        gid:$('.groups').val(),
                      //  nid:nid,
                       // nno:nno,
                    },
                    dataType: "JSON",
                    success: function(response)
                    {
                        if(response.status == "success"){
                            $('#move_position').modal();
                            $('#move_position').modal({
                                close:true
                            });
                        }


                    },
                    complete: function(){
                       // M.toast({html: 'completed', classes: 'rounded'});
                       // toastr.success('Channels Moved successfully');
                        $('#move_position').modal();
                        $('#move_position').modal({
                            close:true
                        });
                        fetch_channels();
                    },
                    error:function (response) {
                       //  M.toast({html: 'something wrong '+ response.status, classes: 'rounded'});
                    }
                });
            });

            $('.delete_selected').on('click',function(){
                var selected_channels = [];
                $(".custom-checkbox:checked").each(function(index,element) {
                    selected_channels.push({
                        id: $(this).val(),
                    });
                });
                $.ajax({
                    url: "{{route('channel.bulk.delete')}}",
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        ids: selected_channels
                    },
                    dataType: "JSON",
                    success: function(response){
                        if(response.status == "success"){
                            toastr.success('Channels deleted successfully');
                            window.location.reload();
                            //  fetch_channels();
                        }
                    }
                });
            });

            $('.delete-group').on('click',function(){
                var selected_groups = [];
                $(".custom-group-checkbox:checked").each(function(index,element) {
                    selected_groups.push({
                        id: $(this).val(),
                    });
                });
                $.ajax({
                    url: "{{route('group.bulk.delete')}}",
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        ids: selected_groups
                    },
                    success: function(response){
                        if(response == "success"){
                            //toastr.success('Group deleted successfully');
                            setTimeout(function(){
                                window.location.reload();
                            },1000);
                        }
                    }
                });
            });

            $('#move_copy').on('submit',function(e){
                e.preventDefault();
                var gid = $('#_group').val();
                var action = $('input[name=bulk_action]:checked').val();
                var selected_channels = [];
                $(".custom-checkbox:checked").each(function(index,element) {
                    selected_channels.push({
                        id: $(this).val(),
                    });
                });

                $.ajax({
                    url: "{{route('channel.bulk.move_copy')}}",
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        ids: selected_channels,
                        gid:gid,
                        action:action,
                        pid:$('#_playlist').val()
                    },
                    dataType: "JSON",
                    success: function(response){
                        if(response.status == "success"){
                            $('#move_copy_modal').modal('hide');
                            toastr.success('Channels updated successfully');
                            fetch_channels();
                        }
                    },
                    error:function(){
                        toastr.error('The Targeted Playlist has reached Max channels limit');
                        $('#move_copy_modal').modal('hide');
                        fetch_channels();
                    }
                });
            });

            $(document).on('submit','#search_form',function(event){
                event.preventDefault();
                var group_id = $('.groups').val();
                var playlist_id = "{{$playlist->id}}";
                var search = $('#search').val();
                $.ajax({
                    url: "{{route('channel.search')}}",
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        group_id:group_id,
                        playlist_id:playlist_id,
                        search:search
                    },
                    dataType: "JSON",
                    success: function(response){
                        var channels = "";
                        for(var i = 0; i < response.length; i++)
                        {
                            var logo = response[i].logo;
                            if(response[i].logo == null)
                            {
                                logo = "{{url('/public/images/placeholder.png')}}";
                            }
                            channels += `
                        <li class="list-group-item px-3 li mb-2" id="li-${response[i].id}" item-id="${response[i].id}" item-no="${response[i].no}">
                            <input type="checkbox" class="custom-checkbox" name="channels[]" value="${response[i].id}">
                            <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-1">
                                                <img src="${logo}" style="max-height: 50px;">
                                            </div>
                                            <div class="col-3" style="max-height: 50px; display: flex; justify-content: center; align-items: center;">
                                                ${response[i].title}
                                            </div>
                                            <div class="col-6" style="max-height: 50px; justify-content: center; align-items: center; overflow-wrap: break-word; word-wrap: break-word; word-break: normal; line-break: strict; hyphens: none;">
                                                ${response[i].url}
                                            </div>
                                            <div class="col-2" style="max-height: 50px; display: flex; align-items: center;">
                                                <button class="btn btn-sm btn-warning text-white mr-1" onclick="edit_channel(${response[i].id})">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-secondary text-white mr-1 move_position" data-id="${response[i].id}" data-no="${response[i].no}">
                                                    #
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="delete_channel(${response[i].id})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                            </div>
                        </li>
                        `;
                        }
                        $('#channels').html(channels);
                        var channels = "";
                    },
                    complete: function(){
                        $('#search-filter').show();
                        $('#search_modal').modal('hide');
                    }
                });
            });

            $(document).on('click','#search-filter-button',function(){
                $('#search-filter').hide();
                fetch_channels();
            });

        })

        $(document).on('change','#import_type',function(){
            if($(this).val() == 1) {
                $('#import_from_url').show();
                $('#upload_m3u').hide();
                $('#urlSyncDiv').show();
                $('#freDiv').show();
            }
            else if($(this).val() == 2)
            {
                $('#import_from_url').hide();
                $('#upload_m3u').show();
                $('#urlSyncDiv').hide();
                $('#freDiv').hide();
            }
        });

        $(document).on('submit','#import',function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: "{{route('channel.parse_m3u')}}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,

                dataType: "JSON",
                beforeSend: function(response) {
                    $('#loader').show();
                    $("input").prop("disabled", true);
                    $('select').prop("disabled", true);
                    $('.buttonCloseForDisable').prop("disabled", true);
                    //toastr.warning('Please wait . data is being encrypted');
                },
                success: function(response){
                    var _channels = "";
                    for(var i = 0; i < response.length; i++)
                    {
                    // <div class="text-left">
                    //     <input type="checkbox"  name="groups[]" value="${response[i].id}" id="group-${i+1}">
                    //     <label for="group-${i+1}">${response[i].group_title}</label>
                    //     </div>
                        _channels += `

                                        <p class="mb-1">
                                                <label>
                                                    <input type="checkbox" name="groups[]" value="${response[i].id}" id="group-${i+1}" />
                                                    <span>${response[i].group_title}</span>
                                                </label>
                                            </p>
                    `;
                    }
                    // $('#import_channel').modal({
                    //     close:true
                    // });

                    $('#openGroupModal').click();
                    $('#import_modal').modal({
                        dismissible:false,opacity: .6,inDuration: 600
                    });
                    $('#import_modal').modal('open');
                   // $('#import_modal').modal('show');
                   // $('#import_modal').modal('open');
                    $('.import_groups').html(_channels);

                },
                complete: function() {
                    $('#loader').hide();
                    $("input").prop("disabled", false);
                    $('select').prop("disabled", false);
                    $('.buttonCloseForDisable').prop("disabled", false);
                },
                error:function(){
                    toastr.error('URL not working');
                }
            });
        });
        function checkALLChannels() {
            $('#checkALLChannels').is(":checked")?
                $('input:checkbox[id*=group]').prop('checked','true'):
                $('input:checkbox[id*=group]').prop('checked',false);

        }
        $('#import_groups').on('submit',function(e){
            e.preventDefault();
            //$('#import_modal').modal('hide');
           // $('#exampleModalCenter').modal('show');
           // var i = 0;
          //  var elem = document.getElementById("myBar");
            $.ajax({
                url:'{{route("channels.store")}}',
                data:$('#import_groups').serialize(),
                method:'POST',
                beforeSend:function(){
                    $('.progress1').hide();
                    $('.progress2').show();
                    //$('body').on('click','false');
                    // if (i == 0) {
                    //     i = 1;
                    //     var width = 1;
                    //     var ide = setInterval(frame, 1);
                    //     function frame() {
                    //         if (width >= 30) {
                    //             clearInterval(ide);
                    //             i = 0;
                    //         } else {
                    //             width++;
                    //             elem.style.width = width + "%";
                    //         }
                    //     }
                    // }
                },
                success:function(response){
                    //toastr.success(''+response+'');
                   // M.toast({html: 'Importing successfull!', classes: 'rounded'});
                    setTimeout(() => {window.location.reload();  }, 2000);


                },
                complete:function(){
                    // $('.progress2').hide();
                    // $('.progress1').show();
                    // width = 30;
                    // ide = setInterval(frame, 1);
                    // function frame() {
                    //     if (width >= 100) {
                    //         clearInterval(ide);
                    //         i = 0;
                    //     } else {
                    //         width++;
                    //         elem.style.width = width + "%";
                    //     }
                    // }

                },
                error:function(){
                    $('.progress2').hide();
                    $('.progress1').show();
                    // $('#exampleModalCenter').modal('hide');
                    // $('body').removeClass('modal-open');
                    // $('.modal-backdrop').remove();
                   // $('#import_modal').modal('show');
                    M.toast({html: 'import error.Something went wrong!', classes: 'rounded'});
                  //  setTimeout(() => {  toastr.error("import error ! No group Selected");  }, 1000);

                }
            });
        })
    </script>
    @if(session()->get('indexP'))
        <script>$('#callimportModel').click();
            $('#import_channel').modal({dismissible:false,opacity: .6,inDuration: 600});
            $('#import_channel').modal('open');
        </script>

    @endif
</body>

</html>
@endif
