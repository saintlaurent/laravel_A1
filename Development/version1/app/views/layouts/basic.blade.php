<!DOCTYPE html>
<html>
<head>
    <title>Create Yo' Account</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}" type="text/css">
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin:2em;
            font-family:'Lato', sans-serif;
            color: #999;

        }



        .welcome {
            width: 300px;
            height: 200px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }

        a, a:visited {
            text-decoration:none;
        }

        h1 {
            font-size: 32px;
            margin: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield ('maincontent')
    </div>
    
</body>
</html>
