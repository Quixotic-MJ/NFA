<header class="bg-gray-900 border-b border-gray-700">
    <div class="flex justify-between items-center px-6 py-3">
        <!-- Page Title Section - Minimal -->
        <div>
            <h1 class="text-lg font-semibold text-white">@yield('page-title', 'Dashboard')</h1>
            <p class="text-gray-400 text-xs mt-0.5">@yield('page-description', 'System overview and analytics')</p>
        </div>
        
        <!-- Right Side Actions - Compact -->
        <div class="flex items-center space-x-3">
            <!-- Search Bar - Minimal -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-500 text-xs"></i>
                </div>
                <input type="text" placeholder="Search..." 
                    class="pl-8 pr-3 py-1.5 border border-gray-600 bg-gray-800 text-white rounded-md focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none w-48 text-xs placeholder-gray-500 transition-colors">
            </div>

            <!-- Notifications - Compact -->
            <div class="relative" x-data="notificationManager()">
                <button @click="toggleNotifications()"
                    class="p-1.5 text-gray-400 hover:text-white hover:bg-gray-800 transition-colors rounded-md relative">
                    <i class="fas fa-bell text-xs"></i>
                    <template x-if="unreadCount > 0">
                        <span class="absolute top-1 right-1 w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                    </template>
                </button>

                <!-- Notifications Dropdown - Minimal -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-72 bg-gray-800 border border-gray-600 rounded-md shadow-lg z-50 max-h-80 overflow-hidden">
                    <div class="px-3 py-2 border-b border-gray-700 bg-gray-900">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-white">Notifications</h3>
                            <button @click="markAllAsRead()"
                                class="text-xs text-gray-400 hover:text-white font-medium"
                                x-show="unreadCount > 0">
                                Mark all read
                            </button>
                        </div>
                    </div>

                    <div class="overflow-y-auto max-h-56">
                        <template x-if="notifications.length === 0">
                            <div class="p-3 text-center text-gray-400">
                                <i class="fas fa-bell text-sm mb-1 text-gray-500"></i>
                                <p class="text-xs">No notifications</p>
                            </div>
                        </template>

                        <template x-for="notification in notifications.slice(0, 4)" :key="notification.id">
                            <div class="border-b border-gray-700 last:border-b-0">
                                <div class="p-3 hover:bg-gray-750 transition-colors cursor-pointer"
                                    :class="{ 'bg-blue-900/20': !notification.read }"
                                    @click="handleNotificationClick(notification)">
                                    <div class="flex items-start space-x-2">
                                        <div class="flex-shrink-0 mt-0.5">
                                            <div class="w-6 h-6 rounded flex items-center justify-center text-xs"
                                                :class="getNotificationColor(notification.type).bg">
                                                <i class="text-white" :class="getNotificationColor(notification.type).icon"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-medium text-white" x-text="notification.title"></p>
                                            <p class="text-xs text-gray-300 mt-0.5 leading-tight" x-text="notification.message"></p>
                                            <div class="flex items-center justify-between mt-1.5">
                                                <span class="text-xs text-gray-400" x-text="notification.time"></span>
                                                <button @click.stop="toggleReadStatus(notification)"
                                                    class="text-xs text-gray-400 hover:text-white">
                                                    <span x-text="notification.read ? 'Mark unread' : 'Mark read'"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="px-3 py-2 border-t border-gray-700 bg-gray-900">
                        <a href="{{ route('notifications') }}"
                            class="block text-center text-xs text-gray-400 hover:text-white font-medium"
                            @click="open = false">
                            View all notifications
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Menu - Compact -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 p-1.5 text-gray-300 hover:text-white hover:bg-gray-800 transition-colors rounded-md">
                    <div class="w-7 h-7 bg-blue-600 rounded flex items-center justify-center">
                        <i class="fas fa-user text-white text-xs"></i>
                    </div>
                    <div class="text-left">
                        <span class="text-xs font-medium block text-white">Admin</span>
                        <span class="text-xs text-gray-400">System</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </button>

                <!-- Dropdown Menu - Minimal -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-600 rounded-md shadow-lg z-50 py-1">
                    <!-- User Info - Compact -->
                    <div class="px-3 py-2 border-b border-gray-700">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center">
                                <i class="fas fa-user-shield text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Admin User</p>
                                <p class="text-xs text-gray-400">admin@nfa.gov.ph</p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items - Compact -->
                    <div class="py-1">
                        <a href="{{ route('Profile') }}"
                            class="flex items-center space-x-2 px-3 py-1.5 text-xs text-gray-300 hover:bg-gray-750 hover:text-white transition-colors">
                            <i class="fas fa-user w-4 text-center"></i>
                            <span>Profile</span>
                        </a>
                        <a href="/Settings"
                            class="flex items-center space-x-2 px-3 py-1.5 text-xs text-gray-300 hover:bg-gray-750 hover:text-white transition-colors">
                            <i class="fas fa-cog w-4 text-center"></i>
                            <span>Settings</span>
                        </a>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-700 my-1"></div>

                    <!-- Admin Quick Actions - Compact -->
                    <div class="py-1">
                        <a href="{{ route('Dashboard') }}"
                            class="flex items-center space-x-2 px-3 py-1.5 text-xs text-blue-400 hover:bg-gray-750 hover:text-blue-300 transition-colors">
                            <i class="fas fa-tachometer-alt w-4 text-center"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/System-Health"
                            class="flex items-center space-x-2 px-3 py-1.5 text-xs text-gray-300 hover:bg-gray-750 hover:text-white transition-colors">
                            <i class="fas fa-chart-line w-4 text-center"></i>
                            <span>Analytics</span>
                        </a>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-700 my-1"></div>

                    <!-- Logout - Compact -->
                    <button onclick="log_out()"
                        class="flex items-center space-x-2 w-full px-3 py-1.5 text-xs text-red-400 hover:bg-gray-750 hover:text-red-300 transition-colors">
                        <i class="fas fa-sign-out-alt w-4 text-center"></i>
                        <span>Sign Out</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function log_out() {
        if (confirm('Are you sure you want to sign out?')) {
            window.location.href = '/';
        }
    }

    function notificationManager() {
        return {
            open: false,
            notifications: [{
                    id: 1,
                    type: 'success',
                    title: 'Stock Updated',
                    message: 'Rice inventory updated',
                    time: '2m ago',
                    read: false,
                    action: '/inventory'
                },
                {
                    id: 2,
                    type: 'warning',
                    title: 'Low Stock',
                    message: 'Wheat stock at 15%',
                    time: '1h ago',
                    read: false,
                    action: '/inventory'
                },
                {
                    id: 3,
                    type: 'info',
                    title: 'New Order',
                    message: 'PO-2024-0012 received',
                    time: '3h ago',
                    read: true,
                    action: '/purchasing'
                },
                {
                    id: 4,
                    type: 'success',
                    title: 'Delivery Complete',
                    message: 'Region IV distribution done',
                    time: '5h ago',
                    read: true,
                    action: '/distribution'
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
                        bg: 'bg-green-500',
                        icon: 'fas fa-check'
                    },
                    warning: {
                        bg: 'bg-yellow-500',
                        icon: 'fas fa-exclamation'
                    },
                    info: {
                        bg: 'bg-blue-500',
                        icon: 'fas fa-info'
                    },
                    error: {
                        bg: 'bg-red-500',
                        icon: 'fas fa-times'
                    }
                };
                return colors[type] || colors.info;
            }
        }
    }

    // Add custom gray shade
    const style = document.createElement('style');
    style.textContent = `
        .bg-gray-750 {
            background-color: #374151;
        }
        .hover\\:bg-gray-750:hover {
            background-color: #374151;
        }
    `;
    document.head.appendChild(style);
</script>