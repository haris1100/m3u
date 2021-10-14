@php
    $playlist = \App\Playlist::where('uid','=',$id)->first();
@endphp

@if($playlist)
@include('user.master-user')

@if($_SESSION['userLogined']->emailVerified=='Yes' &&  \App\Http\Controllers\m3u::checkIfValidTime()!=0)

<div class="page-wrapper">
    <div class="content container-fluid">


        <div class="row">
            <div class="col-6">
                <small><a href="{{route('playlists')}}" class="bg-white"><i class="fa fa-arrow-left"></i> Return to platlists</a></small>
            </div>
        </div>
        <div class="row">
            <div class="col-6">

                @php
                    //\App\Http\Controllers\ChannelController::restrictChannels($playlist->id);
                  $total_channels =  \App\Channel::where('pid','=',$playlist->id)->where('hide','unhide')->whereNotNull('group_id')->count();

                        //$total_channels = 0;
                        //$groups = DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->get();
                        ///foreach ($groups as $key => $group) {
                         //   $total_channels += \App\Channel::where('group_id','=',$group->id)->where('hide','=','unhide')->get()->count();
                       // }

                      $getSynchronization=\App\Http\Controllers\ChannelController::dailyautosync($playlist->id);


                @endphp
                <h1 style="font-family: Arial, sans-serif"><b>{{$playlist->title}} <span class="badge badge-secondary">{{$total_channels}}</span></b></h1>
            </div>
            <?php
            if($_SESSION['userLogined']->Paid=='active'){
                $getCardNo=$_SESSION['userLogined']->cardNo;
                $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                $getFixedChannelCounts=$getFullCard->channelPerPlayList;
            }
            else{
                $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
                $getFixedChannelCounts=$getfixedChannelCount->Trailchannels;
            }
            ?>
            @if($getFixedChannelCounts>$total_channels)
                <div class="col-6">
                    <button class="btn-primary btn ml-2 mb-1" id="callimportModel" data-toggle="modal" data-target="#import_channel" style="float: right;"><i class="fa fa-download"></i> Import From M3U</button>
                    <button class="btn-secondary btn create-channel" onclick="show_add_channel_modal()" style="float: right;">
                        <i class="fa fa-plus"></i> Manually Create Channel
                    </button>
                </div>
            @endif

        </div>
        <div>
            <?php
            $getFixedChannelCounts=9999999999999999;$getMAxLimit=9999999999999;
            if($_SESSION['userLogined']->Paid=='active'){
                $getCardNo=$_SESSION['userLogined']->cardNo;
                $getFullCard=\Illuminate\Support\Facades\DB::table('subscription')->where('id',$getCardNo)->first();
                $getFixedChannelCounts=$getFullCard->channelPerPlayList;
            }
            else{
                $getfixedChannelCount= \Illuminate\Support\Facades\DB::table('admin')->first();
                $getMAxLimit=$getfixedChannelCount->Trailchannels;
            }
            ?>
            @if($getFixedChannelCounts<=$total_channels)
                <div class="alert alert-warning" role="alert">
                    You have reached the maximum number of channels in this playlist. Please <a href="{{url('user/account')}}">Upgrade</a> to manage more channels per playlist.
                </div>
            @endif
            @if($getMAxLimit<=$total_channels)
                <div class="alert alert-warning" role="alert">
                    You have reached the maximum number of channels in this playlist. Please <a href="{{url('user/account')}}">Upgrade</a> to manage more channels per playlist.
                </div>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-sm-9">
                <select class="form-control form-control select2 groups reload">
                    <option value="" @if(DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->count()>0) disabled @endif>Select Channel Group</option>
                    @foreach (DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $key => $grp)
                        <option value="{{$grp->id}}">{{$grp->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-2 mb-1 mt-1">
                <div class="btn-group" style="height: 100%;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Group actions</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item di" href="#" onclick="show_edit_modal()">Edit</a>
                        <a class="dropdown-item di" href="#" onclick="show_delete_modal()">Delete</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_group">Create Group</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#manage_group">Manage Group Order</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-secondary " data-toggle="modal" data-target="#search_modal" style="height: 100%;"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="row mt-3" id="search-filter" style="display: none;">
            <div class="col-md-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-info p-0 p-1" id="search-filter-button"><i class="fa fa-times-circle"></i> Clear Search Filters</button>
            </div>
        </div>
        @if($total_channels==0)
            <p class="text-center text-danger">No channels </p>
        @endif
        <style>
            .rchannel{
                position: relative !important;
            }
            .custom-checkbox{
                width: 15px;
                height: 15px;
                float: left;
                position: absolute;
                top: 45%;
                transform: translate(-38px,-40%);
            }
            .rchannel .rrow{
                width: calc(100% - 10px);
                float: right;
            }
            .bulk-action{
                width: 250px;
                padding: 20px 20px;
                background: #343a40;
                position: fixed;
                right: 20px;
                bottom: 20px;
                border-radius: 10px;
            }
        </style>

        <div class="list-group mt-3" id="channels">

        </div>

    </div>
</div>
@else
    <div class="page-wrapper" >
        <div class="content container-fluid" >
            <div class="alert alert-warning" role="alert">
                Buy a  Subscription To edit playlists. <a onclick="localStorage.setItem('account',3)" href="{{url('user/account')}}">Click me to Buy Membership</a>

            </div>
        </div></div>
@endif

<div class="bulk-action" style="display: none;">
    <h3 class="text-white">Channel bulk actions</h3>
    <button class="w-100 btn btn-danger mt-2 delete_selected">Delete <span class="total-selected"></span></button>
    <button class="w-100 btn btn-info mt-3" data-toggle="modal" data-target="#move_copy_modal">Move or Copy <span class="total-selected"></span></button>
    <button class="w-100 btn btn-secondary mt-3" id="select-all" onclick="select_all()">Select All</button>
    <button class="w-100 btn btn-secondary mt-3" id="deselect-all" onclick="deselect_all()" style="display: none;">UnSelect All</button>
</div>


<!-- Add Employee Modal -->
<div id="add_group" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Channel Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('channel.group.store')}}">
                    @csrf
                    <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hide_category" value="1" id="hide_category">
                                <label for="hide_category">Hide in M3U output</label>
                            </div>
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
<div id="create_channel" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Channel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('channel.store')}}">
                    @csrf
                    <input type="hidden" name="group_id" id="gid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="title">URL</label>
                                <input type="text" class="form-control title" name="url" required>
                            </div>
                            <div class="form-group">
                                <label for="title">TVG ID</label>
                                <input type="text" class="form-control title" name="tvg_id" required>
                            </div>
                            <div class="form-group">
                                <label for="title">TVG Name</label>
                                <input type="text" class="form-control title" name="tvg_name" required>
                            </div>
                            <div class="form-group">
                                <label for="title">TVG Channel Number</label>
                                <input type="text" class="form-control title" name="tvg_number" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Logo</label>
                                <input type="text" class="form-control title" name="logo" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Logo Small</label>
                                <input type="text" class="form-control title" name="logo_small" >
                            </div>
                            <div class="form-group">
                                <label for="title">Audio Track</label>
                                <input type="text" class="form-control title" name="audio_track" >
                            </div>
                            <input type="text" name="pidForStoringManuallChannels" value="{{$playlist->id}}" id="pidForStoringManuallChannels">
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

