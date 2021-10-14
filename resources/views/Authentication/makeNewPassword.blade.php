@include('Authentication.authHead')


    @if(isset($_GET['email'])&&isset($_GET['code']))
<body class="account-page " style="background-color:lavender;">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
        <div class="account-box">
            <div class="account-wrapper">
                <h2 class="account-title"><b>Reset Password</b></h2>


                <!-- Account Form -->
                <form id="newPassForm" >
                    @csrf
                    <div class="form-group">

                        <input class="form-control email" name="email" hidden value="@php echo $_GET['email']  @endphp" type="email" id="email">
                    </div>
                    <input type="text" value="@php echo $_GET['code'] @endphp" hidden name="myToken">
                    <div class="form-group">
                        <label><b>New Password</b></label>
                        <input class="form-control email"  onkeyup="isValid($(this).val())"  name="newPass" type="password" id="newPass">
                        <span id="upper" >Uppercase <i id="cross1" class="fas fa-times "></i><i id="tick1" class="fas fa-check "></i></span>&nbsp;&nbsp;
                        <span id="lower" class="ml-2">Lowercase <i id="cross2" class="fas fa-times "></i><i id="tick2" class="fas fa-check "></i></span>&nbsp;&nbsp;
                        <span id="number" class="ml-2">Numbers <i id="cross3" class="fas fa-times "></i><i id="tick3" class="fas fa-check "></i></span>&nbsp;&nbsp;
                        <span id="length" class="ml-2">Lenght <i id="cross4" class="fas fa-times "></i><i id="tick4" class="fas fa-check "></i></span>

                    </div>
                    <div class="form-group">
                        <label><b>Confirm Password</b></label>
                        <input class="form-control email"  name="confirmPass" type="password" id="confirmPass">
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary account-btn resetBtn"  type="submit">Reset</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>
<script>

    $('#newPassForm').on('submit',function (e) {
        e.preventDefault();
        if($('#confirmPass').val()===$('#newPass').val())
            $.ajax({
                url:'{{url('resetMyPassword')}}',
                data:$('#newPassForm').serialize(),
                method:'POST',
                success:function (response) {
                    response===0?toastr.error('Link Expired!'):response===1?toastr.error('There is Problem eith your email'):window.location.replace('{{url('login')}}');
                    // window.location.replace('{{url('login')}}'
                },
                error:function () {
                    toastr.error('SomeThing Went Wrong! please try again later');
                }
            });
        else toastr.error('Password Does not Match');
    })
    $('i').hide();
    $('span').hide();
    $('.resetBtn').prop('disabled', true);
    function isValid(input) {
        $('span').show();
        var reg = /^[^%\s]{8,}/;
        var reg3 = /[A-Z]/;
        var reg2 = /[a-z]/;
        var reg4 = /[0-9]/;

        if(reg.test(input) && reg2.test(input) && reg3.test(input) && reg4.test(input)){

            $('.resetBtn').removeAttr("disabled");
            $('i').hide();
            $('span').hide();
        }
        else{
            $('.resetBtn').attr("disabled", 'true');
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

@else
<?php echo' Error!' ?>
        @endif
