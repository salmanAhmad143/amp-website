<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate(true) !!}
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        @include('frontend.layouts.header')

        <!-- Main Container -->
        <div class="container">
            <!-- Left Sidebar -->
            @include('frontend.layouts.leftSidebar')
            <!-- Main Content -->
            <main class="content">
                @yield('content')
            </main>

            <!-- Right Sidebar -->
            @include('frontend.layouts.rightSidebar')            
        </div>

        <!-- Footer -->
        @include('frontend.layouts.footer')
    </div>
     <!-- Custom scripts -->
    <script  src="{{ asset('assets/frontend/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>