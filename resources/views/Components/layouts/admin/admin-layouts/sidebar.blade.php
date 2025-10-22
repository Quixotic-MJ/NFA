<aside
    class="bg-gray-900 border-r border-gray-700 text-gray-300 flex flex-col fixed left-0 top-0 h-screen z-50 transition-all duration-300 ease-in-out overflow-hidden"
    :class="sidebarOpen ? 'w-64' : 'w-20'">

    <!-- Logo Section - Minimal -->
    <div class="p-6 flex items-center justify-between">
        <div class="flex items-center space-x-3" :class="sidebarOpen ? 'w-full' : 'w-0 overflow-hidden'">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="NFA Logo" class="w-5 h-5 object-contain">
            </div>
            <div class="min-w-0">
                <h1 class="text-base font-semibold text-white truncate">NFA ERP</h1>
                <p class="text-gray-400 text-xs truncate">National Food Authority</p>
            </div>
        </div>

        <!-- Toggle Button - Minimal -->
        <button @click="sidebarOpen = !sidebarOpen"
            class="p-1.5 text-gray-400 hover:text-white hover:bg-gray-800 rounded transition-colors flex-shrink-0">
            <i class="fas fa-chevron-left text-xs" x-show="sidebarOpen"></i>
            <i class="fas fa-chevron-right text-xs" x-show="!sidebarOpen"></i>
        </button>
    </div>

    <!-- Navigation - Minimal -->
    <nav class="flex-1 px-3 py-4 space-y-1 transition-all duration-300 ease-in-out"
        :class="sidebarOpen ? 'overflow-y-auto' : 'overflow-hidden'">

        <!-- Dashboard -->
        <a href="{{ route('Dashboard') }}"
            class="flex items-center space-x-3 py-2.5 px-3 rounded-lg transition-all group relative 
                   {{ Route::is('Dashboard')
                       ? 'bg-blue-500/10 text-white border-r-2 border-blue-500'
                       : 'hover:bg-gray-800 text-gray-400 hover:text-white' }} 
                   cursor-pointer">
            <i
                class="fas fa-chart-pie w-4 text-center flex-shrink-0 
                     {{ Route::is('Dashboard') ? 'text-blue-400' : 'text-gray-500 group-hover:text-gray-300' }}"></i>
            <span class="font-medium transition-all duration-200 whitespace-nowrap text-sm"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Dashboard</span>

            <div class="absolute -right-1 top-1/2 transform -translate-y-1/2">
                <div
                    class="w-1.5 h-1.5 bg-blue-500 rounded-full {{ Route::is('Dashboard') ? 'opacity-100' : 'opacity-0' }}">
                </div>
            </div>

            <div x-show="!sidebarOpen"
                class="absolute left-full ml-2 px-2 py-1.5 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-all duration-200 whitespace-nowrap z-50 border border-gray-600">
                Dashboard
            </div>
        </a>

        <!-- User Management -->
        <a href="{{ route('Users') }}"
            class="flex items-center space-x-3 py-2.5 px-3 rounded-lg transition-all group relative 
                   {{ Route::is('Users')
                       ? 'bg-blue-500/10 text-white border-r-2 border-blue-500'
                       : 'hover:bg-gray-800 text-gray-400 hover:text-white' }} 
                   cursor-pointer">
            <i
                class="fas fa-users w-4 text-center flex-shrink-0 
                     {{ Route::is('Users') ? 'text-blue-400' : 'text-gray-500 group-hover:text-gray-300' }}"></i>
            <span class="transition-all duration-200 whitespace-nowrap text-sm"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Users</span>

            <div class="absolute -right-1 top-1/2 transform -translate-y-1/2">
                <div
                    class="w-1.5 h-1.5 bg-blue-500 rounded-full {{ Route::is('Users') ? 'opacity-100' : 'opacity-0' }}">
                </div>
            </div>

            <div x-show="!sidebarOpen"
                class="absolute left-full ml-2 px-2 py-1.5 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-all duration-200 whitespace-nowrap z-50 border border-gray-600">
                Users
            </div>
        </a>

        <!-- Audit Logs -->
        <a href="{{ route('Logs') }}"
            class="flex items-center space-x-3 py-2.5 px-3 rounded-lg transition-all group relative 
                   {{ Route::is('Logs')
                       ? 'bg-blue-500/10 text-white border-r-2 border-blue-500'
                       : 'hover:bg-gray-800 text-gray-400 hover:text-white' }} 
                   cursor-pointer">
            <i
                class="fas fa-clipboard-list w-4 text-center flex-shrink-0 
                     {{ Route::is('Logs') ? 'text-blue-400' : 'text-gray-500 group-hover:text-gray-300' }}"></i>
            <span class="transition-all duration-200 whitespace-nowrap text-sm"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Audit Logs</span>

            <div class="absolute -right-1 top-1/2 transform -translate-y-1/2">
                <div
                    class="w-1.5 h-1.5 bg-blue-500 rounded-full {{ Route::is('Logs') ? 'opacity-100' : 'opacity-0' }}">
                </div>
            </div>

            <div x-show="!sidebarOpen"
                class="absolute left-full ml-2 px-2 py-1.5 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-all duration-200 whitespace-nowrap z-50 border border-gray-600">
                Audit Logs
            </div>
        </a>

        <!-- System Settings -->
        <a href="{{ route('Setting') }}"
            class="flex items-center space-x-3 py-2.5 px-3 rounded-lg transition-all group relative 
                   {{ Route::is('Setting')
                       ? 'bg-blue-500/10 text-white border-r-2 border-blue-500'
                       : 'hover:bg-gray-800 text-gray-400 hover:text-white' }} 
                   cursor-pointer">
            <i
                class="fas fa-cog w-4 text-center flex-shrink-0 
                     {{ Route::is('Setting') ? 'text-blue-400' : 'text-gray-500 group-hover:text-gray-300' }}"></i>
            <span class="transition-all duration-200 whitespace-nowrap text-sm"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'">Settings</span>

            <div class="absolute -right-1 top-1/2 transform -translate-y-1/2">
                <div
                    class="w-1.5 h-1.5 bg-blue-500 rounded-full {{ Route::is('Setting') ? 'opacity-100' : 'opacity-0' }}">
                </div>
            </div>

            <div x-show="!sidebarOpen"
                class="absolute left-full ml-2 px-2 py-1.5 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-all duration-200 whitespace-nowrap z-50 border border-gray-600">
                Settings
            </div>
        </a>
    </nav>

    <!-- Footer - Minimal -->
    <div class="p-4 border-t border-gray-700">
        <div class="text-center text-gray-500 text-xs transition-opacity duration-200"
            :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            © 2025 NFA
        </div>
    </div>
</aside>

<style>
    /* Custom scrollbar - Minimal */
    aside nav::-webkit-scrollbar {
        width: 3px;
    }

    aside nav::-webkit-scrollbar-track {
        background: transparent;
    }

    aside nav::-webkit-scrollbar-thumb {
        background: #4b5563;
        border-radius: 1px;
    }

    aside nav::-webkit-scrollbar-thumb:hover {
        background: #6b7280;
    }

    /* For Firefox */
    aside nav {
        scrollbar-width: thin;
        scrollbar-color: #4b5563 transparent;
    }

    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }

    /* Active state pulse animation */
    @keyframes subtle-pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }

    .animate-subtle-pulse {
        animation: subtle-pulse 2s ease-in-out infinite;
    }
</style>

<script>
    // Add active state management
    document.addEventListener('DOMContentLoaded', function() {
        // Force Alpine to re-evaluate active states on page load
        if (typeof Alpine !== 'undefined') {
            Alpine.effect(() => {
                // This will trigger reactive updates when the route changes
                const currentPath = window.location.pathname;
                console.log('Current path:', currentPath);
            });
        }
    });
</script>
