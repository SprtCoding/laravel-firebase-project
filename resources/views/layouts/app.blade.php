<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>laravel-firebase</title>
</head>

<body>

    @yield('content')
    {{-- JQuery Js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    {{-- Bootstrap Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    </script>

    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-firestore.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-analytics.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>

    @stack('script')
</body>

</html>
