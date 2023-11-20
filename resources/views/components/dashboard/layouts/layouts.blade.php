<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIBAU | Dashboard</title>

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <!-- CSS Start -->
        <!-- Bootstrap 5.3.2 CSS Start -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Bootstrap 5.3.2 CSS End -->

        <!-- Fontawesome 6.4.2 CSS Start -->
        {{-- <link rel="stylesheet" type="text/css" href="/assets/css/all.min.css"></link> --}}
        <!-- Fontawesome 6.4.2 CSS End -->

        <!-- Bootstrap Icons v1.11.1 CSS Start -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
        <!-- Bootstrap Icons v1.11.1 CSS End -->

        <!-- Vanilla CSS Start -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/dashboard.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard/main.css') }}">
        {{ $css ?? '' }} <!-- Slot CSS -->
        <!-- Vanilla CSS End -->
    <!-- CSS End -->
    
        <!-- SVG Start -->
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                />
            </symbol>
            <symbol id="info-fill" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                />
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                />
            </symbol>
        </svg>
        <!-- SVG Start -->

    <!-- JS Start -->
    {{ $js_head ?? '' }} <!-- Slot JS Head -->
    <!-- JS End -->

  </head>

  <body>
    <x-dashboard.partials.navbar />
    <x-dashboard.partials.sidebar :menus="$menus"/>

    <main id="main" class="main">
        <x-dashboard.partials.breadcrumb :menus="$menus" />
        {{ $slot }} <!-- Slot -->
    </main>

    <!-- JavaScript Start -->
        <!-- Fontawesome 6.4.2 JS Start -->
        {{-- <script type="module" src="{{ asset('assets/js/all.min.js') }}"></script> --}}
        <!-- Fontawesome 6.4.2 JS End -->

        <!-- JQuery 3.7.1 JS Start -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <!-- JQuery 3.7.1 JS End -->

        <!-- Bootstrap 5.3.2 JS Start -->
        <script type="module" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Bootstrap 5.3.2 JS End -->

        <!-- Sweetalert JS Start -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- Sweetalert JS End -->

        <!-- Vanilla JS Start -->
        <script type="module" src="{{ asset('assets/js/dashboard/dashboard.js') }}"></script>
        {{ $js_body ?? '' }} <!-- Slot JS Body -->
        <!-- Vanilla JS End -->
    <!-- JavaScript End -->


  </body>
</html>