<div id="edit_channel" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Channel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('channel.update')}}">
                    @csrf
                    <input type="hidden" name="id" id="cid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control title" name="title" id="_title" required>
                            </div>
                            <div class="form-group">
                                <label for="title">URL</label>
                                <input type="text" class="form-control title" name="url" id="_url" required>
                            </div>
                            <div class="form-group">
                                <label for="title">TVG ID</label>
                                <input type="text" class="form-control title" name="tvg_id" id="_tvg_id" required>
                            </div>
                            <div class="form-group">
                                <label for="title">TVG Name</label>
                                <input type="text" class="form-control title" name="tvg_name" id="_tvg_name" required>
                            </div>
                            <div class="form-group">
                                <label for="title">TVG Channel Number</label>
                                <input type="text" class="form-control title" name="tvg_number" id="_tvg_number" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Logo</label>
                                <input type="text" class="form-control title" name="logo" id="_logo" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Logo Small</label>
                                <input type="text" class="form-control title" name="logo_small" id="_logo_small" >
                            </div>
                            <div class="form-group">
                                <label for="title">Audio Track</label>
                                <input type="text" class="form-control title" name="audio_track" id="_audio_track" >
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="delete_channel" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Channel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('channel.delete')}}">
                    @csrf
                    <input type="hidden" name="id" id="_cid">
                    <div class="submit-section">
                        <button type="button" data-dismiss="modal" class="btn btn-primary submit-btn">Cancel</button>
                        <button class="btn btn-primary submit-btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="manage_group" class="modal custom-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Groups</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="w-100 text-right mb-2">
                    <button class="btn btn-success " onclick="window.location.reload()">save changes</button>
                    <button class="btn btn-danger delete-group" style="display: none;">Delete</button>

                    <button class="btn btn-secondary select-group" onclick="select_all_group()">Select All</button>
                    <button class="btn btn-secondary unselect-group" style="display: none;" onclick="unselect_all_group()">Unselect All</button>
                </div>
                <ul class="list-group w-100" id="list-groups">
                    @foreach (DB::table('channel_groups')->where('playlist_id','=',$playlist->id)->orderByRaw('CONVERT(no, SIGNED) asc')->get() as $grp)
                        <li class="list-group-item lig" data-groupid="{{$grp->id}}" data-groupno="{{$grp->no}}">
                            <span class="float-left" style="width: 8%;"><i class="fa fa-bars"></i></span>
                            <span class="w-50 float-left">{{$grp->title}}</span>
                            <span class="w-25 float-right text-right">
                                                <input type="checkbox" class="custom-group-checkbox" value="{{$grp->id}}" style="width: 18px; height: 18px; border-radius: 0px !important;">
                                            </span>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->


