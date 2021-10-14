
    @if(DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->count()>0)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Embed Channel Display</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script type="text/javascript" src="{{asset('public/js/jquery.js') }}"></script>
    <script src="{{asset('public/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="{{asset('public/js/select2.min.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <style>
        body{
            margin: 0;
        }
        #home{
            width: 100%;
            height: 100vh;
            background: rgb(5, 16, 36);
        }
        #home .container-fluid{
            padding: 0px 40px !important;
        }
        #home .container-fluid .row .left-menu{
            width: 30%;
            float: left;
            background: #fff;
            height: 90vh;
            margin-top: 5vh;
            border-radius: 10px;
            padding: 20px 0px;
            overflow-y: scroll;
        }
        #home .container-fluid .row .right-menu{
            width: 67%;
            margin-left: 3%;
            float: right;
            background: #fff;
            height: 90vh;
            margin-top: 5vh;
            border-radius: 10px;
            padding: 20px 20px;
            overflow-y: scroll;
        }
        #home .container-fluid .row .left-menu .group{
            width: 100% !important;
            height: 35px !important;
            line-height: 35px !important;
            padding: 0px 20px;
            display: block;
        }
        #home .container-fluid .row .left-menu h3{
            padding: 0px 20px;
        }
        .group_active{
            background: #eee;
        }
        .group:hover{
            cursor: pointer;
            background: #eee;
        }
        #home .container-fluid .row .right-menu #channels .row{
            height: 60px;
            line-height: 60px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="home" >
        <div class="container-fluid">
            <div class="row">
                <div class="left-menu">
                    <h3 class="mb-3">Groups <span class="badge badge-secondary">{{DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->count()}}</span></h3>
                    @foreach (DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $key => $group)
                        <div class="group @if($key==0) group_active @endif" data-id="{{$group->id}}">
                            {{$group->title}}
                        </div>
                    @endforeach
                </div>
                <div class="right-menu">
                    @php

                        $grp = DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->first()
                    @endphp
                    <h3 class="mb-3">Channels <span class="badge badge-secondary" id="total-channels">{{\App\Channel::where('group_id','=',$grp->id)->count()}}</span></h3>
                    <div id="channels">
                        @foreach (\App\Channel::where('group_id','=',$grp->id)->get() as $k => $channel)
                        <div class="row">
                            <div class="col-1">
                                <img src="{{asset($channel->logo)}}" style="max-height: 60px;">
                            </div>
                            <div class="col-3 ml-3">
                                {{$channel->title}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.group').click(function(){
                if(!$(this).hasClass('group_active'))
                {
                    $('.group').removeClass('group_active');
                    $(this).addClass('group_active');
                    var group_id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{route('channel.count')}}",
                        method: "POST",
                        data: {
                                _token: "{{csrf_token()}}",
                                id: group_id
                            },
                        dataType: "JSON",
                        success: function(res){
                            $('#total-channels').html(res);
                        }
                    })

                    $.ajax({
                        url: "{{route('channel.get')}}",
                        method: "POST",
                        data: {
                                _token: "{{csrf_token()}}",
                                id: group_id
                            },
                        dataType: "JSON",
                        success: function(response){
                            var channels = "";
                            for(var i = 0; i < response.length; i++)
                            {
                                var logo = response[i].logo;
                                if(response[i].logo == null)
                                {
                                    logo = "{{url('/public/images/placeholder.png')}}";
                                }
                                channels += `
                                <div class="row">
                                    <div class="col-1">
                                        <img src="${logo}" style="max-height: 60px; max-width: 60px;">
                                    </div>
                                    <div class="col-5 ml-3">
                                        ${response[i].title}
                                    </div>
                                </div>
                                `;
                            }
                            $('#channels').html(channels);
                            var channels = "";
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
@else
 <h3>Empty Playlist !!</h3>

@endif

