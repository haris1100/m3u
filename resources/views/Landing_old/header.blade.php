
<nav class="navbar navbar-expand-lg fixed-top navbar-dark custom-nav sticky unselectAble" style="background-color:rgb(195, 241, 255);  font-size: large " >
    <div class="container">
        <!-- LOGO -->
        <div class="unselectAble">
            <img src="public/images/m3U.png" alt="" width="70" height="70" >
            </div>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="mx-md-auto d-lg-flex flex-direction-md-row">
                <ul class="navbar-nav mx-auto navbar-center" id="pageLinks" >
                    <li class="nav-item active">
                        <a href="{{url('/')}}" class="nav-link text-dark" ><b>HOME</b></a>
                    </li>
                    <li class="nav-item active">
                        <a href="#pricing" class="nav-link home text-dark"><b>PRICING</b></a>
                    </li>
                    <li class="nav-item active">
                        <a href="#features" class="nav-link home text-dark"><b>FEATURES</b></a>
                    </li>
                    <li class="nav-item d-md-none d-xl-block active">
                        <a href="#changelog" class="nav-link home text-dark" ><b>CHANGELOG</b></a>
                    </li>

                </ul>
                <script>
                    $('.home').click(function () {
                        if(window.location.href==='http://localhost/m3u/EPG'||window.location.href==='http://localhost/m3u/blog'){
                            window.location.replace('{{url('/')}}');

                        }
                    });

                </script>
                <ul class="navbar-nav">
{{--                    <li class="nav-item active">--}}
{{--                        <a href={{url('EPG')}} class="nav-link" style="color: black"><b>EPG</b></a>--}}
{{--                    </li>--}}
                    <li class="nav-item active">
                        <a href="{{url('blog')}}" class="nav-link text-dark" ><b>BLOG</b></a>
                    </li>
                </ul>
            </div>
            <div class="">
                @if(isset($_SESSION['userLogined']))
                    <ul class="navbar-nav">
                        <li class="nav-item" >
                            <a href="user/logout" class="nav-link  text-white btn-danger" style=" border-radius: 20px;">Logout</a>
                        </li>
                        <li class="nav-item active" >
                            <a href="user/dashboard" class="nav-link btn-outline-primary btn ml-5 pr-2 pl-2" style="color: red; border-width: 3px"><b>My PlayList</b></a>
                        </li>

                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="register" class="nav-link btn-danger text-white " style=" border-radius: 30px ">Free Trail</a>
                        </li>
                        <li class="nav-item active">
                            <a href="login" class="nav-link btn-outline-primary btn ml-5 pr-2 pl-2" style="color: red; border-width: 3px"><b>Log in</b></a>
                        </li>

                    </ul>
                @endif
            </div>
            <!--        <div class="d-none d-lg-block">-->
            <!--          <a href="https://m3u-editor.com/login" class="btn btn-sm log_btn">Log In</a>-->
            <!--          <a href="https://m3u-editor.com/register" class="btn btn-sm sign_btn btn-rounded navbar-btn">Sign Up</a>-->
            <!--        </div>-->
        </div>
    </div>
</nav>