<!-- Delete Employee Modal -->
<div class="modal custom-modal" id="import_channel" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Import from M3U</h3><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         x
        </button>
                    <form id="import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-1">
                                    <select name="import_type" id="import_type" class="form-control">
                                        <option value="1">Import from M3U URL</option>
                                        <option value="2">Import from file upload</option>
                                    </select>
                                </div>
                                <input type="text" id="playId" name="playId" hidden value="{{$playlist->id}}">
                                <div class="form-group text-left" id="import_from_url">
                                    <label for="url">M3U URL</label>
                                    <input type="url" class="form-control" id="url" name="url" placeholder="http://">
                                </div>
                                @php
                                    if($_SESSION['userLogined']->Paid=='inactive'){
                                       $getDailySyncValue=DB::table('admin')->first();
                                       $getDailySyncVal=$getDailySyncValue->dailysync;
                                   }
                                   else{
                                       $getCardNo=$_SESSION['userLogined']->cardNo;
                                       $getFullCard=DB::table('subscription')->where('id',$getCardNo)->first();
                                       $getDailySyncVal=$getFullCard->Dailysyncforupdates;

                                   }@endphp
                                @if($getDailySyncVal=='Yes')
                                <div class="form-group text-left" id="urlSyncDiv">
                                    <input type="checkbox" class="mr-1"  onclick="if($(this).is(':checked'))$(this).val(1); else $(this).val(0);" id="urlSync" name="urlSync"><label
                                        for="urlSync"> Enable Sync For Updates</label>
                                </div>

                                <div class="form-group text-left" id="freDiv" name="freDiv">
                                    <label for="fre">Sync frequency</label>
                                    @if($_SESSION['userLogined']->Paid=='active')
                                    <select name="fre" id="fre" class="form-control">
                                        <option value="1">Every hour</option>
                                        <option value="2">Every 2 hours</option>
                                        <!-- <option value="6">Every 6 hours</option>
                                        <option value="8">Every 8 hours</option> -->
                                        <option value="12">Every 12 hours</option>
                                        <option selected value="24">Every 24 hours</option>
                                        <!-- <option value="48">Every 48 hours</option> -->
                                    </select>
                                    @else
                                        <select name="fre" id="fre" class="form-control">
                                            <option disabled value="1">Every hour(Pro Plus)</option>
                                            <option disabled value="2">Every 2 hours(Pro Plus)</option>
                                            <!-- <option disabled value="6">Every 6 hours(Pro Plus)</option>
                                            <option disabled value="8">Every 8 hours(Pro Plus)</option> -->
                                            <option value="12">Every 12 hours</option>
                                            <option selected value="24">Every 24 hours</option>
                                            <!-- <option value="48">Every 48 hours</option> -->
                                        </select>
                                     @endif
                                </div>
                                @endif
                                <div class="form-group t    ext-left" id="upload_m3u" style="display: none;">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                </div>

                                <div  style="display: none; " id="loader" class="mb-1 ">
                                    <img src="{{url('public/images/244.gif')}}"   class="mb-1 " alt="">
                                </div>

                                <button type="submit" class="btn btn-primary continue-btn float-right">Submit</button>
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
<div class="modal custom-modal" id="import_modal" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Select Channel Groups</h3><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         x
        </button>
                    <label for="checkALLChannels">Select All</label>
                     <input type="checkbox" onclick="checkALLChannels()" id="checkALLChannels">
                    <hr>
                    <form id="import_groups"  method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="import_groups"></div>
                                <br><br>
                                <button type="submit"  class="btn btn-primary continue-btn float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="modal-title" style="font-family: 'Quicksand';" id="exampleModalLongTitle">importing playlist please wait</h3>

      </div>
      <br>
      <div class="modal-body">
  <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" id="myBar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
