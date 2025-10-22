<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NFA ERP System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        
        .sidebar-transition {
            transition: margin-left 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: window.innerWidth >= 1024 ? true : false }">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('Components.layouts.admin.admin-layouts.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col" :class="sidebarOpen ? 'ml-64' : 'ml-20'">
            <!-- Header -->
            @include('Components.layouts.admin.admin-layouts.header')

            <!-- Page Content -->
            <main class="flex-1 overflow-auto">
                <div class="p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>