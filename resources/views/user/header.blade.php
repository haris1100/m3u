
<nav class="navbar navbar-expand-lg fixed-top navbar-dark custom-nav sticky unselectAble bg-primary" style="height: 11%;">
    <div class="container">
        <!-- LOGO -->

        <button type="button" id="sidebarCollapse" style="display: none" class="btn btn-info">
            <i class="fas fa-align-left"></i>
        </button>
        <div class="unselectAble mr-auto" id="logoHide" style="display: none">
            <img src="{{asset('public/images/m3U.png')}}" alt="" width="70" height="70" >
            </div>
        <script>
            $(window).width()>900?$('#logoHide').show():$('#sidebarCollapse').show();
            //$(window).width()>900?$('#sidebarCollapse').show(): $('#logoHide').show();
            $(window).resize(function() {
                if ($(window).width() > 900) {
                    $('#sidebarCollapse').hide();
                    $('#logoHide').show();
                }
                else {
                    $('#sidebarCollapse').show();
                    $('#logoHide').hide();
                }
            });

        </script>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="mx-md-auto d-lg-flex flex-direction-md-row">

            </div>
            <div class="" >

                    <ul class="navbar-nav" >
                    <li class="nav-item dropdown mb-1 mt-1" >
                        <a class="nav-link dropdown-toggle btn btn-info btn-sm text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Accounts
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('user/account')}}" onclick="localStorage.setItem('account',1)">Profile</a>
                            <a class="dropdown-item" href="{{url('user/account')}}" onclick="localStorage.setItem('account',2)">Security</a>

                        </div>
                        </li>
                        <li class="col-sm-6 mt-1" >
                            <a href="{{url('logout')}}" class="nav-link btn btn-sm btn-info text-light"  >Logout</a>
                        </li>


                    </ul>


            </div>

            <!--        <div class="d-none d-lg-block">-->
            <!--          <a href="https://m3u-editor.com/login" class="btn btn-sm log_btn">Log In</a>-->
            <!--          <a href="https://m3u-editor.com/register" class="btn btn-sm sign_btn btn-rounded navbar-btn">Sign Up</a>-->
            <!--        </div>-->
        </div>
    </div>
</nav>
