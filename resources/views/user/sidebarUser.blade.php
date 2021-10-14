
<!--<!DOCTYPE html>-->
<!--<html>-->

<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->

<!--    <title>Collapsible sidebar using Bootstrap 4</title>-->

<!--    &lt;!&ndash; Bootstrap CSS CDN &ndash;&gt;-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->
<!--    &lt;!&ndash; Our Custom CSS &ndash;&gt;-->
{{--<style>--}}
{{--    /*--}}
{{--DEMO STYLE--}}
{{--*/--}}

{{--    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";--}}
{{--    body {--}}
{{--        font-family: 'Poppins', sans-serif;--}}
{{--        background: #fafafa;--}}
{{--    }--}}

{{--    p {--}}
{{--        font-family: 'Poppins', sans-serif;--}}
{{--        font-size: 1.1em;--}}
{{--        font-weight: 300;--}}
{{--        line-height: 1.7em;--}}
{{--        color: #999;--}}
{{--    }--}}

{{--    a,--}}
{{--    a:hover,--}}
{{--    a:focus {--}}
{{--        color: inherit;--}}
{{--        text-decoration: none;--}}
{{--        transition: all 0.3s;--}}
{{--    }--}}

{{--    .navbar {--}}
{{--        padding: 15px 10px;--}}
{{--        background: #fff;--}}
{{--        border: none;--}}
{{--        border-radius: 0;--}}
{{--        margin-bottom: 40px;--}}
{{--        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);--}}
{{--    }--}}

{{--    .navbar-btn {--}}
{{--        box-shadow: none;--}}
{{--        outline: none !important;--}}
{{--        border: none;--}}
{{--    }--}}

{{--    .line {--}}
{{--        width: 100%;--}}
{{--        height: 1px;--}}
{{--        border-bottom: 1px dashed #ddd;--}}
{{--        margin: 40px 0;--}}
{{--    }--}}

{{--    /* -----------------------------------------------------}}
{{--        SIDEBAR STYLE--}}
{{--    ----------------------------------------------------- */--}}

{{--    .wrapper {--}}
{{--        display: flex;--}}
{{--        width: 100%;--}}
{{--        align-items: stretch;--}}
{{--    }--}}

{{--    #sidebar {--}}
{{--        min-width: 250px;--}}
{{--        max-width: 250px;--}}
{{--        background: #7386D5;--}}
{{--        color: #fff;--}}

{{--        transition: all 0.3s;--}}
{{--    }--}}

{{--    #sidebar.active {--}}
{{--        margin-left: -250px;--}}
{{--    }--}}

{{--    #sidebar .sidebar-header {--}}
{{--        padding: 20px;--}}
{{--        background: #6d7fcc;--}}
{{--    }--}}

{{--    #sidebar ul.components {--}}
{{--        padding: 20px 0;--}}
{{--        border-bottom: 1px solid #47748b;--}}
{{--    }--}}

{{--    #sidebar ul p {--}}
{{--        color: #fff;--}}
{{--        padding: 10px;--}}
{{--    }--}}

{{--    #sidebar ul li a {--}}
{{--        padding: 10px;--}}
{{--        font-size: 1.1em;--}}
{{--        display: block;--}}
{{--    }--}}

{{--    #sidebar ul li a:hover {--}}
{{--        color: #7386D5;--}}
{{--        background: #fff;--}}
{{--    }--}}

{{--    #sidebar ul li.active>a,--}}
{{--    a[aria-expanded="true"] {--}}
{{--        color: #fff;--}}
{{--        background: #6d7fcc;--}}
{{--    }--}}

{{--    a[data-toggle="collapse"] {--}}
{{--        position: relative;--}}
{{--    }--}}

{{--    .dropdown-toggle::after {--}}
{{--        display: block;--}}
{{--        position: absolute;--}}
{{--        top: 50%;--}}
{{--        right: 20px;--}}
{{--        transform: translateY(-50%);--}}
{{--    }--}}

{{--    ul ul a {--}}
{{--        font-size: 0.9em !important;--}}
{{--        padding-left: 30px !important;--}}
{{--        background: #6d7fcc;--}}
{{--    }--}}

{{--    ul.CTAs {--}}
{{--        padding: 20px;--}}
{{--    }--}}

{{--    ul.CTAs a {--}}
{{--        text-align: center;--}}
{{--        font-size: 0.9em !important;--}}
{{--        display: block;--}}
{{--        border-radius: 5px;--}}
{{--        margin-bottom: 5px;--}}
{{--    }--}}

{{--    a.download {--}}
{{--        background: #fff;--}}
{{--        color: #7386D5;--}}
{{--    }--}}

{{--    a.article,--}}
{{--    a.article:hover {--}}
{{--        background: #6d7fcc !important;--}}
{{--        color: #fff !important;--}}
{{--    }--}}

{{--    /* -----------------------------------------------------}}
{{--        CONTENT STYLE--}}
{{--    ----------------------------------------------------- */--}}

{{--    #content {--}}
{{--        width: 100%;--}}
{{--        padding: 20px;--}}
{{--        min-height: 100vh;--}}
{{--        transition: all 0.3s;--}}
{{--    }--}}

{{--    /* -----------------------------------------------------}}
{{--        MEDIAQUERIES--}}
{{--    ----------------------------------------------------- */--}}

{{--    @media (max-width: 768px) {--}}
{{--        #sidebar {--}}
{{--            margin-left: -250px;--}}
{{--        }--}}
{{--        #sidebar.active {--}}
{{--            margin-left: 0;--}}
{{--        }--}}
{{--        #sidebarCollapse span {--}}
{{--            display: none;--}}
{{--        }--}}
{{--    }--}}
{{--</style>--}}

<!-- Font Awesome JS -->
{{--<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>--}}
{{--<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>--}}
{{--</head>--}}

{{--<body>--}}
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class=" sidebar bg-dark ">
        @php
            use App\Http\Controllers\m3u;
              $getDiff=m3u::dateDiff();
            $getTrailDays=\Illuminate\Support\Facades\DB::table('admin')->first();
        @endphp

        <ul class="list-unstyled components mt-5 ">

                                <li><a  href="{{url('user/playlist')}}"><i class="fa fa-bars text-success"></i> <span>Playlists</span></a></li><br>
                                <!-- <li><a  href=""><i class="fas fa-tv text-warning"></i></i> <span>EPGs</span></a></li><br> -->
                                <li><a onclick="chat()" href="javascript:void(0)" id="goLive"><i class="far fa-envelope text-info" ></i> <span>Support</span></a></li> <br><br>


                            <li><h3 class="text-white text-center badge-dark" style="font-family: 'Lucida Console', Courier, monospace">@php echo $_SESSION['userLogined']->name;  @endphp</h3></li>

                            <li><h5 class="text-danger text-center "><u>
                                        @php
                                            if($_SESSION['userLogined']->Paid!='active')
                                            if($getTrailDays->trailDays-$getDiff>0){
                                                echo ($getTrailDays->trailDays-$getDiff) .' Days left in Free Trail';
                                                if($getTrailDays->trailDays-$getDiff<=3 && $getTrailDays->trailDays-$getDiff>0){
                                                    App\Http\Controllers\m3u::sendReminderForTrailExpiration($getTrailDays->trailDays-$getDiff);
                                                }
                                            }
                                               else echo "Free Trail Expired";

                                        @endphp
                                    </u></h5></li><br><br>
                                    <li class="submenu">
                                   <div class="text-white  ml-1 text-lg" id="setActive"><i class="fas fa-shopping-bag "></i>  <span> Subscription </span></div>
                                   <ul>
                                    <br>
                                             <li>
                                           <a class="bg-dark" href="{{url('user/account')}}" onclick="localStorage.setItem('account',3)"><i class="fas fa-shopping-cart text-warning"></i> subscribe</a></li>
                                           <li>
                                           <a class="bg-dark" href="{{url('user/account')}}" onclick="localStorage.setItem('account',4)"><i class="fas fa-credit-card text-info"></i> payment method</a></li>
                                           <li>
                                           <a class="bg-dark" href="{{url('user/account')}}" onclick="localStorage.setItem('account',5)"><i class="fas fa-receipt text-danger"></i> invoice</a></li>



                                   </ul>
                                    </li></ul>

    </nav>

    <!-- Page Content  -->

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script type="text/javascript">

    window.$crisp=[];window.CRISP_WEBSITE_ID="61f35e97-dfe2-4864-b966-b7f564efae80";
    function chat() {
        (function(){
        d=document
        ;s=d.createElement("script");
    s.src="https://client.crisp.chat/l.js";
    s.async=1;
    d.getElementsByTagName("head")[0].appendChild(s);
    })();
    }
</script>


{{--<!-- Sidebar -->--}}
{{--@if(isset($_SESSION['userLogined']))--}}

{{--<div class="sidebar mt-2 bg-dark" id="sidebar">--}}
{{--    <div class="sidebar-inner slimscroll">--}}

{{--        <div id="sidebar-menu" class="sidebar-menu">--}}


{{--            <ul>--}}

{{--                    <li><a  href="{{url('user/playlist')}}"><i class="fa fa-bars text-success"></i> <span>Playlists</span></a></li><br>--}}
{{--                    <!-- <li><a  href=""><i class="fas fa-tv text-warning"></i></i> <span>EPGs</span></a></li><br> -->--}}
{{--                    <li><a  href="" id="goLive"><i class="far fa-envelope text-info"></i> <span>Support</span></a></li> <br><br>--}}

{{--                <br><br>--}}
{{--                <li><h3 class="text-white text-center badge-dark" style="font-family: 'Lucida Console', Courier, monospace">@php echo $_SESSION['userLogined']->name;  @endphp</h3></li>--}}

{{--                <li><h5 class="text-danger text-center "><u>--}}
{{--                            @php--}}
{{--                                if($_SESSION['userLogined']->Paid!='active')--}}
{{--                                if($getTrailDays->trailDays-$getDiff>0)--}}
{{--                                    echo ($getTrailDays->trailDays-$getDiff) .' Days left in Free Trail';--}}
{{--                                   else echo "Free Trail Expired";--}}

{{--                            @endphp--}}
{{--                        </u></h5></li><br><br>--}}
{{--                        <li class="submenu">--}}
{{--                       <a href="#" id="setActive"><i class="fas fa-shopping-bag "></i>  <span> Subscribe </span></a>--}}
{{--                       <ul>--}}
{{--<br>--}}
{{--                                 <li>--}}
{{--                               <a class="" href="{{url('user/account')}}" onclick="localStorage.setItem('account',3)">subscribe</a></li>--}}
{{--                               li>--}}
{{--                               <a class="" href="{{url('user/account')}}" onclick="localStorage.setItem('account',4)">payment method</a></li>--}}
{{--                               li>--}}
{{--                               <a class="" href="{{url('user/account')}}" onclick="localStorage.setItem('account',5)">invoice</a></li>--}}


{{--                       </ul>--}}
{{--                   </li>--}}
{{--                <br>--}}
{{--                <!-- <li><a  href="" id="AccountSetting"><i class="fas fa-cog"></i> <span>Account Setting</span></a></li> <br> -->--}}
{{--                <!-- <li><a  href="{{url('logout')}}"><i class="fas fa-sign-out-alt "></i> <span >Logout</span></a></li> -->--}}
{{--            </ul>--}}


{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $('#goLive').on('click',function(e){--}}
{{--        e.preventDefault();--}}
{{--        window.__lc = window.__lc || {};--}}
{{--        window.__lc.license = 12321597;--}}
{{--        (function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))--}}

{{--    });--}}
{{--    localStorage.getItem('account')>2?$('#setActive').addClass('active'):$('#setActive').removeClass('active');--}}
{{--    // $('#Subscription').on('click',function(e){--}}
{{--    //     e.preventDefault();--}}
{{--    //     localStorage.setItem('subscription','true');--}}
{{--    //     window.location.href="{{url('user/account')}}";--}}
{{--    // });--}}
{{--    // $('#AccountSetting').on('click',function(e){--}}
{{--    //     e.preventDefault();--}}
{{--    //     localStorage.setItem('subscription','false');--}}
{{--    //     window.location.href="{{url('user/account')}}";--}}
{{--    // })--}}

{{--</script>--}}
{{--<noscript><a href="https://www.livechatinc.com/chat-with/12321597/" id="liveChat" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>--}}

{{--Select All <input type="checkbox" onclick="checkALLChannels()" id="checkALLChannels">--}}
{{--function checkALLChannels() {--}}
{{--$('#checkALLChannels').is(":checked")?--}}
{{--$('input:checkbox[id*=group]').prop('checked','true'):--}}
{{--$('input:checkbox[id*=group]').prop('checked',false);--}}

{{--}--}}

