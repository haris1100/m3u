@include('admin.headTag')
@include('admin.header')
@include('admin.sidebar')
<div class="page-wrapper">
    <div class="content container-fluid">
        <table class="table  table-bordered  table-hover">
            <thead>
            <tr class="bg-dark text-white">
                <th><h3>All</h3></th>
                <th><h3>Today</h3></th>
                <th><h3>Week</h3></th>
                <th><h3>Month</h3></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Users  <br><p style="font-size: 20px">@php  echo \Illuminate\Support\Facades\DB::table('user')->count(); @endphp</p></td>
                <td>Users  <br><p style="font-size: 20px">@php  echo \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime',date('Y-m-d'))->count(); @endphp</p></td>
                <td>Users  <br><p style="font-size: 20px">@php  $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("7 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->count();@endphp</p></td>
                <td>Users  <br><p style="font-size: 20px">@php  $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("30 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->count();@endphp</p></td>

            </tr>
            <tr>
                <td>Playlist  <br><p style="font-size: 20px">@php  echo \Illuminate\Support\Facades\DB::table('playlists')->count(); @endphp</p></td>
                <td>Playlist  <br><p style="font-size: 20px">@php   echo \Illuminate\Support\Facades\DB::table('playlists')->where('created_at',date("Y-m-d"))->count(); @endphp</p></td>
                <td>Playlist  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("7 days"));echo \Illuminate\Support\Facades\DB::table('playlists')->where('created_at','>',date_format($date,"Y-m-d"))->count();@endphp</p></td>
                <td>Playlist  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("30 days"));echo \Illuminate\Support\Facades\DB::table('playlists')->where('created_at','>',date_format($date,"Y-m-d"))->count();@endphp</p></td>


            </tr>
            <tr>
                <td>Trail  <br><p style="font-size: 20px">@php  echo \Illuminate\Support\Facades\DB::table('user')->where('Paid','inactive')->count(); @endphp</p></td>
                <td>Trail  <br><p style="font-size: 20px">@php   echo \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime',date("Y-m-d"))->where('Paid','inactive')->count(); @endphp</p></td>
                <td>Trail  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("7 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->where('Paid','inactive')->count();@endphp</p></td>
                <td>Trail  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("30 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->where('Paid','inactive')->count();@endphp</p></td>


            </tr>
            <tr>
                <td>Monthly Subscribers  <br><p style="font-size: 20px">@php  echo \Illuminate\Support\Facades\DB::table('user')->where('Paid','active')->where('SubscriptionType','monthly')->count(); @endphp</p></td>
                <td>Monthly Subscribers  <br><p style="font-size: 20px">@php   echo \Illuminate\Support\Facades\DB::table('user')->where('dateOfMembership',date("Y-m-d"))->where('SubscriptionType','monthly')->where('Paid','active')->count(); @endphp</p></td>
                <td>Monthly Subscribers  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("7 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('dateOfMembership','>',date_format($date,"Y-m-d"))->where('Paid','active')->where('SubscriptionType','monthly')->count();@endphp</p></td>
                <td>Monthly Subscribers  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("30 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('dateOfMembership','>',date_format($date,"Y-m-d"))->where('Paid','active')->where('SubscriptionType','monthly')->count();@endphp</p></td>


            </tr>
            <tr>
                <td>Yearly Subscribers  <br><p style="font-size: 20px">@php  echo \Illuminate\Support\Facades\DB::table('user')->where('Paid','active')->where('SubscriptionType','yearly')->count(); @endphp</p></td>
                <td>Yearly Subscribers  <br><p style="font-size: 20px">@php   echo \Illuminate\Support\Facades\DB::table('user')->where('dateOfMembership',date("Y-m-d"))->where('SubscriptionType','yearly')->where('Paid','active')->count(); @endphp</p></td>
                <td>Yearly Subscribers  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("7 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('dateOfMembership','>',date_format($date,"Y-m-d"))->where('Paid','active')->where('SubscriptionType','yearly')->count();@endphp</p></td>
                <td>Yearly Subscribers  <br><p style="font-size: 20px">@php   $date=date_create(date('Y-m-d'));date_sub($date,date_interval_create_from_date_string("30 days"));echo \Illuminate\Support\Facades\DB::table('user')->where('dateOfMembership','>',date_format($date,"Y-m-d"))->where('Paid','active')->where('SubscriptionType','yearly')->count();@endphp</p></td>


            </tr>
            </tbody>
        </table>
{{--        <div class="row" >--}}
{{--            <div class="col-sm-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Total Users</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('user')->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Users On Trail Period</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('user')->where('Paid','inactive')->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Total Playlists Created</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('playlists')->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Subscribed Users</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('user')->where('Paid','active')->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-4">--}}
{{--                <a href="javascript:void(0)" data-toggle="modal" data-target="#TodayModel">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Today Stats</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            Click Me--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            <div class="col-sm-4" >--}}
{{--                <a href="javascript:void(0)" data-toggle="modal" data-target="#WeeklyModel">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Weekly Stats</h2><br>--}}
{{--                            <h3 class="text-right text-info" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                                Click Me--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <a href="javascript:void(0)" data-toggle="modal" data-target="#MonthlyModel">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Monthly Stats</h2><br>--}}
{{--                            <h3 class="text-right text-primary" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                                Click Me--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Total Playlists Created</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('playlists')->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Playlists Created Today</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('playlists')->where('created_at',date('Y-m-d'))->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Playlists Created In a Week</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                            //  echo date_format($date,"Y-m-d");--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('playlists')->where('created_at','>',date_format($date,"Y-m-d"))->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h2 class="card-title" style='font-family: Arial, Helvetica, sans-serif'>Playlists Created In a Month</h2><br>--}}
{{--                        <h3 class="text-right" style='font-size: 50px;font-family: Arial, Helvetica, sans-serif'>--}}
{{--                            <?php--}}
{{--                            $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("30 days"));--}}
{{--                            //  echo date_format($date,"Y-m-d");--}}
{{--                            echo \Illuminate\Support\Facades\DB::table('playlists')->where('created_at','>',date_format($date,"Y-m-d"))->count();--}}
{{--                            ?>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="modal fade bd-example-modal-lg" id="TodayModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--        <div class="modal-content">--}}

{{--            <div class="modal-body" id="modalBody">--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <tr>--}}
{{--                    <th>No of users</th>--}}
{{--                    <th>No of users On Trail</th>--}}
{{--                    <th>No of Active users</th>--}}
{{--                    <th>Monthly Subscribers</th>--}}
{{--                    <th>Annual Subscribers</th>--}}
{{--                    <th>Total Playlists Created</th>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>@php--}}

{{--                                   $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                               $totalUsers7=  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime',date('Y-m-d'))->count();--}}
{{--                               echo $totalUsers7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}

{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                            $trailUser7=  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime',date('Y-m-d'))->--}}
{{--                            where('Paid','inactive')->count();--}}
{{--                            echo $trailUser7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                echo $totalUsers7-$trailUser7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime',date('Y-m-d'))->--}}
{{--                               where('SubscriptionType','monthly')->count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime',date('Y-m-d'))->--}}
{{--                               where('SubscriptionType','yearly')->count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('playlists')->where('created_at',date('Y-m-d'))->--}}
{{--                              count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{------------------------------------Weekly------------------------------------------------------}}
{{--<div class="modal fade bd-example-modal-lg" id="WeeklyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--        <div class="modal-content">--}}

{{--            <div class="modal-body" id="modalBody">--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <tr>--}}
{{--                        <th>No of users</th>--}}
{{--                        <th>No of users On Trail</th>--}}
{{--                        <th>No of Active users</th>--}}
{{--                        <th>Monthly Subscribers</th>--}}
{{--                        <th>Annual Subscribers</th>--}}
{{--                        <th>Total Playlists Created</th>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>@php--}}

{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                            $totalUsers7=  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->count();--}}
{{--                            echo $totalUsers7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}

{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                            $trailUser7=  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->--}}
{{--                            where('Paid','inactive')->count();--}}
{{--                            echo $trailUser7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                echo $totalUsers7-$trailUser7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->--}}
{{--                               where('SubscriptionType','monthly')->count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->--}}
{{--                               where('SubscriptionType','yearly')->count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("7 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('playlists')->where('created_at','>',date_format($date,"Y-m-d"))->--}}
{{--                              count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{-------------------------------------Monthly-------------------------------------------------------}}
{{--<div class="modal fade bd-example-modal-lg" id="MonthlyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--        <div class="modal-content">--}}

{{--            <div class="modal-body" id="modalBody">--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <tr>--}}
{{--                        <th>No of users</th>--}}
{{--                        <th>No of users On Trail</th>--}}
{{--                        <th>No of Active users</th>--}}
{{--                        <th>Monthly Subscribers</th>--}}
{{--                        <th>Annual Subscribers</th>--}}
{{--                        <th>Total Playlists Created</th>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>@php--}}

{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("30 days"));--}}
{{--                            $totalUsers7=  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->count();--}}
{{--                            echo $totalUsers7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}

{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                            date_sub($date,date_interval_create_from_date_string("30 days"));--}}
{{--                            $trailUser7=  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->--}}
{{--                            where('Paid','inactive')->count();--}}
{{--                            echo $trailUser7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                echo $totalUsers7-$trailUser7;--}}
{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("30 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->--}}
{{--                               where('SubscriptionType','monthly')->count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("30 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('user')->where('subscriptionTime','>',date_format($date,"Y-m-d"))->--}}
{{--                               where('SubscriptionType','yearly')->count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $date=date_create(date('Y-m-d'));--}}
{{--                               date_sub($date,date_interval_create_from_date_string("30 days"));--}}
{{--                              echo  \Illuminate\Support\Facades\DB::table('playlists')->where('created_at','>',date_format($date,"Y-m-d"))->--}}
{{--                              count();--}}

{{--                            @endphp--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>



</body>
</html>
