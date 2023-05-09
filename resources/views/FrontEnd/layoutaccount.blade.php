<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!-- Font Icon -->
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);

        body {
            background: #ffffff;
            color: #414141;
            font: 400 17px/2em 'Source Sans Pro', sans-serif;
        }

        .select-box {
            cursor: pointer;
            position: relative;
            /* max-width: 20em;
            margin: 5em auto;
            width: 100%; */
        }

        .select,
        .label {
            color: #414141;
            display: block;
            font: 400 17px/2em 'Source Sans Pro', sans-serif;
        }

        .select {
            width: 100%;
            position: absolute;
            top: 0;
            padding: 5px 0;
            height: 40px;
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            background: none transparent;
            border: 0 none;
        }

        .select-box1 {
            background: #ececec;
        }

        .label {
            position: relative;
            padding: 5px 10px;
            cursor: pointer;
        }

        .open .label::after {
            content: "▲";
        }

        .label::after {
            content: "▼";
            font-size: 12px;
            position: absolute;
            right: 0;
            top: 0;
            padding: 5px 15px;
            border-left: 5px solid #fff;
        }
    </style>
</head>

<body>
    {{-- <div class="main"> --}}
    @yield('Sign')
    {{-- </div> --}}
    <!-- JS -->

    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>

    @if (session('message'))
        <script>
            alert('{{ session('message') }}');
        </script>
    @endif
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
