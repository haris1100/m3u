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
    <title>Collapsibles | Materialize - Material Design Admin Template</title>
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
                            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>EPG</span></h5>
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="index.html">M3U editor</a>
                                </li>
{{--                                <li class="breadcrumb-item"><a href="#">Advance UI</a>--}}
{{--                                </li>--}}
                                <li class="breadcrumb-item active">EPG
                                </li>
                            </ol>
                        </div>

                       <div class="col s12 m12 l12 right-align">
                           @if($getFixedPlaylistCounts>$getPlaylistCount &&  \App\Http\Controllers\m3u::checkIfValidTime()!=0)
                        <a href="#createEPGModal" onclick="$('#createEPGModal').modal() " class="modal-trigger waves-effect waves-light btn gradient-45deg-amber-amber  z-depth-5">Create EPG</a>
                               @endif
                        </div>
                    </div>
                </div>
                    @if($getFixedPlaylistCounts<=$getPlaylistCount)
                        <div class="card-alert card green lighten-5 mt-4">
                            <div class="card-content green-text">
                            Max playlist limit Reached . Get a better Subscription To add more playlists. <a href="{{url('user/account')}}" onclick="localStorage.setItem('account',3)">Click me to Buy Membership</a>
                            </div></div>
                    @elseif(\App\Http\Controllers\m3u::checkIfValidTime()==0)
                        <div class="alert alert-warning" role="alert">
                            Get a  Subscription To add playlists. <a href="{{url('user/account')}}">Click me to Buy Membership</a>
                        </div>
                    @endif
            </div>

            <div class="col s12 m12 l12 card-width ">
                @foreach (\App\epg::where('created_by','=',$_SESSION['userLogined']->id)->get() as $key => $row)
                    @if($getFixedPlaylistCounts>$key && \App\Http\Controllers\m3u::checkIfValidTime()!=0)
                <div class="card  row black-text #fff3e0 orange lighten-5   padding-1 z-depth-4 ml-3 mr-3" style="font-size: 12px">
                    <div class="row">

                        <div class="col s12 m6 l2"><p style="word-wrap: break-word">{{$row->title}}</p></div>
                        <div class="col s12 m6 l6 "><p id="unique_url_to_redirect{{$row->id}}" style="word-wrap: break-word">{{url('/')."/xml/".$row->uid}} <a onclick="copyMyUrl('{{$row->uid}}')" type="button" class="tooltipped" style="font-size: 13px;color:green"  data-position="bottom" data-tooltip="Copy url"><i class="small material-icons">content_copy</i></a></p> </div>
                        <div class="col s12 m6 l1 right-align">
                            @php
                            $flags=0;
                            if($row->countries!=''){
                            $flags=$row->countries;
                            $flags=explode(',',$flags);
                            $flags=count($flags)-1;
                            }
                            @endphp
                           @if($flags!=0)
                           <i class="small material-icons">flag</i>{{$flags}}
                           @endif
                        </div>
                        <div class="col s12 m6 l3 right-align">
{{--                            <a onclick="show_embed_modal('{{$row->id}}')"  class=" modal-trigger tooltipped waves-effect waves-light btn  btn-small pl-2 pr-2  mt-5 z-depth-5" href="#embedChannelsCodes" data-position="left" data-tooltip="Embed channel code"><i class="small material-icons">code</i></a>--}}
{{--                            @if($getFixedPlaylistCounts>$getPlaylistCount && \App\Http\Controllers\m3u::checkIfValidTime()!=0)--}}
{{--                            <a  href="{{route('playlist.clone',$row->id)}}" class=" waves-effect tooltipped waves-light btn #757575 grey darken-1 btn-small pl-2 pr-2 mt-5 z-depth-5" data-position="bottom" data-tooltip="make duplicate"><i class="small material-icons">content_copy</i></a>--}}
{{--                            @endif--}}
                            <a href="{{url('getXml/'.$row->uid)}}" class="waves-effect waves-light btn #f9a825 yellow darken-3 btn-small pl-2 pr-2 mt-5 z-depth-5 tooltipped" data-position="bottom" data-tooltip="download EPG"><i class="small material-icons">file_download</i></a>
{{--                            <a href="#editPlaylist" onclick="$('#editPlaylistForm').trigger('reset');$('#editPlaylist').modal();show_modal('{{$row->id}}')" class=" tooltipped modal-trigger waves-effect waves-light btn #4caf50 green btn-small pl-2 pr-2 mt-5 z-depth-5" data-position="bottom" data-tooltip="Edit Playlist"><i class="small material-icons">create</i></a>--}}
                            <a href="user/playlistSynchronization/{{$row->uid}}" onclick="" class=" tooltipped modal-trigger waves-effect waves-light btn #4caf50 green btn-small pl-2 pr-2 mt-5 z-depth-5" data-position="bottom" data-tooltip="Edit EPG"><i class="small material-icons">create</i></a>
                            <a href="#deleteEPGModals" onclick="$('#deleteEPGModals').modal();delete_EPG('{{$row->id}}');" class=" tooltipped modal-trigger waves-effect waves-light btn #e53935 red darken-1 btn-small pl-2 pr-2 mt-5 z-depth-5" data-position="left" data-tooltip="Delete EPG"><i class="small material-icons">delete_forever</i></a>
                        </div>

                    </div>
                </div>
                    @endif
                        @endforeach
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
    <div id="createEPGModal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Add EPG</h4>
            <form method="POST" action="{{route('epg.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control " name="title" required>
                        </div>
                        <div class="form-group" >
                            <label for="title">Use for Playlist(s)</label>
                            <select name="pid[]" id="group" hidden class="form-control" multiple>
                                @foreach (\App\Playlist::where('created_by','=',$_SESSION['userLogined']->id)->get() as $key => $row)
                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" >
                            <label for="title">Include Countries</label>
                            <select name="cid[]" id="group" hidden class="form-control" multiple>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="protection">Playlist protection</label>
                            <select name="protection" id="protection" class="form-control">
                                <option value="1">Allow downloads from any IP address</option>
                                <option value="2">Limit downloads by IP address</option>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="limit">Limit channel embedding</label>
                            <select name="embed_channel" id="limit" class="form-control">
                                <option value="1">Allow any domain to embed channel display</option>
                                <option value="2">Only allow specific domains</option>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <input type="checkbox" name="hide_stream_url" value="1" id="hide_stream_url">
                            <label for="hide_stream_url">Hide stream-URLs in M3U file behind redirect URLs</label>
                        </div>

                    </div>
                </div>
                <div class=" mb-5 " style="position: absolute;bottom: 20px;right: 20px;">
                    <button class="waves-effect waves-light btn gradient-45deg-amber-amber  z-depth-5 ">Submit</button>
                </div>
            </form>
        </div>
{{--        <div class="modal-footer">--}}
{{--            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>--}}
{{--        </div>--}}
    </div>

    <div id="EditEPGModal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Add EPG</h4>
            <form method="POST" action="{{route('epg.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control " name="title" required>
                        </div>
                        <div class="form-group" >
                            <label for="title">Use for Playlist(s)</label>
                            <select name="pid[]" id="group" hidden class="form-control" multiple>
                                @foreach (\App\Playlist::where('created_by','=',$_SESSION['userLogined']->id)->get() as $key => $row)
                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" >
                            <label for="title">Include Countries</label>
                            <select name="cid[]" id="group" hidden class="form-control" multiple>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="protection">Playlist protection</label>
                            <select name="protection" id="protection" class="form-control">
                                <option value="1">Allow downloads from any IP address</option>
                                <option value="2">Limit downloads by IP address</option>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="limit">Limit channel embedding</label>
                            <select name="embed_channel" id="limit" class="form-control">
                                <option value="1">Allow any domain to embed channel display</option>
                                <option value="2">Only allow specific domains</option>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <input type="checkbox" name="hide_stream_url" value="1" id="hide_stream_url">
                            <label for="hide_stream_url">Hide stream-URLs in M3U file behind redirect URLs</label>
                        </div>

                    </div>
                </div>
                <div class=" mb-5 " style="position: absolute;bottom: 20px;right: 20px;">
                    <button class="waves-effect waves-light btn gradient-45deg-amber-amber  z-depth-5 ">Submit</button>
                </div>
            </form>
        </div>
{{--        <div class="modal-footer">--}}
{{--            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>--}}
{{--        </div>--}}
    </div>


    <div id="embedChannelsCodes" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Embed channel display</h4>
            <div class="row mb-5">
                <div class="w-100" id="alert"></div>
            </div>
            <div class="row">
                <div class="w-100">
                    <style>
                        pre{
                            display: block;
                            padding: 10.5px;
                            margin: 0 0 11px;
                            font-size: 13px;
                            line-height: 1.6;
                            word-break: break-all;
                            word-wrap: break-word;
                            /* color: #333; */
                            background-color: #f5f5f5;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                        }
                    </style>
                    <pre id="code"></pre>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">close</a>
        </div>
    </div>

    <div id="deleteEPGModals" class="modal">
        <form action="{{route('epg.delete')}}" method="post">
            @csrf
        <div class="modal-content">
            <input type="text" hidden name="pid" id="epg_id">
            <h4>Delete Playlist</h4>
            <p>Are you sure to delete this playlist? </p>

        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-close waves-effect waves-green btn-flat">cancel</a>
            <button type="submit"  class="waves-effect waves-light btn  btn-small waves-effect waves-green btn-flat">Ok</button>
        </div>
        </form>
    </div>
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
        function show_embed_modal(id){
           // alert(id);
            $('#embedChannelsCodes').modal();
            $.ajax({
                url: "{{route('playlist.embed_link')}}",
                method: "POST",
                data: {_token:"{{csrf_token()}}" , id:id},
                dataType: "json",
                success: function(response)
                {
                    var alert = `
                                                <div class="card-alert card cyan">
                                                    <div class="card-content white-text">
                                                        <span class="card-title white-text darken-1"></span>
                                                        <p> Do you want to show others your playlist? Embed the channel display using the code below. This display does not contain sensitive data and only displays your channel groups and channel names with their logo and EPG data.</p>
                                                    </div>
                                                    <div class="card-action cyan darken-1">
                                                        <a href="${response.link}" class="waves-effect waves-light mb-2 btn white-text z-depth-4">Preview channel display</a>
                                                    </div>

                                                </div>

                `;
                    $('#alert').html(alert);
                    $('#code').html(response.html);
                },
                complete: function(){
                }
            });
        }
        function delete_EPG(pid) {
            $('#epg_id').val(pid);
        }

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
                    $('#edit_playlist').modal('show');
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
            var path=window.location.href.split('/epg');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(path[0]+'/xml/'+id).select();
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
