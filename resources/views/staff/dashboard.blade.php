<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management System</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/logonew.png')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{asset('assets/images/logos/logonew.png')}}" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Products</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('requests')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Requests</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('assets/images/profile/user-1.jpg')}}" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="{{route('staff.logout',$staff->id)}}"
                                            class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->

                <div class="row">

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="card-title fw-semibold mb-4">Product List</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#equipmentForm">Add New Product</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Product Type</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Product Title</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Product Description</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Product Code</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Product Location</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Action</h6>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td><span class="fw-normal">{{$product->product_type}}</span></td>
                                                <td><span class="fw-normal">{{$product->product_title}}</span></td>
                                                <td><span class="fw-normal">{{$product->product_desc}}</span></td>
                                                <!-- <td><span class="fw-normal">{!! DNS1D::getBarcodeHTML("$product->product_code",'PHARMA') !!}</span>
                                                p - {{$product->product_code}}
                                                </td> -->
                                                <td><span class="fw-normal">{!!
                                                        DNS1D::getBarcodeHTML("$product->product_code",'PHARMA')
                                                        !!}</span>
                                                    p - {{$product->product_code}}
                                                </td>


                                                <td><span class="fw-normal">{{$product->product_location}}</span></td>
                                                <td>
                                                    <a href="" class="btn btn-info">Download Barcode</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                                        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                                        crossorigin="anonymous"></script>
                                    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
                                    <script>
                                        let table = new DataTable('.table');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="{{asset('assets/images/products/s4.jpg')}}"
                                        class="card-img-top rounded-0" alt="..."></a>
                                <a href="javascript:void(0)"
                                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                                        class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">$50 <span
                                            class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="{{asset('assets/images/products/s5.jpg')}}"
                                        class="card-img-top rounded-0" alt="..."></a>
                                <a href="javascript:void(0)"
                                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                                        class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">$650 <span
                                            class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="{{asset('assets/images/products/s7.jpg')}}"
                                        class="card-img-top rounded-0" alt="..."></a>
                                <a href="javascript:void(0)"
                                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                                        class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">$150 <span
                                            class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="me-1" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                        <li><a class="" href="javascript:void(0)"><i
                                                    class="ti ti-star text-warning"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>




    <!-- Modal Start -->
    <div class="modal fade" id="equipmentForm" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                    <div class="alert  alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('add.product')}}" id="addProduct" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="product_title" class="form-label">Select Type of Product</label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="">Select option</option>
                                <option value="development board">Development Boards</option>
                                <option value="equipments">Equipments</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_title" class="form-label">Product Title</label>
                            <input type="text" name="product_title" class="form-control" id="product_title"
                                placeholder="Enter your product title">
                        </div>
                        <div class="mb-3">
                            <label for="product_desc" class="form-label">Product Description</label>
                            <input type="product_desc" name="product_desc" class="form-control" id="product_desc"
                                placeholder="Enter your Product Description">
                        </div>
                        <div class="mb-3">
                            <label for="product_location" class="form-label">Product Location</label>
                            <input type="text" name="product_location" class="form-control" id="product_location"
                                placeholder="Enter your Product Location">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#addProduct').validate({
            rules: {
                product_title: {
                    required: true
                },
                product_desc: {
                    required: true,

                },
                product_location: {
                    required: true,

                },


            },
            messages: {
                // Define custom error messages for each field if needed
                product_title: {
                    required: "Please enter product title"
                },
                product_desc: {
                    required: "Please enter product description"
                },
                product_location: {
                    required: "Please enter product location"
                },



            },

            submitHandler: function(form) {
                // If the form is valid, submit it
                form.submit();
            }

        });
    });
    </script>
    <!-- Modal End -->
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
</body>

</html>