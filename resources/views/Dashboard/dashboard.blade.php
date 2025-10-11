@extends('Dashboard.layouts.app')

@section('title', 'Dashboard - NFA ERP System')
@section('page-title', 'Dashboard Overview')
@section('page-description', 'Welcome back, Admin. Here\'s what\'s happening today.')

@section('content')
    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $stats = [
                [
                    'label' => 'Total Stock', 
                    'value' => '12,430', 
                    'icon' => 'fas fa-boxes',
                    'trend' => 'up'
                ],
                [
                    'label' => 'Pending Orders', 
                    'value' => '45', 
                    'icon' => 'fas fa-clipboard-list',
                    'trend' => 'down'
                ],
                [
                    'label' => 'Deliveries Today', 
                    'value' => '8', 
                    'icon' => 'fas fa-truck',
                    'trend' => 'up'
                ],
                [
                    'label' => 'Warehouse Capacity', 
                    'value' => '78%', 
                    'icon' => 'fas fa-warehouse',
                    'trend' => 'up'
                ]
            ];
        @endphp
        
        @foreach($stats as $stat)
            <div class="bg-white border border-gray-200 p-6 hover:border-gray-300 transition-colors">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-2">{{ $stat['label'] }}</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-{{ $stat['trend'] === 'up' ? 'up text-green-600' : 'down text-red-600' }} text-xs mr-1"></i>
                            <span class="text-xs {{ $stat['trend'] === 'up' ? 'text-green-600' : 'text-red-600' }} font-medium">
                                {{ $stat['trend'] === 'up' ? '+5.2%' : '-2.1%' }}
                            </span>
                            <span class="text-xs text-gray-500 ml-1">from last week</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gray-100 text-gray-600">
                        <i class="{{ $stat['icon'] }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Charts and Tables Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Performance Chart -->
        <div class="bg-white border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Stock Performance</h2>
                <select class="text-sm border border-gray-300 px-3 py-1 outline-none focus:border-gray-400">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                </select>
            </div>
            <div class="h-64 flex items-center justify-center bg-gray-50 border border-gray-200">
                <div class="text-center text-gray-500">
                    <i class="fas fa-chart-line text-3xl mb-3 text-gray-400"></i>
                    <p class="text-sm">Stock performance chart visualization</p>
                    <p class="text-xs mt-1 text-gray-400">Rice, Corn, and Wheat inventory levels</p>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-white border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Recent Transactions</h2>
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900 font-medium">View All</a>
            </div>
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Date</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Item</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Quantity</th>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-600">Oct 11, 2025</td>
                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Rice Supply Batch 12</td>
                            <td class="py-3 px-4 text-sm text-gray-600">200 Bags</td>
                            <td class="py-3 px-4 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-50 text-green-700 border border-green-200">
                                    Delivered
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-600">Oct 10, 2025</td>
                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Warehouse Transfer</td>
                            <td class="py-3 px-4 text-sm text-gray-600">350 Units</td>
                            <td class="py-3 px-4 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-200">
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-600">Oct 9, 2025</td>
                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Corn Distribution</td>
                            <td class="py-3 px-4 text-sm text-gray-600">150 Bags</td>
                            <td class="py-3 px-4 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                    In Transit
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-600">Oct 8, 2025</td>
                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Wheat Import</td>
                            <td class="py-3 px-4 text-sm text-gray-600">500 Tons</td>
                            <td class="py-3 px-4 text-sm">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-red-50 text-red-700 border border-red-200">
                                    Delayed
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-white border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-colors group">
                <i class="fas fa-plus-circle text-xl text-gray-600 mb-2 group-hover:text-gray-700"></i>
                <span class="text-sm font-medium text-gray-700">Add Stock</span>
            </button>
            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-colors group">
                <i class="fas fa-file-invoice text-xl text-gray-600 mb-2 group-hover:text-gray-700"></i>
                <span class="text-sm font-medium text-gray-700">New Order</span>
            </button>
            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-colors group">
                <i class="fas fa-chart-pie text-xl text-gray-600 mb-2 group-hover:text-gray-700"></i>
                <span class="text-sm font-medium text-gray-700">Generate Report</span>
            </button>
            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-colors group">
                <i class="fas fa-cog text-xl text-gray-600 mb-2 group-hover:text-gray-700"></i>
                <span class="text-sm font-medium text-gray-700">Settings</span>
            </button>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple interaction for notification bell
        const notificationBell = document.querySelector('.fa-bell').parentElement;
        notificationBell.addEventListener('click', function() {
            alert('You have 3 new notifications');
        });
    });
</script>
@endsection