</div>
  <br>
  <br>
</div>
      </div>


    </div>
  </div>
</div>
<script>

$('#import_groups').on('submit',function(e){
    e.preventDefault();
    $('#import_modal').modal('hide');
    $('#exampleModalCenter').modal('show');
    var i = 0;
            var elem = document.getElementById("myBar");
    $.ajax({
        url:'{{route("channels.store")}}',
        data:$('#import_groups').serialize(),
        method:'POST',
        beforeSend:function(){
           //$('body').on('click','false');
            if (i == 0) {
                        i = 1;
                        var width = 1;
                        var ide = setInterval(frame, 1);
                        function frame() {
                            if (width >= 30) {
                                clearInterval(ide);
                                i = 0;
                            } else {
                                width++;
                                elem.style.width = width + "%";
                            }
                        }
                    }
        },
        success:function(response){
            //toastr.success(''+response+'');
            setTimeout(() => {window.location.reload();  }, 2000);


        },
        complete:function(){

            width = 30;
                         ide = setInterval(frame, 1);
                        function frame() {
                            if (width >= 100) {
                                clearInterval(ide);
                                i = 0;
                            } else {
                                width++;
                                elem.style.width = width + "%";
                            }
                        }

        },
        error:function(){
            $('#exampleModalCenter').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $('#import_modal').modal('show');

                        setTimeout(() => {  toastr.error("import error ! No group Selected");  }, 1000);

        }
    });
})
</script>
<!-- /Delete Employee Modal -->
<!-- Delete Employee Modal -->
<div class="modal custom-modal" id="move_copy_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Bulk move or copy channels</h3><br>
                    <form id="move_copy" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <input type="radio" name="bulk_action" id="move" checked="checked" value="move">
                                    <label for="move" class="mr-2">Move</label>
                                    <input type="radio" name="bulk_action" id="copy" value="copy">
                                    <label for="copy">Copy</label>
                                </div>

                                <div class="form-group text-left">
                                    <label for="_playlist">Playlist</label>
                                    <select class="form-control" id="_playlist" onchange="update_groups();" required>
                                        @foreach (App\Playlist::where('created_by','=',$_SESSION['userLogined']->id)->get() as $list)
                                            <option value="{{$list->id}}">{{$list->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-left">
                                    <label for="_group">Channel Group</label>
                                    <select class="form-control" id="_group" required>
                                        @php
                                            $plist = App\Playlist::where('created_by','=',$_SESSION['userLogined']->id)->first()
                                        @endphp
                                        @foreach (DB::table('channel_groups')->where('playlist_id',$plist->id)->get() as $gp)
                                            <option value="{{$gp->id}}">{{$gp->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary continue-btn float-right">Submit</button>
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
<div class="modal custom-modal" id="edit_group" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Channel Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('channel.group.update')}}">
                    @csrf
                    <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="hidden" id="g_id" name="g_id">
                                <input type="text" id="g_title" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hide_category" value="1" id="hide_category">
                                <label for="hide_category">Hide in M3U output</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Employee Modal -->
<div class="modal custom-modal" id="delete_group" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Channel Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('channel.group.delete')}}">
                    @csrf
                    <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" id="dg_id" name="g_id">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="button" data-dismiss="modal" class="btn btn-primary submit-btn">Cancel</button>
                        <button type="submit" class="btn btn-primary submit-btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal custom-modal" id="move_position" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Move Channel to Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="move_position_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                </div>
                                <input
                                    type="number"
                                    class="form-control"
                                    aria-label="Username"
                                    aria-describedby="basic-addon1"
                                    id="curpos"
                                    min="1"
                                    step="1"
                                    required
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3 text-center">
                            <small class="bg-white">Current Position: <span class="curr_pos"></span></small>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Move</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal custom-modal" id="search_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Channel search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="search_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="search">Search Query</label>
                                <input type="text" class="form-control" id="search" name="search">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    $('#url').text(window.location.href+'/'+'@php echo rand(1000,100000).'-abc'.rand(1,100000); @endphp');
