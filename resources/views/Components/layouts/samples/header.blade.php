<header class="bg-white border-b border-gray-200">
    <div class="flex justify-between items-center px-6 py-4">
        <!-- Page Title Section -->
        <div>
            <h1 class="text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard Overview')</h1>
            <p class="text-gray-500 text-sm mt-1">@yield('page-description', 'Welcome back, Admin. Here\'s what\'s happening today.')</p>
        </div>
        
        <!-- Right Side Actions -->
        <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400 text-sm"></i>
                </div>
                <input type="text" placeholder="Search..." 
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:border-gray-400 focus:ring-1 focus:ring-gray-200 outline-none w-64 text-sm bg-white">
            </div>

            <!-- Notifications -->
            <div class="relative" x-data="notificationManager()">
                <button @click="toggleNotifications()"
                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-colors rounded-lg relative">
                    <i class="fas fa-bell text-sm"></i>
                    <template x-if="unreadCount > 0">
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                    </template>
                </button>

                <!-- Notifications Dropdown -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-lg z-50 max-h-96 overflow-hidden">
                    <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                            <button @click="markAllAsRead()"
                                class="text-xs text-gray-600 hover:text-gray-800 font-medium"
                                x-show="unreadCount > 0">
                                Mark all read
                            </button>
                        </div>
                    </div>

                    <div class="overflow-y-auto max-h-64">
                        <template x-if="notifications.length === 0">
                            <div class="p-4 text-center text-gray-500">
                                <i class="fas fa-bell-slash text-xl mb-2 text-gray-300"></i>
                                <p class="text-sm">No notifications</p>
                            </div>
                        </template>

                        <template x-for="notification in notifications.slice(0, 5)" :key="notification.id">
                            <div class="border-b border-gray-100 last:border-b-0">
                                <div class="p-4 hover:bg-gray-50 transition-colors cursor-pointer"
                                    :class="{ 'bg-blue-50': !notification.read }"
                                    @click="handleNotificationClick(notification)">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center"
                                                :class="getNotificationColor(notification.type).bg">
                                                <i class="text-xs"
                                                    :class="getNotificationColor(notification.type).icon"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900" x-text="notification.title"></p>
                                            <p class="text-sm text-gray-600 mt-1" x-text="notification.message"></p>
                                            <div class="flex items-center justify-between mt-2">
                                                <span class="text-xs text-gray-500" x-text="notification.time"></span>
                                                <button @click.stop="toggleReadStatus(notification)"
                                                    class="text-xs text-gray-600 hover:text-gray-800">
                                                    <span x-text="notification.read ? 'Mark unread' : 'Mark read'"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">
                        <a href="{{ route('notifications') }}"
                            class="block text-center text-sm text-gray-600 hover:text-gray-800 font-medium"
                            @click="open = false">
                            View all notifications
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Menu -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-3 p-2 text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition-colors rounded-lg">
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="text-left">
                        <span class="text-sm font-medium block">Admin User</span>
                        <span class="text-xs text-gray-500">Administrator</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50 py-2">
                    <!-- User Info -->
                    <div class="px-4 py-3 border-b border-gray-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Admin User</p>
                                <p class="text-xs text-gray-500 mt-1">admin@nfa.gov.ph</p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <div class="py-2">
                        <a href="/profile"
                            class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-user-circle w-5 text-center text-gray-500"></i>
                            <span>My Profile</span>
                        </a>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-100 my-1"></div>

                    <!-- Logout -->
                    <button onclick="log_out()"
                        class="flex items-center space-x-3 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-sign-out-alt w-5 text-center text-gray-500"></i>
                        <span>Sign Out</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Include Alpine.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    function log_out() {
        window.location.href = '/';
    }

    function notificationManager() {
        return {
            open: false,
            notifications: [{
                    id: 1,
                    type: 'success',
                    title: 'Stock Updated',
                    message: 'Rice inventory has been updated successfully',
                    time: '2 min ago',
                    read: false,
                    action: '/inventory'
                },
                {
                    id: 2,
                    type: 'warning',
                    title: 'Low Stock Alert',
                    message: 'Wheat stock is running low (15% remaining)',
                    time: '1 hour ago',
                    read: false,
                    action: '/inventory'
                },
                {
                    id: 3,
                    type: 'info',
                    title: 'New Order',
                    message: 'New purchase order #PO-2024-0012 received',
                    time: '3 hours ago',
                    read: true,
                    action: '/purchasing'
                },
                {
                    id: 4,
                    type: 'success',
                    title: 'Delivery Complete',
                    message: 'Distribution to Region IV completed',
                    time: '5 hours ago',
                    read: true,
                    action: '/distribution'
                },
                {
                    id: 5,
                    type: 'error',
                    title: 'System Maintenance',
                    message: 'Scheduled maintenance tonight at 10 PM',
                    time: '1 day ago',
                    read: true,
                    action: '/settings'
                }
            ],
            get unreadCount() {
                return this.notifications.filter(n => !n.read).length;
            },
            toggleNotifications() {
                this.open = !this.open;
            },
            markAllAsRead() {
                this.notifications.forEach(n => n.read = true);
            },
            toggleReadStatus(notification) {
                notification.read = !notification.read;
            },
            handleNotificationClick(notification) {
                if (!notification.read) {
                    notification.read = true;
                }
                this.open = false;
                if (notification.action) {
                    window.location.href = notification.action;
                }
            },
            getNotificationColor(type) {
                const colors = {
                    success: {
                        bg: 'bg-green-100',
                        icon: 'fas fa-check text-green-600'
                    },
                    warning: {
                        bg: 'bg-yellow-100',
                        icon: 'fas fa-exclamation text-yellow-600'
                    },
                    info: {
                        bg: 'bg-blue-100',
                        icon: 'fas fa-info-circle text-blue-600'
                    },
                    error: {
                        bg: 'bg-red-100',
                        icon: 'fas fa-times text-red-600'
                    }
                };
                return colors[type] || colors.info;
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('[x-data]');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    if (dropdown.__x && dropdown.__x.$data) {
                        dropdown.__x.$data.open = false;
                    }
                }
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const dropdowns = document.querySelectorAll('[x-data]');
                dropdowns.forEach(dropdown => {
                    if (dropdown.__x && dropdown.__x.$data) {
                        dropdown.__x.$data.open = false;
                    }
                });
            }
        });
    });
</script>