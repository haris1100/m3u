@include('Authentication.authHead')
<body class="account-page " style="background-color:rgb(195, 241, 255);">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
            <div class="account-box">
                <div class="account-wrapper">
                    <h4 class="account-title" style="font-family: 'Quicksand';"><a class="logo navbar-brand" >
                            <img src="public/images/m3U.png" alt="" width="70" height="70">
                        </a></h4>

                    <form id="register" >
                        @csrf
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input class="form-control "  name="name" type="text" id="name">
                        </div>
                        <div class="form-group">
                            <label><b>Email Address</b></label>
                            <input class="form-control email"  name="email" type="email" id="email">
                        </div>
                        <div class="form-group">
                          <label><b>Password</b> <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Password must include 8-15 characters, 1 special character,1 upercase letter and 1 number"></i></label>
                          <input onkeyup="isValid($(this).val())" class="form-control" name="pass"  id="pass" type="password">
                          <span id="upper" >Uppercase <i id="cross1" class="fas fa-times "></i><i id="tick1" class="fas fa-check "></i></span>&nbsp;&nbsp;
                          <span id="lower" class="ml-2">Lowercase <i id="cross2" class="fas fa-times "></i><i id="tick2" class="fas fa-check "></i></span>&nbsp;&nbsp;
                          <span id="number" class="ml-2">Numbers <i id="cross3" class="fas fa-times "></i><i id="tick3" class="fas fa-check "></i></span>&nbsp;&nbsp;
                          <span id="length" class="ml-2">Lenght <i id="cross4" class="fas fa-times "></i><i id="tick4" class="fas fa-check "></i></span>
                        </div>
                        <div class="form-group">
                        <label><b>Confirm Password</b></label>
                        <input class="form-control" name="ConfirmPass"  id="ConfirmPass" type="password">
                    </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" id="regButton" type="submit">Register</button>
                        </div>
                        <div class="account-footer">
                         <p>Already Have Account?<a href="login"><b>Login</b></a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#regButton').prop('disabled', true);
    $('#register').on('submit',function(e){
        e.preventDefault();

        if($('#pass').val()!=$('#ConfirmPass').val())toastr.error('Password Does not match');

        else{
        if($('#email').val()!=''&&$('#pass').val()!='')
        $.ajax({
            url:'{{url("registerUser")}}',
            data: $('#register').serialize(),
            method:'POST',
            success:function(response){
                response=='false'?toastr.warning('Email Alredy Registered'):window.location.replace('user/dashboard');
            },
            error:function(){
                toastr.error('Connect Database Machine');
            }
        })

        }
        });
         $( "#name" ).keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });
    $('i').hide();
    $('span').hide();
function isValid(input) {
    $('span').show();
    var reg = /^[^%\s]{8,}/;
    var reg3 = /[A-Z]/;
    var reg2 = /[a-z]/;
    var reg4 = /[0-9]/;

    if(reg.test(input) && reg2.test(input) && reg3.test(input) && reg4.test(input)){

        $('#regButton').removeAttr("disabled");
        $('i').hide();
    $('span').hide();
    }
    else{
        $('#regButton').attr("disabled", 'true');
        if(reg.test(input)){
            $('#length').addClass('text-success');
            $('#length').removeClass('text-danger');
            $('#cross4').hide();
            $('#tick4').show();
        }
        else{

            $('#length').removeClass('text-success');
            $('#length').addClass('text-danger');
            $('#cross4').show();
            $('#tick4').hide();
        }
        if(reg2.test(input)){
            $('#lower').addClass('text-success');
            $('#lower').removeClass('text-danger');
            $('#cross2').hide();
            $('#tick2').show();
        }
        else{
            $('#lower').removeClass('text-success');
            $('#lower').addClass('text-danger');
            $('#cross2').show();
            $('#tick2').hide();
        }
        if(reg3.test(input)){
            $('#upper').addClass('text-success');
            $('#upper').removeClass('text-danger');
            $('#cross1').hide();
            $('#tick1').show();
        }
        else{
            $('#upper').removeClass('text-success');
            $('#upper').addClass('text-danger');
            $('#cross1').show();
            $('#tick1').hide();
        }
        if(reg4.test(input)){
            $('#number').addClass('text-success');
            $('#number').removeClass('text-danger');
            $('#cross3').hide();
            $('#tick3').show();
        }
        else{
            $('#number').removeClass('text-success');
            $('#number').addClass('text-danger');
            $('#cross3').show();
            $('#tick3').hide();
        }

    }
}

</script>

</body>
</html>
