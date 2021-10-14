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
    <title>eCommerce Pricing | Materialize - Material Design Admin Template</title>
    <link rel="apple-touch-icon" href="newTemp/app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="newTemp/app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/style.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/pages/pricing.css">
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
            <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6 breadcrumbs-left">
                            <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>M3U Pricing</span></h5>
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Subscription</a>
                                </li>
{{--                                <li class="breadcrumb-item"><a href="#">eCommerce</a>--}}
{{--                                </li>--}}
                                <li class="breadcrumb-item active">subscribe
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
{{--                    <div class="col s12">--}}
{{--                        <ul class="tabs tab-demo z-depth-1">--}}
{{--                            <li class="tab col m6"><a  href="#test1">Monthly</a></li>--}}
{{--                            <li class="tab col m6"><a href="#test2">Yearly</a></li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
                    @if($_SESSION['userLogined']->Paid!='active')
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="basic-tabs" class="card card card-default ">
                                <div class="card-content">

                                    <div class="row">
                                        <div class="col s12">
                                            <p>Buy Subscription</p>

                                        </div>
                                        <div class="col s12">
                                            <div class="row">

                                                <div class="col s12">
                                                    <h4 class="header text-center">Monthly Pricing</h4>
                                                </div>
                                                <div id="monthlyPrice" class="plans-container">
{{--                                                    <div class="col s12 m6 l4">--}}
{{--                                                        <div class="card hoverable animate fadeLeft">--}}
{{--                                                            <div class="card-image gradient-45deg-light-blue-cyan waves-effect">--}}
{{--                                                                <div class="card-title">BASIC</div>--}}
{{--                                                                <div class="price">--}}
{{--                                                                    <sup>$</sup>19--}}
{{--                                                                    <sub>/<span>mo</span></sub>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="price-desc">Free 1 month</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-content">--}}
{{--                                                                <ul class="collection">--}}
{{--                                                                    <li class="collection-item">500 emails</li>--}}
{{--                                                                    <li class="collection-item">Unlimited data</li>--}}
{{--                                                                    <li class="collection-item">1 users</li>--}}
{{--                                                                    <li class="collection-item">First 15 day free</li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-action center-align">--}}
{{--                                                                <button class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Select--}}
{{--                                                                    Plan</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col s12 m6 l4">--}}
{{--            <div class="card z-depth-1 hoverable animate fadeUp">--}}
{{--                <div class="card-image gradient-45deg-red-pink waves-effect">--}}
{{--                    <div class="card-title">PROFESSIONAL</div>--}}
{{--                    <div class="price">--}}
{{--                        <sup>$</sup>29--}}
{{--                        <sub>/<span>mo</span></sub>--}}
{{--                    </div>--}}
{{--                    <div class="price-desc">Most Popular</div>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <ul class="collection">--}}
{{--                        <li class="collection-item">2000 emails</li>--}}
{{--                        <li class="collection-item">Unlimited data</li>--}}
{{--                        <li class="collection-item">10 users</li>--}}
{{--                        <li class="collection-item">First 30 day free</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="card-action center-align">--}}
{{--                    <button class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Select--}}
{{--                        Plan</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--                                                    <div class="col s12 m6 l4">--}}
{{--                                                        <div class="card hoverable animate fadeRight">--}}
{{--                                                            <div class="card-image gradient-45deg-amber-amber accent-2 waves-effect">--}}
{{--                                                                <div class="card-title">PREMIUM</div>--}}
{{--                                                                <div class="price">--}}
{{--                                                                    <sup>$</sup>49--}}
{{--                                                                    <sub>/<span>mo</span></sub>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="price-desc">Get 20% off</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-content">--}}
{{--                                                                <ul class="collection">--}}
{{--                                                                    <li class="collection-item">10,000 emails</li>--}}
{{--                                                                    <li class="collection-item">Unlimited data</li>--}}
{{--                                                                    <li class="collection-item">Unlimited users</li>--}}
{{--                                                                    <li class="collection-item">First 90 day free</li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-action center-align">--}}
{{--                                                                <button class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Select--}}
{{--                                                                    Plan</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                                <div class="col s12">
                                                    <h4 class="header text-center">Yearly Pricing</h4>
                                                </div>
                                                <div id="yearlyPrice" class="plans-container">
{{--                                                    <div class="col s12 m6 l4">--}}
{{--                                                        <div class="card hoverable animate fadeLeft">--}}
{{--                                                            <div class="card-image cyan waves-effect">--}}
{{--                                                                <div class="card-title">BASIC</div>--}}
{{--                                                                <div class="price">--}}
{{--                                                                    <sup>$</sup>19--}}
{{--                                                                    <sub>/<span>mo</span></sub>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="price-desc">Free 1 month</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-content">--}}
{{--                                                                <ul class="collection">--}}
{{--                                                                    <li class="collection-item">500 emails</li>--}}
{{--                                                                    <li class="collection-item">Unlimited data</li>--}}
{{--                                                                    <li class="collection-item">&nbsp;</li>--}}
{{--                                                                    <li class="collection-item">First 15 day free</li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-action center-align">--}}
{{--                                                                <button class="waves-effect waves-light  btn">Select Plan</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col s12 m6 l4">--}}
{{--                                                        <div class="card z-depth-1 hoverable animate fadeUp">--}}
{{--                                                            <div class="card-image red accent-2 waves-effect">--}}
{{--                                                                <div class="card-title">PROFESSIONAL</div>--}}
{{--                                                                <div class="price">--}}
{{--                                                                    <sup>$</sup>29--}}
{{--                                                                    <sub>/<span>mo</span></sub>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="price-desc">Most Popular</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-content">--}}
{{--                                                                <ul class="collection">--}}
{{--                                                                    <li class="collection-item">2000 emails</li>--}}
{{--                                                                    <li class="collection-item">Unlimited data</li>--}}
{{--                                                                    <li class="collection-item">10 users</li>--}}
{{--                                                                    <li class="collection-item">First 30 day free</li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-action center-align">--}}
{{--                                                                <button class="waves-effect waves-light  btn">Select Plan</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col s12 m6 l4">--}}
{{--                                                        <div class="card hoverable animate fadeRight">--}}
{{--                                                            <div class="card-image deep-orange accent-2 waves-effect">--}}
{{--                                                                <div class="card-title">PREMIUM</div>--}}
{{--                                                                <div class="price">--}}
{{--                                                                    <sup>$</sup>49--}}
{{--                                                                    <sub>/<span>mo</span></sub>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="price-desc">Get 20% off</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-content">--}}
{{--                                                                <ul class="collection">--}}
{{--                                                                    <li class="collection-item">10,000 emails</li>--}}
{{--                                                                    <li class="collection-item">Unlimited data</li>--}}
{{--                                                                    <li class="collection-item">Unlimited users</li>--}}
{{--                                                                    <li class="collection-item">First 90 day free</li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="card-action center-align">--}}
{{--                                                                <button class="waves-effect waves-light  btn">Select Plan</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                    @else

                        <div class="col s12">
                            <div class="container">
                                <!--Gradient Card-->
                                <div id="cards-extended">
                                    <div class="card">
                                        <div class="card-content">
                                            <p> <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow" data-badge-caption="{{$_SESSION['userLogined']->dateOfMembership}} --- {{$_SESSION['userLogined']->membershipEndsIn}}" ></span>

                                            </p>
                                            <p>
                                                All Subscription Plan price include applicable VAT
{{--                                                <a href="css-color.html" target="_blank"> css-color.html</a>.--}}
                                            </p>
                                            <div id="modal12" class="modal">
                                                <div class="modal-content">
                                                    <h4>Features</h4>
                                                    <p></p>
                                                </div>
{{--                                                <div class="modal-footer">--}}
{{--                                                    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>--}}
{{--                                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="row" id="gradient-Analytics">
                                                @php
                                                    $getCardsForShow=\Illuminate\Support\Facades\DB::table('subscription')->get();
                                                @endphp
                                                @foreach($getCardsForShow as $i)
                                                    @if($i->id<4)

                                                <div class="col s12 m6 l3 card-width ">
                                                    <div class="card row @if($i->id==$_SESSION['userLogined']->cardNo)  gradient-45deg-amber-amber @else gradient-45deg-light-blue-cyan @endif gradient-shadow white-text padding-4 mt-5">
                                                        <div class="col s7 m7  ">
                                                            <a onclick="setModalForFeatures({{$getCardsForShow}},{{$i->id}})" href="#modal12" class="mb-6 modal-trigger btn-floating waves-effect waves-light @if($i->id!=$_SESSION['userLogined']->cardNo) gradient-45deg-purple-deep-orange  @else pulse @endif">
                                                                <i class="material-icons">help_outline</i>
                                                            </a>
                                                            <p style="font-size: 20px">{{$i->cardName}} <span style="font-size: 12px">@if($i->id==$_SESSION['userLogined']->cardNo)(subscribed)@endif </span></p>

                                                        </div>
                                                        <div class="col s5 m5 right-align">
                                                            <h5 class="mb-0 white-text ">${{$i->rate}} / month</h5>
{{--                                                            <p class="no-margin">New</p>--}}
{{--                                                            <p>6,00,00</p>--}}

                                                            @if($i->id!=$_SESSION['userLogined']->cardNo)
                                                                <a href="user/checkPayment/{{$i->rate}}/monthly/{{$i->id}}" style="margin-top:14%;margin-bottom: 0;" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">Switch</a>
                                                            @else
                                                                <a href="user/checkPayment/{{$i->rate}}/monthly/{{$i->id}}" style="margin-top:14%;margin-bottom: 0;" class="waves-effect waves-light btn gradient-45deg-light-blue-cyan z-depth-4 mr-1 mb-2 ">Prolong</a>

                                                            @endif  </div>
                                                    </div>
                                                </div>
                                                    @else
                                                        <div class="col s12 m6 l3 card-width">
                                                            <div class="card row @if($i->id==$_SESSION['userLogined']->cardNo)  gradient-45deg-amber-amber @else gradient-45deg-light-blue-cyan @endif gradient-shadow white-text padding-4 mt-5">
                                                                <div class="col s7 m7 ">
                                                                    <a onclick="setModalForFeatures({{$getCardsForShow}},{{$i->id}})" class=" modal-trigger mb-6 btn-floating waves-effect waves-light  @if($i->id!=$_SESSION['userLogined']->cardNo) gradient-45deg-purple-deep-orange  @else pulse @endif" href="#modal12" >
                                                                        <i class="material-icons">help_outline</i>
                                                                    </a>

                                                                    <p style="font-size: 20px">{{$i->cardName}}  <span style="font-size: 12px">@if($i->id==$_SESSION['userLogined']->cardNo)(subscribed)@endif </span></p>
                                                                </div>
                                                                <div class="col s5 m5 right-align ">
                                                                    <h5 class="mb-0 white-text ">${{$i->rate}} / year</h5>
                                                                    <p class="no-margin"><u></u></p>
{{--                                                                    <p>6,00,00</p>--}}
                                                                    @if($i->id!=$_SESSION['userLogined']->cardNo)
                                                                        <div class="row">

                                                                    <a href="user/checkPayment/{{$i->rate}}/yearly/{{$i->id}}" style="margin-top:14%;margin-bottom: 0;" class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">Switch</a>
                                                                        </div>
                                                                    @else
                                                                        <a href="user/checkPayment/{{$i->rate}}/yearly/{{$i->id}}" style="margin-top:14%;margin-bottom: 0;" class="waves-effect waves-light btn gradient-45deg-light-blue-cyan z-depth-4 mr-1 mb-2 ">Prolong</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                              <div class="card-alert card green lighten-5">
                                                <div class="card-content green-text">
                                                    Manual action is required to prolong your subscription current end-date: @php  echo $_SESSION['userLogined']->membershipEndsIn; @endphp
                                                    . Please make one  or more Paypal payments to extend your subscription  by one  period per payment.</p>

                                                    <p > Switching to another plan will cancle your current subscription and will create a new subscription starting today.</p>
                                                </div>

                                            </div>
{{--                                                <div class="col s12 m6 l3 card-width">--}}
{{--                                                    <div class="card row gradient-45deg-blue-indigo gradient-shadow white-text padding-4 mt-5">--}}
{{--                                                        <div class="col s7 m7">--}}
{{--                                                            <i class="material-icons background-round mt-5 mb-5">perm_identity</i>--}}
{{--                                                            <p>Clients</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col s5 m5 right-align">--}}
{{--                                                            <h5 class="mb-0 white-text">1885</h5>--}}
{{--                                                            <p class="no-margin">New</p>--}}
{{--                                                            <p>1,12,900</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col s12 m6 l3 card-width">--}}
{{--                                                    <div class="card row gradient-45deg-purple-deep-orange gradient-shadow white-text padding-4 mt-5">--}}
{{--                                                        <div class="col s7 m7">--}}
{{--                                                            <i class="material-icons background-round mt-5 mb-5">timeline</i>--}}
{{--                                                            <p>Sales</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col s5 m5 right-align">--}}
{{--                                                            <h5 class="mb-0 white-text">80%</h5>--}}
{{--                                                            <p class="no-margin">Growth</p>--}}
{{--                                                            <p>3,42,230</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col s12 m6 l3 card-width">--}}
{{--                                                    <div class="card row gradient-45deg-purple-deep-purple gradient-shadow white-text padding-4 mt-5">--}}
{{--                                                        <div class="col s7 m7">--}}
{{--                                                            <i class="material-icons background-round mt-5 mb-5">attach_money</i>--}}
{{--                                                            <p>Profit</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col s5 m5 right-align">--}}
{{--                                                            <h5 class="mb-0 white-text">$890</h5>--}}
{{--                                                            <p class="no-margin">Today</p>--}}
{{--                                                            <p>$25,000</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                <!-- START RIGHT SIDEBAR NAV -->
                                <aside id="right-sidebar-nav">
                                    <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
                                        <div class="row">
                                            <div class="slide-out-right-title">
                                                <div class="col s12 border-bottom-1 pb-0 pt-1">
                                                    <div class="row">
                                                        <div class="col s2 pr-0 center">
                                                            <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                                                        </div>
                                                        <div class="col s10 pl-0">
                                                            <ul class="tabs">
                                                                <li class="tab col s4 p-0">
                                                                    <a href="#messages" class="active">
                                                                        <span>Messages</span>
                                                                    </a>
                                                                </li>
                                                                <li class="tab col s4 p-0">
                                                                    <a href="#settings">
                                                                        <span>Settings</span>
                                                                    </a>
                                                                </li>
                                                                <li class="tab col s4 p-0">
                                                                    <a href="#activity">
                                                                        <span>Activity</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slide-out-right-body row pl-3">
                                                <div id="messages" class="col s12 pb-0">
                                                    <div class="collection border-none mb-0">
                                                        <input class="header-search-input mt-4 mb-2" type="text" name="Search" placeholder="Search Messages" />
                                                        <ul class="collection right-sidebar-chat p-0 mb-0">
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Elizabeth Elliott</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">5.00 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Mary Adams</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">4.14 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-2.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Caleb Richards</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">4.14 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-3.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Caleb Richards</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Keny !</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">9.00 PM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-4.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">June Lane</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Ohh God</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">4.14 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-5.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Edward Fletcher</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Love you</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">5.15 PM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-6.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Crystal Bates</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can we</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">8.00 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Nathan Watts</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Great!</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">9.53 PM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-8.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Willard Wood</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Do it</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">4.20 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Ronnie Ellis</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Got that</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">5.20 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-9.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Daniel Russell</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">12.00 AM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-10.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Sarah Graves</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Okay you</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">11.14 PM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="../../../app-assets/images/avatar/avatar-11.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Andrew Hoffman</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can do</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">7.30 PM</span>
                                                            </li>
                                                            <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-12.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                                <div class="user-content">
                                                                    <h6 class="line-height-0">Camila Lynch</h6>
                                                                    <p class="medium-small blue-grey-text text-lighten-3 pt-3">Leave it</p>
                                                                </div>
                                                                <span class="secondary-content medium-small">2.00 PM</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div id="settings" class="col s12">
                                                    <p class="setting-header mt-8 mb-3 ml-5 font-weight-900">GENERAL SETTINGS</p>
                                                    <ul class="collection border-none">
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Notifications</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input checked type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Show recent activity</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Show recent activity</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Show Task statistics</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Show your emails</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Email Notifications</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input checked type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p class="setting-header mt-7 mb-3 ml-5 font-weight-900">SYSTEM SETTINGS</p>
                                                    <ul class="collection border-none">
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>System Logs</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Error Reporting</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Applications Logs</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input checked type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Backup Servers</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="collection-item border-none">
                                                            <div class="m-0">
                                                                <span>Audit Logs</span>
                                                                <div class="switch right">
                                                                    <label>
                                                                        <input type="checkbox" />
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div id="activity" class="col s12">
                                                    <div class="activity">
                                                        <p class="mt-5 mb-0 ml-5 font-weight-900">SYSTEM LOGS</p>
                                                        <ul class="widget-timeline mb-0">
                                                            <li class="timeline-items timeline-icon-green active">
                                                                <div class="timeline-time">Today</div>
                                                                <h6 class="timeline-title">Homepage mockup design</h6>
                                                                <p class="timeline-text">Melissa liked your activity.</p>
                                                                <div class="timeline-content orange-text">Important</div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-cyan active">
                                                                <div class="timeline-time">10 min</div>
                                                                <h6 class="timeline-title">Melissa liked your activity Drinks.</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content green-text">Resolved</div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-red active">
                                                                <div class="timeline-time">30 mins</div>
                                                                <h6 class="timeline-title">12 new users registered</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content">
                                                                    <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Registration.doc
                                                                </div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-indigo active">
                                                                <div class="timeline-time">2 Hrs</div>
                                                                <h6 class="timeline-title">Tina is attending your activity</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content">
                                                                    <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Activity.doc
                                                                </div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-orange">
                                                                <div class="timeline-time">5 hrs</div>
                                                                <h6 class="timeline-title">Josh is now following you</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content red-text">Pending</div>
                                                            </li>
                                                        </ul>
                                                        <p class="mt-5 mb-0 ml-5 font-weight-900">APPLICATIONS LOGS</p>
                                                        <ul class="widget-timeline mb-0">
                                                            <li class="timeline-items timeline-icon-green active">
                                                                <div class="timeline-time">Just now</div>
                                                                <h6 class="timeline-title">New order received urgent</h6>
                                                                <p class="timeline-text">Melissa liked your activity.</p>
                                                                <div class="timeline-content orange-text">Important</div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-cyan active">
                                                                <div class="timeline-time">05 min</div>
                                                                <h6 class="timeline-title">System shutdown.</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content blue-text">Urgent</div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-red">
                                                                <div class="timeline-time">20 mins</div>
                                                                <h6 class="timeline-title">Database overloaded 89%</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content">
                                                                    <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Database-log.doc
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <p class="mt-5 mb-0 ml-5 font-weight-900">SERVER LOGS</p>
                                                        <ul class="widget-timeline mb-0">
                                                            <li class="timeline-items timeline-icon-green active">
                                                                <div class="timeline-time">10 min</div>
                                                                <h6 class="timeline-title">System error</h6>
                                                                <p class="timeline-text">Melissa liked your activity.</p>
                                                                <div class="timeline-content red-text">Error</div>
                                                            </li>
                                                            <li class="timeline-items timeline-icon-cyan">
                                                                <div class="timeline-time">1 min</div>
                                                                <h6 class="timeline-title">Production server down.</h6>
                                                                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                                <div class="timeline-content blue-text">Urgent</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide Out Chat -->
                                    <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
                                        <li class="center-align pt-2 pb-2 sidenav-close chat-head">
                                            <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
                                        </li>
                                        <li class="chat-body">
                                            <ul class="collection">
                                                <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                                    <div class="user-content speech-bubble">
                                                        <p class="medium-small">hello!</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">How can we help? We're here for you!</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                                    <div class="user-content speech-bubble">
                                                        <p class="medium-small">I am looking for the best admin template.?</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">Materialize admin is the responsive materializecss admin template.</p>
                                                    </div>
                                                </li>

                                                <li class="collection-item display-grid width-100 center-align">
                                                    <p>8:20 a.m.</p>
                                                </li>

                                                <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                                    <div class="user-content speech-bubble">
                                                        <p class="medium-small">Ohh! very nice</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">Thank you.</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                                    <div class="user-content speech-bubble">
                                                        <p class="medium-small">How can I purchase it?</p>
                                                    </div>
                                                </li>

                                                <li class="collection-item display-grid width-100 center-align">
                                                    <p>9:00 a.m.</p>
                                                </li>

                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">From ThemeForest.</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">Only $24</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                                    <div class="user-content speech-bubble">
                                                        <p class="medium-small">Ohh! Thank you.</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                                    <div class="user-content speech-bubble">
                                                        <p class="medium-small">I will purchase it for sure.</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">Great, Feel free to get in touch on</p>
                                                    </div>
                                                </li>
                                                <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                                    <div class="user-content speech-bubble-right">
                                                        <p class="medium-small">https://pixinvent.ticksy.com/</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="center-align chat-footer">
                                            <form class="col s12" onsubmit="slideOutChat()" action="javascript:void(0);">
                                                <div class="input-field">
                                                    <input id="icon_prefix" type="text" class="search" />
                                                    <label for="icon_prefix">Type here..</label>
                                                    <a onclick="slideOutChat()"><i class="material-icons prefix">send</i></a>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </aside>
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


                                    @endif
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!-- START RIGHT SIDEBAR NAV -->--}}
                    <aside id="right-sidebar-nav">
                        <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
                            <div class="row">
                                <div class="slide-out-right-title">
                                    <div class="col s12 border-bottom-1 pb-0 pt-1">
                                        <div class="row">
                                            <div class="col s2 pr-0 center">
                                                <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                                            </div>
                                            <div class="col s10 pl-0">
                                                <ul class="tabs">
                                                    <li class="tab col s4 p-0">
                                                        <a href="#messages" class="active">
                                                            <span>Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab col s4 p-0">
                                                        <a href="#settings">
                                                            <span>Settings</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab col s4 p-0">
                                                        <a href="#activity">
                                                            <span>Activity</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-out-right-body row pl-3">
                                    <div id="messages" class="col s12 pb-0">
                                        <div class="collection border-none mb-0">
                                            <input class="header-search-input mt-4 mb-2" type="text" name="Search" placeholder="Search Messages" />
                                            <ul class="collection right-sidebar-chat p-0 mb-0">
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Elizabeth Elliott</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">5.00 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-1.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Mary Adams</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.14 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-2.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Caleb Richards</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.14 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-3.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Caleb Richards</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Keny !</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">9.00 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-4.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">June Lane</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Ohh God</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.14 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-5.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Edward Fletcher</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Love you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">5.15 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-6.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Crystal Bates</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can we</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">8.00 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Nathan Watts</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Great!</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">9.53 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-8.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Willard Wood</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Do it</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">4.20 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-1.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Ronnie Ellis</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Got that</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">5.20 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-9.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Daniel Russell</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">12.00 AM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-10.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Sarah Graves</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Okay you</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">11.14 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-off avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-11.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Andrew Hoffman</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can do</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">7.30 PM</span>
                                                </li>
                                                <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                                    <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-12.png" alt="avatar" />
                                                        <i></i>
                                                    </span>
                                                    <div class="user-content">
                                                        <h6 class="line-height-0">Camila Lynch</h6>
                                                        <p class="medium-small blue-grey-text text-lighten-3 pt-3">Leave it</p>
                                                    </div>
                                                    <span class="secondary-content medium-small">2.00 PM</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="settings" class="col s12">
                                        <p class="setting-header mt-8 mb-3 ml-5 font-weight-900">GENERAL SETTINGS</p>
                                        <ul class="collection border-none">
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Notifications</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input checked type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show recent activity</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show recent activity</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show Task statistics</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Show your emails</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Email Notifications</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input checked type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <p class="setting-header mt-7 mb-3 ml-5 font-weight-900">SYSTEM SETTINGS</p>
                                        <ul class="collection border-none">
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>System Logs</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Error Reporting</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Applications Logs</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input checked type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Backup Servers</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="collection-item border-none">
                                                <div class="m-0">
                                                    <span>Audit Logs</span>
                                                    <div class="switch right">
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="activity" class="col s12">
                                        <div class="activity">
                                            <p class="mt-5 mb-0 ml-5 font-weight-900">SYSTEM LOGS</p>
                                            <ul class="widget-timeline mb-0">
                                                <li class="timeline-items timeline-icon-green active">
                                                    <div class="timeline-time">Today</div>
                                                    <h6 class="timeline-title">Homepage mockup design</h6>
                                                    <p class="timeline-text">Melissa liked your activity.</p>
                                                    <div class="timeline-content orange-text">Important</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-cyan active">
                                                    <div class="timeline-time">10 min</div>
                                                    <h6 class="timeline-title">Melissa liked your activity Drinks.</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content green-text">Resolved</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-red active">
                                                    <div class="timeline-time">30 mins</div>
                                                    <h6 class="timeline-title">12 new users registered</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content">
                                                        <img src="newTemp/app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Registration.doc
                                                    </div>
                                                </li>
                                                <li class="timeline-items timeline-icon-indigo active">
                                                    <div class="timeline-time">2 Hrs</div>
                                                    <h6 class="timeline-title">Tina is attending your activity</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content">
                                                        <img src="newTemp/app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Activity.doc
                                                    </div>
                                                </li>
                                                <li class="timeline-items timeline-icon-orange">
                                                    <div class="timeline-time">5 hrs</div>
                                                    <h6 class="timeline-title">Josh is now following you</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content red-text">Pending</div>
                                                </li>
                                            </ul>
                                            <p class="mt-5 mb-0 ml-5 font-weight-900">APPLICATIONS LOGS</p>
                                            <ul class="widget-timeline mb-0">
                                                <li class="timeline-items timeline-icon-green active">
                                                    <div class="timeline-time">Just now</div>
                                                    <h6 class="timeline-title">New order received urgent</h6>
                                                    <p class="timeline-text">Melissa liked your activity.</p>
                                                    <div class="timeline-content orange-text">Important</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-cyan active">
                                                    <div class="timeline-time">05 min</div>
                                                    <h6 class="timeline-title">System shutdown.</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content blue-text">Urgent</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-red">
                                                    <div class="timeline-time">20 mins</div>
                                                    <h6 class="timeline-title">Database overloaded 89%</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content">
                                                        <img src="newTemp/app-assets/images/icon/pdf.png" alt="document" height="30" width="25" class="mr-1">Database-log.doc
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="mt-5 mb-0 ml-5 font-weight-900">SERVER LOGS</p>
                                            <ul class="widget-timeline mb-0">
                                                <li class="timeline-items timeline-icon-green active">
                                                    <div class="timeline-time">10 min</div>
                                                    <h6 class="timeline-title">System error</h6>
                                                    <p class="timeline-text">Melissa liked your activity.</p>
                                                    <div class="timeline-content red-text">Error</div>
                                                </li>
                                                <li class="timeline-items timeline-icon-cyan">
                                                    <div class="timeline-time">1 min</div>
                                                    <h6 class="timeline-title">Production server down.</h6>
                                                    <p class="timeline-text">Here are some news feed interactions concepts.</p>
                                                    <div class="timeline-content blue-text">Urgent</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide Out Chat -->
                        <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
                            <li class="center-align pt-2 pb-2 sidenav-close chat-head">
                                <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
                            </li>
                            <li class="chat-body">
                                <ul class="collection">
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">hello!</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">How can we help? We're here for you!</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">I am looking for the best admin template.?</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Materialize admin is the responsive materializecss admin template.</p>
                                        </div>
                                    </li>

                                    <li class="collection-item display-grid width-100 center-align">
                                        <p>8:20 a.m.</p>
                                    </li>

                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">Ohh! very nice</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Thank you.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">How can I purchase it?</p>
                                        </div>
                                    </li>

                                    <li class="collection-item display-grid width-100 center-align">
                                        <p>9:00 a.m.</p>
                                    </li>

                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">From ThemeForest.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Only $24</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">Ohh! Thank you.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                        <span class="avatar-status avatar-online avatar-50"><img src="newTemp/app-assets/images/avatar/avatar-7.png" alt="avatar" />
                                        </span>
                                        <div class="user-content speech-bubble">
                                            <p class="medium-small">I will purchase it for sure.</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">Great, Feel free to get in touch on</p>
                                        </div>
                                    </li>
                                    <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                                        <div class="user-content speech-bubble-right">
                                            <p class="medium-small">https://pixinvent.ticksy.com/</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="center-align chat-footer">
                                <form class="col s12" onsubmit="slideOutChat()" action="javascript:void(0);">
                                    <div class="input-field">
                                        <input id="icon_prefix" type="text" class="search" />
                                        <label for="icon_prefix">Type here..</label>
                                        <a onclick="slideOutChat()"><i class="material-icons prefix">send</i></a>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </aside>
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
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->

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
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="newTemp/app-assets/js/plugins.js"></script>
    <script src="newTemp/app-assets/js/search.js"></script>
    <script src="newTemp/app-assets/js/custom/custom-script.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <script>
        callCards(0,3,'month');
        callCards(3,6,'year');
        function callCards(no,nu,type){
            $.ajax({
                url:'{{url("getCards")}}',
                method:'GET',
                success:function(response){

                    $('#appendCards').empty();
                    for(var i=no;i<nu;i++){
                        var j=i+3;
                        var customStyle=
                            '    font-size: 1.5rem;\n' +
                            '    font-weight: bold;\n' +
                            '    font-style: normal;\n' +
                            '    font-variant: normal;\n' +
                            '    line-height: 1.6em;\n' +
                            '\n' +
                            '    margin-right: 10px;\n' +
                            '\n' +

                            '    text-transform: none;\n' +
                            '\n' +
                            '    color: lightgreen;\n' +
                            '\n' +
                            '    speak: none;\n' +
                            '    -webkit-font-smoothing: antialiased';
                        var downloadurlcustom=response[i]['DownloadURLcustomization']==='No'?"<li class=\"collection-item\"><i style='"+customStyle+";color: red' class=\"small material-icons\">clear</i> Download URL customization</li>\n":
                            "<li class=\"collection-item\"> <i style='"+customStyle+"' class=\"small material-icons\">check</i> Download URL customization</li>\n";
                         var playlistProtection=response[i]['Playlistprotection']==='No'?"<li class=\"collection-item\"><i style='"+customStyle+";color: red' class=\"small material-icons\">clear</i> Playlist protection</li>\n":
                            "<li class=\"collection-item\"> <i style='"+customStyle+"' class=\"small material-icons\">check</i> Playlist protection</li>\n";
                        var dailySync=response[i]['Dailysyncforupdates']==='No'?"<li class=\"collection-item\"><i style='"+customStyle+";color: red' class=\"small material-icons\">clear</i> Daily sync for updates</li>\n":
                             "<li class=\"collection-item\"> <i style='"+customStyle+"' class=\"small material-icons\">check</i> Daily sync for updates</li>\n";
                        var colorClass='';
                        if(i===0||i===4){
                            colorClass='gradient-45deg-light-blue-cyan';
                        }
                        else if(i===1||i===5){
                            colorClass='gradient-45deg-red-pink';
                        }
                        else{
                            colorClass=' gradient-45deg-amber-amber';
                        }
                        var savingLine;
                        if(type==='month'){
                             savingLine="<div class=\"price-desc\">Or Pay $"+response[j]['rate']+" / year</div>\n" ;
                        }
                        else{
                             savingLine="<div class=\"price-desc\">saves $"+((response[i-3]['rate']*12)-response[i]['rate'])+" in Annual Subscription</div>\n" ;

                        }
                        var status=type==='month'?'monthly':'yearly';
                         var secureType=type==='month'?'m':'y';
                        var newcard="<div class=\"col s12 m6 l4\">\n" +
                            "            <div class=\"card z-depth-1 hoverable animate fadeUp\">\n" +
                            "                <div class=\"card-image "+colorClass+" waves-effect\">\n" +
                            "                    <div class=\"card-title\">"+response[i]['cardName']+"</div>\n" +
                            "                    <div class=\"price\">\n" +
                            "                        <sup>$</sup>"+response[i]['rate']+"\n" +
                            "                        <sub>/<span>"+status+"</span></sub>\n" +
                            "                    </div>\n" +
                            savingLine+
                            "                </div>\n" +
                            "                <div class=\"card-content\">\n" +
                            "                    <ul class=\"collection\">\n" +
                            "                        <li class=\"collection-item\"><i style='"+customStyle+"' class=\"small material-icons\">check</i> "+response[i]['maxPlayList']+" Playlists</li>\n" +
                            "                        <li class=\"collection-item\"><i style='"+customStyle+"' class=\"small material-icons\">check</i> "+response[i]['channelPerPlayList']+" Channels</li>\n" +
                            downloadurlcustom+playlistProtection+dailySync+
                            "                    </ul>\n" +
                            "                </div>\n" +
                            "                <div class=\"card-action center-align\">\n" +
                            "                    <a href=\"user/checkPayment/"+response[i]['rate']+"/"+secureType+"/"+response[i]['id']+"\" class=\"waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn\">Select\n" +
                            "                        Plan</a>\n" +
                            "                </div>\n" +
                            "            </div>\n" +
                            "        </div>";
                        if(type==='month')
                        $('#monthlyPrice').append(newcard);
                        else
                            $('#yearlyPrice').append(newcard);
                    }

                }
            });
        }
        {{--function callYearlyCards() {--}}
        {{--    $.ajax({--}}
        {{--        url:'{{url("getCards")}}',--}}
        {{--        method:'GET',--}}
        {{--        success:function(response){--}}
        {{--            $('#appendCards').empty();--}}
        {{--            for(var i=3;i<6;i++){--}}
        {{--                var card = "<div class=\"col-lg-4\">\n" +--}}
        {{--                    "                <div class=\"card mb-5 mb-lg-0\">\n" +--}}
        {{--                    "                    <div class=\"card-body\">\n" +--}}
        {{--                    "                        <h5 class=\"card-title  text-uppercase text-center badge badge-success text-white\">"+response[i]['cardName']+"</h5>\n" +--}}
        {{--                    "                        <h6 class=\"card-price \">$"+response[i]['rate']+"<span class=\"period\">/year</span></h6>\n" +--}}
        {{--                    "                        <p class=\"text-sm-left form-control-sm\">saves $"+((response[i-3]['rate']*12)-response[i]['rate'])+" in Annual Subscription</p>\n" +--}}
        {{--                    "                        <hr>\n" +--}}
        {{--                    "                        <ul class=\"fa-ul\">\n" +--}}
        {{--                    "                            <li>Max playlists: <b>"+response[i]['maxPlayList']+"</b></li>\n" +--}}
        {{--                    "                            <li>Channels per playlist: <b>"+response[i]['channelPerPlayList']+"</b></li>\n" +--}}
        {{--                    // "                            <li></i></span>EPG <b>"+response[i]['epg']+"</b></li>\n" +--}}
        {{--                    // "                            <li>Available EPG countries: <b>"+response[i]['epgCountries']+"</b></li>\n" +--}}
        {{--                    "                            <li>Download-URL customization: <b>"+response[i]['DownloadURLcustomization']+"</b></li>\n" +--}}
        {{--                    "                            <li></i></span>Playlist protection: <b>"+response[i]['Playlistprotection']+"</b></li>\n" +--}}
        {{--                    "                            <li></i></span>Daily sync for updates: <b>"+response[i]['Dailysyncforupdates']+"</b></li>\n" +--}}
        {{--                    "                            <br>\n" +--}}
        {{--                    "                            <br>\n" +--}}
        {{--                    "                            <br>\n" +--}}
        {{--                    "                        </ul>\n" +--}}
        {{--                    "                        <button type='button' onclick='getSubscription("+response[i]['rate']+",1,"+response[i]['id']+")'   id='getSubscription'  class=\"btn btn-block btn-primary text-uppercase\">Get Started</button>\n" +--}}
        {{--                    "                    </div>\n" +--}}
        {{--                    "                </div>\n" +--}}
        {{--                    "            </div>";--}}
        {{--                $('#appendCards').append(card);--}}
        {{--            }--}}

        {{--        }--}}
        {{--    });--}}
        {{--}--}}


        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.modal').modal();
        });
        function setModalForFeatures(data,id) {
            id=id-1;
            $('.modal-content').empty();
            var modalData="" +
                "<ul class=\"fa-ul\">\n" +
                "<li style='font-size: 25px'><b>"+data[id]['cardName']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Max playlists: <b>"+data[id]['maxPlayList']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Channels per playlist: <b>"+data[id]['channelPerPlayList']+"</b></li>\n" +
                // "                            <li><span class=\"fa-li\"></span>EPG <b>"+data[id]['epg']+"</b></li>\n" +
                // "                            <li><span class=\"fa-li\"></span>Available EPG countries: <b>"+data[id]['epgCountries']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Download-URL customization: <b>"+data[id]['DownloadURLcustomization']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Playlist protection: <b>"+data[id]['Playlistprotection']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Daily sync for updates: <b>"+data[id]['Dailysyncforupdates']+"</b></li>\n" +
                "                            <br>\n" +
                "                            <br>\n" +
                "                            <br>\n" +
                "                        </ul>\n" ;
            $('.modal-content').append(modalData);

        }

    </script>
</body>

</html>
