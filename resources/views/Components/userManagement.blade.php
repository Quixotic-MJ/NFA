@extends('Components.layouts.app')

@section('title', 'User Management - NFA ERP System')
@section('page-title', 'User Management')
@section('page-description', 'Manage system users, roles, permissions, and access controls')

@section('content')
    <!-- User Management Header -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">User Management</h1>
                <p class="text-gray-600 mt-1">Manage all system users, roles, and permissions</p>
            </div>
            <div class="flex space-x-3">
                <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Add New User</span>
                </button>
                <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                    <i class="fas fa-cog"></i>
                    <span>Role Settings</span>
                </button>
            </div>
        </div>
    </div>

    <!-- User Filters -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex flex-col lg:flex-row gap-4 items-end">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 flex-1">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Roles</option>
                        <option>Administrator</option>
                        <option>Manager</option>
                        <option>Supervisor</option>
                        <option>Staff</option>
                        <option>Viewer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Suspended</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        <option>All Departments</option>
                        <option>Administration</option>
                        <option>Procurement</option>
                        <option>Warehouse</option>
                        <option>Finance</option>
                        <option>Sales</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search Users</label>
                    <div class="relative">
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-gray-400 outline-none pl-10" placeholder="Search by name or email">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
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

    <!-- User Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $userMetrics = [
                [
                    'label' => 'Total Users', 
                    'value' => '142', 
                    'icon' => 'fas fa-users',
                    'change' => '+8 users',
                    'trend' => 'up',
                    'description' => 'Across all departments'
                ],
                [
                    'label' => 'Active Users', 
                    'value' => '128', 
                    'icon' => 'fas fa-user-check',
                    'change' => '+5 this month',
                    'trend' => 'up',
                    'description' => 'Currently active'
                ],
                [
                    'label' => 'Administrators', 
                    'value' => '12', 
                    'icon' => 'fas fa-user-shield',
                    'change' => 'No change',
                    'trend' => 'neutral',
                    'description' => 'Full system access'
                ],
                [
                    'label' => 'New Users', 
                    'value' => '8', 
                    'icon' => 'fas fa-user-plus',
                    'change' => '+3 from last month',
                    'trend' => 'up',
                    'description' => 'Added this month'
                ]
            ];
        @endphp
        
        @foreach($userMetrics as $metric)
            <div class="bg-white border border-gray-200 p-6 rounded-lg hover:border-gray-300 transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <p class="text-gray-600 text-sm font-medium mb-2">{{ $metric['label'] }}</p>
                        <p class="text-2xl font-semibold text-gray-900 mb-1">{{ $metric['value'] }}</p>
                        <div class="flex items-center">
                            @if($metric['trend'] === 'up')
                                <i class="fas fa-arrow-up text-green-600 text-xs mr-1"></i>
                                <span class="text-xs text-green-600 font-medium mr-2">{{ $metric['change'] }}</span>
                            @elseif($metric['trend'] === 'neutral')
                                <i class="fas fa-minus text-gray-500 text-xs mr-1"></i>
                                <span class="text-xs text-gray-500 font-medium mr-2">{{ $metric['change'] }}</span>
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

    <!-- Main User Management Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Left Column - User List -->
        <div class="xl:col-span-2">
            <!-- Users Table -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">All Users</h2>
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Active</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-800 font-medium">JD</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">John Dela Cruz</div>
                                            <div class="text-sm text-gray-500">john.delacruz@nfa.gov.ph</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                        Administrator
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Administration</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 hours ago</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Deactivate</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <span class="text-green-800 font-medium">MS</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Maria Santos</div>
                                            <div class="text-sm text-gray-500">maria.santos@nfa.gov.ph</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Manager
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Warehouse</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 day ago</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Deactivate</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                            <span class="text-yellow-800 font-medium">RG</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Roberto Garcia</div>
                                            <div class="text-sm text-gray-500">roberto.garcia@nfa.gov.ph</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                        Supervisor
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Procurement</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 days ago</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Deactivate</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-red-100 rounded-full flex items-center justify-center">
                                            <span class="text-red-800 font-medium">AR</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Ana Reyes</div>
                                            <div class="text-sm text-gray-500">ana.reyes@nfa.gov.ph</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Staff
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Finance</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Inactive
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 weeks ago</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-green-600 hover:text-green-900">Activate</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">142</span> users
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
        </div>

        <!-- Right Column - User Details & Quick Actions -->
        <div class="space-y-6">
            <!-- User Quick Actions -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-plus text-blue-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Add New User</p>
                                <p class="text-xs text-gray-500">Create a new user account</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-cog text-green-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Role Management</p>
                                <p class="text-xs text-gray-500">Manage user roles and permissions</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-key text-purple-600"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-900">Password Reset</p>
                                <p class="text-xs text-gray-500">Reset user passwords</p>
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
                                <p class="text-sm font-medium text-gray-900">Export Users</p>
                                <p class="text-xs text-gray-500">Export user list to CSV</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-600"></i>
                    </button>
                </div>
            </div>

            <!-- Role Distribution -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Role Distribution</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-purple-100 rounded flex items-center justify-center">
                                <i class="fas fa-user-shield text-purple-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Administrators</p>
                                <p class="text-xs text-gray-500">Full system access</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">12</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-100 rounded flex items-center justify-center">
                                <i class="fas fa-user-tie text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Managers</p>
                                <p class="text-xs text-gray-500">Department management</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">24</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-orange-100 rounded flex items-center justify-center">
                                <i class="fas fa-user-check text-orange-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Supervisors</p>
                                <p class="text-xs text-gray-500">Team supervision</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">36</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center">
                                <i class="fas fa-user text-gray-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Staff</p>
                                <p class="text-xs text-gray-500">Regular system users</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">70</span>
                    </div>
                </div>
            </div>

            <!-- Recent User Activity -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent User Activity</h2>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus text-green-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">New user account created</p>
                            <p class="text-xs text-gray-500">Juan Dela Cruz • 2 hours ago</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-key text-blue-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Password reset requested</p>
                            <p class="text-xs text-gray-500">Maria Santos • 5 hours ago</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-cog text-purple-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">Role updated for Roberto Garcia</p>
                            <p class="text-xs text-gray-500">Admin User • 1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // User filter functionality
        const roleFilter = document.querySelector('select');
        const statusFilter = document.querySelectorAll('select')[1];
        const applyFiltersBtn = document.querySelector('button:contains("Apply Filters")');

        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener('click', function() {
                const role = roleFilter.value;
                const status = statusFilter.value;
                
                console.log('Filtering users:', {
                    role: role,
                    status: status
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

        // User table actions
        const editButtons = document.querySelectorAll('button:contains("Edit")');
        const deactivateButtons = document.querySelectorAll('button:contains("Deactivate")');
        const activateButtons = document.querySelectorAll('button:contains("Activate")');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userName = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Editing user:', userName);
                // Open edit user modal
                openEditUserModal(userName);
            });
        });

        deactivateButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userName = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Deactivating user:', userName);
                // Show confirmation and deactivate
                confirmDeactivateUser(userName);
            });
        });

        activateButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userName = this.closest('tr').querySelector('.text-sm.font-medium').textContent;
                console.log('Activating user:', userName);
                // Activate user
                activateUser(userName);
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
                // Update user table with filtered results
            }, 1500);
        }

        function performQuickAction(actionName) {
            console.log('Quick action:', actionName);
            // Implement specific action logic
            if (actionName === 'Add New User') {
                openAddUserModal();
            } else if (actionName === 'Role Management') {
                openRoleManagement();
            } else if (actionName === 'Password Reset') {
                openPasswordReset();
            } else if (actionName === 'Export Users') {
                exportUsers();
            }
        }

        function openEditUserModal(userName) {
            // Implementation for edit user modal
            console.log('Opening edit modal for:', userName);
        }

        function confirmDeactivateUser(userName) {
            if (confirm(`Are you sure you want to deactivate ${userName}?`)) {
                console.log('Deactivating:', userName);
                // API call to deactivate user
            }
        }

        function activateUser(userName) {
            console.log('Activating:', userName);
            // API call to activate user
        }

        function openAddUserModal() {
            // Implementation for add user modal
            console.log('Opening add user modal');
        }

        function openRoleManagement() {
            // Implementation for role management
            console.log('Opening role management');
        }

        function openPasswordReset() {
            // Implementation for password reset
            console.log('Opening password reset');
        }

        function exportUsers() {
            // Implementation for user export
            console.log('Exporting users to CSV');
        }
    });
</script>
@endsection
