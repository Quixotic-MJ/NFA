@extends('Components.layouts.admin.admin-layouts.app')

@section('title', 'Audit Logs - NFA ERP System')
@section('page-title', 'System Audit Trail')
@section('page-description', 'Complete record of all system activities and changes')

@section('content')
<div class="space-y-4">
    <!-- Audit Logs Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
        <div>
            <h1 class="text-xl font-semibold text-gray-900">Audit Logs</h1>
            <p class="text-gray-500 text-sm mt-0.5">Monitor all system activities and changes</p>
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1.5 border border-gray-300 text-gray-600 text-sm rounded hover:bg-gray-50 transition-colors flex items-center">
                <i class="fas fa-download mr-1.5 text-xs"></i>
                Export
            </button>
            <button class="px-3 py-1.5 border border-gray-300 text-gray-600 text-sm rounded hover:bg-gray-50 transition-colors flex items-center">
                <i class="fas fa-filter mr-1.5 text-xs"></i>
                Filter
            </button>
        </div>
    </div>

    <!-- Audit Summary -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
        <div class="bg-white border border-gray-200 rounded p-3">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-blue-50 rounded flex items-center justify-center mr-3">
                    <i class="fas fa-user-edit text-blue-500 text-sm"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500">User Actions</p>
                    <p class="text-lg font-semibold text-gray-900">1,247</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded p-3">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-green-50 rounded flex items-center justify-center mr-3">
                    <i class="fas fa-database text-green-500 text-sm"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Data Changes</p>
                    <p class="text-lg font-semibold text-gray-900">892</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded p-3">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-red-50 rounded flex items-center justify-center mr-3">
                    <i class="fas fa-shield-alt text-red-500 text-sm"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Security Events</p>
                    <p class="text-lg font-semibold text-gray-900">34</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded p-3">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-purple-50 rounded flex items-center justify-center mr-3">
                    <i class="fas fa-cog text-purple-500 text-sm"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500">System Changes</p>
                    <p class="text-lg font-semibold text-gray-900">56</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Audit Logs Table -->
    <div class="bg-white border border-gray-200 rounded overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Resource</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $auditLogs = [
                            [
                                'timestamp' => '2025-10-12 09:24:15',
                                'user' => 'Maria Santos',
                                'action' => 'Modified user permissions',
                                'resource' => 'User: Juan Dela Cruz',
                                'ip' => '192.168.1.100',
                                'status' => 'success'
                            ],
                            [
                                'timestamp' => '2025-10-12 08:45:30',
                                'user' => 'System Auto',
                                'action' => 'Database backup completed',
                                'resource' => 'System Database',
                                'ip' => '127.0.0.1',
                                'status' => 'success'
                            ],
                            [
                                'timestamp' => '2025-10-12 07:12:45',
                                'user' => 'Robert Lim',
                                'action' => 'Updated system settings',
                                'resource' => 'General Settings',
                                'ip' => '192.168.1.105',
                                'status' => 'success'
                            ],
                            [
                                'timestamp' => '2025-10-11 22:30:15',
                                'user' => 'Unknown',
                                'action' => 'Failed login attempt',
                                'resource' => 'Authentication System',
                                'ip' => '103.145.87.23',
                                'status' => 'failed'
                            ],
                            [
                                'timestamp' => '2025-10-11 18:20:33',
                                'user' => 'ERP Manager',
                                'action' => 'Created workflow',
                                'resource' => 'Workflow: Purchase Orders',
                                'ip' => '192.168.1.110',
                                'status' => 'success'
                            ],
                        ];
                    @endphp
                    
                    @foreach($auditLogs as $log)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $log['timestamp'] }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $log['user'] }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $log['action'] }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $log['resource'] }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $log['ip'] }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                @if($log['status'] === 'success')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">
                                        Success
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-700">
                                        Failed
                                    </span>
                                @endif
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
                            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">12,430</span>
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