@include('admin.headTag')
@include('admin.header')
@include('admin.sidebar')
<div class="page-wrapper">
    <div class="content container-fluid">
        <label for="trailDays">Set Trail Period</label>
        <div class="input-group mb-3">

            <input value="@php $getTrail=\Illuminate\Support\Facades\DB::table('admin')->first();echo $getTrail->trailDays; @endphp" type="text" class="form-control col-4" id="trailDays"  aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Days &nbsp;&nbsp;<i class="fas fa-check text-success "  id="errmsg" style="font-size: 20px"></i></span>
            </div>
        </div>
        <br>
        <label for="trailDays">Set Playlist Limit For Trail Users</label>
        <div class="input-group mb-3">

            <input value="@php echo $getTrail->trailPlaylists; @endphp" type="text" class="form-control col-4" id="trailPlaylists"  aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Playlists &nbsp;&nbsp;<i class="fas fa-check text-success "  id="errmsg1" style="font-size: 20px"></i></span>
            </div>
        </div>


        <br>
        <label for="trailDays">Set Channels Limit For Trail Users</label>
        <div class="input-group mb-3">

            <input value="@php echo $getTrail->Trailchannels; @endphp" type="text" class="form-control col-4" id="trailChannels"  aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Channels &nbsp;&nbsp;<i class="fas fa-check text-success "  id="errmsg2" style="font-size: 20px"></i></span>
            </div>
        </div>
        <br>
        <label for="trailDays">Daily sync for updates:</label>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon2"><a href="javascript:void(0)" class="text-dark" onclick="dailysync(1)">Yes</a> &nbsp;&nbsp;@php if($getTrail->dailysync=='Yes') echo  '<i class="fas fa-check text-success " id="errmsg3" style="font-size: 20px"></i>'@endphp<i class="fas fa-check text-success " id="errmsg5" style="font-size: 20px"></i></span>
        <span class="input-group-text" id="basic-addon2"><a href="javascript:void(0)" class="text-dark" onclick="dailysync(0)">No</a> &nbsp;&nbsp;@php if($getTrail->dailysync=='No') echo  '<i class="fas fa-check text-success " id="errmsg4" style="font-size: 20px"></i>'@endphp<i class="fas fa-check text-success " id="errmsg6" style="font-size: 20px"></i></span>
            
        </div>
        <br>
        <label for="trailDays">Download-URL customization :</label>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon2"><a href="javascript:void(0)" class="text-dark" onclick="dailysync(2)">Yes</a> &nbsp;&nbsp;@php if($getTrail->DownloadURLcustomization=='Yes') echo  '<i class="fas fa-check text-success " id="errmsg9" style="font-size: 20px"></i>'@endphp<i class="fas fa-check text-success " id="errmsg7" style="font-size: 20px"></i></span>
        <span class="input-group-text" id="basic-addon2"><a href="javascript:void(0)" class="text-dark" onclick="dailysync(3)">No</a> &nbsp;&nbsp;@php if($getTrail->DownloadURLcustomization=='No') echo  '<i class="fas fa-check text-success " id="errmsg0" style="font-size: 20px"></i>'@endphp<i class="fas fa-check text-success " id="errmsg8" style="font-size: 20px"></i></span>
            
        </div>
    </div>
</div>
<script>
    $("#errmsg").hide();$("#errmsg1").hide();$("#errmsg2").hide();$("#errmsg5").hide(); $("#errmsg6").hide();$("#errmsg7").hide(); $("#errmsg8").hide();
    
    $("input").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // $("#errmsg").html("Updated").show().fadeOut("slow");

            return false;
        }


    });
    $( "#trailDays" ).keyup(function(e) {
        $("#errmsg").hide();
        $.ajax({
            url:'{{url('admin/setTrail')}}',
            data:{trailDays:$('#trailDays').val(),_token:"{{csrf_token()}}"},
            method:"POST",
            success:function(){
                setTimeout(() => { $("#errmsg").show(); }, 2000);
            },
            error:function () {
                toastr.error('error');
            }
        })
    });
    $( "#trailPlaylists" ).keyup(function(e) {
        $("#errmsg1").hide();
        $.ajax({
            url:'{{url('admin/setTrailPlaylist')}}',
            data:{trailPlaylists:$('#trailPlaylists').val(),_token:"{{csrf_token()}}"},
            method:"POST",
            success:function(){
                setTimeout(() => { $("#errmsg1").show(); }, 2000);
            },
            error:function () {
                toastr.error('error');
            }
        })
    });
    $( "#trailChannels" ).keyup(function(e) {
        $("#errmsg2").hide();
        $.ajax({
            url:'{{url('admin/setTrailChannels')}}',
            data:{trailChannels:$('#trailChannels').val(),_token:"{{csrf_token()}}"},
            method:"POST",
            success:function(){
                setTimeout(() => { $("#errmsg2").show(); }, 2000);
            },
            error:function () {
                toastr.error('error');
            }
        })
    });

    function dailysync(index){
        if(index<2){
        $("#errmsg3").hide(); $("#errmsg4").hide();}
        else{ $("#errmsg9").hide(); $("#errmsg0").hide();}
        $.ajax({
            url:'{{url('admin/dailysync')}}',
            data:{dailysync:index,_token:"{{csrf_token()}}"},
            method:"POST",
            success:function(){
               if(index===1){
                $("#errmsg5").show();$("#errmsg6").hide(); 
               }
               else if(index===0){
                $("#errmsg5").hide();$("#errmsg6").show(); 
               }
               else if(index===2){
                $("#errmsg8").hide();$("#errmsg7").show(); 
               }
               else if(index===3){
                $("#errmsg7").hide();$("#errmsg8").show(); 
               }
                
            },
            error:function () {
                toastr.error('error');
            }
        })
    }


</script>
