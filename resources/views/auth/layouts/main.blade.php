<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIBAU</title>

    <link href="/assets/img/favicon.png" rel="icon">
    <!-- CSS Start -->
        <!-- Bootstrap 5.3.2 CSS Start -->
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <!-- Bootstrap 5.3.2 CSS End -->

        <!-- Fontawesome 6.4.2 CSS Start -->
        <link rel="stylesheet" type="text/css" href="/assets/css/all.min.css"></link>
        <!-- Fontawesome 6.4.2 CSS End -->

        <!-- Vanilla CSS Start -->
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        @yield('css')
        <!-- Vanilla CSS End -->
    <!-- CSS End -->
  </head>

  
  <body>
    @yield('content')
    
    <!-- JavaScript Start -->
        <!-- Fontawesome 6.4.2 JS Start -->
        <script type="module" src="/assets/js/all.min.js"></script>
        <!-- Fontawesome 6.4.2 JS End -->

        <!-- JQuery 3.7.1 JS Start -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="/assets/js/jquery-3.7.1.min.js"></script>
        <!-- JQuery 3.7.1 JS End -->

        <!-- Bootstrap 5.3.2 JS Start -->
        <script type="module" src="/assets/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap 5.3.2 JS End -->

        <!-- Vanilla JS Start -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        @yield('js')
        <!-- Vanilla JS End -->
    <!-- JavaScript End -->
  </body>
</html>