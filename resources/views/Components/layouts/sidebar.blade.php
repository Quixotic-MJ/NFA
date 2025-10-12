<aside class="bg-white border-r border-gray-200 text-gray-700 flex flex-col transition-all duration-300 ease-in-out" 
       :class="sidebarOpen ? 'w-64' : 'w-20'" x-data="{ sidebarOpen: true }">
    
    <!-- Logo Section -->
    <div class="p-6 flex items-center justify-between">
        <div class="flex items-center space-x-3" :class="sidebarOpen ? 'w-full' : 'w-0 overflow-hidden'">
            <div class="w-10 h-9 bg-gray-900 rounded flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="NFA Logo" class="w-full h-full object-contain p-1">
            </div>
            <div class="min-w-0">
                <h1 class="text-lg font-semibold text-gray-900 truncate">NFA ERP</h1>
                <p class="text-gray-500 text-xs truncate">National Food Authority</p>
            </div>
        </div>
        
        <!-- Toggle Button -->
        <button @click="sidebarOpen = !sidebarOpen" 
                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded transition-colors flex-shrink-0">
            <i class="fas fa-bars text-sm" x-show="sidebarOpen"></i>
            <i class="fas fa-chevron-right text-sm" x-show="!sidebarOpen"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-tachometer-alt w-5 text-center {{ request()->routeIs('dashboard') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="font-medium transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Dashboard</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Dashboard
            </div>
        </a>

        <!-- Inventory -->
        <a href="{{ route('inventory') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('inventory.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-boxes w-5 text-center {{ request()->routeIs('inventory.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Inventory</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Inventory
            </div>
        </a>

        <!-- Purchasing -->
        <a href="{{ route('purchasing') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('purchasing.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-shopping-cart w-5 text-center {{ request()->routeIs('purchasing.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Purchasing</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Purchasing
            </div>
        </a>

        <!-- Reports -->
        <a href="{{ route('reports') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('reports.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-chart-bar w-5 text-center {{ request()->routeIs('reports.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Reports</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Reports
            </div>
        </a>

        <!-- Distribution -->
        <a href="{{ route('distribution') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('distribution.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-truck w-5 text-center {{ request()->routeIs('distribution.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Distribution</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Distribution
            </div>
        </a>

        <!-- Warehouses -->
        <a href="{{ route('warehouses') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('warehouses.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-warehouse w-5 text-center {{ request()->routeIs('warehouses.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Warehouses</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Warehouses
            </div>
        </a>

        <!-- User Management -->
        <a href="{{ route('users') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('users.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-users w-5 text-center {{ request()->routeIs('users.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">User Management</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                User Management
            </div>
        </a>

         <!-- User Management -->
        <a href="{{ route('forms') }}" 
           class="flex items-center space-x-3 py-3 px-4 transition-colors group relative {{ request()->routeIs('users.*') ? 'bg-gray-100 text-gray-900 border-l-4 border-gray-900' : 'hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300' }} cursor-pointer">
            <i class="fas fa-users w-5 text-center {{ request()->routeIs('users.*') ? 'text-gray-600' : 'text-gray-500' }} flex-shrink-0"></i>
            <span class="transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Forms Management</span>
            <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50">
                Forms
            </div>
        </a>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-gray-200">
        <div class="text-center text-gray-500 text-xs transition-opacity duration-200" 
             :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            © 2025 National Food Authority
        </div>
    </div>
</aside>

<!-- Include Alpine.js for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    /* Smooth transitions for all collapsible elements */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Ensure tooltips don't cause layout shifts */
    .group:hover .group-hover\:opacity-100 {
        transition-delay: 100ms;
    }
</style>