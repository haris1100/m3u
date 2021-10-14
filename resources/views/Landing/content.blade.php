


<div class="text-dark " style="background-color: rgb(195, 241, 255)">

    <!-- End Screenshot -->
    <div  id="features"></div>
    <!-- Start Features -->
    <div class="backgroundTextColor" style="background-color: rgb(195, 241, 255)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div>
                            <i class="fa fa-star mt-5 "></i>
                        </div>
                        <h2 class="mt-3 text-black font-weight-bolder  ">Top Features</h2>
                        <p class="text-dark ">Import, add, edit, delete to create your perfect playlist.</p>
                    </div>
                </div>
            </div><br><br><br>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="d-flex justify-content-center">
                    <img src="public/images/img1.png" style="width: 250px;height: 250px;border: 4px solid blue;border-radius: 30px">
                    </div>
                    <h2 class="text-center" style="color: red;padding-left: 25px;padding-top: 10px">EASY TO USE</h2>
                    <p class="text-center">DRAG AND DROP CHANNELS AND CATEGORIES ORDER , MOVE ,EDIT , DELETE ..</p>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                    <img src="public/images/img2.png" style="width: 250px;height: 250px;border: 4px solid blue;border-radius: 30px">
                    </div>
                    <h2 class="text-center" style="color: red;padding-left: 11px;padding-top: 10px">ALL ON CLOUDS</h2>
                    <p class="text-center">YOUR M3U PLAYLIST IS ON
                        CLOUDS, ALL CHANGE BE
                        APPLIED LIVE</p>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                    <img src="public/images/img3.png" style="width: 250px;height: 250px;border: 4px solid blue;border-radius: 30px">
                    </div>
                    <h2 class="text-center" style="color: red;padding-left: 38px;padding-top: 10px">AUTO-SYNC</h2>
                    <p class="text-center">CHANGE EVERYTHING ON
                        YOUR PLAYLIST , WHEN
                        YOUR SOURCE CHANGE
                        URL OR ADD NEW
                        CHANNELS , YOUR
                        PLAYLIST ALSO UPDATED.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                    <img src="public/images/img4.png" style="width: 250px;height: 250px;border: 4px solid blue;border-radius: 30px">
                    </div>
                    <h2 class="text-center" style="color: red;padding-left: 13px;padding-top: 10px">NO LONG URLS</h2>
                    <p class="text-center">ANY PLAYLIST CREATED
                        HAVE A UNIQUE URL CAN BE
                        PERSONALIZED EASLY</p>
                </div>
                <div class="col-sm-4" >
                    <div class="d-flex justify-content-center">
                    <img src="public/images/img5.png" style="width: 250px;height: 250px;border: 4px solid blue;border-radius: 30px">
                    </div>
                    <h2 class="text-center" style="color: red;padding-left: 15px;padding-top: 10px">NO SOFTWARE</h2>
                    <p class="text-center">GET ACCESS TO YOUR
                        PANEL EVERWERE VIA
                        YOUR BROWSER , DON'T
                        NEED TO INSTALL ANY
                        THING</p>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                    <img src="public/images/img6.png" style="width: 250px;height: 250px;border: 4px solid blue;border-radius: 30px">
                    </div>
                    <h2 class="text-center" style="color: red;padding-left: 40px;padding-top: 10px">FREE TRIAL</h2>
                    <p class="text-center">TEST ALL FEATURES
                        14 DAYS FOR FREE , NO
                        CREDIT CARD REQUIRED</p>
                </div>
            </div>
        </div>
    </div>
    @include('Landing.subscription')
    <style>
        ::-webkit-scrollbar {
            width: 10px;
            direction: ltr;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    <div class=" text-center ">
        <br>
        <div>
            <i class="fas fa-tv"></i>
        </div>
        <h2 class="mt-3" style="color: black;font-size:30px">CHANGELOG</h2>
        <p class="text-dark">HERE ARE THE UPDATES WE MADE SO FAR</p>
    </div><br>
    <div class="container-fluid" id="changelog" style=" ">
        <div class="container" style="overflow-y:auto;height: 500px;direction: ltr;background-color: rgb(25, 117, 210)">
            <div class="row mt-5" >
                <div class="col-lg-12">
                    @php
                    //$date=\Illuminate\Support\Facades\DB::table('logs')->groupBy('date')->get();
                    $logs=\Illuminate\Support\Facades\DB::table('static')->pluck('changeLog')->first();
                    echo html_entity_decode($logs);
                    @endphp

                </div>

            </div>
        </div>
    </div>
    <div class="text-center mt-1 mb-1" style="font-size: 40px">Get Your 14 Days free Trail Now <a href="{{url('register')}}" class="btn btn-danger">Get Started</a></div>
</div>


    <!-- End Features -->