</script> --}}

<style>
    .list-group-item:hover{
        cursor: move;
    }
</style>

<script>
    function show_add_channel_modal(){
        $('#create_channel').modal('show');
        var $group_id = $('.groups').val();
        $('#gid').val($group_id);

    }
    function show_modal(id)
    {
        $.ajax({
            url: "{{route('playlist.get')}}",
            method: "POST",
            data: {_token:"{{csrf_token()}}" , id:id},
            dataType: "JSON",
            success: function(response)
            {
                $('#id').val(id);
                $('.title').val(response.title);

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

                $('#edit_playlist').modal('show');
            }
        });
    }

    function show_delete_modal(){
        var group_id = $('.groups').val();
        $('#dg_id').val(group_id);
        $('#delete_group').modal('show');
    }

    function show_edit_modal(){
        var group_id = $('.groups').val();
        $.ajax({
            url: "{{route('channel.group.edit')}}",
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                group_id:group_id
            },
            dataType: "JSON",
            success: function(response){
                $('#g_id').val(response.id);
                $('#g_title').val(response.title);
            },
            complete: function() {
                $('#edit_group').modal('show');
            }
        });
    }

    function edit_channel(id){
        $.ajax({
            url: "{{route('channel.get_single')}}",
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                id:id
            },
            dataType: "JSON",
            success: function(response){
                $('#cid').val(id);
                $('#_title').val(response.title);
                $('#_url').val(response.url);
                $('#_tvg_id').val(response.tvg_id);
                $('#_tvg_name').val(response.tvg_name);
                $('#_tvg_number').val(response.tvg_channel_number);
                $('#_logo').val(response.logo);
                $('#_logo_small').val(response.logo_small);
                $('#_audio_track').val(response.autdio_track);
            },
            complete: function() {
                $('#edit_channel').modal('show');
            }
        });
    }
    function delete_channel(id){
        $('#_cid').val(id);
        $('#delete_channel').modal('show');
    }
</script>

