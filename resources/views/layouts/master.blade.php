<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Furbook</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Jquery library -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
 <body>
    <div class="container">
        <div class="page-header">
            @yield('header')
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('.datepicker').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</body>
 </html>