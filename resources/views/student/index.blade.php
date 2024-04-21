<!doctype html>
<html lang="en">

<head>
    <title>Inventory Management Login App</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/logonew.png')}}" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Include jQuery before any other scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <style>
    label.error {
        color: red;
        /* Change the color to red */
        font-size: 0.875rem;
        /* Optionally adjust font size */
    }
    </style>
</head>

<body>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif  
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block mt-2">
                                <img src="{{asset('images/ee.jpg')}}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form action="{{route('student.login')}}" id="studentlogin" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <img src="{{asset('images/logonew.png')}}" alt="welLogo">
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account!</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <input type="email" id="form2Example17" name="email"
                                                class="form-control form-control-lg" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="form2Example27" name="password"
                                                class="form-control form-control-lg" />

                                        </div>

                                        <div class="pt-1 mb-4">
                                            <input class="btn btn-danger btn-lg btn-block" value="Login" type="submit">
                                        </div>

                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <button
                                                type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">Register Here</button></p> 
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                        <a href="{{route('get.stafflogin')}}" class="small text-red">Staff Login</a>
                                        <a href="{{route('admin.login')}}" class="small text-red">ADMIN Login</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Register Modal -->

    <!-- Modal Code -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Register Form</h5>
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
                    <form action="{{route('student.register')}}" id="registerStudent" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" id="fullName"
                                placeholder="Enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" id="cpassword"
                                placeholder="Enter your password again">
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="department"
                                placeholder="Enter your Department">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Roll Number</label>
                            <input type="text" class="form-control" name="rollno" id="rollno"
                                placeholder="Enter your Roll Number">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phoneno" id="phone"
                                placeholder="Enter your phone number">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Register" class="btn btn-primary">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#registerStudent').validate({
            rules: {
                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phoneno: {
                    required: true,
                    minlength: 10
                },

                password: {
                    required: true,
                    minlength: 8
                },
                cpassword: {
                    required: true,
                    equalTo: "#password"
                },


                department: {
                    required: true
                },
                rollno: {
                    required: true
                },



            },
            messages: {
                // Define custom error messages for each field if needed
                fullname: {
                    required: "Please enter your full name"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address",
                    remote: "Email address already exists"
                },
                phoneno: {
                    required: "Please enter your phone number",
                    minlength: "Phone number must be at least 10 characters long"
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Your password must be at least 8 characters long"
                },
                cpassword: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                department: {
                    required: "Please enter your department"
                },
                rollno: {
                    required: "Please enter your roll number"
                },


            },

            submitHandler: function(form) {
                // If the form is valid, submit it
                form.submit();
            }

        });
    });
    </script>


    <!-- login script -->

    <script>
    $(document).ready(function() {
        $('#studentlogin').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                // Define custom error messages for each field if needed
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address",
                },
                password: {
                    required: "Please enter your password",

                },
            },

            submitHandler: function(form) {
                // If the form is valid, submit it
                form.submit();
            }

        });
    });
    </script>
</body>


</html>