<script>
    // let temp=$("#channels");
    // $(window).width()<900?temp.sortable("enable"):"";
        $(window).resize(function() {
            if ($(window).width() < 720) {
                $("#channels").sortable("disable");
            }
            else {
                $("#channels").sortable("enable");
            }
        });

    $(document).on('click','.move_position',function(){
        var id = $(this).attr('data-id');
        var no = $(this).attr('data-no');
        var ind = $('#li-'+id).index() + 1;
        $('#curpos').attr('data-in',ind);
        $('#curpos').attr('data-id',id);
        $('#curpos').attr('data-no',no);
        $('.curr_pos').text(ind);
        $('#move_position').modal('show');
    });
    $(document).ready(function(){
        $("#channels").sortable({
            update: function(e, u){
                var order = [];
                $(".li").each(function(index,element) {
                    order.push({
                        id: $(this).attr('item-id'),
                        no: $(this).attr('item-no'),
                        pos: index+1
                    });
                });
                $.ajax({
                    url: "{{ route('channel.sort') }}",
                    type: 'post',
                    data: {
                        _token: "{{csrf_token()}}",
                        data:order
                    },
                    success: function (result) {
                        if(result == "success"){
                            toastr.success('Channel position changed successfully');
                        }
                        else
                        {
                            toastr.error('Something went wrong');
                        }
                    },
                    complete: function () {

                    }
                });
            }
        }).disableSelection();

        $("#list-groups").sortable({
            update: function(e, u){
                var order = [];
                $(".lig").each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-groupid'),
                        no: $(this).attr('data-groupno'),
                        pos: index+1
                    });
                });
                $.ajax({
                    url: "{{ route('channel.group.sort') }}",
                    type: 'post',
                    data: {
                        _token: "{{csrf_token()}}",
                        data:order
                    },
                    success: function (result) {
                        if(result == "success"){
                            toastr.success('Group position changed successfully');
                          //  window.location.reload();
                        }
                        else
                        {
                            toastr.error('Something went wrong');
                        }
                    },
                    complete: function () {

                    }
                });
            }
        }).disableSelection();
    });

    function update_groups(){
        var pid = $('#_playlist').val();
        $.ajax({
            url: "{{ route('playlist.get.groups') }}",
            type: 'post',
            data: {
                _token: "{{csrf_token()}}",
                id:pid
            },
            dataType: "json",
            success: function (result) {
                var groups = "";
                for(var i=0; i<result.length; i++)
                {
                    groups += `<option value="${result[i].id}">${result[i].title}</option>`;
                }
                $('#_group').html(groups);
            }
        });
    }

    function update_number(){
        var len = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
        $('.total-selected').text("("+len+")");
    }

    $(document).on('change','.custom-checkbox',function(){
        var len = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
        $('.total-selected').text("("+len+")");
        if($(this).is(':checked')){
            if(!$('.bulk-action').hasClass('show')){
                $('.bulk-action').addClass('show');
                $('.bulk-action').fadeIn();
                return;
            }
        }
        if(len < 1)
        {
            $('.bulk-action').removeClass('show');
            $('.bulk-action').hide();
        }
    });

    function select_all(){
        $('#select-all').hide();
        $('#deselect-all').show();
        $('#channels .list-group-item :checkbox').prop('checked', true);
        $("#channels .list-group-item").find("input[type=checkbox]").attr('checked','true');
        update_number();
    }

    function select_all_group(){
        $('.select-group').hide();
        $('.unselect-group').show();
        $('.delete-group').show();
        $('.lig span :checkbox').prop('checked', true);
        $(".lig span").find("input[type=checkbox]").attr('checked','true');
    }

    function unselect_all_group(){
        $('.select-group').show();
        $('.unselect-group').hide();
        $('.delete-group').hide();
        $('.lig span :checkbox').prop('checked', false);
        $(".lig span").find("input[type=checkbox]").attr('checked','false');
    }

    function deselect_all(){
        $('#select-all').show();
        $('#deselect-all').hide();
        $('#channels .list-group-item :checkbox').prop('checked', false).removeAttr('checked');
        var len = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
        $('.bulk-action').removeClass('show');
        $('.bulk-action').hide();
        update_number();
    }

    $('.custom-group-checkbox').on('change',function(){
        var total = $(".lig span").find(".custom-group-checkbox").length;
        var total_checked = $(".lig span").find(".custom-group-checkbox:checked").length;
        if(total_checked > 0){
            $('.delete-group').show();
        }else{
            $('.delete-group').hide();
        }
        if(total == total_checked){
            $('.select-group').hide();
            $('.unselect-group').show();
        }
        else
        {
            $('.select-group').show();
            $('.unselect-group').hide();
        }
    });

    $(document).on('change','.custom-checkbox',function(){
        var total_channel = $("#channels .list-group-item").find(".custom-checkbox").length;
        var total_selected_channel = $("#channels .list-group-item").find(".custom-checkbox:checked").length;
        if(total_channel == total_selected_channel){
            $('#select-all').hide();
            $('#deselect-all').show();
        }
        else
        {
            $('#select-all').show();
            $('#deselect-all').hide();
        }
    })


    $(document).ready(function(){
        validate();
        function validate(){
            var groups = $('.groups').val();
            if(groups.length == 0)
            {
                $('.create-channel').attr('disabled','disabled');
                $('.di').hide();
            }
            else
            {
                $('.create-channel').removeAttr('disabled');
                $('.di').show();
                fetch_channels();
            }
        }

        $('.groups').on('change',function(){
            validate();
        })

        function fetch_channels()
        {
            $.ajax({
                url: "{{route('channel.get')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    id: $('.groups').val(),
                    pid:'{{$playlist->id}}'
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
                        <li class="list-group-item px-3 li mb-2" id="li-${response[i].id}" item-id="${response[i].id}" item-no="${response[i].no}">
                            <input type="checkbox" class="custom-checkbox" name="channels[]" value="${response[i].id}">
                            <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <img src="${logo}" style="max-height: 70px;max-width: 70px;">
                                            </div>
                                            <div class="col-sm-3" >
                                                ${response[i].title}
                                            </div>
                                            <div class="col-sm-6" style="max-height: 50px; justify-content: center; align-items: center; overflow-wrap: break-word; word-wrap: break-word; word-break: normal; line-break: strict; hyphens: none;">
                                                ${response[i].url}
                                            </div>
                                            <div class="btn-group btn-group-sm mt-3 col-sm-2" role="group" style="max-height: 50px;  align-items: center;">
                               <button type="button"  class="btn btn-secondary " onclick="edit_channel(${response[i].id})"><i class="fa fa-pencil-alt"></i></button>
                               <button type="button"  class="btn btn-success move_position " data-id="${response[i].id}" data-no="${response[i].no}">#</button>
                              <button type="button"  class="btn btn-secondary "  onclick="delete_channel(${response[i].id})"><i class="fa fa-trash"></i></button></div>

                                        </div>
                            </div>
                        </li>
                        `;
                    }
                    $('#channels').html(channels);
                    var channels = "";
                },
            //     <div class="col-2" style="max-height: 50px; display: flex; align-items: center;">
            // <button class="btn btn-sm btn-success text-white mr-1" onclick="edit_channel(${response[i].id})">
            // <i class="fa fa-pencil-alt"></i>
            // </button>
            // <button class="btn btn-sm btn-secondary text-white mr-1 move_position" data-id="${response[i].id}" data-no="${response[i].no}">
            //
            // </button>
            // <button class="btn btn-sm btn-danger" onclick="delete_channel(${response[i].id})">
            // <i class="fa fa-trash"></i>
            // </button>
            // </div>
                error: function(){
                    fetch_channels();
                },
                complete: function(){
                    $('.bulk-action').removeClass('show');
                    $('.bulk-action').hide();
                }
            });
        }

        $('#move_position_form').on('submit',function(e){
            e.preventDefault();
            var index = $('#curpos').attr('data-in');
            var id = $('#curpos').attr('data-id');
            var no = $('#curpos').attr('data-no');
            var pos = $('#curpos').val();
            var nid = $('.li').eq(pos-1).attr('item-id');
            var nno = $('.li').eq(pos-1).attr('item-no');
            $.ajax({
                url: "{{route('channel.move.position')}}",
                method: "POST",
                data: {
                    _token:"{{csrf_token()}}",
                    id:id,
                    no:no,
                    pos:pos,
                    gid:$('.groups').val(),
                    nid:nid,
                    nno:nno,
                },
                dataType: "JSON",
                success: function(response)
                {
                    if(response.status == "success"){
                        $('#move_position').modal('hide');
                    }
                },
                complete: function(){
                    toastr.success('Channels Moved successfully');
                    fetch_channels();
                }
            });
        });

        $('.delete_selected').on('click',function(){
            var selected_channels = [];
            $(".custom-checkbox:checked").each(function(index,element) {
                selected_channels.push({
                    id: $(this).val(),
                });
            });
            $.ajax({
                url: "{{route('channel.bulk.delete')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    ids: selected_channels
                },
                dataType: "JSON",
                success: function(response){
                    if(response.status == "success"){
                        toastr.success('Channels deleted successfully');
                        window.location.reload();
                      //  fetch_channels();
                    }
                }
            });
        });

        $('.delete-group').on('click',function(){
            var selected_groups = [];
            $(".custom-group-checkbox:checked").each(function(index,element) {
                selected_groups.push({
                    id: $(this).val(),
                });
            });
            $.ajax({
                url: "{{route('group.bulk.delete')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    ids: selected_groups
                },
                success: function(response){
                    if(response == "success"){
                        toastr.success('Group deleted successfully');
                        setTimeout(function(){
                            window.location.reload();
                        },1000);
                    }
                }
            });
        });

        $('#move_copy').on('submit',function(e){
            e.preventDefault();
            var gid = $('#_group').val();
            var action = $('input[name=bulk_action]:checked').val();
            var selected_channels = [];
            $(".custom-checkbox:checked").each(function(index,element) {
                selected_channels.push({
                    id: $(this).val(),
                });
            });

            $.ajax({
                url: "{{route('channel.bulk.move_copy')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    ids: selected_channels,
                    gid:gid,
                    action:action,
                    pid:$('#_playlist').val()
                },
                dataType: "JSON",
                success: function(response){
                    if(response.status == "success"){
                        $('#move_copy_modal').modal('hide');
                        toastr.success('Channels updated successfully');
                        fetch_channels();
                    }
                },
                error:function(){
                    toastr.error('The Targeted Playlist has reached Max channels limit');
                    $('#move_copy_modal').modal('hide');
                    fetch_channels();
                }
            });
        });

        $(document).on('submit','#search_form',function(event){
            event.preventDefault();
            var group_id = $('.groups').val();
            var playlist_id = "{{$playlist->id}}";
            var search = $('#search').val();
            $.ajax({
                url: "{{route('channel.search')}}",
                method: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    group_id:group_id,
                    playlist_id:playlist_id,
                    search:search
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
                        <li class="list-group-item px-3 li mb-2" id="li-${response[i].id}" item-id="${response[i].id}" item-no="${response[i].no}">
                            <input type="checkbox" class="custom-checkbox" name="channels[]" value="${response[i].id}">
                            <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-1">
                                                <img src="${logo}" style="max-height: 50px;">
                                            </div>
                                            <div class="col-3" style="max-height: 50px; display: flex; justify-content: center; align-items: center;">
                                                ${response[i].title}
                                            </div>
                                            <div class="col-6" style="max-height: 50px; justify-content: center; align-items: center; overflow-wrap: break-word; word-wrap: break-word; word-break: normal; line-break: strict; hyphens: none;">
                                                ${response[i].url}
                                            </div>
                                            <div class="col-2" style="max-height: 50px; display: flex; align-items: center;">
                                                <button class="btn btn-sm btn-warning text-white mr-1" onclick="edit_channel(${response[i].id})">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-sm btn-secondary text-white mr-1 move_position" data-id="${response[i].id}" data-no="${response[i].no}">
                                                    #
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="delete_channel(${response[i].id})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                            </div>
                        </li>
                        `;
                    }
                    $('#channels').html(channels);
                    var channels = "";
                },
                complete: function(){
                    $('#search-filter').show();
                    $('#search_modal').modal('hide');
                }
            });
        });

        $(document).on('click','#search-filter-button',function(){
            $('#search-filter').hide();
            fetch_channels();
        });

    })

    $(document).on('change','#import_type',function(){
        if($(this).val() == 1) {
            $('#import_from_url').show();
            $('#upload_m3u').hide();
            $('#urlSyncDiv').show();
            $('#freDiv').show();
        }
        else if($(this).val() == 2)
        {
            $('#import_from_url').hide();
            $('#upload_m3u').show();
            $('#urlSyncDiv').hide();
            $('#freDiv').hide();
        }
    });

    $(document).on('submit','#import',function(e){
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "{{route('channel.parse_m3u')}}",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,

            dataType: "JSON",
            beforeSend: function(response) {
                $('#loader').show();
                $("input").prop("disabled", true);
                $('select').prop("disabled", true);
                //toastr.warning('Please wait . data is being encrypted');
            },
            success: function(response){
                var _channels = "";
                for(var i = 0; i < response.length; i++)
                {
                    _channels += `
                        <div class="text-left">
                            <input type="checkbox"  name="groups[]" value="${response[i].id}" id="group-${i+1}">
                            <label for="group-${i+1}">${response[i].group_title}</label>
                        </div>
                    `;
                }
                $('#import_channel').modal('hide');
                $('#import_modal').modal('show');
                $('.import_groups').html(_channels);

            },
            complete: function() {
                $('#loader').hide();
                $("input").prop("disabled", false);
                $('select').prop("disabled", false);
            },
            error:function(){
               toastr.error('URL not working');
            }
        });
    });
    function checkALLChannels() {
        $('#checkALLChannels').is(":checked")?
            $('input:checkbox[id*=group]').prop('checked','true'):
            $('input:checkbox[id*=group]').prop('checked',false);

    }

</script>
@if(session()->get('indexP'))
        <script>$('#callimportModel').click();</script>
    @endif
{{--<configuration>--}}
{{--    <system.webServer>--}}
{{--        <rewrite>--}}
{{--            <rules>--}}
{{--                <rule name="Imported Rule 1" stopProcessing="true">--}}
{{--                    <match url="^(.*)/$" ignoreCase="false" />--}}
{{--                    <conditions>--}}
{{--                        <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" negate="true" />--}}
{{--                    </conditions>--}}
{{--                    <action type="Redirect" redirectType="Permanent" url="/{R:1}" />--}}
{{--                </rule>--}}
{{--                <rule name="Imported Rule 2" stopProcessing="true">--}}
{{--                    <match url="^" ignoreCase="false" />--}}
{{--                    <conditions>--}}
{{--                        <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" negate="true" />--}}
{{--                        <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />--}}
{{--                    </conditions>--}}
{{--                    <action type="Rewrite" url="index.php" />--}}
{{--                </rule>--}}
{{--            </rules>--}}
{{--        </rewrite>--}}
{{--    </system.webServer>--}}
{{--</configuration>--}}
@else
    Playlist does not exist!
@endif
