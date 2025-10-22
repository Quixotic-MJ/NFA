@extends('Components.layouts.admin.admin-layouts.app')

@section('title', 'Admin Dashboard - NFA ERP System')
@section('page-title', 'System Administration')
@section('page-description', 'Complete system oversight and management')

@section('content')
<div class="space-y-6">
    <!-- System Overview Stats - Minimal -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $adminStats = [
                [
                    'label' => 'Total Users', 
                    'value' => '247', 
                    'icon' => 'fas fa-users',
                    'trend' => 'up',
                    'change' => '+12',
                    'color' => 'blue'
                ],
                [
                    'label' => 'Active Sessions', 
                    'value' => '89', 
                    'icon' => 'fas fa-user-check',
                    'trend' => 'up',
                    'change' => '+8',
                    'color' => 'green'
                ],
                [
                    'label' => 'System Alerts', 
                    'value' => '3', 
                    'icon' => 'fas fa-exclamation-triangle',
                    'trend' => 'down',
                    'change' => '-5',
                    'color' => 'red'
                ],
                [
                    'label' => 'Backup Status', 
                    'value' => 'Current', 
                    'icon' => 'fas fa-database',
                    'trend' => 'stable',
                    'change' => '0',
                    'color' => 'gray'
                ]
            ];
        @endphp
        
        @foreach($adminStats as $stat)
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-sm transition-all">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <p class="text-gray-500 text-xs font-medium mb-1">{{ $stat['label'] }}</p>
                        <p class="text-xl font-semibold text-gray-900 mb-1">{{ $stat['value'] }}</p>
                        <div class="flex items-center">
                            @if($stat['trend'] !== 'stable')
                                <i class="fas fa-arrow-{{ $stat['trend'] === 'up' ? 'up text-green-500' : 'down text-red-500' }} text-xs mr-1"></i>
                                <span class="text-xs {{ $stat['trend'] === 'up' ? 'text-green-600' : 'text-red-600' }} font-medium">
                                    {{ $stat['change'] }}
                                </span>
                            @else
                                <i class="fas fa-minus text-xs text-gray-400 mr-1"></i>
                                <span class="text-xs text-gray-500 font-medium">No change</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-2 bg-{{ $stat['color'] }}-50 text-{{ $stat['color'] }}-600 rounded-md">
                        <i class="{{ $stat['icon'] }} text-sm"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Quick Admin Actions - Minimal -->
    <div class="bg-white border border-gray-200 rounded-lg p-4">
        <h2 class="text-base font-semibold text-gray-900 mb-3">Quick Actions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('Users') }}" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-md hover:border-blue-200 hover:bg-blue-50 transition-colors group">
                <i class="fas fa-users text-lg text-blue-600 mb-1.5 group-hover:text-blue-700"></i>
                <span class="text-xs font-medium text-gray-700 text-center">Users</span>
            </a>
            <a href="{{ route('Setting') }}" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-md hover:border-purple-200 hover:bg-purple-50 transition-colors group">
                <i class="fas fa-cog text-lg text-purple-600 mb-1.5 group-hover:text-purple-700"></i>
                <span class="text-xs font-medium text-gray-700 text-center">Settings</span>
            </a>
            <a href="{{ route('Logs') }}" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-md hover:border-orange-200 hover:bg-orange-50 transition-colors group">
                <i class="fas fa-clipboard-list text-lg text-orange-600 mb-1.5 group-hover:text-orange-700"></i>
                <span class="text-xs font-medium text-gray-700 text-center">Audit Logs</span>
            </a>
            <a href="{{ route('Profile') }}" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-md hover:border-green-200 hover:bg-green-50 transition-colors group">
                <i class="fas fa-user text-lg text-green-600 mb-1.5 group-hover:text-green-700"></i>
                <span class="text-xs font-medium text-gray-700 text-center">Profile</span>
            </a>
        </div>
    </div>

    <!-- System Health & Recent Activity - Compact -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- System Health -->
        <div class="bg-white border border-gray-200 rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-base font-semibold text-gray-900">System Health</h2>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                    <i class="fas fa-circle text-xs mr-1"></i>
                    Operational
                </span>
            </div>
            
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-50 rounded flex items-center justify-center mr-2">
                            <i class="fas fa-server text-green-500 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Database</p>
                            <p class="text-xs text-gray-500">12ms response</p>
                        </div>
                    </div>
                    <span class="text-xs text-green-600 font-medium">Healthy</span>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-50 rounded flex items-center justify-center mr-2">
                            <i class="fas fa-network-wired text-green-500 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">API Services</p>
                            <p class="text-xs text-gray-500">All active</p>
                        </div>
                    </div>
                    <span class="text-xs text-green-600 font-medium">Healthy</span>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-yellow-50 rounded flex items-center justify-center mr-2">
                            <i class="fas fa-hdd text-yellow-500 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Storage</p>
                            <p class="text-xs text-gray-500">78% used</p>
                        </div>
                    </div>
                    <span class="text-xs text-yellow-600 font-medium">Warning</span>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-50 rounded flex items-center justify-center mr-2">
                            <i class="fas fa-shield-alt text-green-500 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Security</p>
                            <p class="text-xs text-gray-500">All checks passed</p>
                        </div>
                    </div>
                    <span class="text-xs text-green-600 font-medium">Secure</span>
                </div>
            </div>
        </div>

        <!-- Recent Admin Activity -->
        <div class="bg-white border border-gray-200 rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-base font-semibold text-gray-900">Recent Activity</h2>
                <a href="{{ route('Logs') }}" class="text-xs text-blue-600 hover:text-blue-800 font-medium">View All</a>
            </div>
            
            <div class="space-y-3">
                @php
                    $activities = [
                        ['user' => 'System Admin', 'action' => 'Modified user permissions', 'time' => '5m ago', 'icon' => 'fas fa-user-edit', 'color' => 'blue'],
                        ['user' => 'IT Admin', 'action' => 'Performed system backup', 'time' => '2h ago', 'icon' => 'fas fa-database', 'color' => 'green'],
                        ['user' => 'ERP Manager', 'action' => 'Updated workflow', 'time' => '4h ago', 'icon' => 'fas fa-workflow', 'color' => 'purple'],
                        ['user' => 'System Admin', 'action' => 'Reset user password', 'time' => '6h ago', 'icon' => 'fas fa-key', 'color' => 'orange'],
                    ];
                @endphp
                
                @foreach($activities as $activity)
                    <div class="flex items-start space-x-2 p-2 hover:bg-gray-50 rounded transition-colors">
                        <div class="w-6 h-6 bg-{{ $activity['color'] }}-50 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="{{ $activity['icon'] }} text-{{ $activity['color'] }}-600 text-xs"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">{{ $activity['user'] }}</p>
                            <p class="text-xs text-gray-600">{{ $activity['action'] }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $activity['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- System Alerts - Minimal -->
    <div class="bg-white border border-gray-200 rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-base font-semibold text-gray-900">System Alerts</h2>
            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                3 Active
            </span>
        </div>
        
        <div class="space-y-3">
            <div class="flex items-start space-x-3 p-3 border border-yellow-200 bg-yellow-50 rounded-md">
                <div class="w-5 h-5 bg-yellow-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-medium text-yellow-800">Storage Warning</h3>
                    <p class="text-xs text-yellow-700 mt-0.5">Database storage at 78% capacity.</p>
                    <div class="flex items-center space-x-3 mt-1.5">
                        <span class="text-xs text-yellow-600">2h ago</span>
                        <button class="text-xs text-yellow-700 font-medium hover:text-yellow-800">Acknowledge</button>
                    </div>
                </div>
            </div>
            
            <div class="flex items-start space-x-3 p-3 border border-red-200 bg-red-50 rounded-md">
                <div class="w-5 h-5 bg-red-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-times-circle text-red-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-medium text-red-800">Security Alert</h3>
                    <p class="text-xs text-red-700 mt-0.5">Failed login attempts detected.</p>
                    <div class="flex items-center space-x-3 mt-1.5">
                        <span class="text-xs text-red-600">30m ago</span>
                        <button class="text-xs text-red-700 font-medium hover:text-red-800">Review</button>
                    </div>
                </div>
            </div>
            
            <div class="flex items-start space-x-3 p-3 border border-blue-200 bg-blue-50 rounded-md">
                <div class="w-5 h-5 bg-blue-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-info-circle text-blue-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-medium text-blue-800">Update Available</h3>
                    <p class="text-xs text-blue-700 mt-0.5">ERP System v2.3.1 ready.</p>
                    <div class="flex items-center space-x-3 mt-1.5">
                        <span class="text-xs text-blue-600">1d ago</span>
                        <button class="text-xs text-blue-700 font-medium hover:text-blue-800">Schedule</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection