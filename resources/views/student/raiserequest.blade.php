<!doctype html>
<html lang="en">

<head>
    <title>Raise a Issue Request</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <style>
    .error {
        color: red;
    }
    </style>

</head>

<body>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1>Request a Issue!</h1>
        <form action="{{route('send.request')}}" id="requestIssue" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="sfname" aria-describedby="emailHelp" name="sfname"
                            value="{{$student->fullname}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="semail" aria-describedby="emailHelp"
                            value="{{$student->email}}" name="semail">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dept" class="form-label">Department</label>
                        <input type="text" class="form-control" id="sdept" aria-describedby="emailHelp" name="sdept"
                            value="{{$student->department}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Roll Number</label>
                        <input type="text" class="form-control" id="srollno" aria-describedby="emailHelp"
                            value="{{$student->rollno}}" name="srollno">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dept" class="form-label">Select a Developement Board</label>
                        <select name="reqdevboard" id="reqdevboard" class="form-control">
                            <option value="">Select</option>
                            @foreach($developmentboards as $id => $product_title)
                            <option value="{{ $id }}">{{ $product_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Select a Equipment </label>
                        <select name="reqequipment" id="reqequipment" class="form-control">
                            <option value="">Select</option>
                            @foreach($equipments as $id => $product_title)
                            <option value="{{ $id }}">{{ $product_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input class="btn btn-primary" value="Send" type="submit">
                </div>
                <div class="col-md-6">
                    <p>Don't forget to <a href="{{route('student.logout',$student->id)}}"
                            class="btn btn-danger">Logout</a> once you
                        submitted form!</p>
                </div>
            </div>

        </form>


    </div>

    <script>
    $(document).ready(function() {
        $('#requestIssue').validate({
            rules: {
                devboard: {
                    required: true,
                },
                equipment: {
                    required: true,
                }
            },
            messages: {
                // Define custom error messages for each field if needed
                devboard: {
                    required: "please select development board of your choice",
                },
                equipment: {
                    required: "please select equipment of your choice",

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