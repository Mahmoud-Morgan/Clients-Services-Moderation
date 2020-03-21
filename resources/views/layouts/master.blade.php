<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    <body style="padding-bottom: 70px;">
        <div class="container-fluid"> 
          
            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <a class="navbar-brand" href="{{ route('client.index')}}">Digital Media Footprint</a>
                <div class="navbar-nav" style="width:80%; align=right;">
                    <a class="nav-item nav-link" style="align=right;" href="{{ route('client.index') }}">Clients</a>
                    <a class="nav-item nav-link" href="{{ route('servicename.index') }}">Services Providing</a>
                </div>
                       <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </nav>

            @yield('content')

       {{--      <footer style="text-align: center; background-color: #e3f2fd; position: absolute; bottom:0;width: 98%; background-attachment: scroll;">
              &copy; DS 2020
            </footer> --}}
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>