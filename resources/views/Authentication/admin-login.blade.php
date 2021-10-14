@include('Authentication.authHead')
<body class="account-page " style="background-color:lavender;">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
            <div class="account-box">
                <div class="account-wrapper">
                    <h2 class="account-title"><b>Login</b></h2>


                    <!-- Account Form -->
                    <form id="login" >
                        @csrf
                        <div class="form-group">
                            <label><b>Email Address</b></label>
                            <input class="form-control email"  name="email" type="email" id="email">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label><b>Password</b></label>
                                </div>

                            </div>
                            <input class="form-control" name="pass"  id="pass" type="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
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
          url:'{{url("checkAdminLogin")}}',
          data:{email:$('#email').val(),pass:$('#pass').val(),_token:'{{csrf_token()}}'},
          method:'POST',
          success:function(response){
              response!='false'? window.location.href='admin/adminDashboard':toastr.error('Your Record Does not Found');
                 } ,
          error:function(){
              toastr.error('Connect Database Machine');
          }
       })


    })

</script>

</body>
</html>
