@extends('Components.layouts.admin.admin-layouts.app')

@section('title', 'User Management - NFA ERP System')
@section('page-title', 'User Management')
@section('page-description', 'Manage all user accounts and permissions')

@section('content')
<div class="space-y-4">
    <!-- User Management Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
        <div>
            <h1 class="text-xl font-semibold text-gray-900">User Accounts</h1>
            <p class="text-gray-500 text-sm mt-0.5">Manage system users and their permissions</p>
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors flex items-center">
                <i class="fas fa-plus mr-1.5 text-xs"></i>
                Add User
            </button>
            <button class="px-3 py-1.5 border border-gray-300 text-gray-600 text-sm rounded hover:bg-gray-50 transition-colors flex items-center">
                <i class="fas fa-download mr-1.5 text-xs"></i>
                Export
            </button>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white border border-gray-200 rounded p-3">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <div class="md:col-span-2">
                <div class="relative">
                    <i class="fas fa-search absolute left-2.5 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" placeholder="Search users..." class="w-full pl-8 pr-3 py-1.5 border border-gray-300 rounded text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                </div>
            </div>
            <select class="border border-gray-300 rounded px-2.5 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                <option>All Roles</option>
                <option>Administrator</option>
                <option>Manager</option>
                <option>Staff</option>
                <option>Viewer</option>
            </select>
            <select class="border border-gray-300 rounded px-2.5 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Suspended</option>
            </select>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white border border-gray-200 rounded overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Login</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $users = [
                            [
                                'name' => 'Maria Santos',
                                'email' => 'maria.santos@nfa.gov.ph',
                                'role' => 'Administrator',
                                'department' => 'IT',
                                'last_login' => 'Today, 09:24',
                                'status' => 'active',
                                'avatar' => 'MS'
                            ],
                            [
                                'name' => 'Juan Dela Cruz',
                                'email' => 'juan.delacruz@nfa.gov.ph',
                                'role' => 'Warehouse Manager',
                                'department' => 'Operations',
                                'last_login' => 'Yesterday, 15:45',
                                'status' => 'active',
                                'avatar' => 'JC'
                            ],
                            [
                                'name' => 'Ana Reyes',
                                'email' => 'ana.reyes@nfa.gov.ph',
                                'role' => 'Finance Officer',
                                'department' => 'Finance',
                                'last_login' => '2 days ago',
                                'status' => 'active',
                                'avatar' => 'AR'
                            ],
                            [
                                'name' => 'Robert Lim',
                                'email' => 'robert.lim@nfa.gov.ph',
                                'role' => 'System Admin',
                                'department' => 'IT',
                                'last_login' => 'Oct 10, 2025',
                                'status' => 'inactive',
                                'avatar' => 'RL'
                            ],
                            [
                                'name' => 'Susan Tan',
                                'email' => 'susan.tan@nfa.gov.ph',
                                'role' => 'Inventory Staff',
                                'department' => 'Operations',
                                'last_login' => 'Oct 9, 2025',
                                'status' => 'suspended',
                                'avatar' => 'ST'
                            ],
                        ];
                    @endphp
                    
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-xs font-medium text-blue-600">{{ $user['avatar'] }}</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $user['name'] }}</div>
                                        <div class="text-xs text-gray-500">{{ $user['email'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-700">
                                    {{ $user['role'] }}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $user['department'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user['last_login'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                @if($user['status'] === 'active')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">
                                        <i class="fas fa-circle text-xs mr-1"></i>
                                        Active
                                    </span>
                                @elseif($user['status'] === 'inactive')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">
                                        <i class="fas fa-circle text-xs mr-1"></i>
                                        Inactive
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-700">
                                        <i class="fas fa-circle text-xs mr-1"></i>
                                        Suspended
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-1">
                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Edit User">
                                        <i class="fas fa-edit text-xs"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800 p-1" title="Reset Password">
                                        <i class="fas fa-key text-xs"></i>
                                    </button>
                                    <button class="text-purple-600 hover:text-purple-800 p-1" title="Permissions">
                                        <i class="fas fa-user-shield text-xs"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800 p-1" title="Delete User">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-2 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between items-center">
                    <div>
                        <p class="text-xs text-gray-600">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">247</span>
                        </p>
                    </div>
                    <div class="flex space-x-1">
                        <button class="relative inline-flex items-center px-2.5 py-1 border border-gray-300 text-xs rounded text-gray-600 bg-white hover:bg-gray-50">
                            Previous
                        </button>
                        <button class="relative inline-flex items-center px-2.5 py-1 border border-gray-300 text-xs rounded text-gray-600 bg-white hover:bg-gray-50">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection