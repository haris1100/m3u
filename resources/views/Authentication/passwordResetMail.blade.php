@include('Authentication.authHead')
<body class="account-page " style="background-color:lavender;">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
        <div class="account-box">
            <div class="account-wrapper">
                <h2 class="account-title"  style='font-family: Arial, Helvetica, sans-serif'><b>Reset Password</b></h2>


                <!-- Account Form -->
                <form id="resetPassword">
                    @csrf
                    <div class="form-group">
                        <label><b>Email Address</b></label>
                        <input class="form-control email"  name="email" type="email" >
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary account-btn"  type="submit">Send Mail</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


</body>
</html>
<script>
    $('#resetPassword').on('submit',function (e) {
        e.preventDefault();
        $.ajax({
            url:"{{url('checkMailAndSend')}}",
            data:$('#resetPassword').serialize(),
            method:"POST",
            success:function (response) {
                response===1?toastr.success("Email Sent"):toastr.error("email Not Found ! Register a new Email");;

            },
            error:function(response){
                toastr.error('error');
            }
        })
    })
</script>
