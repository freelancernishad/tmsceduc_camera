<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/fonts/flaticon.css') }}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/fullcalendar.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/animate.min.css') }}">
        <!-- Data Table CSS -->
        <link rel="stylesheet" href="{{ asset('dashboard_asset/css/jquery.dataTables.min.css') }}">
            <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/select2.min.css') }}">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/datepicker.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/style.css') }}">
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
    <!-- Modernize js -->
    <script src="{{ asset('dashboard_asset/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <!-- jquery-->
<script src="{{ asset('dashboard_asset/js/jquery-3.3.1.min.js') }}"></script>


<script src="https://unpkg.com/cropperjs"></script>
<style>


.modal-dialog {
    max-width: 1250px;
    margin: 1.75rem auto;
}


.Present:checked+label.Present {
    background: green
}

.att {
    background: #647a84;
    padding: 10px;
    color: #fff
}

input[type=radio]:checked+label {
    background: red;
    padding: 10px;
    color: #fff;
    font-size: 15px
}

label {
    font-size: 15px
}

button.btn-fill-lg.btn-gradient-yellow.btn-hover-bluedark {
    padding: 7px 7px;
    margin-top: 20px;
}
.filePreview {
    height: 80%;
    display: flex;
    justify-content: center;
    align-items: center;
}




</style>

</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{ asset('dashboard_asset/img/logo.png') }}" alt="logo">
                    </a>
                </div>
                 <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ Auth::user()->name }}</h5>
                                <span>{{ Auth::user()->role }}</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{ asset('dashboard_asset/img/figure/admin.jpg') }}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ Auth::user()->name }}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                        <i class="flaticon-turn-off"></i> {{ __('Logout') }}
                                     </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </li>







                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="{{ asset('dashboard_asset/img/logo1.png') }}" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>


                        {{-- <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Reports</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{ route('report.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Report List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.create') }}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Add New Report</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Reporters</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{ route('reporter.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Reporter List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reporter.create') }}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Add New Reporter</a>
                                </li>
                            </ul>
                        </li> --}}



                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">








			@section('container')
			@show()


   <!-- Footer Area Start Here -->
   <footer class="footer-wrap-layout1">
    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
            href="#">PsdBosS</a></div>
</footer>
<!-- Footer Area End Here -->
</div>
</div>
<!-- Page Area End Here -->
</div>



<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="employee_detail"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>




<!-- Plugins js -->
<script src="{{ asset('dashboard_asset/js/plugins.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('dashboard_asset/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('dashboard_asset/js/bootstrap.min.js') }}"></script>
<!-- Counterup Js -->
<script src="{{ asset('dashboard_asset/js/jquery.counterup.min.js') }}"></script>
<!-- Moment Js -->
<script src="{{ asset('dashboard_asset/js/moment.min.js') }}"></script>
<!-- Waypoints Js -->
<script src="{{ asset('dashboard_asset/js/jquery.waypoints.min.js') }}"></script>
<!-- Scroll Up Js -->
<script src="{{ asset('dashboard_asset/js/jquery.scrollUp.min.js') }}"></script>
<!-- Full Calender Js -->
<script src="{{ asset('dashboard_asset/js/fullcalendar.min.js') }}"></script>
<!-- Chart Js -->
<script src="{{ asset('dashboard_asset/js/Chart.min.js') }}"></script>
<script src="{{ asset('dashboard_asset/js/jquery.dataTables.min.js') }}"></script>
    <!-- Select 2 Js -->
    <script src="{{ asset('dashboard_asset/js/select2.min.js') }}"></script>
    <!-- Date Picker Js -->
    <script src="{{ asset('dashboard_asset/js/datepicker.min.js') }}"></script>
<!-- Custom Js -->
<script src="{{ asset('dashboard_asset/js/main.js') }}"></script>





<script type="text/javascript">
  $(document).ready(function() {
      $("#student_table").DataTable({
          "lengthMenu": [
              [500],
              ["All"]
          ]
      });
  });
</script>
</div>
</div>






@if (session()->has('msg'))
<script>
Swal.fire(
  'Success!',
  '{{ session("msg") }}',
  'success'
)

    </script>
@endif

<script type="text/javascript">


function viewdata(url) {



            $.ajax({
                url: url,
                method: "get",
                success: function(data) {
                    $("#employee_detail").html(data);
                    $("#dataModal").modal("show");
                },
            });


        }


        function deletedata(url,idname,id) {

Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {


$.ajax({
    url: url,
    method: "POST",
    data:{ "_token": "{{ csrf_token() }}" ,"_method": "DELETE"},
    success: function(data) {

         console.log(data)
         Swal.fire(
    'Deleted!',
    'Your file has been deleted.',
    'success'
    )


    $('#'+idname+id).closest("tr").fadeOut(1000);

    },
});








}
})



}
</script>

<script>

    function deleteFun(url){


        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.isConfirmed) {
    window.location.href=url;
    }
})









    }

    function rejectFun(id){

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Reject it!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href="/school/student/action/Reject/"+id;
    }
})











    }

    function aproveFun(id){

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Approve it!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href="/school/student/action/Aprove/"+id;
    }
})


    }




    function imageupload(id) {



$.ajax({
    url: "{{ url('school/student/image') }}/"+id,
    method: "GET",
    data: {
    },
    success: function(data) {
        $("#employee_detail").html(data);
        $("#dataModal").modal("show");
    },
});

}

    </script>






<script>
    $(document).ready(function() {
        $(document).on("click", ".view_data", function() {
            var employee_id = $(this).attr("id");
            if (employee_id != "") {
                $.ajax({
                    url: "student_view/view_student.php",
                    method: "POST",
                    data: {
                        id: employee_id
                    },
                    success: function(data) {
                        $("#employee_detail").html(data);
                        $("#dataModal").modal("show");
                    },
                });
            }
        });
    });







</script>


<script>

    function encodeImageFileAsURL(element) {
      var file = element.files[0];
      var reader = new FileReader();
      reader.onloadend = function() {

   $("#image").val(reader.result);



      }
      reader.readAsDataURL(file);
    }

    function encodeImageFileAsURLSettings(element,HISTORY_OF_THE_ORGANIZATION_IMAGE) {
      var file = element.files[0];
      var reader = new FileReader();
      reader.onloadend = function() {

    $("#"+HISTORY_OF_THE_ORGANIZATION_IMAGE).val(reader.result);
    $("#view_"+HISTORY_OF_THE_ORGANIZATION_IMAGE).attr("src",reader.result);
//    console.log(reader.result);


      }
      reader.readAsDataURL(file);
    }

    </script>












</body>

</html>
