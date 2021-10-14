@include('user.master-user')
<style>
    /*#playlistRowHover:hover{*/
    /*    cursor: pointer;*/
    /*}*/
</style>
@if($_SESSION['userLogined']->emailVerified=='Yes' &&  \App\Http\Controllers\m3u::checkIfValidTime()!=0)
    @php
        if($_SESSION['userLogined']->Paid=='inactive'){
            $getPlaylistCount=\Illuminate\Support\Facades\DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count();
           $getfixedPlaylistCount= \Illuminate\Support\Facades\DB::table('admin')->first();
           $getFixedPlaylistCounts=$getfixedPlaylistCount->trailPlaylists;
        }
        else{
            $getCardNo=$_SESSION['userLogined']->cardNo;
            $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
            $getPlaylistCount=\Illuminate\Support\Facades\DB::table('playlists')->where('created_by',$_SESSION['userLogined']->id)->count();
            $getFixedPlaylistCounts=$getFullCard->maxPlayList;
        }

    @endphp
    <div class="page-wrapper" >
        <div class="content container-fluid" >
            @php // echo \App\Http\Controllers\ChannelController::testing(); @endphp
            <div class="row" >
                <div class="col-6">
                    <h1 style="font-family: Arial, sans-serif"><b>   Playlists <span class="badge badge-secondary">{{\App\Playlist::where('created_by','=',$_SESSION['userLogined']->id)->get()->count()}}</span></b></h1>
                </div>

                <div class="col-6">

                    @if($getFixedPlaylistCounts>$getPlaylistCount &&  \App\Http\Controllers\m3u::checkIfValidTime()!=0)<button class="btn-primary btn" data-toggle="modal" data-target="#add_employee" style="float: right;"><i class="fa fa-plus"></i> Create Playlist</button>
                    @endif
                </div>
            </div>
            @if($getFixedPlaylistCounts<=$getPlaylistCount)
                <div class="alert alert-warning" role="alert">
                    Max playlist limit Reached . Get a better Subscription To add more playlists. <a href="{{url('user/account')}}" onclick="localStorage.setItem('account',3)">Click me to Buy Membership</a>
                </div>
            @elseif(\App\Http\Controllers\m3u::checkIfValidTime()==0)
                <div class="alert alert-warning" role="alert">
                    Get a  Subscription To add playlists. <a href="{{url('user/account')}}">Click me to Buy Membership</a>
                </div>
            @endif
            <div class="container-fluid">
                @foreach (\App\Playlist::where('created_by','=',$_SESSION['userLogined']->id)->get() as $key => $row)
                    @if($getFixedPlaylistCounts>$key && \App\Http\Controllers\m3u::checkIfValidTime()!=0)
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="myProgress" style="width: 100%; margin-bottom: 3px">
                                        <div id="myBar{{$row->id}}" style="  width: 0; height: 1px; background-color: #4CAF50;"></div>

                                    </div>
                                    @php $protocol = isset($_SERVER['HTTPS']) && (strcasecmp('off', $_SERVER['HTTPS']) !== 0);
