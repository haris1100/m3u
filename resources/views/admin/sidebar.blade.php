
<!-- Sidebar -->
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class=" sidebar bg-dark ">
            <ul class="list-unstyled components mt-5 ">
                <li><a  href="{{url('admin/adminDashboard')}}"><i class="fas fa-coins"></i> <span>Dashboard</span></a></li><br>
                <li><a  href="{{url('admin/user')}}"><i class="fas fa-bars"></i> <span>users</span></a></li><br>
                <li><a  href="{{url('admin/subscription')}}"><i class="fas fa-tv"></i></i> <span>Subscription</span></a></li><br>
                <li><a  href="{{url('admin/setting')}}"><i class="fas fa-cog"></i> <span>Setting</span></a></li> <br>
                 <li><a  href="{{url('admin/Dynamics')}}" ><i class="fas fa-rss-square text-warning" ></i> <span>blog/ToU</span></a></li> <br>

                <!-- <li><a  href=""><i class="far fa-envelope"></i> <span>Support</span></a></li> <br><br>


               <li><a  href=""><i class="fas fa-shopping-bag"></i> <span>Subscribe</span></a></li> <br>
                <li><a  href=""><i class="fas fa-cog"></i> <span>Account Setting</span></a></li> <br>
                <li><a  href="logout"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>  -->
                <br><br>
                <li><a  href="{{url('logout')}}" ><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>

            </ul>



    </nav>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

