
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts/linkHeader')
    @yield('link')
</head>
<body>
<div  >
    @include('layouts/header')
    <div class='menu'>
        @include('layouts/menuPanelAdmin')
    </div>
    <div style="overflow: auto" class="body_admin" class="col-9">
        @yield('content')
    </div>
</div>
@include('layouts/linkBody')
</body>
</html>
