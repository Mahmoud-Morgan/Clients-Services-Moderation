<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid"> 
          
            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <a class="navbar-brand" href="#">Digital Media Footprint</a>
                <div class="navbar-nav" style="width:80%; align=right;">
                    <a class="nav-item nav-link" style="align=right;" href="#">Clients</a>
                    <a class="nav-item nav-link" href="{{ route('servicename.index') }}">Services Providing</a>
                </div>
            </nav>

            @yield('content')

            <div class="fixed-bottom" style="text-align: center; background-color: #e3f2fd;">
              &copy; DS 2020
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>