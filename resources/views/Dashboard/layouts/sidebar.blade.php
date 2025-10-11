<aside class="w-64 bg-white border-r border-gray-200 text-gray-700 flex flex-col">
    <!-- Logo Section -->
    <div class="p-6">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-9 bg-gray-900 rounded flex items-center justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="NFA Logo" class="w-full h-full object-cover">
            </div>
            <div>
                <h1 class="text-lg font-semibold text-gray-900">NFA ERP</h1>
                <p class="text-gray-500 text-xs">National Food Authority</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1">
        <a
            class="flex items-center space-x-3 py-3 px-4 bg-gray-100 text-gray-900 border-l-4 border-gray-900 cursor-default">
            <i class="fas fa-tachometer-alt w-5 text-center text-gray-600"></i>
            <span class="font-medium">Dashboard</span>
        </a>
        <a
            class="flex items-center space-x-3 py-3 px-4 hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300 cursor-pointer transition-colors">
            <i class="fas fa-boxes w-5 text-center text-gray-500"></i>
            <span>Inventory</span>
        </a>
        <a
            class="flex items-center space-x-3 py-3 px-4 hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300 cursor-pointer transition-colors">
            <i class="fas fa-shopping-cart w-5 text-center text-gray-500"></i>
            <span>Purchasing</span>
        </a>
        <a
            class="flex items-center space-x-3 py-3 px-4 hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300 cursor-pointer transition-colors">
            <i class="fas fa-chart-bar w-5 text-center text-gray-500"></i>
            <span>Reports</span>
        </a>
        <a
            class="flex items-center space-x-3 py-3 px-4 hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300 cursor-pointer transition-colors">
            <i class="fas fa-truck w-5 text-center text-gray-500"></i>
            <span>Distribution</span>
        </a>
        <a
            class="flex items-center space-x-3 py-3 px-4 hover:bg-gray-50 text-gray-700 border-l-4 border-transparent hover:border-gray-300 cursor-pointer transition-colors">
            <i class="fas fa-warehouse w-5 text-center text-gray-500"></i>
            <span>Warehouses</span>
        </a>
    </nav>

    <!-- User Profile & Footer -->
    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center space-x-3 mb-4 p-3 rounded bg-gray-50">
            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-gray-600 text-sm"></i>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">Admin User</p>
                <p class="text-xs text-gray-500">System Administrator</p>
            </div>
        </div>
        <div class="text-center text-gray-500 text-xs pt-3 border-t border-gray-200">
            © 2025 National Food Authority
        </div>
    </div>
</aside>
