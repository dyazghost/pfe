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
        <li class="nav-item"><a class="nav-link" href="{{route('entrypage')}}">Home</a></li>
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
                                            <center><img src="images/student-login.png" alt="icon"></center><br>
                                            <p class="text-center">
                                                I'm a Student
                                            </p>

                                        </div>
                                    </a>

                                    <a class="col-4" href="{{route('instructor-login')}}">
                                        <div class="p-3 mb-2 bg-primary text-white">
                                            <center><img src="images/teacher-login.png" alt="icon"></center><br>
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
                <a class="nav-link" href="{{route('contact')}}">Contact us</a>
            </li>
        </ul>
        <br>
        @if (\Session::has('success'))
        <div class="row justify-content-center">
            <p class="text-success">
                We successfully received your message!
            </p>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-sm-8 text-center">
                <div class="card card-body bg-light">
                    <form class="form mb-sm-3" action="/contact" method="post">
                        @csrf
                        <fieldset>
                            <legend class="text-center">Contact us</legend>

                            <!-- Name input-->
                            <div class="form-group row">
                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                    <input id="name" value="{{ old('name')}}" name="name" type="text" placeholder="Your name:"
                                        class="form-control">
                                    @error('name')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>

                            </div>

                            <!-- Email input-->
                            <div class="form-group row">
                                <label class="col-sm-4 control-label" for="email">Your e-mail</label>
                                <div class="col-sm-8">
                                    <input id="email" name="email" value="{{ old('email')}}" type="text" placeholder="Your email:"
                                        class="form-control">
                                    @error('email')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="form-group row">
                                <label class="col-sm-4 control-label" for="message">Your message:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" value="{{ old('message')}}" id="message" name="message"
                                        placeholder="Please enter your message here..." rows="5"></textarea>
                                    @error('message')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br>
    <footer class="footer">
        <div class="container">
            <div class="footer-copyright text-white text-center py-3">© 2020 Copyright:
                <a href="http://www.fsr.ac.ma"> FSR</a>
            </div>
        </div>
    </footer>

</body>

</html>