@extends('Components.layouts.admin.admin-layouts.app')

@section('title', 'System Settings - NFA ERP System')
@section('page-title', 'System Configuration')
@section('page-description', 'Configure system-wide settings and preferences')

@section('content')
<div class="space-y-4">
    <!-- Settings Navigation -->
    <div class="bg-white border border-gray-200 rounded">
        <div class="border-b border-gray-200">
            <nav class="flex overflow-x-auto">
                <a href="#" class="px-4 py-3 border-b-2 border-blue-500 text-blue-600 font-medium text-sm whitespace-nowrap">
                    General
                </a>
                <a href="#" class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap">
                    Workflows
                </a>
                <a href="#" class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap">
                    Security
                </a>
                <a href="#" class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap">
                    Email
                </a>
                <a href="#" class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap">
                    Integration
                </a>
            </nav>
        </div>

        <!-- General Settings Content -->
        <div class="p-4">
            <div class="space-y-6">
                <!-- System Information -->
                <div>
                    <h3 class="text-base font-semibold text-gray-900 mb-3">System Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">System Name</label>
                            <input type="text" value="NFA ERP System" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">System Version</label>
                            <input type="text" value="v2.3.0" readonly class="w-full border border-gray-300 bg-gray-50 rounded px-3 py-1.5 text-sm outline-none">
                        </div>
                    </div>
                </div>

                <!-- Session Settings -->
                <div>
                    <h3 class="text-base font-semibold text-gray-900 mb-3">Session & Security</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Session Timeout (min)</label>
                            <input type="number" value="30" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Max Login Attempts</label>
                            <input type="number" value="5" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                        </div>
                    </div>
                </div>

                <!-- Budget Limits -->
                <div>
                    <h3 class="text-base font-semibold text-gray-900 mb-3">Budget Limits</h3>
                    <div class="space-y-3">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Manager Limit</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm">₱</span>
                                    </div>
                                    <input type="text" value="50,000" class="pl-6 w-full border border-gray-300 rounded px-2 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Director Limit</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm">₱</span>
                                    </div>
                                    <input type="text" value="200,000" class="pl-6 w-full border border-gray-300 rounded px-2 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Executive Limit</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm">₱</span>
                                    </div>
                                    <input type="text" value="500,000" class="pl-6 w-full border border-gray-300 rounded px-2 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div>
                    <h3 class="text-base font-semibold text-gray-900 mb-3">Notifications</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="text-sm font-medium text-gray-700">Email Notifications</label>
                                <p class="text-xs text-gray-500">System alerts via email</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="text-sm font-medium text-gray-700">SMS Alerts</label>
                                <p class="text-xs text-gray-500">Critical alerts via SMS</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="text-sm font-medium text-gray-700">Audit Logs</label>
                                <p class="text-xs text-gray-500">System change notifications</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200">
                    <button class="px-3 py-1.5 border border-gray-300 text-gray-600 text-sm rounded hover:bg-gray-50 transition-colors">
                        Reset Defaults
                    </button>
                    <button class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Settings Sections (Hidden by default, can be shown with Alpine.js) -->
    <div x-data="{ activeTab: 'general' }">
        <!-- Workflows Content -->
        <div x-show="activeTab === 'workflows'" class="bg-white border border-gray-200 rounded p-4">
            <h3 class="text-base font-semibold text-gray-900 mb-3">Approval Workflows</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Purchase Orders</label>
                        <p class="text-xs text-gray-500">2-step approval process</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Expense Reports</label>
                        <p class="text-xs text-gray-500">Manager approval required</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Security Content -->
        <div x-show="activeTab === 'security'" class="bg-white border border-gray-200 rounded p-4">
            <h3 class="text-base font-semibold text-gray-900 mb-3">Security Policies</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Password Policy</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                        <option>Standard (8 characters)</option>
                        <option>Strong (12 characters)</option>
                        <option>Very Strong (16 characters)</option>
                    </select>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Two-Factor Authentication</label>
                        <p class="text-xs text-gray-500">Require 2FA for all users</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Email Content -->
        <div x-show="activeTab === 'email'" class="bg-white border border-gray-200 rounded p-4">
            <h3 class="text-base font-semibold text-gray-900 mb-3">Email Templates</h3>
            <div class="space-y-3">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">SMTP Server</label>
                    <input type="text" value="smtp.nfa.gov.ph" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">From Email</label>
                    <input type="email" value="noreply@nfa.gov.ph" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none">
                </div>
            </div>
        </div>

        <!-- Integration Content -->
        <div x-show="activeTab === 'integration'" class="bg-white border border-gray-200 rounded p-4">
            <h3 class="text-base font-semibold text-gray-900 mb-3">Integration Settings</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Accounting System</label>
                        <p class="text-xs text-gray-500">QuickBooks integration</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Payment Gateway</label>
                        <p class="text-xs text-gray-500">PayMaya integration</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching functionality
        const tabs = document.querySelectorAll('nav a');
        const sections = document.querySelectorAll('[x-show]');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update active tab
                tabs.forEach(t => {
                    t.classList.remove('border-blue-500', 'text-blue-600');
                    t.classList.add('border-transparent', 'text-gray-500');
                });
                
                this.classList.add('border-blue-500', 'text-blue-600');
                this.classList.remove('border-transparent', 'text-gray-500');
                
                // Show corresponding section
                const tabName = this.textContent.trim().toLowerCase();
                // You would implement Alpine.js data binding here for real tab switching
            });
        });

        // Form submission
        const forms = document.querySelectorAll('form, [type="checkbox"]');
        forms.forEach(form => {
            form.addEventListener('change', function() {
                // Show save indicator or auto-save
                console.log('Setting changed');
            });
        });
    });
</script>
@endsection