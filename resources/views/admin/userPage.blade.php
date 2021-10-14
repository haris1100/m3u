@include('admin.headTag')
@include('admin.header')
@include('admin.sidebar')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class=" col-lg-12">

                <a href="{{url('admin/exportCsv')}}" class="btn btn-light text-success border-success mb-2 " style="border-width: 3px" >Export CSV</a>


                <div style="overflow-x:auto;">

                    <table class="table  table-warning custom-table mb-0 table-bordered "  id="usersTableID">
                        <thead>
                        <tr>
                            <th style="width: 30px;">#</th>

                            <th style="text-align: center">Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Creation Date</th>
                            <th>Email Verified</th>
                            <th>Subscription</th>
                            <th>Subscription Type</th>
                            <th>date Of Membership</th>
                            <th>Membership Ends in</th>
                            <th>Amount</th>
                            <th>No. of Playlists</th>
                            <th>Connect As User</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Designation Modal -->
<div id="add_designation" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="designationForm">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label>User Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="addOrEditDesignationId" hidden>
                        <input class="form-control" type="text" id="designationName" name="designationName">
                    </div>
                    <div class="form-group">
                        <label>User Email <span class="text-danger">*</span></label>
                        <input class="form-control " type="text" id="editEmail">
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control " type="text" id="editPass">
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /EDIT Modal -->
<div id="countPlaylists" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style='font-family: Arial, Helvetica, sans-serif' class="modal-title">My Playlists</h1>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h4 style='font-family: Arial, Helvetica, sans-serif;font-size: 25px' id="username"></h4><br>
                <h4 style='font-family: Arial, Helvetica, sans-serif;font-size: 15px' id="emailPlay"></h4><br>
                <h4 style='font-family: Arial, Helvetica, sans-serif' id="noOfPlaylists"></h4><br>
                <h4 style='font-family: Arial, Helvetica, sans-serif' id="playlistsTitles"></h4>
            </div>

        </div>
    </div>
