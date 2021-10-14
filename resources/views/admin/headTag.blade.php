<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <!-- <style>
        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color:#A7A1AE;
            background-color:#1F2739;
        }

        h1 {
            font-size:3em;
            font-weight: 300;
            line-height:1em;
            text-align: center;
            color: #4DC3FA;
        }

        h2 {
            font-size:1em;
            font-weight: 300;
            text-align: center;
            display: block;
            line-height:1em;
            padding-bottom: 2em;
            color: #FB667A;
        }

        h2 a {
            font-weight: 700;
            text-transform: uppercase;
            color: #FB667A;
            text-decoration: none;
        }

        .blue { color: #185875; }
        .yellow { color: #FFF842; }

        .container th h1 {
            font-weight: bold;
            font-size: 1em;
            text-align: left;
            color: indianred;
        }

        .container td {
            font-weight: normal;
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
        }

        .container {
            text-align: left;
            overflow: hidden;
            width: 80%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
        }

        .container td, .container th {
            padding-bottom: 2%;
            padding-top: 2%;
            padding-left:2%;
        }

        /* Background-color of the odd rows */
        .container tr:nth-child(odd) {
            background-color: #323C50;
        }

        /* Background-color of the even rows */
        .container tr:nth-child(even) {
            background-color: #2C3446;
        }

        .container th {
            background-color: #1F2739;
        }

        .container td:first-child { color: #FB667A; }

        .container tr:hover {
            background-color: #464A52;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
            -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
        }

        .container td:hover {
            background-color: #FFF842;
            color: #403E10;
            font-weight: bold;

            box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
            transform: translate3d(6px, -6px, 0);

            transition-delay: 0s;
            transition-duration: 0.4s;
            transition-property: all;
            transition-timing-function: line;
        }

        @media (max-width: 800px) {
            .container td:nth-child(4),
            .container th:nth-child(4) { display: none; }
        }
    </style> -->
    <title>Welcome Admin</title>
	<!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css')}} ">
	<!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/line-awesome.min.css') }}">
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('public/plugins/morris/morris.css') }}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}">
    <!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
    @yield('prestyle')
    <link rel="stylesheet" href="{{ asset('public/plugins/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/fullcalendar.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- Confirm Modal CSS -->
    <link rel="stylesheet" href="{{ asset('public/plugins/jquery-confirm/jquery-confirm.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{---------------------------------------------------Toaster CDN--------------------------------------------------------}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    @yield('style')

</head>
<body>
	<!-- Main Wrapper -->
    <div class="main-wrapper">


        @yield('content')

    </div>
	<!-- /Main Wrapper -->
{{--Ajax--}}


    <!-- jQuery -->
    <script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery-3.5.1.js') }}"></script>
	<!-- Bootstrap Core JS -->
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
	<!-- Slimscroll JS -->
    <script src="{{ asset('public/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Datatable JS -->
	<script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/dataTables.bootstrap4.min.js') }}"></script>
	<!-- Chart JS -->
	<script src="{{ asset('public/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('public/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('public/js/chart.js') }}"></script>
    <!-- Select2 JS -->
	<script src="{{ asset('public/js/select2.min.js') }}"></script>
    @yield('prescript')

    <script src="{{ asset('public/plugins\summernote\dist\summernote-bs4.min.js') }}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{asset('public/js/moment.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-datetimepicker.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Calendar JS -->
    @yield('calendarjsViewOnly')
    @yield('fullcalendar')

    <!-- Chart JS -->
    <!-- Custom JS -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    <!-- Confirm Modal JS -->
    <script src="{{ asset('public/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('public/js/custom.js') }}"></script>
    <script>
        $(document).ready(function(){
           // Read value on page load
           $("#result b").html($("#customRange").val());
           // Read value on change
           $("#customRange").change(function(){
               $("#result b").html($(this).val());
           });
       });
       $(".header").stick_in_parent({

       });
       // This is for the sticky sidebar
       $(".stickyside").stick_in_parent({
           offset_top: 60
       });
       $('.stickyside a').click(function() {
           $('html, body').animate({
               scrollTop: $($(this).attr('href')).offset().top - 60
           }, 500);
           return false;
       });
       // This is auto select left sidebar
       // Cache selectors
       // Cache selectors
       var lastId,
           topMenu = $(".stickyside"),
           topMenuHeight = topMenu.outerHeight(),
           // All list items
           menuItems = topMenu.find("a"),
           // Anchors corresponding to menu items
           scrollItems = menuItems.map(function() {
               var item = $($(this).attr("href"));
               if (item.length) {
                   return item;
               }
           });

       // Bind click handler to menu items


       // Bind to scroll
       $(window).scroll(function() {
           // Get container scroll position
           var fromTop = $(this).scrollTop() + topMenuHeight - 250;

           // Get id of current scroll item
           var cur = scrollItems.map(function() {
               if ($(this).offset().top < fromTop)
                   return this;
           });
           // Get the id of the current element
           cur = cur[cur.length - 1];
           var id = cur && cur.length ? cur[0].id : "";

           if (lastId !== id) {
               lastId = id;
               // Set/remove active class
               menuItems
                   .removeClass("active")
                   .filter("[href='#" + id + "']").addClass("active");
           }
       });
       $(function () {
           $(document).on("click", '.btn-add-row', function () {
               var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
               console.log(id);
               var div = $("<tr />");
               div.html(GetDynamicTextBox(id));
               $("#"+id+"_tbody").append(div);
           });
           $(document).on("click", "#comments_remove", function () {
               $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
               $(this).closest("tr").remove();
           });
           function GetDynamicTextBox(table_id) {
               $('#comments_remove').remove();
               var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
               return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
           }
       });
    </script>
    <script>
        $('.id').on('click',function(e){
            e.preventDefault();
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure to delete this item?',
                typeAnimated: true,
                buttons: {
                    cancel: function () {
                    },
                    confirm: {
                        btnClass: 'btn-danger',
                        text: '',
                        action: function(){

                        }
                    }
                }
            });
        });
    </script>
    @yield('script')
@php \App\Http\Controllers\m3u::curage(); @endphp
</body>
</html>
