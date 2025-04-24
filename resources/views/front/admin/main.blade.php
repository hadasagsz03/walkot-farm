<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <title>Admin Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')
</head>
<body class="bg-green-50 flex">
    @include('front.admin.sidebar')

    <div class="ml-64 flex-1 flex flex-col min-h-screen">
        @include('front.admin.header')
        <main class="p-6 flex-1">
            @yield('content')
        </main>
        @include('front.admin.footer')
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownTanaman');
            dropdown.classList.toggle('hidden');
        }
    </script>

    @stack('scripts')
</body>
</html>
