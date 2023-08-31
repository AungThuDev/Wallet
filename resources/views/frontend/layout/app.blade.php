<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!--Bootrap Css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

    @yield('extra_css')

</head>
<body>
    <div id="app">
        
    <div class="header-menu">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row a">
                    <!-- <div class="col-4 text-center"><a href=""><i class="fas fa-home"></i><p>Home</p></a></div> -->
                        <div class="col-6 text-center"><h3>@yield('page_title')</h3></div>
                        <div class="col-6 text-center"><a href=""><i class="fas fa-bell"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>

        <div class="bottom-menu">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-4 text-center"><a href="{{route('home')}}"><i class="fas fa-home"></i><p>Home</p></a></div>
                        <div class="col-4 text-center"><a href=""><i class="fas fa-qrcode"></i> <p>Scan</p></a> </div>
                        <div class="col-4 text-center"><a href="{{route('profile')}}"><i class="fas fa-user-tie"></i><p>Account</p></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Bootstrap Js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
