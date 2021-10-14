@include('user.headTag')
@include('user.header')
@if(isset($_SESSION['userLogined']))
@if($_SESSION['userLogined']->emailVerified=='No')
 <div class="page-wrapper" style="margin-bottom: -4%" >
        <div class="content container-fluid">

            <div class="alert alert-danger" role="alert">
            @php
            $staric=explode('@',$_SESSION['userLogined']->email);
            $length=strlen($staric[0]);
            $first3= substr("$staric[0]", 0, 3);
            $end= '@'.$staric[1];
            $zero=$length-3>0?$length-3:0;
            $xxx=str_repeat('X',$zero);
            @endphp
                Verification Email is sent to {{$first3}}{{$xxx}}{{$end}}
                Please Verify Email Before you Starts With Playlists.If you didn't got one ,
                <a href="#"  id="ResendEmail" class="alert-link"> Click me Resend Email</a>
            </div>



        </div>
    </div>


@endif
@endif
@include('user.sidebarUser')
@yield('content')
<script>
    $('#ResendEmail').on('click',function(e){

        e.preventDefault();
        $.ajax({
            url:'{{url('ResendMail')}}',
            data:{email:'@php echo $_SESSION['userLogined']->email @endphp',_token:'{{csrf_token()}}'},
            method:'POST',
            success:function () {
                toastr.success('email sent');
            },
            error:function () {
                toastr.error('error');
            }
        })

    });
    $(document).ready(function(){
        $('.select2').select2();
    })
</script>
</body>
</html>


