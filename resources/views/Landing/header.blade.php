
<style>
    /*a:visited{color: #0c5460}*/
    /*a:hover{color: red}*/
    /*a.ex1:link{color: black}*/
    /*a.ex1:hover{color: red}*/
    /*a.ex3:visited{color: black}*/
    /*a.ex3:hover{color: white;font-size: 23px}*/
    /*a.ex4:visited{color: black}*/
    /*a.ex4:hover{color: white;font-size: 23px}*/
    /*a.ex5:visited{color: black}*/
    /*a.ex5:hover{color: white;font-size: 23px}*/
    /*a.ex6:visited{color: black}*/
    /*a.ex6:hover{color: white;font-size: 23px}*/
    a{
        transition: all .5s ease;

    }

</style>
<script>

    @if(url()->current()=='http://localhost/m3u')
    if(sessionStorage.getItem('setHref')!==''){

        if(sessionStorage.getItem('setHref')==='PRICING'){
           // alert(sessionStorage.getItem('setHref'))
            window.history.pushState({}, null, '#pricing');
        }
        else if(sessionStorage.getItem('setHref')==='FEATURES'){
            window.history.pushState({}, null, '#features');
        }
        else if(sessionStorage.getItem('setHref')==='CHANGELOG'){
            window.history.pushState({}, null, '#changelog');
        }
    }
    @endif
</script>
<nav class="navbar navbar-expand-lg fixed-top  " style="background-color:rgb(195, 241, 255);  font-size: large " >
    <div class="container">
        <!-- LOGO -->

        <a class="logo navbar-brand" href="#">
            <img src="public/images/m3U.png" alt="" width="70" height="70">
        </a>
        <button class="navbar-toggler" onclick="" type="button" data-toggle="collapse" data-target="#navbarCollapsed" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapsed">
            <div class="mx-md-auto d-lg-flex flex-direction-md-row">
                <ul class="navbar-nav " id="pageLinks" >
                    <li class="nav-item active">
                        <a  href="{{url('/')}}" class="nav-link text-dark mr-5" ><b>HOME</b></a>
                    </li>
                    <li class="nav-item ">
                        <a href="#pricing" class="nav-link PRICING text-dark mr-5" onclick="GoToSpecficHref($(this).text())"><b>PRICING</b></a>
                    </li>
                    <li class="nav-item ">
                        <a href="#features" class="nav-link FEATURES home text-dark mr-5" onclick="GoToSpecficHref($(this).text())"><b>FEATURES</b></a>
                    </li>
                    <li class="nav-item d-md-none d-xl-block active">
                        <a href="#changelog" class="nav-link CHANGELOG home text-dark mr-5" onclick="GoToSpecficHref($(this).text())"><b>CHANGELOG</b></a>
                    </li>

                <script>
                    function GoToSpecficHref(href) {
                        sessionStorage.setItem('setHref',href);
                        if (window.location.href === '{{url('/')}}/EPG' || window.location.href === '{{url('/')}}/blog' || window.location.href === '{{url('/')}}/termOfUses'
                            || window.location.href === '{{url('/')}}/Refundpolicy'
                            || window.location.href === '{{url('/')}}/Privacypolicy'
                            || window.location.href === '{{url('/')}}/Aboutus'
                            || (window.location.href).includes('{{url('/')}}/MyBlogs')
                        ) {

                            window.location.replace('{{url('/')}}');
                        }
                    }

                </script>


                    <li class="nav-item active">
                        <a href="{{url('blog')}}" class="nav-link text-dark"><b>BLOG</b></a>
                    </li>
                    </ul>
            </div>

                @if(isset($_SESSION['userLogined']))
                    <ul class="navbar-nav">
                        <li><a  href='user/playlist' style="font-family: 'Quicksand';border-radius: 10px;transition: all .3s ease;" class="border-primary bg-light btn btn-md btn-docs btn-white  mr-3 text-danger  pl-3 pr-3 pt-2 pb-2 mb-1"><i class="fas fa-th-large mr-2 text-danger"></i>
                                <b>Dashboard</b>
                            </a></li>
                        <li>
                            <a href="logout" style="font-family: 'Quicksand';border-radius: 10px;transition: all .5s ease;"  class="btn btn-md btn-danger   pl-3 pr-3 pt-2 pb-2"><i class="fas fa-paper-plane mr-2 "></i>logout</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li><a  href="login" style="font-family: 'Quicksand';border-radius: 10px;transition: all .3s ease;" class="border-primary bg-light btn btn-md btn-docs btn-white  mr-3 text-danger  pl-3 pr-3 pt-2 pb-2 mb-1 "><i class="fas fa-th-large mr-2 text-danger"></i>
                            <b>Login</b>
                        </a></li>
                        <li>
                        <a href="register" style="font-family: 'Quicksand';border-radius: 10px;transition: all .5s ease;"  class="btn btn-md btn-danger   pl-3 pr-3 pt-2 pb-2"><i class="fas fa-paper-plane mr-2 "></i>Register</a>
                        </li>
                    </ul>
                @endif




        </div>
    </div>
</nav>

