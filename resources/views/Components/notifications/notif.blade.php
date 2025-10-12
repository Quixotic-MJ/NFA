@extends('Components.layouts.app')

@section('title', 'Notifications - NFA ERP System')
@section('page-title', 'Notifications')
@section('page-description', 'Manage your system notifications')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header Actions -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">All Notifications</h2>
            <p class="text-gray-600 text-sm">Manage your notification preferences</p>
        </div>
        <div class="flex items-center space-x-3">
            <button onclick="markAllAsRead()" class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Mark All as Read
            </button>
            <button class="px-4 py-2 text-sm border border-gray-300 rounded hover:bg-gray-50 transition-colors">
                <i class="fas fa-cog mr-2"></i>Settings
            </button>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="-mb-px flex space-x-8">
            <button onclick="filterNotifications('all')" 
                    class="filter-tab whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm border-blue-500 text-blue-600">
                All Notifications
            </button>
            <button onclick="filterNotifications('unread')" 
                    class="filter-tab whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Unread
            </button>
            <button onclick="filterNotifications('read')" 
                    class="filter-tab whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                Read
            </button>
        </nav>
    </div>

    <!-- Notifications List -->
    <div class="bg-white border border-gray-200 rounded-lg divide-y divide-gray-200" id="notifications-container">
        <!-- Notifications will be loaded here -->
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="text-center py-12 hidden">
        <i class="fas fa-bell-slash text-4xl text-gray-300 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No notifications</h3>
        <p class="text-gray-500">You're all caught up! New notifications will appear here.</p>
    </div>

    <!-- Loading State -->
    <div id="loading-state" class="text-center py-8">
        <i class="fas fa-spinner fa-spin text-2xl text-gray-400 mb-2"></i>
        <p class="text-gray-500">Loading notifications...</p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let allNotifications = [];
    let currentFilter = 'all';

    // Sample notifications data
    const sampleNotifications = [
        { id: 1, type: 'success', title: 'Stock Updated', message: 'Rice inventory has been updated successfully', time: '2 min ago', read: false, action: '/inventory', category: 'inventory' },
        { id: 2, type: 'warning', title: 'Low Stock Alert', message: 'Wheat stock is running low (15% remaining)', time: '1 hour ago', read: false, action: '/inventory', category: 'inventory' },
        { id: 3, type: 'info', title: 'New Order', message: 'New purchase order #PO-2024-0012 received', time: '3 hours ago', read: true, action: '/purchasing', category: 'purchasing' },
        { id: 4, type: 'success', title: 'Delivery Complete', message: 'Distribution to Region IV completed', time: '5 hours ago', read: true, action: '/distribution', category: 'distribution' },
        { id: 5, type: 'error', title: 'System Maintenance', message: 'Scheduled maintenance tonight at 10 PM', time: '1 day ago', read: true, action: '/settings', category: 'system' },
        { id: 6, type: 'info', title: 'New User Registered', message: 'New staff member John Doe has been registered', time: '2 days ago', read: true, action: '/users', category: 'users' }
    ];

    function initNotifications() {
        allNotifications = sampleNotifications;
        renderNotifications();
        
        // Hide loading state
        document.getElementById('loading-state').classList.add('hidden');
    }

    function renderNotifications() {
        const container = document.getElementById('notifications-container');
        const emptyState = document.getElementById('empty-state');
        
        let filteredNotifications = allNotifications;
        
        if (currentFilter === 'unread') {
            filteredNotifications = allNotifications.filter(n => !n.read);
        } else if (currentFilter === 'read') {
            filteredNotifications = allNotifications.filter(n => n.read);
        }
        
        if (filteredNotifications.length === 0) {
            container.classList.add('hidden');
            emptyState.classList.remove('hidden');
            return;
        }
        
        container.classList.remove('hidden');
        emptyState.classList.add('hidden');
        
        container.innerHTML = filteredNotifications.map(notification => `
            <div class="p-6 hover:bg-gray-50 transition-colors ${!notification.read ? 'bg-blue-50' : ''}">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center ${getNotificationColor(notification.type).bg}">
                            <i class="text-sm ${getNotificationColor(notification.type).icon}"></i>
                        </div>
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">${notification.title}</p>
                            <span class="text-xs text-gray-500">${notification.time}</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">${notification.message}</p>
                        
                        <div class="flex items-center justify-between mt-3">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                ${notification.category}
                            </span>
                            <div class="flex items-center space-x-3">
                                <button onclick="toggleReadStatus(${notification.id})" 
                                        class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                    ${notification.read ? 'Mark unread' : 'Mark read'}
                                </button>
                                ${notification.action ? `
                                <a href="${notification.action}" 
                                   class="text-sm text-green-600 hover:text-green-800 font-medium">
                                    View Details
                                </a>
                                ` : ''}
                                <button onclick="deleteNotification(${notification.id})" 
                                        class="text-sm text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function filterNotifications(filter) {
        currentFilter = filter;
        
        // Update active tab
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.classList.remove('border-blue-500', 'text-blue-600');
            tab.classList.add('border-transparent', 'text-gray-500');
        });
        
        event.target.classList.add('border-blue-500', 'text-blue-600');
        event.target.classList.remove('border-transparent', 'text-gray-500');
        
        renderNotifications();
    }

    function markAllAsRead() {
        allNotifications.forEach(n => n.read = true);
        renderNotifications();
    }

    function toggleReadStatus(notificationId) {
        const notification = allNotifications.find(n => n.id === notificationId);
        if (notification) {
            notification.read = !notification.read;
            renderNotifications();
        }
    }

    function deleteNotification(notificationId) {
        if (confirm('Are you sure you want to delete this notification?')) {
            allNotifications = allNotifications.filter(n => n.id !== notificationId);
            renderNotifications();
        }
    }

    function getNotificationColor(type) {
        const colors = {
            success: { bg: 'bg-green-100', icon: 'fas fa-check text-green-600' },
            warning: { bg: 'bg-yellow-100', icon: 'fas fa-exclamation text-yellow-600' },
            info: { bg: 'bg-blue-100', icon: 'fas fa-info-circle text-blue-600' },
            error: { bg: 'bg-red-100', icon: 'fas fa-times text-red-600' }
        };
        return colors[type] || colors.info;
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Simulate loading delay
        setTimeout(initNotifications, 1000);
    });
</script>
@endsection