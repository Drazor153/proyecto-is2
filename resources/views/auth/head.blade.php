<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/bootstrap.min.css')
  <title>@yield('title')</title>
</head>
<body class="vh-100">
  <div class="container h-100 py-5" style="max-width: 500px">
    @yield('content')
  </div>
</body>
</html>