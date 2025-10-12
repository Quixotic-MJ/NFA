@extends('Components.layouts.app')

@section('title', 'Inventory Management - NFA ERP System')
@section('page-title', 'Inventory Management')
@section('page-description', 'Manage stock levels, track inventory, and monitor warehouse operations')

@section('content')
    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $inventoryStats = [
                [
                    'label' => 'Total Items', 
                    'value' => '1,247', 
                    'icon' => 'fas fa-boxes',
                    'trend' => 'up',
                    'change' => '+12 items'
                ],
                [
                    'label' => 'Low Stock', 
                    'value' => '23', 
                    'icon' => 'fas fa-exclamation-triangle',
                    'trend' => 'up',
                    'change' => '+3 items',
                    'alert' => true
                ],
                [
                    'label' => 'Out of Stock', 
                    'value' => '8', 
                    'icon' => 'fas fa-times-circle',
                    'trend' => 'down',
                    'change' => '-2 items'
                ],
                [
                    'label' => 'Total Value', 
                    'value' => '₱4.2M', 
                    'icon' => 'fas fa-peso-sign',
                    'trend' => 'up',
                    'change' => '+₱120K'
                ]
            ];
        @endphp
        
        @foreach($inventoryStats as $stat)
            <div class="bg-white border border-gray-200 p-6 hover:border-gray-300 transition-colors {{ isset($stat['alert']) ? 'border-l-4 border-l-yellow-400' : '' }}">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-2">{{ $stat['label'] }}</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-{{ $stat['trend'] === 'up' ? 'up text-green-600' : 'down text-red-600' }} text-xs mr-1"></i>
                            <span class="text-xs {{ $stat['trend'] === 'up' ? 'text-green-600' : 'text-red-600' }} font-medium">
                                {{ $stat['change'] }}
                            </span>
                            <span class="text-xs text-gray-500 ml-1">this week</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gray-100 text-gray-600 rounded-lg">
                        <i class="{{ $stat['icon'] }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Inventory List -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Inventory Actions -->
            <div class="bg-white border border-gray-200 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Inventory Items</h2>
                    <div class="flex space-x-3">
                        <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>Add Item</span>
                        </button>
                        <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                            <i class="fas fa-download"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="flex flex-col sm:flex-row gap-4 mb-6">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Search inventory..." 
                            class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded focus:border-gray-400 focus:ring-1 focus:ring-gray-200 outline-none text-sm">
                    </div>
                    <select class="border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Categories</option>
                        <option>Rice</option>
                        <option>Corn</option>
                        <option>Wheat</option>
                        <option>Grains</option>
                    </select>
                    <select class="border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Warehouses</option>
                        <option>Main Warehouse</option>
                        <option>Region IV-A</option>
                        <option>Region V</option>
                    </select>
                </div>

                <!-- Inventory Table -->
                <div class="overflow-hidden border border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Rice Items -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-wheat text-yellow-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Premium Rice</div>
                                            <div class="text-sm text-gray-500">SKU: RICE-001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rice</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">2,450 bags</div>
                                    <div class="text-xs text-gray-500">Last updated: 2h ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        In Stock
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-gray-600 hover:text-gray-900">View</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-wheat text-yellow-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Regular Rice</div>
                                            <div class="text-sm text-gray-500">SKU: RICE-002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rice</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">85 bags</div>
                                    <div class="text-xs text-gray-500">Last updated: 1h ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                        Low Stock
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Restock</button>
                                    <button class="text-gray-600 hover:text-gray-900">View</button>
                                </td>
                            </tr>

                            <!-- Corn Items -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-corn text-orange-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Yellow Corn</div>
                                            <div class="text-sm text-gray-500">SKU: CORN-001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Corn</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">1,200 bags</div>
                                    <div class="text-xs text-gray-500">Last updated: 5h ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        In Stock
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-gray-600 hover:text-gray-900">View</button>
                                </td>
                            </tr>

                            <!-- Wheat Items -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-amber-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-bread-slice text-amber-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Wheat Flour</div>
                                            <div class="text-sm text-gray-500">SKU: WHEAT-001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Wheat</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-red-600 font-medium">0 bags</div>
                                    <div class="text-xs text-gray-500">Last updated: 1d ago</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Out of Stock
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Restock</button>
                                    <button class="text-gray-600 hover:text-gray-900">View</button>
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
                                <span class="font-medium">1,247</span>
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
        </div>

        <!-- Right Column - Sidebar -->
        <div class="space-y-6">
            <!-- Stock Alerts -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Stock Alerts</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-yellow-50 border border-yellow-200 rounded">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Regular Rice</p>
                                <p class="text-xs text-gray-600">85 bags remaining</p>
                            </div>
                        </div>
                        <span class="text-xs text-yellow-700 font-medium">Low</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-red-50 border border-red-200 rounded">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-times-circle text-red-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Wheat Flour</p>
                                <p class="text-xs text-gray-600">Out of stock</p>
                            </div>
                        </div>
                        <span class="text-xs text-red-700 font-medium">Critical</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-yellow-50 border border-yellow-200 rounded">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Corn Grits</p>
                                <p class="text-xs text-gray-600">45 bags remaining</p>
                            </div>
                        </div>
                        <span class="text-xs text-yellow-700 font-medium">Low</span>
                    </div>
                </div>
                <button class="w-full mt-4 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded hover:bg-gray-200 transition-colors">
                    View All Alerts
                </button>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-3">
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <i class="fas fa-plus-circle text-xl text-blue-600 mb-2 group-hover:text-blue-700"></i>
                        <span class="text-sm font-medium text-gray-700">New Item</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors group">
                        <i class="fas fa-arrow-down text-xl text-green-600 mb-2 group-hover:text-green-700"></i>
                        <span class="text-sm font-medium text-gray-700">Receive Stock</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors group">
                        <i class="fas fa-chart-bar text-xl text-purple-600 mb-2 group-hover:text-purple-700"></i>
                        <span class="text-sm font-medium text-gray-700">Reports</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-colors group">
                        <i class="fas fa-warehouse text-xl text-orange-600 mb-2 group-hover:text-orange-700"></i>
                        <span class="text-sm font-medium text-gray-700">Warehouses</span>
                    </button>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-arrow-down text-green-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Stock received - Premium Rice</p>
                            <p class="text-xs text-gray-500">+500 bags • 2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-edit text-blue-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Item updated - Regular Rice</p>
                            <p class="text-xs text-gray-500">Stock threshold changed • 4 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Low stock alert - Corn Grits</p>
                            <p class="text-xs text-gray-500">45 bags remaining • 1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Inventory specific JavaScript can go here
    document.addEventListener('DOMContentLoaded', function() {
        // Example: Add search functionality
        const searchInput = document.querySelector('input[placeholder="Search inventory..."]');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                // Implement search logic here
                console.log('Searching for:', e.target.value);
            });
        }

        // Example: Add filter functionality
        const categoryFilter = document.querySelector('select');
        if (categoryFilter) {
            categoryFilter.addEventListener('change', function(e) {
                // Implement filter logic here
                console.log('Filtering by category:', e.target.value);
            });
        }
    });
</script>
@endsection