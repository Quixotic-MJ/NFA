<header class="bg-white border-b border-gray-200">
    <div class="flex justify-between items-center px-8 py-4">
        <div>
            <h1 class="text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard Overview')</h1>
            <p class="text-gray-600 text-sm mt-1">@yield('page-description', 'Welcome back, Admin. Here\'s what\'s happening today.')</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" placeholder="Search everywhere..." 
                    class="pl-10 pr-4 py-2 border border-gray-300 focus:border-gray-400 focus:ring-1 focus:ring-gray-200 outline-none w-64 text-sm">
            </div>
            <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors relative">
                <i class="fas fa-bell"></i>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
        </div>
    </div>
</header>