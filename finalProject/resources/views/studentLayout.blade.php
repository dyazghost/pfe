<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgba(230, 230, 230, 0.5);

    }

    .table {
        width: 100% !important;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #0080ff;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }

    .top-right {
        position: absolute;
        right: 40px;
        top: 2px;
    }

    footer {
        background-color: #0080FF;
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
    <div class="topnav" id="myTopnav">
        <a href="{{ route('logged-student')}}" class="active"><img src={{ URL::asset("images/student.png") }} alt=""
                width="24"></a>
        <a style="pointer-events: none; cursor: default;" href="">Student Dashboard</a>

        <div class="top-right links">
            <a type="button" class="btn btn-dark btn-sm pb-2 mr-2" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                href={{ route('student-login') }}>Logout</a>
            <form id="logout-form" method="POST" action={{ route('logout') }}>
                @csrf
            </form>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>


    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    </script>

    @yield('studentContent')

    <footer class="footer">
        <div class="container">
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a class="text-dark" href="http://www.fsr.ac.ma"> FSR</a>
            </div>
        </div>
    </footer>
</body>

</html>