
@include('Authentication.authHead')
<body class="account-page " style="background-color:rgb(195, 241, 255)">

<!-- Main Wrapper -->
<div class="main-wrapper">

    <div class="account-content">
        <p class="text-center"></p>
            <div class="account-box">
                <div class="account-wrapper">
{{--                    <h2 class="account-title"><b>Login</b></h2>--}}
                    <h2 class="account-title"><a class="logo navbar-brand" >
                            <img src="public/images/m3U.png" alt="" width="70" height="70">
                        </a></h2>

                    <!-- Account Form -->
                    <form id="login" >
                        @csrf
                        <div class="form-group">
                            <label for="email"><b>Email Address</b></label>
                            <input class="form-control email"  name="email" type="email" id="email">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label><b>Password</b></label>
                                </div>
                                <div class="col-auto">
                                  	<a class="text-muted" href="{{url('reset')}}">
                                	Forgot password?
                            		</a>
                                </div>
                            </div>
                            <input class="form-control" name="pass"  id="pass" type="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn"  type="submit">Login</button>
                        </div>
                        <div class="account-footer">
                         <p>Don't have an account yet? <a href="register"><b>Register</b></a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('#login').on('submit',function(e){
        e.preventDefault();
       if( $('#email').val()=='')toastr.error('Kindly provide Email');
       if( $('#pass').val()=='')toastr.error('Kindly provide Password');
       if($('#email').val()!=''&&$('#pass').val()!='')
       $.ajax({
          url:'{{url("checkLogin")}}',
          data:{email:$('#email').val(),pass:$('#pass').val(),_token:'{{csrf_token()}}'},
          method:'POST',
          success:function(response){
             if(response==='1'){
             window.location.replace('user/playlist')}
             else if(response==='2')
                 window.location.replace('user/playlist')
             else if(response==='3'){
                 localStorage.setItem('subscription','true');
                 window.location.replace('user/account');}
             else toastr.error('Your Record Does not Found');
                 } ,
          error:function(){
              toastr.error('Connect Database Machine');
          }
       })


    })

</script>

</body>
</html>
