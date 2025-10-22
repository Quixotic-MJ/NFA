@extends('Components.layouts.app')

@section('title', 'Distribution Management - NFA ERP System')
@section('page-title', 'Distribution Management')
@section('page-description', 'Manage product distribution, deliveries, and logistics operations')

@section('content')
    <!-- Distribution Header -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Distribution Management</h1>
                <p class="text-gray-600 mt-1">Monitor and manage product distribution across all regions</p>
            </div>
            <div class="flex space-x-3">
                <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>New Distribution</span>
                </button>
                <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                    <i class="fas fa-sync"></i>
                    <span>Refresh Data</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Distribution Filters -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex flex-col lg:flex-row gap-4 items-end">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 flex-1">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Status</option>
                        <option>Pending</option>
                        <option>In Transit</option>
                        <option>Delivered</option>
                        <option>Delayed</option>
                        <option>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Region</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Regions</option>
                        <option>NCR</option>
                        <option>Region IV-A</option>
                        <option>Region V</option>
                        <option>Region VI</option>
                        <option>Region VII</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>Last 3 Months</option>
                        <option>Last 6 Months</option>
                        <option>Custom Range</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Type</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Products</option>
                        <option>Rice</option>
                        <option>Corn</option>
                        <option>Wheat</option>
                        <option>Grains</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-3">
                <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                    <i class="fas fa-filter"></i>
                    <span>Apply Filters</span>
                </button>
                <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                    <i class="fas fa-redo"></i>
                    <span>Reset</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Distribution Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $distributionMetrics = [
                [
                    'label' => 'Total Deliveries', 
                    'value' => '1,248', 
                    'icon' => 'fas fa-truck',
                    'change' => '+42 this week',
                    'trend' => 'up',
                    'description' => 'Across all regions'
                ],
                [
                    'label' => 'On-Time Rate', 
                    'value' => '94.7%', 
                    'icon' => 'fas fa-clock',
                    'change' => '+2.3%',
                    'trend' => 'up',
                    'description' => 'Delivery performance'
                ],
                [
                    'label' => 'Pending Deliveries', 
                    'value' => '36', 
                    'icon' => 'fas fa-hourglass-half',
                    'change' => '-8 from last week',
                    'trend' => 'down',
                    'description' => 'Require attention'
                ],
                [
                    'label' => 'Avg Delivery Time', 
                    'value' => '2.3 days', 
                    'icon' => 'fas fa-shipping-fast',
                    'change' => '-0.4 days',
                    'trend' => 'down',
                    'description' => 'Regional average'
                ]
            ];
        @endphp
        
        @foreach($distributionMetrics as $metric)
            <div class="bg-white border border-gray-200 p-6 rounded-lg hover:border-gray-300 transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <p class="text-gray-600 text-sm font-medium mb-2">{{ $metric['label'] }}</p>
                        <p class="text-2xl font-semibold text-gray-900 mb-1">{{ $metric['value'] }}</p>
                        <div class="flex items-center">
                            @if($metric['trend'] === 'up')
                                <i class="fas fa-arrow-up text-green-600 text-xs mr-1"></i>
                                <span class="text-xs text-green-600 font-medium mr-2">{{ $metric['change'] }}</span>
                            @else
                                <i class="fas fa-arrow-down text-red-600 text-xs mr-1"></i>
                                <span class="text-xs text-red-600 font-medium mr-2">{{ $metric['change'] }}</span>
                            @endif
                            <span class="text-xs text-gray-500">{{ $metric['description'] }}</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gray-100 text-gray-600 rounded-lg">
                        <i class="{{ $metric['icon'] }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main Distribution Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Left Column - Distribution List & Map -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Active Distributions Table -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Active Distributions</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors flex items-center space-x-1">
                            <i class="fas fa-columns"></i>
                            <span>Columns</span>
                        </button>
                        <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors flex items-center space-x-1">
                            <i class="fas fa-download"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>

                <div class="overflow-hidden border border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distribution ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ETA</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">DIS-2024-0012</div>
                                    <div class="text-xs text-gray-500">Oct 28, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Manila → Laguna</div>
                                    <div class="text-xs text-gray-500">Region IV-A</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rice (5,000kg)</div>
                                    <div class="text-xs text-gray-500">Corn (2,000kg)</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        In Transit
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div>Today, 15:30</div>
                                    <div class="text-xs text-green-600">On Time</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Track</button>
                                    <button class="text-gray-600 hover:text-gray-900">Details</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">DIS-2024-0011</div>
                                    <div class="text-xs text-gray-500">Oct 27, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Cebu → Bohol</div>
                                    <div class="text-xs text-gray-500">Region VII</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Wheat (3,500kg)</div>
                                    <div class="text-xs text-gray-500">Grains (1,500kg)</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div>Tomorrow, 09:00</div>
                                    <div class="text-xs text-gray-500">Scheduled</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Dispatch</button>
                                    <button class="text-gray-600 hover:text-gray-900">Details</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">DIS-2024-0010</div>
                                    <div class="text-xs text-gray-500">Oct 26, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Davao → GenSan</div>
                                    <div class="text-xs text-gray-500">Region XI</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rice (4,200kg)</div>
                                    <div class="text-xs text-gray-500">Corn (1,800kg)</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Delayed
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div>Yesterday, 14:00</div>
                                    <div class="text-xs text-red-600">2 hours late</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Update</button>
                                    <button class="text-gray-600 hover:text-gray-900">Details</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">DIS-2024-0009</div>
                                    <div class="text-xs text-gray-500">Oct 25, 2024</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Manila → Batangas</div>
                                    <div class="text-xs text-gray-500">Region IV-A</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rice (6,000kg)</div>
                                    <div class="text-xs text-gray-500">Wheat (2,000kg)</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Delivered
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div>Oct 25, 11:30</div>
                                    <div class="text-xs text-green-600">Completed</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Review</button>
                                    <button class="text-gray-600 hover:text-gray-900">Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">36</span> active distributions
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors">
                            Previous
                        </button>
                        <button class="px-3 py-1 border border-blue-500 bg-blue-50 text-blue-600 text-sm rounded">
                            1
                        </button>
                        <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors">
                            2
                        </button>
                        <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors">
                            3
                        </button>
                        <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded hover:bg-gray-50 transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Distribution Map Overview -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Distribution Network Map</h2>
                    <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:border-gray-400 outline-none">
                        <option>Live View</option>
                        <option>Last 24 Hours</option>
                        <option>Last Week</option>
                    </select>
                </div>
                <div class="h-80 flex items-center justify-center bg-gray-50 border border-gray-200 rounded">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-map-marked-alt text-4xl mb-3 text-gray-400"></i>
                        <p class="text-sm">Distribution network visualization</p>
                        <p class="text-xs mt-1">Active deliveries and regional distribution centers</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Quick Actions & Analytics -->
        <div class="space-y-6">
            <!-- Quick Distribution Actions -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-blue-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">New Distribution</p>
                                <p class="text-xs text-gray-500">Create delivery schedule</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-shipping-fast text-green-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Dispatch Manager</p>
                                <p class="text-xs text-gray-500">Manage vehicle dispatch</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-route text-purple-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Route Optimization</p>
                                <p class="text-xs text-gray-500">Optimize delivery routes</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-export text-orange-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Export Reports</p>
                                <p class="text-xs text-gray-500">Distribution analytics</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-600"></i>
                    </button>
                </div>
            </div>

            <!-- Regional Distribution -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Regional Distribution</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-100 rounded flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Region IV-A</p>
                                <p class="text-xs text-gray-500">Calabarzon</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">12 deliveries</p>
                            <p class="text-xs text-green-600">95% on-time</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-100 rounded flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-green-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Region V</p>
                                <p class="text-xs text-gray-500">Bicol Region</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">8 deliveries</p>
                            <p class="text-xs text-green-600">92% on-time</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-orange-100 rounded flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-orange-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Region VI</p>
                                <p class="text-xs text-gray-500">Western Visayas</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">6 deliveries</p>
                            <p class="text-xs text-yellow-600">85% on-time</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-purple-100 rounded flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-purple-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Region VII</p>
                                <p class="text-xs text-gray-500">Central Visayas</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">5 deliveries</p>
                            <p class="text-xs text-green-600">96% on-time</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Distribution Activity -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-green-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Distribution DIS-2024-0008 completed</p>
                            <p class="text-xs text-gray-500">Manila to Quezon • 2 hours ago</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-yellow-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Delay reported for DIS-2024-0010</p>
                            <p class="text-xs text-gray-500">Davao to GenSan • 3 hours ago</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-truck-loading text-blue-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">New distribution scheduled</p>
                            <p class="text-xs text-gray-500">Cebu to Bohol • 5 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vehicle Status -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Vehicle Status</h2>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-green-50 border border-green-200 rounded">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-truck text-green-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Truck-024</p>
                                <p class="text-xs text-gray-500">In transit - Manila to Laguna</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-200 rounded">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-truck text-blue-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Truck-018</p>
                                <p class="text-xs text-gray-500">Loading - Main Warehouse</p>
                            </div>
                        </div>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Preparing</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-truck text-gray-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Truck-015</p>
                                <p class="text-xs text-gray-500">Maintenance until Nov 2</p>
                            </div>
                        </div>
                        <span class="text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded-full">Maintenance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Distribution filter functionality
        const statusFilter = document.querySelector('select');
        const regionFilter = document.querySelectorAll('select')[1];
        const applyFiltersBtn = document.querySelector('button:contains("Apply Filters")');

        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener('click', function() {
                const status = statusFilter.value;
                const region = regionFilter.value;
                
                console.log('Filtering distributions:', {
                    status: status,
                    region: region
                });
                
                // Simulate filtering
                showLoadingState();
            });
        }

        // Quick action buttons
        const quickActionButtons = document.querySelectorAll('.space-y-3 button');
        quickActionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const actionName = this.querySelector('.text-sm.font-medium').textContent;
                console.log('Performing action:', actionName);
                
                // Add actual action logic here
                performQuickAction(actionName);
            });
        });

        // Distribution table actions
        const trackButtons = document.querySelectorAll('button:contains("Track")');
        const dispatchButtons = document.querySelectorAll('button:contains("Dispatch")');
        const updateButtons = document.querySelectorAll('button:contains("Update")');
        const detailsButtons = document.querySelectorAll('button:contains("Details")');

        trackButtons.forEach(button => {
            button.addEventListener('click', function() {
                const distributionId = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Tracking distribution:', distributionId);
                openTrackingModal(distributionId);
            });
        });

        dispatchButtons.forEach(button => {
            button.addEventListener('click', function() {
                const distributionId = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Dispatching distribution:', distributionId);
                confirmDispatch(distributionId);
            });
        });

        updateButtons.forEach(button => {
            button.addEventListener('click', function() {
                const distributionId = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Updating distribution:', distributionId);
                openUpdateModal(distributionId);
            });
        });

        detailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const distributionId = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Viewing details for:', distributionId);
                openDetailsModal(distributionId);
            });
        });

        function showLoadingState() {
            // Add loading state UI
            const button = applyFiltersBtn;
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Applying Filters...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
                // Update distribution table with filtered results
            }, 1500);
        }

        function performQuickAction(actionName) {
            console.log('Quick action:', actionName);
            // Implement specific action logic
            if (actionName === 'New Distribution') {
                openNewDistributionModal();
            } else if (actionName === 'Dispatch Manager') {
                openDispatchManager();
            } else if (actionName === 'Route Optimization') {
                openRouteOptimization();
            } else if (actionName === 'Export Reports') {
                exportDistributionReports();
            }
        }

        function openTrackingModal(distributionId) {
            // Implementation for tracking modal
            console.log('Opening tracking modal for:', distributionId);
        }

        function confirmDispatch(distributionId) {
            if (confirm(`Confirm dispatch for ${distributionId}?`)) {
                console.log('Dispatching:', distributionId);
                // API call to dispatch distribution
            }
        }

        function openUpdateModal(distributionId) {
            // Implementation for update modal
            console.log('Opening update modal for:', distributionId);
        }

        function openDetailsModal(distributionId) {
            // Implementation for details modal
            console.log('Opening details modal for:', distributionId);
        }

        function openNewDistributionModal() {
            // Implementation for new distribution modal
            console.log('Opening new distribution modal');
        }

        function openDispatchManager() {
            // Implementation for dispatch manager
            console.log('Opening dispatch manager');
        }

        function openRouteOptimization() {
            // Implementation for route optimization
            console.log('Opening route optimization');
        }

        function exportDistributionReports() {
            // Implementation for report export
            console.log('Exporting distribution reports');
        }

        // Real-time updates for active distributions
        function startRealTimeUpdates() {
            setInterval(() => {
                // Simulate real-time updates
                console.log('Checking for distribution updates...');
                // In a real application, this would fetch updates from an API
            }, 30000); // Every 30 seconds
        }

        startRealTimeUpdates();
    });
</script>
@endsection