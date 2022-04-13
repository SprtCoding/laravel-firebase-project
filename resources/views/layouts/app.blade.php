<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <title>laravel-firebase</title>
</head>

<body>

    @yield('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);

        * {
            font-family: 'Roboto Condensed';
        }

        .container-fluid {
            padding-left: 85px;
        }
        .userCol {
            border-left: 6px solid #242f3f;
            height: 700px;
        }

        #vertical-line {
            width: 1px;
            height: 700px;
            background-color: #242f3f;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            width:100%;
            height:100%;
          }
          .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display:flex;
            justify-content: center;
            align-items: center;
          }
          .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
          }
          .loader-inner {
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
          }

          @keyframes loader {
            0% { transform: rotate(0deg);}
            25% { transform: rotate(180deg);}
            50% { transform: rotate(180deg);}
            75% { transform: rotate(360deg);}
            100% { transform: rotate(360deg);}
          }

          @keyframes loader-inner {
            0% { height: 0%;}
            25% { height: 0%;}
            50% { height: 100%;}
            75% { height: 100%;}
            100% { height: 0%;}
          }

        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display:flex;
            justify-content: center;
            align-items: center;
          }

          .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
          }

        tbody {
            font-size: 17px;
            font-weight: 400;
        }

        .navbar #menu-btn {
            color: #fff;
            position: absolute;
            left: 50%;
            top: 6px;
            font-size: 20px;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            transform: translateX(-50%);
        }

        .navbar .nav-text {
            opacity: 0;
            display: none;
            pointer-events: none;
        }

        .navbar.active .nav-text {
            opacity: 1;
            display: inline;
            pointer-events: auto;
        }

        .navbar.active #menu-btn {
            left: 90%;
        }

        .navbar ul li a {
            transition: all 0.4s ease;
            border-radius: 12px;
        }

        .navbar ul li a i {
            height: 40px;
            min-width: 20px;
            border-radius: 12px;
            line-height: 20px;
            text-align: center;
        }

        .navbar.active ul li a i {
            height: 50px;
            min-width: 50px;
            border-radius: 12px;
            line-height: 50px;
            text-align: center;
        }

        .navbar.active .navbar-brand .logo {
            padding-left: 5px;
            padding-right: 5px;
            margin-top: 40px;
            width: 160px;
            opacity: 1;
        }

        .navbar .navbar-brand .logo {
            opacity: 0;
            pointer-events: none;
        }

        .navbar.active {
            width: 240px;
        }

        .active-cont {
            margin-left: 160px;
        }

        .my-container {
            transition: 0.5s;
        }

        .btn {
            width: 150px;
        }

        .chese {
            border: 2px solid #35C496;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 10px;
        }

        .m {
            color: #35C496;
            font-weight: 400;
        }

        .align-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stock {
            border: 2px solid #35c4b8;
            border-radius: 20px;
            width: 70px;
            background-color: #35C496;
        }

        .total {
            width: 90px;
            text-align: center;
        }

        .total1 {
            width: 60px;
            text-align: center;
        }

        .mytext {
            width: 150px;
            margin-left: 30px;
        }

        .img-thumbnail {
            border: none;
            margin-top: 20px;
        }

        .navbar {
            width: 75px;
            height: 100vh;
            position: fixed;
            margin-left: 0px;
            background-color: #36474F;
            transition: all 0.5s ease;
        }

        .nav-link {
            font-size: 1.25rem;
        }

        .nav-link:active,
        .nav-link:focus,
        .nav-link:hover {
            background-color: #ffffff26;
        }

        .logo {
            font-weight: 400;
            letter-spacing: 0.2rem;
            width: 12rem;
            padding: 5px;
            color: #808080;
            text-align: center;
        }

        .create-text {
            font-size: 1.5rem;
        }

        .h1 {
            color: #A6A6A8;
            letter-spacing: 0.2rem;
        }

        .mask-custom {
            background: #fff;
            border-radius: 2em;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.05);
            background-clip: padding-box;
            box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }

    </style>
    {{-- JQuery Js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    {{-- Bootstrap Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-firestore.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-analytics.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
    <script src="https://kit.fontawesome.com/5940644ca7.js" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    @stack('script')

</body>

</html>
