<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    body {
        background-color: rgba(230, 230, 230, 0.5);
    }

    footer {
        background-color: #3E085B;
        position: sticky;
        margin-top: 20px;
        left: 0;
        bottom: 0;
        height: 50px;
        width: 100%;
        overflow: hidden;
    }
    </style>
</head>

<body>
    <a href="{{route('entrypage')}}"><img src={{ URL::asset("images/banner-edited.png") }} class="mx-auto d-block"
            alt="banner" style="width:100%"></a>
    <br>

    <div class="container">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="#myModal">Login</a>

                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Identify yourself!</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <a class="col-4" href="{{route('student-login')}}">
                                        <div class="p-3 mb-2 bg-info text-white">
                                            <center><img src={{ URL::asset("images/student-login.png") }} alt="icon">
                                            </center><br>
                                            <p class="text-center">
                                                I'm a Student
                                            </p>

                                        </div>
                                    </a>

                                    <a class="col-4" href="{{route('instructor-login')}}">
                                        <div class="p-3 mb-2 bg-primary text-white">
                                            <center><img src={{ URL::asset("images/teacher-login.png") }} alt="icon">
                                            </center><br>
                                            <p class="text-center">
                                                I'm a Teacher
                                            </p>

                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('contact')}}">Contact us</a>
            </li>
        </ul>

        <br>

        <div class="row justify-content-center">

            <div class="col-4">
                <div class="p-3 mb-2 bg-primary text-white">
                    <center><img src={{ URL::asset("images/teacher-login.png") }} alt="icon"></center><br>
                    <div class="login-form">
                        <form action="{{ url("login/$url") }}" method="post">
                            @csrf
                            <h2 class="text-center">Log in</h2>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                    required="required">
                                @error('email')
                                <div class="row justify-content-center mt-sm-2 mb-sm-1">
                                <strong><p class="text-danger">Invalid email. Try Again!</p></strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required="required">
                                @error('password')
                                <div class="row justify-content-center mt-sm-2 mb-sm-1">
                                    <strong><p class="text-danger">Invalid password. Try Again!</p></strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block">Log in</button>
                            </div>
                            <div class="clearfix mb-sm-3">
                                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                                <p><a href="#" class="float-right text-dark">Forgot Password?</a></p>
                            </div>
                            <p class="text-center"><a class="text-dark" href={{ route('instructor-register') }}>Create
                                    an Account</a></p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div><br>
    <footer class="footer">
        <div class="container">
            <div class="footer-copyright text-center text-white py-3">© 2020 Copyright:
                <a href="http://www.fsr.ac.ma"> FSR</a>
            </div>
        </div>
    </footer>

</body>

</html>