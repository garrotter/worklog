<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/flatpicker/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('layouts/nav')

            <div class="col-lg-10 ml-auto min-vh-100
                @isset($dayObj)
                    {{ !$dayObj->sd ? 'workday' : ($dayObj->sd==='r' ? 'restday' : ($dayObj->sd ==='h' ? 'holiday' : '')) }}

                    {{ date('N', strtotime($dayObj->date))==='7' || $dayObj->sd ==='h' ? 'holiday' : '' }}
                    
                    @if (date('N', strtotime($dayObj->date))==='7' || $dayObj->sd ==='h')
                        holiday
                    @elseif ((date('N', strtotime($dayObj->date))==='6' && !$dayObj->sd) || $dayObj->sd==="r")
                        restday
                    @endif
                @endisset
            ">
                <div class="row">
                    <header class="col-12 mb-3 bg-k2">
                        <div class="todaysdate">
                            Ma <span id="todaysname"></span> van.
                        </div>
                    </header>
                </div>

                @yield('content')

            </div>
        </div>
    </div>    

    <!-- Scripts -->

    <script src="{{ asset('lib/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('lib/popper.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('lib/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('lib/select2/select2.min.js') }}"></script>
    <script src="{{ asset('lib/flatpicker/flatpickr.js') }}"></script>
    <script src="{{ asset('lib/flatpicker/hu.js') }}"></script>

    <script>
        $('.select2-multi').select2();

        $('#summernote').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']]
            ],
            tabsize: 2,
            height: 200
        });
    </script>


    <script src="{{ asset('js/worklog.js') }}"></script>
</body>
</html>
