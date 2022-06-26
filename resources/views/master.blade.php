<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <link rel="icon" type="image/x-icon" href="{{url('images/title_head.ico')}}"> -->
    <link rel="icon" type="image/x-icon" href="{{asset('images/title_head.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <style>
    html,
    body {
        background-color: #B67B4D;
        /* font-family: 'Raleway', sans-serif; */
        /* height: 100vh; */
        margin: 0;
    }

    .fa-add {
        content: url({{url('images/punch.png')}});
        width: 30px;
    }

    .fa-edit {
        content: url({{url('images/edit.png')}});
        width: 30px;
    }

    .fa-delete {
        content: url({{url('images/trash.png')}});
        width: 30px;
    }

    /* .fa-delete {
        content: url({{url('images/trash.png')}});
        width: 30px;
    } */
    </style>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</head>

<body >

    <!-- TopMenu -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/doremon.png')}}" alt=""></a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/positions">Position</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>
    </nav>
    <!-- End TopMenu -->

    <div class="container">
    <br>
    <h4><b>@yield('title_page')</b> </h4>
        <div class="card" style="margin-top:25px;">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>

    <div style="width:100%;text-align:right;background-color:#343a40;color:white;padding:15px;position:absolute;bottom:0;margin-top:75px">
    Test Lab laravel 5.4
    </div>
</body>


</html>
