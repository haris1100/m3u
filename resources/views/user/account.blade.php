@extends('user.master-user')

@section('content')
    <div class="modal fade" id="featuresModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body" id="modalBody">

                </div>
            </div>
        </div>
    </div>
    <script>var perfectAmount=0;var SubscriptionType='';var id=0;</script>
    <div class="page-wrapper">
        <div class="content container-fluid">


            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title" id="settingChangeName"><b></b></h3>

                    </div>

                </div>
            </div>
            <!-- /Page Header -->
            {{--            ////////////////////////////////////////////// TABS ////////////////////////////////////////////////////////////////--}}

            <div class="row" hidden>
                <div class="col-auto ">
                    <ul class="nav nav-tabs nav-tabs-solid" style="color: #00b7ed">
                        <li class="nav-item"><a class="nav-link " hidden id="removeActive" href="#solid-tab1" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link " id="security" hidden onclick="$('#changePasswordForm').trigger('reset')" href="#solid-tab2"  data-toggle="tab" >Security</a></li>
                        <li class="nav-item"><a class="nav-link " id="setActiveSub" hidden  href="#solid-tab3" data-toggle="tab"> Subscription</a></li>
                        <li class="nav-item"><a class="nav-link " id="paymentTab" hidden href="#solid-tab4" data-toggle="tab"> Payment Method</a></li>
                        <li class="nav-item"><a class="nav-link " id="invoices" hidden href="#solid-tab5" data-toggle="tab"> Invoices </a></li>

                    </ul>
                </div>
            </div>

            <div class="tab-content">

                <hr>
                {{--                ////////////////////////////////////////////// TABS CONTENT ////////////////////////////////////////////////////////////////--}}

                {{--                //////////////////////////////////////////////TAB 1////////////////////////////////////////////////////////////////--}}

                <div class="tab-pane " id="solid-tab1">
                    <form id="updateAccount">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group ">
                                <input type="text" value="@php echo $_SESSION['userLogined']->email @endphp"  name="email" hidden readonly>
                                <label class="">username</label>
                                <input type="text" style="width: 75vw;" class="form-control" value="@php echo $_SESSION['userLogined']->name @endphp" id="username" name="username">
                            </div>
                            <div class="form-group ">
                                <label class="">Email</label>
                                <input readonly type="email" style="width: 75vw;" class="form-control " id="emailUpdate" value="@php echo $_SESSION['userLogined']->email @endphp" name="emailUpdate">

                            </div>

                            <div class="submit-section">
                                <button type="submit"   class="btn btn-primary submit-btn">Update </button>
                                <button type="button" onclick="deleteAccount()"   class="btn btn-danger submit-btn">Delete Account </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- tab 2 -->
                <div class="tab-pane  " id="solid-tab2">
                    <form id="changePasswordForm">
                        {{csrf_field()}}
                        <input type="text" value="@php echo $_SESSION['userLogined']->email @endphp" name="email" hidden readonly>
                        <div class="row">
                            <div class="form-group ">
                                <label class="">Current Password</label>
                                <input type="password" style="width: 75vw" class="form-control" id="currentPassword" name="currentPassword">

                            </div>
                            <div class="form-group ">
                                <label class="">Password</label>
                                <input type="password" onkeyup="isValid($(this).val())" style="width: 75vw;" class="form-control" id="Password" name="Password">
                                <div id="groupOfAllSpan">
                                <span id="upper" >Uppercase <i id="cross1" class="fas fa-times "></i><i id="tick1" class="fas fa-check "></i></span>&nbsp;&nbsp;
                                <span id="lower" class="ml-2">Lowercase <i id="cross2" class="fas fa-times "></i><i id="tick2" class="fas fa-check "></i></span>&nbsp;&nbsp;
                                <span id="number" class="ml-2">Numbers <i id="cross3" class="fas fa-times "></i><i id="tick3" class="fas fa-check "></i></span>&nbsp;&nbsp;
                                <span id="length" class="ml-2">Lenght <i id="cross4" class="fas fa-times "></i><i id="tick4" class="fas fa-check "></i></span>
                                </div>
                                    <script>
                                    $('#regButton').prop('disabled', true);
                                    $('#groupOfAllSpan').hide();
                                    function isValid(input) {
                                        var reg = /^[^%\s]{8,}/;
                                        var reg3 = /[A-Z]/;
                                        var reg2 = /[a-z]/;
                                        var reg4 = /[0-9]/;

                                        if(reg.test(input) && reg2.test(input) && reg3.test(input) && reg4.test(input)){

                                            $('#regButton').removeAttr("disabled");
                                            $('#groupOfAllSpan').hide();
                                        }
                                        else{
                                            $('#regButton').attr("disabled", 'true');
                                            $('#groupOfAllSpan').show();
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
                            </div>
                            <div class="form-group ">
                                <label class="">Confirm Password</label>
                                <input type="password" style="width: 75vw;" class="form-control " id="ConfirmPassword" name="ConfirmPassword">

                            </div>
                            <button type="submit" id="regButton" class="btn btn-primary submit-btn">Update</button>
                        </div>

                    </form>
                </div>

                <!-- ----------------------------------------------------------------------------------------------------- -->
                <div class="tab-pane  " id="solid-tab3">
                    @if($_SESSION['userLogined']->Paid!='active')
                        <div class="col-12">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item col-6"><a class="nav-link active text-right" href="#" onclick="callMonthlyCards()" data-toggle="tab">Monthly</a></li>
                                <li class="nav-item col-6"><a class="nav-link " href="#" onclick="callYearlyCards()" data-toggle="tab" >Yearly</a></li>
                            </ul>
                        </div>

                        <section class="pricing py-5">
                            <div class="container">
                                <div class="row" id="appendCards">

                                </div>
                            </div>
                        </section>
                    @else
                        <div class="card mt-5">
                            <div class="card-header text-center bg-success text-white" style='font-family: Arial, Helvetica, sans-serif'>
                                <b>Subscription Active until
                                    @php
                                    echo $_SESSION['userLogined']->membershipEndsIn;

                                    @endphp
{{--                                    if($_SESSION['userLogined']->SubscriptionType=='monthly'){--}}
{{--                                    $date=date_create($_SESSION['userLogined']->dateOfMembership);--}}
{{--                                    date_add($date,date_interval_create_from_date_string("30 days"));--}}
{{--                                    echo "<u>".date_format($date,"d-m-Y")."</u>";}--}}
{{--                                    else if($_SESSION['userLogined']->SubscriptionType=='yearly'){--}}
{{--                                    $date=date_create($_SESSION['userLogined']->dateOfMembership);--}}
{{--                                    date_add($date,date_interval_create_from_date_string("365 days"));--}}
{{--                                    echo "<u>".date_format($date,"d-m-Y")."</u>";}--}}
                                </b>
                            </div>
                            <div class="card-body">
                                <h4 style='font-family: Arial, Helvetica, sans-serif' class="text-center">All Subscription Plan price include applicable VAT </h4>
                                <hr>
                                <h4 style='font-family: Arial, Helvetica, sans-serif'>
                                    @php
                                        $getCardsForShow=\Illuminate\Support\Facades\DB::table('subscription')->get();
                                    @endphp
                                    @foreach($getCardsForShow as $i)
                                        <div class="row">
                                            @if($i->id<4)
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1"> {{$i->cardName}}</div>
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1"><button onclick="setModalForFeatures({{$getCardsForShow}},{{$i->id}})" type="button" data-toggle="modal" data-target="#featuresModel" class="btn btn-light border-dark"><i class="far fa-star"></i> features</button></div>
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1"><p class="badge badge-success">${{$i->rate}} / month</p></div>
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1">@if($i->id==$_SESSION['userLogined']->cardNo)
                                                        <button onclick='getSubscription({{$i->rate}},0,{{$i->id}})' class="btn btn-warning text-white">Prolong Subscription</button>
                                                    @else
                                                        <button  onclick='getSubscription({{$i->rate}},0,{{$i->id}})' class="btn btn-light border-success text-success">Switch</button>
                                                    @endif
                                                </div>

                                            @else
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1"> {{$i->cardName}}</div>
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1"><button onclick="setModalForFeatures({{$getCardsForShow}},{{$i->id}})" type="button" data-toggle="modal" data-target="#featuresModel" class="btn btn-light border-dark"><i class="far fa-star"></i> features</button></div>
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1"><p class="badge badge-info">${{$i->rate}} / year</p></div>
                                                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-6 text-center mb-1">@if($i->id==$_SESSION['userLogined']->cardNo)
                                                        <button onclick='getSubscription({{$i->rate}},0,{{$i->id}})' class="btn btn-warning text-white">Prolong Subscription</button>
                                                    @else
                                                        <button  onclick='getSubscription({{$i->rate}},1,{{$i->id}})' class="btn btn-light border-success text-success">Switch</button>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        @if($i->id==3)
                                            <hr class="bg-warning">
                                        @else
                                            <hr>
                                        @endif

                                    @endforeach
                                </h4>

                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <p>Manual action is required to prolong your subscription current end-date: @php  echo $_SESSION['userLogined']->membershipEndsIn; @endphp
                                . Please make one  or more Paypal payments to extend your subscription  by one  period per payment.</p>

                            <p class="mb-0"> Switching to another plan will cancle your current subscription and will create a new subscription starting today.</p>
                        </div>
                    @endif
                </div>
                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <div class="tab-pane  " id="solid-tab4">
                    <form id="">
                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-3"></div>
                            <div class="col-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><b>$</b></span>
                                </div>
                                <input type="text" class="form-control" readonly id="amount">
                                <div class="input-group-append">
                                    <span class="input-group-text"><b>To Pay</b></span>
                                </div>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-2">
                                {{--                        <div class="img-container" style=" text-align: right">--}}
                                {{--                            <img src="{{asset('paypal/paypal.png')}}"  width="100vw" height="100vh" alt="">--}}
                                {{--                        </div>--}}
                            </div>
                        </div>
                    </form>
                    <div id="smart-button-container">
                        <div style="text-align: center; margin-top: 20px;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=Ac5fZRHF0rv6NuWl7W2ZW9vfLRwDS09lmHneT7OkPsn8dbZoBPtfMi34p6sfOY9q2Gaxq3-QLGXBXnoL&currency=USD" data-sdk-integration-source="button-factory"></script>
                    <script>
                        function initPayPalButton() {
                            paypal.Buttons({
                                style: {
                                    shape: 'rect',
                                    color: 'blue',
                                    layout: 'vertical',
                                    label: 'paypal',


                                },

                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{"amount":{"currency_code":"USD","value":perfectAmount}}]
                                    });
                                },

                                onApprove: function(data, actions) {
                                    return actions.order.capture().then(function(details) {
                                        toastr.success('Transaction completed by ' + details.payer.name.given_name + '!');
                                        setPaid();
                                    });

                                },

                                onError: function(err) {
                                    console.log(err);
                                }
                            }).render('#paypal-button-container');
                        }
                        initPayPalButton();
                    </script>


                </div>
                <!-- ----------------------------------------------------------------------------------------------------- -->
                <div class="tab-pane  " id="solid-tab5">
                    <!-- <div class="alert alert-primary" role="alert">
                        This information will appear on all of your receipts, and is a great place to add your full business name, VAT number, or address of record. Do not include any confidential or financial information such as credit card numbers.
                    </div> -->

                    <!-- <form>
                        @csrf
                        <textarea  id="textAreaInvoice" name="text" class="form-control form-inline"  rows="3" >@php echo $_SESSION['userLogined']->invoice @endphp</textarea>
                        <div class="wrapper submit-section" style=" text-align: center">
                            <button id="saveInvoice"  type="submit" class="submit-btn btn-primary ">Update</button>
                        </div>
                    </form> -->

                    <div id="appendInvoice">

                            <script>

                                    $.ajax({
                                        url:'{{url("user/getInvoice")}}',
                                         method:'GET',
                                         cache:false,
                                        success:function(response){
                                            for(var i=response.length-1;i>=0;i--){

                                         var cardInvoice="<div class=\"card mt-3\">"+
                                                     "<div class=\"card-body\">"+
                                                     "<div class=\"row\">"+

                                                //   "<div class=\"col-3\">"+
                                                //     ""+response[i].SubscriptionType+""+
                                                //      " </div>"+
                                                "<div class=\"col-4\">"+
                                                    ""+response[i].dateOfMembership+""+
                                                     " </div>"+
                                                     "<div class=\"col-4 text-center\">"+
                                                    "$"+response[i].amount+".00"+
                                                     " </div>"+

                                                     "<div class=\"col-4 text-right\">"+
                                             "<form action='{{action('m3u@downPdf')}}' method='POST'>"+
                                             "<input hidden type='text' name='_token' value='{{csrf_token()}}'>"+
                                             "<input hidden type='text' name='id' value='"+response[i].id+" '>   "+
                                                    "<button type='submit' class=' btn btn-outline-success btn-sm'> <i class=\"far fa-file-pdf\"> </i> Download PDF</button></form>"+
                                                     " </div>"+
                                                  " </div>"+
                                                       " </div>"+
                                                        "</div>";
                                                        $('#appendInvoice').append(cardInvoice);
                                                        }
                                        },
                                        error:function(){
                                            // href='javascript:void(0)' onclick='downloadPdf("+response[i].id+")'
                                        }
                                    })

                            </script>
                    </div>

                </div>



                {{--            END    --}}
            </div>
        </div>
    </div>

    <script>

 $('#saveInvoice').on('click',function (e) {
     e.preventDefault();
   $.ajax({
       url:'{{url('user/saveInvoice')}}',
       data:{data:$('#textAreaInvoice').val(),_token:"{{csrf_token()}}"},
       method:'POST',
       success:function () {
        toastr.success('Invoice Updated');
       }

   })
 })
        $( "#username" ).keypress(function(e) {
            var key = e.keyCode;
            if (key >= 48 && key <= 57) {
                e.preventDefault();
            }
        });
        function setModalForFeatures(data,id) {
            id=id-1;
            $('#modalBody').empty();
            var modalData="" +
                "<ul class=\"fa-ul\">\n" +
                "<li style='font-size: 25px'><b>"+data[id]['cardName']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Max playlists: <b>"+data[id]['maxPlayList']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Channels per playlist: <b>"+data[id]['channelPerPlayList']+"</b></li>\n" +
                // "                            <li><span class=\"fa-li\"></span>EPG <b>"+data[id]['epg']+"</b></li>\n" +
                // "                            <li><span class=\"fa-li\"></span>Available EPG countries: <b>"+data[id]['epgCountries']+"</b></li>\n" +
                 "                            <li><span class=\"fa-li\"></span>Download-URL customization: <b>"+data[id]['DownloadURLcustomization']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Playlist protection: <b>"+data[id]['Playlistprotection']+"</b></li>\n" +
                "                            <li><span class=\"fa-li\"></span>Daily sync for updates: <b>"+data[id]['Dailysyncforupdates']+"</b></li>\n" +
                "                            <br>\n" +
                "                            <br>\n" +
                "                            <br>\n" +
                "                        </ul>\n" ;
            $('#modalBody').append(modalData);

        }
        function  setPaid() {
            $.ajax({
                url:'{{url('user/setPaid')}}',
                data:{Paid:'active',SubscriptionType:SubscriptionType,Amount:perfectAmount,id:id,_token:'{{csrf_token()}}'},
                method:'POST',
                success:function () {
                    window.location.reload();

                }
            });
        }

        // var subs=localStorage.getItem('subscription');
        // if(subs==='true'){

        //     $('#setActive').click();
        //
           //  $('#solid-tab3').addClass('active');


        // }
        var account=localStorage.getItem('account');
        if(account==1){
            //$('#solid-tab3').removeClass('active');
            $('#removeActive').click();
            $('#settingChangeName').text('Profile');


        }
        else if(account==2){
           // $('#solid-tab3').removeClass('active');
            $('#security').click();
            $('#settingChangeName').text('Security');
        }
        else if(account==3){
            $('#setActiveSub').click();
            $('#settingChangeName').text('Plans');
        }
        else if(account==4){
            $('#paymentTab').click();
            $('#settingChangeName').text('Payment');
        }
        else{
            $('#invoices').click();
            $('#settingChangeName').text('Invoice');
        }

        callMonthlyCards();
        $.ajaxSetup({
            beforeSend: function(xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });

        function setValOfIdForModifyLeave(id) {
            $('#addOrEditDesignationId').val(id);


            $.ajax({
                data: {id:id,_token:'{{csrf_token()}}'},
                url: '{{url("admin/sendDataForEditAccount")}}',
                method: 'POST',
                success: function (response) {

                    // console.log(response['txt_EmployeeDepartment']);
                    $('#postJobId').val(response['name']);
                    $('#jobTitle').val(response['email']);



                },
            });
        }

        $('#changePasswordForm').on('submit',function(e){
            e.preventDefault();
            if($('#currentPassword').val()!=$('#Password').val() && $('#Password').val()!='' && $('#Password').val()===$('#ConfirmPassword').val()){
                $.ajax({
                    url:"{{url('user/changePassword')}}",
                    data: $('#changePasswordForm').serialize(),
                    method:"POST",
                    success:function(response){
                        response==='1'?toastr.success('Password Updated'):toastr.error('Wrong Current Password');

                    },
                    error:function(response){

                        toastr.error('Error');
                    }
                })}
            else toastr.error('Check You Password');
        })

        //-----------------------------------------------------------------------------------------------------

        $('#updateAccount').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:"{{url('user/updateAccount')}}",
                data: $('#updateAccount').serialize(),
                method:"POST",
                success:function(response){
                    toastr.success('Account Updated');
                    setTimeout(window.location.reload(), 5000);


                },
                error:function(response){

                    toastr.error('Error');
                }
            })

        })
        //----------------------------------------------------------------------------------------------------
        function callMonthlyCards(){
            $.ajax({
                url:'{{url("getCards")}}',
                method:'GET',
                success:function(response){

                    $('#appendCards').empty();
                    for(var i=0;i<3;i++){
                        var j=i+3;
                        var card = "<div class=\"col-lg-4\">\n" +
                            "                <div class=\"card mb-5 mb-lg-0\">\n" +
                            "                    <div class=\"card-body\">\n" +
                            "                        <h5 class=\"card-title  text-uppercase text-center badge badge-success text-white\">"+response[i]['cardName']+"</h5>\n" +
                            "                        <h6 class=\"card-price\">$"+response[i]['rate']+"<span class=\"period\">/month</span></h6>\n" +
                            "                        <p class=\"text-sm-left form-control-sm\">Or Pay $"+response[j]['rate']+"/year</p>\n" +
                            "                        <hr>\n" +
                            "                        <ul class=\"fa-ul\">\n" +
                            "                            <li><span class=\"fa-li\"></span>Max playlists: <b>"+response[i]['maxPlayList']+"</b></li>\n" +
                            "                            <li><span class=\"fa-li\"></span>Channels per playlist: <b>"+response[i]['channelPerPlayList']+"</b></li>\n" +
                            // "                            <li><span class=\"fa-li\"></span>EPG <b>"+response[i]['epg']+"</b></li>\n" +
                            // "                            <li><span class=\"fa-li\"></span>Available EPG countries: <b>"+response[i]['epgCountries']+"</b></li>\n" +
                             "                            <li><span class=\"fa-li\"></span>Download-URL customization: <b>"+response[i]['DownloadURLcustomization']+"</b></li>\n" +
                            "                            <li><span class=\"fa-li\"></span>Playlist protection: <b>"+response[i]['Playlistprotection']+"</b></li>\n" +
                            "                            <li><span class=\"fa-li\"></span>Daily sync for updates: <b>"+response[i]['Dailysyncforupdates']+"</b></li>\n" +
                            "                            <br>\n" +
                            "                            <br>\n" +
                            "                            <br>\n" +
                            "                        </ul>\n" +
                            "                        <button type='button' onclick='getSubscription("+response[i]['rate']+",0,"+response[i]['id']+")'   id='getSubscription'  class=\"btn btn-block btn-primary text-uppercase\">Get Started</button>\n" +
                            "                    </div>\n" +
                            "                </div><br>\n" +
                            "            </div><br>";
                        $('#appendCards').append(card);
                    }

                }
            });
        }
        function callYearlyCards() {
            $.ajax({
                url:'{{url("getCards")}}',
                method:'GET',
                success:function(response){
                    $('#appendCards').empty();
                    for(var i=3;i<6;i++){
                        var card = "<div class=\"col-lg-4\">\n" +
                            "                <div class=\"card mb-5 mb-lg-0\">\n" +
                            "                    <div class=\"card-body\">\n" +
                            "                        <h5 class=\"card-title  text-uppercase text-center badge badge-success text-white\">"+response[i]['cardName']+"</h5>\n" +
                            "                        <h6 class=\"card-price \">$"+response[i]['rate']+"<span class=\"period\">/year</span></h6>\n" +
                            "                        <p class=\"text-sm-left form-control-sm\">saves $"+((response[i-3]['rate']*12)-response[i]['rate'])+" in Annual Subscription</p>\n" +
                            "                        <hr>\n" +
                            "                        <ul class=\"fa-ul\">\n" +
                            "                            <li>Max playlists: <b>"+response[i]['maxPlayList']+"</b></li>\n" +
                            "                            <li>Channels per playlist: <b>"+response[i]['channelPerPlayList']+"</b></li>\n" +
                            // "                            <li></i></span>EPG <b>"+response[i]['epg']+"</b></li>\n" +
                            // "                            <li>Available EPG countries: <b>"+response[i]['epgCountries']+"</b></li>\n" +
                            "                            <li>Download-URL customization: <b>"+response[i]['DownloadURLcustomization']+"</b></li>\n" +
                            "                            <li></i></span>Playlist protection: <b>"+response[i]['Playlistprotection']+"</b></li>\n" +
                            "                            <li></i></span>Daily sync for updates: <b>"+response[i]['Dailysyncforupdates']+"</b></li>\n" +
                            "                            <br>\n" +
                            "                            <br>\n" +
                            "                            <br>\n" +
                            "                        </ul>\n" +
                            "                        <button type='button' onclick='getSubscription("+response[i]['rate']+",1,"+response[i]['id']+")'   id='getSubscription'  class=\"btn btn-block btn-primary text-uppercase\">Get Started</button>\n" +
                            "                    </div>\n" +
                            "                </div>\n" +
                            "            </div>";
                        $('#appendCards').append(card);
                    }

                }
            });
        }

        function getSubscription(amount,type,cid) {
            $('#amount').val(amount);
            $('#amount').css("font-weight","Bold");
            perfectAmount=amount;
            id=cid;
            SubscriptionType=type===1?'yearly':'monthly';
            $('#solid-tab4').click();
            $('#paymentTab').click();
        }

        function deleteAccount(){
            var del=confirm('Are you sure To delete Your Account ?');
            if(del)
                $.ajax({
                    url:'{{url("user/delAccount")}}',
                    data:{email: $('#emailUpdate').val(),_token:'{{csrf_token()}}'},
                    method:"POST",
                    success:function(){
                        window.location.href='logout';
                    },
                    error:function(){
                        toastr.error('error');
                    }
                })

        }

        {{--function downloadPdf(id){--}}
        {{--  //  alert(id);--}}
        {{--    $.ajax({--}}
        {{--            url:'{{url("downPdf")}}',--}}
        {{--            data:{id:id,_token:'{{csrf_token()}}'},--}}
        {{--            method:"POST",--}}
        {{--            success:function(){--}}
        {{--                toastr.success('working');--}}
        {{--            },--}}
        {{--            error:function(){--}}
        {{--                toastr.error('error');--}}
        {{--            }--}}
        {{--        })--}}
        {{--}--}}
    </script>

@endsection