$hostname = $_SERVER['SERVER_ADDR'];
$port = $_SERVER['SERVER_PORT']; $host= url('/').':'.$port; @endphp

                                    <div class="row" id="playlistRowHover">
                                        <div class="col-sm-2" ><p><b>{{$row->title}}</b></p></div>
                                        <div class="text-center col-sm-3" style="font-style: italic">{{url('/')."/serve/".$row->uid}}&nbsp;<button onclick="copyMyUrl('{{$row->uid}}')" type="button" class="btn btn-outline-success btn-sm " style="font-size: 10px;"><i class="far fa-copy"></i></button>
                                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#hostuserpass" class="text-dark ml-2 " style="font-size: 20px" onclick="$('#hostMod').text('{{$host}}');$('#userMod').text('{{$row->username}}');$('#passMod').text(' {{$row->password}}');"   > <i class="far fa-question-circle"></i></a>
{{--                                            <br> --}}
                                        </div>

                                        <div class="text-right col-sm-3 mt-3">
                                            <a class="btn btn-outline-success " href="{{route('playlist.edit',$row->uid)}}">
                                                @php
                                                    $total_channels =  \App\Channel::where('pid','=',$row->id)->where('hide','unhide')->whereNotNull('group_id')->count();
                                                   // $groups = DB::table('channel_groups')->where('playlist_id','=',$row->id)->get();
                                                   // foreach ($groups as $key => $group) {
                                                   //     $total_channels += \App\Channel::where('group_id','=',$group->id)->where('hide','=','unhide')->get()->count();
                                                   // }
                                                    // $getFixedChannels=\App\Http\Controllers\ChannelController::countChannels();
                                                   // if($getFixedChannels<$total_channels) $total_channels=$getFixedChannels;
                                                @endphp
                                                {{$total_channels}}
                                                channels
{{--                                                 --}}
                                                <span class=" pr-1 pl-1 btn-secondary rounded-circle"><i class="fa fa-arrow-right text-sm text-light"></i></span>

                                            </a>
                                            &nbsp;<span>
                                            @if(DB::table('dailsync')->where('PID',$row->id)->exists())
                                                <button id="syncButtonForHide"  data-toggle="tooltip" onclick="selfcallsync('{{$row->id}}')" title="synchronize" style="width: 25px; height: 25px; line-height: 20px;" class=" syncButtonForHide{{$row->id}} btn btn-outline-secondary btn-sm p-0 rounded-circle mr-1"><i class="fas fa-sync "></i></button>
                                                <button style="display:none;width: 25px; height: 25px; line-height: 20px;" class="btn btn-outline-secondary btn-sm p-0 rounded-circle mr-1" id="AnimeSyncButtonForHide{{$row->id}}"><i class="fas fa-sync fa-spin"></i></button>
                                            @endif
                                            </span>
                                        </div>
                                        <div class="col-sm-4 btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group ml-auto" role="group" aria-label="First group">
                                                <a data-toggle="tooltip" data-placement="top" title="Embed Channel Code" class="btn showEmbdModal" onclick="show_embed_modal('{{$row->id}}')"><i class="fa fa-code text-primary"></i></a>
                                                @if($getFixedPlaylistCounts>$getPlaylistCount && \App\Http\Controllers\m3u::checkIfValidTime()!=0) <a data-toggle="tooltip" data-placement="top" title="Create Duplicate Playlist" class="btn" href="{{route('playlist.clone',$row->id)}}"><i class="fa fa-clone text-secondary"></i></a>@endif
                                                <a data-toggle="tooltip" data-placement="top" title="Download Playlist" class="btn" href="{{route('playlist.serve',$row->uid)}}" download><i class="fa fa-download text-warning"></i></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Edit Playlist" class="btn" onclick="show_modal('{{$row->id}}')"><i class="fa fa-pen text-success"></i></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Playlist" class="btn" onclick="show_delete_modal('{{$row->id}}')"><i class="fa fa-trash text-danger"></i></a>
                                            </div>

                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-1"></div>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <span style="font-size: 12px" class="text-center"><span>host: <span style="font-style: normal;color: blue">@php $protocol = isset($_SERVER['HTTPS']) && (strcasecmp('off', $_SERVER['HTTPS']) !== 0);--}}
{{--$hostname = $_SERVER['SERVER_ADDR'];--}}
{{--$port = $_SERVER['SERVER_PORT']; echo url('/').':'.$port; @endphp </span></span>username: <span style="font-style: normal;color: blue">{{$row->username}}</span> password: <span style="font-style: normal;color: blue">{{$row->password}}</span></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>


    <!-- Add Employee Modal -->
    <div id="add_employee" class="modal custom-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Playlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('playlist.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" class="form-control" name="title" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="group">Group format</label> -->
                                    <select name="group_id" id="group" hidden class="form-control">
                                        <option value="1">Use inline group titles (recommended)</option>
                                        <option value="2">Use #EXTGRP tags</option>
                                    </select>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="protection">Playlist protection</label>
                                    <select name="protection" id="protection" class="form-control">
                                        <option value="1">Allow downloads from any IP address</option>
                                        <option value="2">Limit downloads by IP address</option>
                                    </select>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="limit">Limit channel embedding</label>
                                    <select name="embed_channel" id="limit" class="form-control">
                                        <option value="1">Allow any domain to embed channel display</option>
                                        <option value="2">Only allow specific domains</option>
                                    </select>
                                </div>
                                <div class="form-group" hidden>
                                    <input type="checkbox" name="hide_stream_url" value="1" id="hide_stream_url">
                                    <label for="hide_stream_url">Hide stream-URLs in M3U file behind redirect URLs</label>
                                </div>
{{--                                <!-- @php--}}
{{--                                    if($_SESSION['userLogined']->Paid=='inactive'){--}}
{{--                                       $getDailySyncValue=DB::table('admin')->first();--}}
{{--                                       $getDailySyncVal=$getDailySyncValue->dailysync;--}}
{{--                                   }--}}
{{--                                   else{--}}
{{--                                       $getCardNo=$_SESSION['userLogined']->cardNo;--}}
{{--                                       $getFullCard=DB::table('subscription')->where('id',$getCardNo)->first();--}}
{{--                                       $getDailySyncVal=$getFullCard->Dailysyncforupdates;--}}

{{--                                   }@endphp--}}
{{--                                @if($getDailySyncVal=='Yes')--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="checkbox" onclick="if($(this).is(':checked'))$(this).val(1); else $(this).val(0);" id="urlSyncWhole" name="urlSyncWhole">--}}
{{--                                    <label for="urlSyncWhole">Enable Sync For Update</label>--}}
{{--                                </div>--}}
{{--                                @else--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input disabled type="checkbox" onclick="if($(this).is(':checked'))$(this).val(1); else $(this).val(0);" id="urlSyncWhole" name="urlSyncWhole">--}}
{{--                                        <label for="urlSyncWhole">Enable Sync For Update <span class="text-danger">Disabled For you</span></label>--}}
{{--                                    </div>--}}
{{--                                    @endif -->--}}

                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Employee Modal -->


    <!-- Edit Employee Modal -->
    <div id="edit_playlist" class="modal custom-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Playlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('playlist.update')}}">
                        @csrf
                        <input type="hidden" name="pid" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control title" name="title" required>
                                </div>
                                @php
                                    if($_SESSION['userLogined']->Paid=='inactive'){
                                       $urlCustomization= \Illuminate\Support\Facades\DB::table('admin')->first();
                                       $urlCustomization=$urlCustomization->DownloadURLcustomization;
                                    }
                                    else{
                                        $getCardNo=$_SESSION['userLogined']->cardNo;
                                        $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                                        $urlCustomization=$getFullCard->DownloadURLcustomization;
                                    }
                                @endphp
                                @if($urlCustomization=='Yes')
                                    <div class="form-group">
                                        <label for="basic-url">Playlist URL</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text _url" id="basic-addon3"></span>
                                            </div>
                                            <input type="text" class="form-control _uid" name="_uid" id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="basic-url">Playlist URL</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text _url" id="basic-addon3"></span>
                                            </div>
                                            <input type="text" class="form-control _uid" name="_uid" disabled id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                   <p class="text-danger"> you can't rename url . Get a Subscription To do it . <a
                                           href="{{url('user/account')}}" onclick="localStorage.setItem('account',3)">Click me </a> to Buy Membership</p>
                                @endif
                                    <p id="LinkedSources">Linked Sources:</p>

                                <div class="row">
                                    <div class="col-8">
                                <div class="form-group appendSelectDiv">
                                <select id="appendSelect" onchange="setHoursforSync($(this).val())" name="appendSelect" class="form-control select2" style="width: 100%">
                                </select>
                                </div>
                                    </div>
                                    <div class="col-3">
                                    <div class="form-group ">
                                        <select  class="form-control " id="timefordailySynce" onchange="changeTimefordailysync($(this).val(),$('#appendSelect').val())" style="width: 100%">
                                            @if($_SESSION['userLogined']->Paid=='active')

                                                <option value="1">Every hour</option>
                                                <option value="2">Every 2 hours</option>
                                                <!-- <option value="6">Every 6 hours</option>
                                                <option value="8">Every 8 hours</option> -->
                                                <option value="12">Every 12 hours</option>
                                                <option selected value="24">Every 24 hours</option>

                                            @else

                                                <option disabled value="1">Every hour(Pro Plus)</option>
                                                <option disabled value="2">Every 2 hours(Pro Plus)</option>
                                                <!-- <option disabled value="6">Every 6 hours(Pro Plus)</option>
                                                <option disabled value="8">Every 8 hours(Pro Plus)</option> -->
                                                <option value="12">Every 12 hours</option>
                                                <option selected value="24">Every 24 hours</option>

                                            @endif
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-1 mt-1 col-sm-1">
                                        <a href="javascript:void(0)" id="dfadfa" class="btn btn-outline-danger" onclick="delGapForDailySync($('#appendSelect').val(),$('#id').val())"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label for="group">Group format</label>--}}
                                <select hidden name="group_id" class="form-control group">
                                    <option  value="1">Use inline group titles (recommended)</option>
                                    <option value="2" id="gp_2">Use #EXTGRP tags</option>
                                </select>
                                {{--                                            </div>--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label for="protection">Playlist protection</label>--}}
                                <select  hidden name="protection" class="form-control protection">
                                    <option value="1">Allow downloads from any IP address</option>
                                    <option value="2" id="pt_2">Limit downloads by IP address</option>
                                </select>
                                {{--                                            </div>--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label for="limit">Limit channel embedding</label>--}}
                                <select hidden name="embed_channel" class="form-control limit">
                                    <option value="1">Allow any domain to embed channel display</option>
                                    <option value="2" id="ec">Only allow specific domains</option>
                                </select>

                                {{--                                            <div class="form-group">--}}
                                {{--                                                <input type="checkbox" name="hide_stream_url" value="1" class="hide_stream_url">--}}
                                {{--                                                <label for="hide_stream_url">Hide stream-URLs in M3U file behind redirect URLs</label>--}}
                                {{--                                            </div>--}}
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Employee Modal -->


    <!-- Delete Employee Modal -->
    <div class="modal custom-modal" id="delete_playlist" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Playlist</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form method="POST" action="{{route('playlist.delete')}}">
                            @csrf
                            <input type="hidden" name="pid" id="pid">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary cancel-btn w-100" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn w-100">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Employee Modal -->

    <!-- Delete Employee Modal -->
    <div class="modal custom-modal" id="embed_playlist" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Embed channel display</h3>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="w-100" id="alert">

                            </div>
                        </div>
                        <div class="row">
                            <div class="w-100">
                                <style>
                                    pre{
                                        display: block;
                                        padding: 10.5px;
                                        margin: 0 0 11px;
                                        font-size: 13px;
                                        line-height: 1.6;
                                        word-break: break-all;
                                        word-wrap: break-word;
                                        /* color: #333; */
                                        background-color: #f5f5f5;
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                    }
                                </style>
                                <pre id="code"></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Employee Modal -->

    {{-- <script>
        $('#url').text(window.location.href+'/'+'@php echo rand(1000,100000).'-abc'.rand(1,100000); @endphp');
    </script> --}}


    <script>


        function show_modal(id)
        {

            $('#appendSelect').empty();
            $.ajax({
                url: "{{route('playlist.get')}}",
                method: "POST",
                data: {_token:"{{csrf_token()}}" , id:id},
                dataType: "JSON",
                success: function(response)
                {
                    $('#id').val(id);
                    $('.title').val(response[0].title);
                    $('._url').text("{{url('/serve')}}/");
                    $('._uid').val(response[0].uid);
                   // response[1]===1?$('#urlSyncWholeEdit').prop("checked", true):$('#urlSyncWholeEdit').prop("checked", false);

                    //$('#urlSyncWholeEdit')
                    if(response.group_id == 2)
                    {
                        $('#gp_2').attr('selected', 'selected');
                    }
                    else
                    {
                        $('#gp_2').removeAttr('selected');
                    }

                    if(response.protection == 2)
                    {
                        $('#pt_2').attr('selected', 'selected');
                    }
                    else
                    {
                        $('#pt_2').removeAttr('selected');
                    }

                    if(response.embed_channel == 2)
                    {
                        $('#ec_2').attr('selected', 'selected');
                    }
                    else
                    {
                        $('#ec_2').removeAttr('selected');
                    }

                    if(response.hide_stream_url == 1)
                    {
                        $('.hide_stream_url').attr('checked', 'checked');
                    }
                    else
                    {
                        $('.hide_stream_url').removeAttr('checked');
                    }
                    if(response[1])
                    for(var j=0;j<response[1].length;j++){
                        var appendSelect=  ' <option value="'+response[1][j].url+','+response[1][j].PID+'">'+response[1][j].url+'</option>' ;
                        $('#appendSelect').append(appendSelect);
                    }
                    if($('#appendSelect').has('option').length == 0){
                        $('#appendSelect').hide();
                        $('.appendSelectDiv').hide();
                        $('#timefordailySynce').hide();
                        $('#dfadfa').hide();
                        $('#LinkedSources').hide();
                        $('#syncButtonForHide').hide();

                    }

                    else {
                        $('#appendSelect').show();
                        $('.appendSelectDiv').show();
                        $('#timefordailySynce').show();
                        $('#dfadfa').show();
                        $('#LinkedSources').show();
                        $('#syncButtonForHide').show();
                    }
                    $('#edit_playlist').modal('show');
                    setHoursforSync($('#appendSelect').val());
                }
            });
        }
        function show_delete_modal(id){
            $('#pid').val(id);
            $('#delete_playlist').modal('show');
        }
        function _download(id){
            $.ajax({
                url: "{{route('playlist.download')}}",
                method: "POST",
                data: {_token:"{{csrf_token()}}" , id:id},
                success: function(response)
                {

                }
            });
        }
        function show_embed_modal(id){
            $.ajax({
                url: "{{route('playlist.embed_link')}}",
                method: "POST",
                data: {_token:"{{csrf_token()}}" , id:id},
                dataType: "json",
                success: function(response)
                {
                    var alert = `
                    <div class="alert alert-primary">
                        Do you want to show others your playlist? Embed the channel display using the code below. This display does not contain sensitive data and only displays your channel groups and channel names with their logo and EPG data.
                        <br>
                        <hr>
                        <a href="${response.link}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-eye"></i> Preview channel display</a>
                    </div>
                `;
                    $('#alert').html(alert);
                    $('#code').html(response.html);
                },
                complete: function(){
                    $('#embed_playlist').modal('show');
                }
            });
        }
        function copyMyUrl(id) {
            var path=window.location.href.split('user');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(path[0]+'serve/'+id).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Copied');
        }
        function setHoursforSync(url) {

        $.ajax({
            url:'{{url('checksynceurlsentbyplaylist')}}',
            data:{url:url,_token:'{{csrf_token()}}'},
            method:'POST',
            success:function (response) {
                let split=response.split('"');
                //alert(split[1]);
               // alert()
            $('#timefordailySynce').val(split[1]).change();
            },
            error:function () {
            toasrt.error('sad');
            }
        })
        }
        function changeTimefordailysync(val,url) {
            $.ajax({
                url:'{{url('checksynceurlsentbyplaylist')}}',
                data:{url:url,val:val,_token:'{{csrf_token()}}'},
                method:'POST',
                success:function (response) {
                  //  alert(response);
                  //  $('#timefordailySynce').val(response).change();
                },
                error:function () {
                    toastr.error('');
                }
            })


        }
        function  delGapForDailySync(url,id) {
            //alert(id);
          var con=confirm('Are you sure to want to delete?');
           // alert(confirm);
            if(con)
            $.ajax({
                url:'{{url('checksynceurlsentbyplaylist')}}',
                data:{url:url,del:1,_token:'{{csrf_token()}}'},
                method:'POST',
                success:function (response) {
                    var split=url.split(',');
                   // alert(split[1]);
                   //  alert(response);
                    show_modal(id);
                   // $('#timefordailySynce').val(split[1]).change();
                },
                error:function () {
                    toasrt.error('sad');
                }
            })
        }

        function selfcallsync(id) {

            // var i = 0;
            // var elem = document.getElementById("myBar"+id);
            $.ajax({
                url:'{{url('selfcallsync')}}',
                data:{id:id,_token:'{{csrf_token()}}'},
                method:'POST',
                beforeSend:function(){
                    $('#AnimeSyncButtonForHide'+id).show();
                    $('.syncButtonForHide'+id).hide();
                    // if (i == 0) {
                    //     i = 1;
                    //     var width = 1;
                    //     var ide = setInterval(frame, 10);
                    //     function frame() {
                    //         if (width >= 30) {
                    //             clearInterval(ide);
                    //             i = 0;
                    //         } else {
                    //             width++;
                    //             elem.style.width = width + "%";
                    //         }
                    //     }
                    // }
                },
                success:function (response) {
                    // width = 70;
                    // ide = setInterval(frame, 10);
                    // function frame() {
                    //     if (width >= 100) {
                    //         clearInterval(ide);
                    //         i = 0;
                    //     } else {
                    //         width++;
                    //         elem.style.width = width + "%";
                    //     }
                    // }
                   // setTimeout(() => { $("#myBar"+id).hide(); toastr.success("Synchronized successfully");  }, 2000);
                },
                complete:function () {
                        //  width = 30;
                        //  ide = setInterval(frame, 10);
                        // function frame() {
                        //     if (width >= 70) {
                        //         clearInterval(ide);
                        //         i = 0;
                        //     } else {
                        //         width++;
                        //         elem.style.width = width + "%";
                        //     }
                        // }
                    $('#AnimeSyncButtonForHide'+id).hide();
                    $('.syncButtonForHide'+id).show();

                },
                error:function(){
                 //   toastr.error("Can't Synchronized at this moment");
                }

                // error:function () {
                //     toastr.error('sad');
                // }
            })
        }
        // function clickRowToMoveChannels() {
        //     if(($('a').data('clicked')))
        //     {
        //         alert("button was clicked");
        //     }
        // }

    </script>
    <div class="modal fade" id="hostuserpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="uidMod"></h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <div class="modal-body">
                    <p>Host : <span class="text-primary" id="hostMod"></span></p>
                    <p>Username : <span class="text-primary" id="userMod"></span></p>
                    <p>Password : <span class="text-primary" id="passMod"></span></p>

                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@else
    <div class="page-wrapper" >
        <div class="content container-fluid" >
    <div class="alert alert-warning" role="alert">
        Buy a  Subscription To add playlists. <a onclick="localStorage.setItem('account',3)" href="{{url('user/account')}}">Click me to Buy Membership</a>

    </div>
        </div></div>
@endif

