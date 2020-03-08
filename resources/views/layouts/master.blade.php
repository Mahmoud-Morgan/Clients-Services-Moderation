<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        
             <a class="navbar-brand"   href="#">Digital Media Footprint</a>
             <a class="nav-link" href="#">Clients</a>
             <a class="nav-link" href="#">Services Providing</a>
            </nav>

            @yield('content')

            <div class="" style="text-align: center;background-color: #e3f2fd;">
              &copy; DS 2020
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>