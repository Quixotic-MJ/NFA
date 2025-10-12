@extends('Components.layouts.app')

@section('title', 'Reports & Analytics - NFA ERP System')
@section('page-title', 'Reports & Analytics')
@section('page-description', 'Comprehensive insights and analytics for inventory, sales, and operations')

@section('content')
    <!-- Report Filters -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex flex-col lg:flex-row gap-4 items-end">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 flex-1">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Report Type</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>Inventory Report</option>
                        <option>Sales Report</option>
                        <option>Purchase Report</option>
                        <option>Delivery Report</option>
                        <option>Financial Report</option>
                        <option>Supplier Performance</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>Last 3 Months</option>
                        <option>Last 6 Months</option>
                        <option>Year to Date</option>
                        <option>Custom Range</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Categories</option>
                        <option>Rice</option>
                        <option>Corn</option>
                        <option>Wheat</option>
                        <option>Grains</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Warehouse</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Warehouses</option>
                        <option>Main Warehouse</option>
                        <option>Region IV-A</option>
                        <option>Region V</option>
                        <option>Region VI</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-3">
                <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                    <i class="fas fa-filter"></i>
                    <span>Apply Filters</span>
                </button>
                <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                    <i class="fas fa-download"></i>
                    <span>Export</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $reportMetrics = [
                [
                    'label' => 'Total Inventory Value', 
                    'value' => '₱8.4M', 
                    'icon' => 'fas fa-boxes',
                    'change' => '+12.5%',
                    'trend' => 'up',
                    'description' => 'Across all warehouses'
                ],
                [
                    'label' => 'Monthly Sales', 
                    'value' => '₱3.2M', 
                    'icon' => 'fas fa-chart-line',
                    'change' => '+8.3%',
                    'trend' => 'up',
                    'description' => 'October 2024'
                ],
                [
                    'label' => 'Purchase Orders', 
                    'value' => '24', 
                    'icon' => 'fas fa-shopping-cart',
                    'change' => '+4 orders',
                    'trend' => 'up',
                    'description' => 'This month'
                ],
                [
                    'label' => 'Delivery Rate', 
                    'value' => '96.2%', 
                    'icon' => 'fas fa-truck',
                    'change' => '+2.1%',
                    'trend' => 'up',
                    'description' => 'On-time delivery'
                ]
            ];
        @endphp
        
        @foreach($reportMetrics as $metric)
            <div class="bg-white border border-gray-200 p-6 rounded-lg hover:border-gray-300 transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <p class="text-gray-600 text-sm font-medium mb-2">{{ $metric['label'] }}</p>
                        <p class="text-2xl font-semibold text-gray-900 mb-1">{{ $metric['value'] }}</p>
                        <div class="flex items-center">
                            <i class="fas fa-arrow-{{ $metric['trend'] === 'up' ? 'up text-green-600' : 'down text-red-600' }} text-xs mr-1"></i>
                            <span class="text-xs {{ $metric['trend'] === 'up' ? 'text-green-600' : 'text-red-600' }} font-medium mr-2">
                                {{ $metric['change'] }}
                            </span>
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

    <!-- Main Reports Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Left Column - Charts -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Inventory Value Chart -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Inventory Value Trend</h2>
                    <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:border-gray-400 outline-none">
                        <option>Last 6 Months</option>
                        <option>Last 12 Months</option>
                        <option>Year to Date</option>
                    </select>
                </div>
                <div class="h-80 flex items-center justify-center bg-gray-50 border border-gray-200 rounded">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-chart-bar text-4xl mb-3 text-gray-400"></i>
                        <p class="text-sm">Inventory value chart visualization</p>
                        <p class="text-xs mt-1">Monthly inventory value across all product categories</p>
                    </div>
                </div>
            </div>

            <!-- Sales Performance -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Sales Performance by Category</h2>
                    <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:border-gray-400 outline-none">
                        <option>Last Quarter</option>
                        <option>Last 6 Months</option>
                        <option>Last Year</option>
                    </select>
                </div>
                <div class="h-80 flex items-center justify-center bg-gray-50 border border-gray-200 rounded">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-chart-pie text-4xl mb-3 text-gray-400"></i>
                        <p class="text-sm">Sales distribution chart</p>
                        <p class="text-xs mt-1">Revenue breakdown by product category</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Reports List & Quick Stats -->
        <div class="space-y-6">
            <!-- Quick Reports -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Reports</h2>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-boxes text-blue-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Stock Level Report</p>
                                <p class="text-xs text-gray-500">Current inventory status</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-green-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Sales Analytics</p>
                                <p class="text-xs text-gray-500">Revenue and growth trends</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-purple-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Purchase Summary</p>
                                <p class="text-xs text-gray-500">Procurement overview</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-orange-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Delivery Performance</p>
                                <p class="text-xs text-gray-500">Supplier delivery metrics</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-600"></i>
                    </button>
                </div>
            </div>

            <!-- Top Performing Products -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Top Performing Products</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-yellow-100 rounded flex items-center justify-center">
                                <i class="fas fa-wheat text-yellow-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Premium Rice</p>
                                <p class="text-xs text-gray-500">₱1.2M revenue</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">+15%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-orange-100 rounded flex items-center justify-center">
                                <i class="fas fa-corn text-orange-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Yellow Corn</p>
                                <p class="text-xs text-gray-500">₱980K revenue</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">+12%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-amber-100 rounded flex items-center justify-center">
                                <i class="fas fa-bread-slice text-amber-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Wheat Flour</p>
                                <p class="text-xs text-gray-500">₱750K revenue</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">+8%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center">
                                <i class="fas fa-seedling text-gray-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Regular Rice</p>
                                <p class="text-xs text-gray-500">₱620K revenue</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">+5%</span>
                    </div>
                </div>
            </div>

            <!-- Recent Report Activity -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Report Activity</h2>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-download text-blue-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Inventory Stock Report exported</p>
                            <p class="text-xs text-gray-500">2 hours ago • PDF Format</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-green-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Monthly Sales Report generated</p>
                            <p class="text-xs text-gray-500">5 hours ago • Admin User</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-cog text-purple-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Report schedule updated</p>
                            <p class="text-xs text-gray-500">1 day ago • Weekly inventory</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Reports Table -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Generated Reports</h2>
            <div class="flex space-x-3">
                <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Schedule Report</span>
                </button>
            </div>
        </div>

        <div class="overflow-hidden border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Generated</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Period</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Monthly Inventory Report</div>
                            <div class="text-xs text-gray-500">Stock levels and valuation</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Inventory</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Oct 15, 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">September 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2.4 MB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                            <button class="text-green-600 hover:text-green-900 mr-3">Download</button>
                            <button class="text-gray-600 hover:text-gray-900">Share</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Q3 Sales Performance</div>
                            <div class="text-xs text-gray-500">Revenue and growth analysis</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Sales</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Oct 10, 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Q3 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.8 MB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                            <button class="text-green-600 hover:text-green-900 mr-3">Download</button>
                            <button class="text-gray-600 hover:text-gray-900">Share</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Supplier Performance</div>
                            <div class="text-xs text-gray-500">Delivery and quality metrics</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Supplier</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Oct 5, 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Last 6 Months</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.2 MB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                            <button class="text-green-600 hover:text-green-900 mr-3">Download</button>
                            <button class="text-gray-600 hover:text-gray-900">Share</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Report filter functionality
        const reportTypeFilter = document.querySelector('select');
        const dateRangeFilter = document.querySelectorAll('select')[1];
        const applyFiltersBtn = document.querySelector('button:contains("Apply Filters")');

        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener('click', function() {
                const reportType = reportTypeFilter.value;
                const dateRange = dateRangeFilter.value;
                
                console.log('Generating report:', {
                    type: reportType,
                    period: dateRange
                });
                
                // Simulate report generation
                showLoadingState();
            });
        }

        // Quick report buttons
        const quickReportButtons = document.querySelectorAll('.space-y-3 button');
        quickReportButtons.forEach(button => {
            button.addEventListener('click', function() {
                const reportName = this.querySelector('.text-sm.font-medium').textContent;
                console.log('Generating quick report:', reportName);
                
                // Add actual report generation logic here
                generateQuickReport(reportName);
            });
        });

        // Export functionality
        const exportButton = document.querySelector('button:contains("Export")');
        if (exportButton) {
            exportButton.addEventListener('click', function() {
                console.log('Exporting current report data...');
                // Add export logic here (PDF, Excel, etc.)
            });
        }

        function showLoadingState() {
            // Add loading state UI
            const button = applyFiltersBtn;
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating Report...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
                // Show success message or update report data
            }, 2000);
        }

        function generateQuickReport(reportName) {
            console.log('Quick report generation for:', reportName);
            // Implement specific report generation logic
        }
    });
</script>
@endsection