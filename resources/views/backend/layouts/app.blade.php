<!doctype html >
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <!-- Bootstrap 4.6.1 CSS (phù hợp với AdminLTE 3.2) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">

    <!-- Bootstrap Icons (nếu cần) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <title>
        @yield('title')
    </title>
</head>
<body>
<div id="layout-wrapper">
    {{--    @include('backend.layouts.topbar')--}}
    @include('backend.layouts.sidebar')
    <div class="main-content">
        <div class="" style="margin-left: 280px">
            @if(session('success'))
                <div class="toast hide position-fixed" style="z-index: 5; right: 0; top: 10%; width: 300px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                    <div class="toast-header">
                        <strong class="mr-auto">Thành công</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body text-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
                @if(session('error'))
                    <div class="toast hide position-fixed" style="z-index: 5; right: 0; top: 10%; width: 300px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <strong class="mr-auto">Lỗi</strong>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body text-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
<!-- AdminLTE JS -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>

@stack('after-scripts')
</body>
</html>
