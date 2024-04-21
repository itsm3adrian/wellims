<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

    html,
    body {
        height: 100%;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-image: linear-gradient(to top, #2575FC 0%, #EA3A31 100%);
    }

    label.error {
        color: red;
        /* Change the color to red */
        font-size: 0.875rem;
        /* Optionally adjust font size */
    }
    .demo-container {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-lg {
        padding: 12px 26px;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    ::placeholder {
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    .form-control-lg {
        font-size: 16px;
        padding: 25px 20px;
    }

    .font-500 {
        font-weight: 500;
    }

    .image-size-small {
        width: 140px;
        margin: 0 auto;
    }

    .image-size-small img {
        width: 140px;
        margin-bottom: -70px;
    }

    .icon-camera {
        position: absolute;
        right: -1px;
        top: 21px;
        width: 30px;
        height: 30px;
        background-color: #FFF;
        border-radius: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    </style>
</head>

<body>
    <div class="demo-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="text-center image-size-small position-relative">
                        <img src="https://annedece.sirv.com/Images/user-vector.jpg" class="rounded-circle p-2 bg-white">
                    </div>
                    <div class="p-5 bg-white rounded shadow-lg">
                        <h3 class="mb-2 text-center pt-5">Admin Login</h3>
                        <p class="text-center lead">Sign In to manage all your modules</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('check.adminlogin')}}" id="AdminLogin" method="POST">
                            @csrf
                            <label class="font-500">Email</label>
                            <input name="adminemail" id="adminemail" class="form-control form-control-lg mb-3" type="email"><br>
                            <label class="font-500">Password</label>
                            <input name="adminpassword" id="adminpassword" class="form-control form-control-lg" type="password">
                            <p class="m-0 py-4"><a href="" class="text-muted">Forget password?</a></p>
                            <input class="btn btn-primary btn-lg w-100 shadow-lg"  type="submit" value="SIGN IN">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#AdminLogin').validate({
            rules: {
                adminemail: {
                    required: true,
                    email: true
                },
                
                adminpassword: {
                    required: true,
                    minlength: 8
                },

            },
            messages: {
                // Define custom error messages for each field if needed
                adminemail: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address",
                    remote: "Email address already exists"
                },
                adminpassword: {
                    required: "Please enter your password",
                    minlength: "Your password must be at least 8 characters long"
                },
                
            },

            submitHandler: function(form) {
                // If the form is valid, submit it
                form.submit();
            }

        });
    });
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>