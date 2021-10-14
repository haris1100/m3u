@php
    if(isset($_GET['data'])){
    if(DB::table('subscription')->where(['id'=>$_GET['data']['t'],'rate'=>$_GET['data']['q']])->exists()) {
    $amount=$_GET['data']['q'];
    $cid=$_GET['data']['t'];
    $type=$_GET['data']['r'];
}
else {
    $amount=0;
    $cid=7;
    $type='null';
}}
else {
    $amount=0;
    $cid=7;
    $type='null';
}
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
    <title>Chat | Materialize - Material Design Admin Template</title>
    <link rel="apple-touch-icon" href="newTemp/app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="newTemp/app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/themes/vertical-menu-nav-dark-template/style.css">
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/pages/app-chat.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="newTemp/app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark preload-transitions 2-columns  app-page " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">

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
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <div class="chat-application">
                        <div class="chat-content-head">
                            <div class="header-details">
                                <h5 class="m-0 sidebar-title"><i class="material-icons app-header-icon text-top">attach_money</i> Payment </h5>
                            </div>
                            <div >

                                <h6 style="text-align: center;margin-top: 50px"><b><u>You are going to pay {{$amount}} $</u></b></h6>
                            </div>
                        </div>
                        <div id="smart-button-container">
                            <div style="text-align: center; margin: 10%">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                        <script src="https://www.paypal.com/sdk/js?client-id=Ac5fZRHF0rv6NuWl7W2ZW9vfLRwDS09lmHneT7OkPsn8dbZoBPtfMi34p6sfOY9q2Gaxq3-QLGXBXnoL&currency=USD" data-sdk-integration-source="button-factory"></script>
                        <script>
                            function initPayPalButton() {
                                paypal.Buttons({
                                    style: {
                                        shape: 'rect',
                                        color: 'gold',
                                        layout: 'vertical',
                                        label: 'paypal',


                                    },

                                    createOrder: function(data, actions) {
                                        return actions.order.create({
                                            purchase_units: [{"amount":{"currency_code":"USD","value":{{$amount}}}}]
                                        });
                                    },

                                    onApprove: function(data, actions) {
                                        return actions.order.capture().then(function(details) {
                                            //toastr.success('Transaction completed by ' + details.payer.name.given_name + '!');
                                            M.toast({html: 'payment Completed!', classes: 'rounded'});
                                            $.ajax({
                                                url:'{{url('user/setPaid')}}',
                                                data:{Paid:'active',SubscriptionType: '{{$type}}',Amount: '{{$amount}}',id: '{{$cid}}',_token:'{{csrf_token()}}'},
                                                method:'POST',
                                                success:function () {
                                                    window.location.replace('sub');

                                                }
                                            });
                                        });

                                    },

                                    onError: function(err) {
                                        console.log(err);
                                    }
                                }).render('#paypal-button-container');
                            }
                            initPayPalButton();

                        </script>


                        {{--                        <div class="app-chat">--}}
{{--                            <div class="content-area content-right">--}}
{{--                                <div class="app-wrapper">--}}
{{--                                    <!-- Sidebar menu for small screen -->--}}
{{--                                    <a href="#" data-target="chat-sidenav" class="sidenav-trigger hide-on-large-only">--}}
{{--                                        <i class="material-icons">menu</i>--}}
{{--                                    </a>--}}
{{--                                    <!--/ Sidebar menu for small screen -->--}}

{{--                                    <div class="card card card-default scrollspy border-radius-6 fixed-width">--}}
{{--                                        <div class="card-content chat-content p-0">--}}
{{--                                            <!-- Sidebar Area -->--}}
{{--                                            <div class="sidebar-left sidebar-fixed animate fadeUp animation-fast">--}}
{{--                                                <div class="sidebar animate fadeUp">--}}
{{--                                                    <div class="sidebar-content">--}}
{{--                                                        <div id="sidebar-list" class="sidebar-menu chat-sidebar list-group position-relative">--}}
{{--                                                            <div class="sidebar-list-padding app-sidebar sidenav" id="chat-sidenav">--}}
{{--                                                                <!-- Sidebar Header -->--}}
{{--                                                                <div class="sidebar-header">--}}
{{--                                                                    <div class="row valign-wrapper">--}}
{{--                                                                        <div class="col s2 media-image pr-0">--}}
{{--                                                                            <img src="newTemp/app-assets/images/user/12.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col s10">--}}
{{--                                                                            <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Lawrence Collins</p>--}}
{{--                                                                            <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <span class="option-icon">--}}
{{--                                                                        <i class="material-icons">more_vert</i>--}}
{{--                                                                    </span>--}}
{{--                                                                </div>--}}
{{--                                                                <!--/ Sidebar Header -->--}}

{{--                                                                <!-- Sidebar Search -->--}}
{{--                                                                <div class="sidebar-search animate fadeUp">--}}
{{--                                                                    <div class="search-area">--}}
{{--                                                                        <i class="material-icons search-icon">search</i>--}}
{{--                                                                        <input type="text" placeholder="Search Chat" class="app-filter" id="chat_filter">--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="add-user">--}}
{{--                                                                        <a href="#">--}}
{{--                                                                            <i class="material-icons mr-2 add-user-icon">person_add</i>--}}
{{--                                                                        </a>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <!--/ Sidebar Search -->--}}

