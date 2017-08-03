<!DOCTYPE html>
<html lang="es">
<head>
    @include('layouts.head')
</head>
    <body>
        @include('layouts.header')
        <!--<div class="content" style="min-height: 500px">-->
            <div id="wrapper">
                <div id="page-wrapper">
                    <!--<div class="container-fluid">-->
                    @yield('content')
                    <!--</div>-->
                </div>
            </div>
    </body>
    <footer>
            @include('layouts.footer')
    </footer>
</html>