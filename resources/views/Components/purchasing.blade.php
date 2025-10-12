@extends('Components.layouts.app')

@section('title', 'Purchasing Management - NFA ERP System')
@section('page-title', 'Purchasing Management')
@section('page-description', 'Manage purchase orders, track deliveries, and monitor supplier relationships')

@section('content')
    <!-- Purchasing Overview Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $purchasingStats = [
                [
                    'label' => 'Pending Orders', 
                    'value' => '18', 
                    'icon' => 'fas fa-clipboard-list',
                    'trend' => 'up',
                    'change' => '+3 orders',
                    'color' => 'yellow'
                ],
                [
                    'label' => 'This Month Spend', 
                    'value' => '₱2.4M', 
                    'icon' => 'fas fa-peso-sign',
                    'trend' => 'down',
                    'change' => '-₱150K',
                    'color' => 'green'
                ],
                [
                    'label' => 'Active Suppliers', 
                    'value' => '24', 
                    'icon' => 'fas fa-truck',
                    'trend' => 'up',
                    'change' => '+2 suppliers',
                    'color' => 'blue'
                ],
                [
                    'label' => 'Delivery Rate', 
                    'value' => '94%', 
                    'icon' => 'fas fa-check-circle',
                    'trend' => 'up',
                    'change' => '+2%',
                    'color' => 'purple'
                ]
            ];
        @endphp
        
        @foreach($purchasingStats as $stat)
            <div class="bg-white border border-gray-200 p-6 hover:border-gray-300 transition-colors">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-2">{{ $stat['label'] }}</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-{{ $stat['trend'] === 'up' ? 'up text-green-600' : 'down text-red-600' }} text-xs mr-1"></i>
                            <span class="text-xs {{ $stat['trend'] === 'up' ? 'text-green-600' : 'text-red-600' }} font-medium">
                                {{ $stat['change'] }}
                            </span>
                            <span class="text-xs text-gray-500 ml-1">vs last month</span>
                        </div>
                    </div>
                    <div class="p-3 bg-{{ $stat['color'] }}-100 text-{{ $stat['color'] }}-600 rounded-lg">
                        <i class="{{ $stat['icon'] }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Purchase Orders -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Purchase Orders Section -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Purchase Orders</h2>
                    <div class="flex space-x-3">
                        <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>New PO</span>
                        </button>
                        <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                            <i class="fas fa-download"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>

                <!-- Filters and Search -->
                <div class="flex flex-col sm:flex-row gap-4 mb-6">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Search purchase orders..." 
                            class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded focus:border-gray-400 focus:ring-1 focus:ring-gray-200 outline-none text-sm">
                    </div>
                    <select class="border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Status</option>
                        <option>Pending</option>
                        <option>Approved</option>
                        <option>Ordered</option>
                        <option>Delivered</option>
                        <option>Cancelled</option>
                    </select>
                    <select class="border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Suppliers</option>
                        <option>Golden Grains Corp</option>
                        <option>Philippine Rice Traders</option>
                        <option>Mindanao Corn Supply</option>
                    </select>
                </div>

                <!-- Purchase Orders Table -->
                <div class="overflow-hidden border border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PO Number</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- PO 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">PO-2024-0012</div>
                                    <div class="text-xs text-gray-500">Oct 15, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Golden Grains Corp</div>
                                    <div class="text-xs text-gray-500">Rice Supplier</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Premium Rice (1,000 bags)</div>
                                    <div class="text-xs text-gray-500">Delivery: Oct 20, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱1,250,000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-clock mr-1"></i>
                                        Approved
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                    <button class="text-green-600 hover:text-green-900">Process</button>
                                </td>
                            </tr>

                            <!-- PO 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">PO-2024-0011</div>
                                    <div class="text-xs text-gray-500">Oct 12, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Philippine Rice Traders</div>
                                    <div class="text-xs text-gray-500">Rice Supplier</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Regular Rice (2,000 bags)</div>
                                    <div class="text-xs text-gray-500">Delivery: Oct 18, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱1,800,000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-hourglass-half mr-1"></i>
                                        Pending
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Approve</button>
                                    <button class="text-gray-600 hover:text-gray-900">View</button>
                                </td>
                            </tr>

                            <!-- PO 3 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">PO-2024-0010</div>
                                    <div class="text-xs text-gray-500">Oct 10, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Mindanao Corn Supply</div>
                                    <div class="text-xs text-gray-500">Corn Supplier</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Yellow Corn (800 bags)</div>
                                    <div class="text-xs text-gray-500">Delivery: Oct 16, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱640,000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Delivered
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                    <button class="text-purple-600 hover:text-purple-900">Invoice</button>
                                </td>
                            </tr>

                            <!-- PO 4 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">PO-2024-0009</div>
                                    <div class="text-xs text-gray-500">Oct 8, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Luzon Wheat Importers</div>
                                    <div class="text-xs text-gray-500">Wheat Supplier</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Wheat Flour (500 bags)</div>
                                    <div class="text-xs text-gray-500">Delivery: Oct 14, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱450,000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Cancelled
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                    <button class="text-gray-600 hover:text-gray-900">Re-order</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6 mt-6">
                    <div class="flex justify-between flex-1 sm:hidden">
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                        <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</button>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">1</span>
                                to
                                <span class="font-medium">4</span>
                                of
                                <span class="font-medium">18</span>
                                results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</button>
                                <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                                <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                                <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Deliveries -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Deliveries</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">PO-2024-0010 - Yellow Corn</p>
                                <p class="text-xs text-gray-500">Mindanao Corn Supply • Delivered Oct 16</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">800 bags</p>
                            <p class="text-xs text-gray-500">₱640,000</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">PO-2024-0008 - Premium Rice</p>
                                <p class="text-xs text-gray-500">Golden Grains Corp • In Transit</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">1,500 bags</p>
                            <p class="text-xs text-gray-500">₱1,875,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-3">
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <i class="fas fa-file-invoice text-xl text-blue-600 mb-2 group-hover:text-blue-700"></i>
                        <span class="text-sm font-medium text-gray-700 text-center">Create Purchase Order</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors group">
                        <i class="fas fa-truck-loading text-xl text-green-600 mb-2 group-hover:text-green-700"></i>
                        <span class="text-sm font-medium text-gray-700 text-center">Receive Delivery</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors group">
                        <i class="fas fa-users text-xl text-purple-600 mb-2 group-hover:text-purple-700"></i>
                        <span class="text-sm font-medium text-gray-700 text-center">Manage Suppliers</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-colors group">
                        <i class="fas fa-chart-line text-xl text-orange-600 mb-2 group-hover:text-orange-700"></i>
                        <span class="text-sm font-medium text-gray-700 text-center">Spending Reports</span>
                    </button>
                </div>
            </div>

            <!-- Supplier Performance -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Supplier Performance</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-green-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Golden Grains Corp</p>
                                <p class="text-xs text-gray-500">98% On-time delivery</p>
                            </div>
                        </div>
                        <span class="text-xs text-green-600 font-medium">Excellent</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Philippine Rice Traders</p>
                                <p class="text-xs text-gray-500">85% On-time delivery</p>
                            </div>
                        </div>
                        <span class="text-xs text-yellow-600 font-medium">Good</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-exclamation text-red-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Luzon Wheat Importers</p>
                                <p class="text-xs text-gray-500">72% On-time delivery</p>
                            </div>
                        </div>
                        <span class="text-xs text-red-600 font-medium">Needs Review</span>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Pending Approvals</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-yellow-50 border border-yellow-200 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">PO-2024-0011</p>
                            <p class="text-xs text-gray-600">Regular Rice - 2,000 bags</p>
                        </div>
                        <button class="text-xs bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition-colors">
                            Review
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-yellow-50 border border-yellow-200 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">PO-2024-0013</p>
                            <p class="text-xs text-gray-600">Corn Grits - 1,200 bags</p>
                        </div>
                        <button class="text-xs bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition-colors">
                            Review
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-yellow-50 border border-yellow-200 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">PO-2024-0014</p>
                            <p class="text-xs text-gray-600">Wheat Flour - 800 bags</p>
                        </div>
                        <button class="text-xs bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition-colors">
                            Review
                        </button>
                    </div>
                </div>
            </div>

            <!-- Upcoming Deliveries -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Deliveries</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-200 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Oct 18 - PO-2024-0011</p>
                            <p class="text-xs text-gray-600">Regular Rice • Phil Rice Traders</p>
                        </div>
                        <span class="text-xs text-blue-700 font-medium">2 days</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-200 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Oct 20 - PO-2024-0012</p>
                            <p class="text-xs text-gray-600">Premium Rice • Golden Grains</p>
                        </div>
                        <span class="text-xs text-blue-700 font-medium">4 days</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Purchasing specific JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.querySelector('input[placeholder="Search purchase orders..."]');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                console.log('Searching purchase orders:', e.target.value);
            });
        }

        // Status filter
        const statusFilter = document.querySelector('select');
        if (statusFilter) {
            statusFilter.addEventListener('change', function(e) {
                console.log('Filtering by status:', e.target.value);
            });
        }

        // Quick action buttons
        const quickActionButtons = document.querySelectorAll('.grid.grid-cols-2 button');
        quickActionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const action = this.querySelector('span').textContent;
                console.log('Quick action:', action);
                
                // Add actual functionality here based on the action
                switch(action) {
                    case 'Create Purchase Order':
                        // Open PO creation modal
                        break;
                    case 'Receive Delivery':
                        // Open delivery receiving form
                        break;
                    case 'Manage Suppliers':
                        // Navigate to suppliers page
                        break;
                    case 'Spending Reports':
                        // Open reports modal
                        break;
                }
            });
        });
    });
</script>
@endsection