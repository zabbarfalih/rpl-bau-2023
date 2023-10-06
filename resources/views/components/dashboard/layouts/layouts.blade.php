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