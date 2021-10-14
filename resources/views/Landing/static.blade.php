@include('Landing.headTAG')
@include('Landing.header')



<div class=" mt-4" style="background-color: rgb(25, 117, 210)">
    <div class="" style="padding-top: 50px">
        <div class="row">
            <div class="col-lg-8 offset-lg-2  mt-5 mb-5">
{{--                <h1 style="font-size: 50px" class="text-light text-center">--}}
{{--                    @php--}}
{{--               switch (\Route::current()->getName()){--}}
{{--               case 'termOfUses': echo "Terms of use"  ;break;--}}
{{--               case 'Refundpolicy': echo 'Refund Policy';break;--}}
{{--               case 'Privacypolicy': echo 'Privacy Policy'  ;break;--}}
{{--               case 'Aboutus': echo 'About Us';break;--}}
{{--               default: echo abort(404);--}}

{{--           }--}}
{{--                    @endphp </h1>--}}
                <br>
                @php echo html_entity_decode($data) @endphp
        </div>
    </div>
</div>

<script>
   // $('p').text('');
   // document.onkeydown = function (e) {
   //     return false;
   // }
</script>
@include('Landing.footer')
