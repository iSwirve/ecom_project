@if (Auth::check())
    @if(Auth::user()->level == "admin")
    <script type="text/javascript">
        window.location="{{URL::to('admin')}}";
    </script>
    @endif
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>

    .main {
        width: 90%;
        margin: 0 auto;
        margin-top: 200px;
        height: auto;
    }

    h2 {
        border-bottom: 1px solid gray;
    }

    a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
    }

    a:hover {
        background-color: #ddd;
        color: black;
    }

    .previous {
        margin-top: 7vw;
        background-color: #f1f1f1;
        position: absolute;
        font-weight: 900;
        color: black;
    }

    .next {
        margin-top: 7vw;
        float: right;
        background-color: #f1f1f1;
        font-weight: 900;
        color: black;
    }

    .round {
        border-radius: 50%;
    }

    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    </style>
    @yield('customStyle')
</head>
<body style="background-color: lightgray;">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.homepage.header')
    @yield('mainContent')
    @yield('secondContent')
    @include('template.homepage.footer')
</body>
</html>

