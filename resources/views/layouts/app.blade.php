<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

    @stack('styles')

    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/jquery/jquery.debounce.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('js/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('js/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('js/filepond.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/lazysizes.min.js') }}" async=""></script>
    <script src="{{ asset('js/turbolinks.js') }}" data-turbolinks-track="reload"></script>
</head>

<body data-sidebar="dark">

    @include('partial.header.page-loading')

    <div id="layout-wrapper">

        @auth('admin')
            @include('partial.header.header')
            @include('partial.left-sidebar.left-sidebar')
        @endauth

        {{ $slot }}

    </div>

    @auth('admin')
        @include('partial.modal')
        @include('partial.footer')
        @include('partial.right-sidebar.right-sidebar')
        @include('partial.rightbar-overlay.rightbar-overlay')
    @endauth

    <x-toaster />

    <livewire:styles />
    <livewire:scripts />

    <script>
        var APP_URL = "{{ config('app.url') }}";

    </script>

    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/livewire-turbolinks.js') }}" data-turbolinks-eval="false"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/once-load.js') }}" data-turbolinks-eval="false"></script>

    @stack('scripts')
</body>

</html>