</div>
<script>



    reload();
    $.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });


    function reload(){
        $.ajax({
            url:'{{url("admin/users")}}',
            method:'GET',
            success:function (response) {
                var tableHeaderRowCount = 1;
                var table = document.getElementById('usersTableID');
                var rowCount = table.rows.length;
                for (var i = tableHeaderRowCount; i < rowCount; i++) {
                    table.deleteRow(tableHeaderRowCount);
                }
                for(var i=0; i<response.length; i++){
                    var dom=response[i]['dateOfMembership']!=='Null'?response[i]['dateOfMembership']:'';
                    var mei=response[i]['membershipEndsIn']!=='Null'?response[i]['membershipEndsIn']:'';
                    var name=response[i]['name'];
                    var subType="";
                   if(response[i]['SubscriptionType']==='monthly'){
                        subType="<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"...\">\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",0)\" class=\"btn btn-secondary\">T</button>\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",1)\" class=\"btn btn-success\">M</button>\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",2)\" class=\"btn btn-secondary\">Y</button></div>";
                   }
                   else if(response[i]['SubscriptionType']==='yearly'){
                       subType="<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"...\">\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",0)\" class=\"btn btn-secondary\">T</button>\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",1)\" class=\"btn btn-secondary\">M</button>\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",2)\" class=\"btn btn-success\">Y</button></div>";
                   }
                   else{
                       subType="<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"...\">\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",0)\" class=\"btn btn-success\">T</button>\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",1)\" class=\"btn btn-secondary\">M</button>\n" +
                           "    <button type=\"button\" onclick=\"setSubType("+response[i]['id']+",2)\" class=\"btn btn-secondary\">Y</button></div>";
                   }
                    let EV=response[i]['emailVerified'];
                    EV==='No'?EV='':EV='checked';
                    let paid=response[i]['Paid']==='active'?'checked':'';
                    var tr_str = "<tr>" +
                        "<td>" + (i+1) + "</td>" +

                        "<td>"+response[i]['name']+"</td>"+
                        "<td ><b>"+response[i]['email']+"</b></td>"+
                        "<td><p  id='pass"+response[i]['id']+"'>"+response[i]['password']+"</p></td>"+
                        "<td >"+response[i]['subscriptionTime']+"</td>"+
                        "<td ><div class='custom-control custom-switch'>"+
                        "<input type=\"checkbox\" id=\""+response[i]['id']+"\" class=\"custom-control-input\" onclick=\" EmailVerificationCheckBox("+response[i]['id']+")\" "+EV+">"+
                        "<label class=\"custom-control-label\" for=\""+response[i]['id']+"\"></label>"+
                        ' </div></td>'+
                        "<td ><div class='custom-control custom-switch'>"+
                        "<input type=\"checkbox\" id=\"paid"+response[i]['id']+"\" class=\"custom-control-input\" onclick=\" PaidCheckBox("+response[i]['id']+")\" "+paid+">"+
                        "<label class=\"custom-control-label\" for=\"paid"+response[i]['id']+"\"></label>"+
                        ' </div></td>'+
                        "<td>"+subType+"</td>"+
                        "<td >"+dom+"</td>"+
                        "<td >"+mei+"</td>"+

                        "<td >"+response[i]['Amount']+" $</td>"+
                        "<td style='text-align: center'><a class='btn btn-light' href=\"#\" data-toggle=\"modal\" onclick=\" countPlaylists("+response[i]['id']+")\" data-target=\"#countPlaylists\">count</a></td>"+
                        "<td><a class='btn btn-outline-info' href=\"connectAsUser/"+response[i]['email']+"\">Connect</a></td>"+

                        "<td class=\"text-right\">\n" +
                        "<div class=\"dropdown dropdown-action\">\n" +
                        "<a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-pencil-alt\"></i></a>\n" +
                        "<div class=\"dropdown-menu dropdown-menu-right\">\n" +
                        "<a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" onclick=\" setValOfIdForModifyLeave("+response[i]['id']+")\" data-target=\"#add_designation\"> Edit</a>\n" +
                        "<a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" onclick=\"setValForDeleteUser("+response[i]['id']+")\" data-target=\"#delete_region\"> Delete</a>\n" +
                        " </div>\n" +
                        "</div>\n" +
                        "</td>"+
                        "</tr>";
                    $("#usersTableID tbody").append(tr_str);
                }

            },

            error:function () {
                toastr.error('Please Connect to database To Load Table');
            }


        });}
    // $('#usersTableID').DataTable({
    //     "scrollX": true,
    //
    // });
    function countPlaylists(id) {

        $.ajax({
            url:'{{url('admin/countPlaylist')}}',
            data:{id:id,_token:'{{csrf_token()}}'},
            method:'POST',
            success:function (response) {
                $('#username').text(response[2]['name']);
                $('#emailPlay').text(response[2]['email']);
                $('#noOfPlaylists').text('Playlists : '+response[0]);
                $('#playlistsTitles').text('Titles : ');
                for(let i=0;i<response[1].length;i++){
                    var title="[ "+response[1][i]['title']+" ]  \t";

                    $('#playlistsTitles').append(title);
                }

                //       alert(response[2]['name']);
            },
            error:function () {
                alert('error');
            }
        })

    }
    function showPass(pass,id){
        $('#pass'+id).text(pass)
    }

    // function setValForEditUser(id){

    // $('#regionIdForEdit').val(id);

    // $.ajax({
    //     data: {id:id,_token:'{{csrf_token()}}'},
    //     url: '{{url('admin/job/regioneditrblade')}}',
    //     method: 'POST',
    //     success: function (response) {
    //         $('#regionName').val(response['txtRegionName']);
    //     },
    //     error: function(){
    //         toastr.error('something went wrong');
    //     }
    // });


    function setValOfIdForModifyLeave(id) {
        $('#addOrEditDesignationId').val(id);


        $.ajax({
            data: {id:id,_token:'{{csrf_token()}}'},
            url: '{{url("admin/sendDataForEditLeaveAdmin")}}',
            method: 'POST',
            success: function (response) {

                // console.log(response['txt_EmployeeDepartment']);
                $('#designationName').val(response['name']);
                $('#editEmail').val(response['email']);
                $('#editPass').val(response['password']);


            },
        });
    }

    ////////////////////////////////////////////INSERT  DATA ////////////////////////////////////////////////////////////////


    $('#designationForm').on('submit',function (e) {
        e.preventDefault();
        var userName = $('#designationName').val();
        var userEmail= $('#editEmail').val();
        var userPassword= $('#editPass').val();
        var userId= $('#addOrEditDesignationId').val();


        $.ajax({
            data: {userName:userName,userEmail:userEmail,userPassword:userPassword,userId:userId,_token:'{{csrf_token()}}'},
            url: '{{url("admin/addOrEditUser")}}',
            method: 'POST',
            success: function (response) {
                $('#designationName').val('');
                $('#editEmail').val('');
                $('#editPass').val('');
                $('#addOrEditDesignationId').val('');
                // $('#designationDepartment').nullInput();
                $('#add_designation').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                reload();
                toastr.success('Row Edited Successfully');

            },
            error: function (response) {
                toastr.error('Error!\tRecommendations:Please Fill the TextField or Connect To DataBase');
            },
        });
    });


    // }
    function setValForDeleteUser(id){
        //var name = window.prompt("Enter your name: ");

        var del=confirm('Are you sure to want to Delete this user?');
        if(del){
            $.ajax({
                data: {id:id,_token:'{{csrf_token()}}'},
                url:  '{{url("admin/deleteUser")}}',
                method:'POST',
                success:function () {
                    reload();
                    toastr.warning('Deleted Successfully');
                },
                error:function () {
                    toastr.error("Something's Wrong ! Try again later");
                }
            });}
    };

    function EmailVerificationCheckBox(id) {
       var checked= $('#' + id).is(":checked")?1:0;
       $.ajax({
           url:'{{url('admin/setEmailVerifyChecked')}}',
           data:{id:id,checked:checked,_token:'{{csrf_token()}}'},
           method:'POST',
           // success:function () {
           //  toastr.success('updated');
           // },
           // error:function(){
           //     toastr.error('error');
           // }
       })
    }
    function PaidCheckBox(id) {
        var checked= $('#paid' + id).is(":checked")?1:0;
        $.ajax({
            url:'{{url('admin/setPaidChecked')}}',
            data:{id:id,checked:checked,_token:'{{csrf_token()}}'},
            method:'POST',
            success:function () {
                reload();
            },

    });}
    function setSubType(id,index) {
        $.ajax({
            url:'{{url('admin/setSubTypeByAdmin')}}',
            data:{id:id,index:index,_token:'{{csrf_token()}}'},
            method:'POST',
            success:function(){
                reload();
            },
            error:function () {
                toastr.error('error');
            }
        })
    }
    // function checkALLChannels() {
    //     $('#checkALLChannels').is(":checked")?
    //         $('input:checkbox[id*=group]').prop('checked','true'):
    //         $('input:checkbox[id*=group]').prop('checked',false);
    //
    // }
</script>
</body>
</html>
