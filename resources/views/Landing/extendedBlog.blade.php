@php
    $data=\Illuminate\Support\Facades\DB::table('blod')->where('heading',$_GET['title'])->first();

@endphp
@if($data)
@include('Landing.headTAG')
<!-- -------------------------------------------------------Header------------------------------------------------>
@include('Landing.header')

<div class="page-wrapper mt-5 mb-3"  style="background-color:rgb(195, 241, 255); height: 40vh">
    <br>
    <br>
    <br>
<h1 class="text-center mt-5 ">{{$data->heading}}
    @php
        $imgSize= \Illuminate\Support\Facades\DB::table('static')->pluck('size')->first();
   // $imgSize=html_entity_decode($imgSize);

    $img=explode('x',$imgSize);

    if(count($img)>0){

        $width=$img[0];
        $height=$img[1];

    }
    @endphp
</h1>
</div>
<div class="page-wrapper">
    <div class="container  ">
        <div id="imgpv">
           @php
             $arr= (explode('.',$data->pv));

            if(end($arr)=='jpg'){
              $address='.'.$arr[2].'.jpg';
                $pv=1;
            }
            else{
                $address='.'.$arr[2].'.mp4';
                $pv=2;
            }
               @endphp
            @if($pv==1)
                <div class="container" >
{{--                    style="background-color:rgb(195, 241, 255);"--}}
                <div class="d-flex justify-content-center ">
                    <br>

            <img src="{{$address}}" class="p-3"  alt="" id="myimage">
                </div>
                </div>
            @elseif($pv==2)
                <div class="container" >
{{--                    style="background-color:rgb(195, 241, 255);"--}}
                    <div class="d-flex justify-content-center ">
                <video autoplay controls  class="p-3"   >
                      <source src="{{$address}}" type="video/mp4"   alt="" >
                </video>
                    </div></div>
            @endif
        </div>
        <br>
        <script>
            var width='{{$width}}';
            var height='{{$height}}';
            var resW = width.replace(/\D/g, "");
            var resH = height.replace(/\D/g, "");
            //alert(resH);
            $('#myimage').width(resW);
            $('video').width(resW);
            $('#myimage').height(resH);
            $('video').height(resH);
        </script>

{{--        <p contenteditable="true" style="font-family: 'Quicksand';font-size: 20px">--}}

{{--            @php--}}
{{--               echo html_entity_decode($data->text);--}}
{{--                @endphp--}}
{{--        </p>--}}
{{--        <hr>--}}

{{--            contenteditable="true"--}}
            @php
                echo html_entity_decode($data->extendedText);
            @endphp


        <br>
        <br>
{{--        <img src="./public/images/frits.jpg" width="100" height="100" alt="">--}}
{{--        m3ueditor.com--}}
        <br><br>
    </div>
</div>







<script>
    // $('p').text('');
    // document.onkeydown = function (e) {
    //     return false;
    // }
</script>









@include('Landing.footer')
@endif