{{--                                                                <!-- Sidebar Content List -->--}}
{{--                                                                <div class="sidebar-content sidebar-chat">--}}
{{--                                                                    <div class="chat-list">--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-1">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image online pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/2.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Gorge Fernandis</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="favorite">--}}
{{--                                                                                        <i class="material-icons amber-text">star</i>--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>2.38 pm</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <span class="badge badge pill red">4</span>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-2 active">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image online pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/7.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Alice Hawker</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>12.58 pm</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-3">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image away pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/10.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Pari Kalin</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>10.00 am</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <span class="badge badge pill red">6</span>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-4">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image offline pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/4.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Alin Kystal</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>7.44 am</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-5">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/8.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Amy berry</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="favorite">--}}
{{--                                                                                        <i class="material-icons amber-text">star</i>--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>5 hours</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <span class="badge badge pill red">1</span>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-5">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/1.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">John Doe</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>20 hours</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-5">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image away pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/9.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Kellin Blue</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>Yesterday</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <span class="badge badge pill red">3</span>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="chat-user animate fadeUp delay-5">--}}
{{--                                                                            <div class="user-section">--}}
{{--                                                                                <div class="row valign-wrapper">--}}
{{--                                                                                    <div class="col s2 media-image offline pr-0">--}}
{{--                                                                                        <img src="newTemp/app-assets/images/user/5.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col s10">--}}
{{--                                                                                        <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Albert Henry</p>--}}
{{--                                                                                        <p class="m-0 info-text">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="info-section">--}}
{{--                                                                                <div class="star-timing">--}}
{{--                                                                                    <div class="time">--}}
{{--                                                                                        <span>2 days ago</span>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="no-data-found">--}}
{{--                                                                        <h6 class="center">No Results Found</h6>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <!--/ Sidebar Content List -->--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--/ Sidebar Area -->--}}

{{--                                            <!-- Content Area -->--}}
{{--                                            <div class="chat-content-area animate fadeUp">--}}
{{--                                                <!-- Chat header -->--}}
{{--                                                <div class="chat-header">--}}
{{--                                                    <div class="row valign-wrapper">--}}
{{--                                                        <div class="col media-image online pr-0">--}}
{{--                                                            <img src="newTemp/app-assets/images/user/7.jpg" alt="" class="circle z-depth-2 responsive-img">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col">--}}
{{--                                                            <p class="m-0 blue-grey-text text-darken-4 font-weight-700">Alice Hawker</p>--}}
{{--                                                            <p class="m-0 chat-text truncate">Apple pie bonbon cheesecake tiramisu</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="option-icon">--}}
{{--                                                        <span class="favorite">--}}
{{--                                                            <i class="material-icons">star_outline</i>--}}
{{--                                                        </span>--}}
{{--                                                        <i class="material-icons">delete</i>--}}
{{--                                                        <i class="material-icons">more_vert</i>--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                                <!--/ Chat header -->--}}

{{--                                                <!-- Chat content area -->--}}
{{--                                                <div class="chat-area">--}}
{{--                                                    <div class="chats">--}}
{{--                                                        <div class="chats">--}}
{{--                                                            <div class="chat chat-right">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/12.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>How can we help? We're here for you!</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/7.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Hey John, I am looking for the best admin template. Could you please help me to find it--}}
{{--                                                                            out?</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>It should be material css compatible.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat chat-right">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/12.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Absolutely!</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Materialize admin is the responsive material admin template.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/7.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Looks clean and fresh UI.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>It's perfect for my next project.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>How can I purchase it?</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat chat-right">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/12.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Thanks, from ThemeForest.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/7.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>I will purchase it for sure.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Thanks.</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat chat-right">--}}
{{--                                                                <div class="chat-avatar">--}}
{{--                                                                    <a class="avatar">--}}
{{--                                                                        <img src="newTemp/app-assets/images/user/12.jpg" class="circle" alt="avatar" />--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="chat-body">--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>Great, Feel free to get in touch on</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="chat-text">--}}
{{--                                                                        <p>https://pixinvent.ticksy.com/</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!--/ Chat content area -->--}}

{{--                                                <!-- Chat footer <-->--}}
{{--                                                <div class="chat-footer">--}}
{{--                                                    <form onsubmit="enter_chat();" action="javascript:void(0);" class="chat-input">--}}
{{--                                                        <i class="material-icons mr-2">face</i>--}}
{{--                                                        <i class="material-icons mr-2">attachment</i>--}}
{{--                                                        <input type="text" placeholder="Type message here.." class="message mb-0">--}}
{{--                                                        <a class="btn waves-effect waves-light send" onclick="enter_chat();">Send</a>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                                <!--/ Chat footer -->--}}
{{--                                            </div>--}}
{{--                                            <!--/ Content Area -->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div><!-- START RIGHT SIDEBAR NAV -->
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
    <script src="newTemp/app-assets/js/scripts/app-chat.js"></script>
    <!-- END PAGE LEVEL JS-->
</body>

</html>
