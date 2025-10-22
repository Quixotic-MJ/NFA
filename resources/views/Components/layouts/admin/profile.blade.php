@extends('Components.layouts.admin.admin-layouts.app')

@section('title', 'My Profile - NFA ERP System')
@section('page-title', 'My Profile')
@section('page-description', 'Manage your account settings')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Profile Header - Minimal -->
    <div class="bg-white border border-gray-200 rounded-lg mb-4">
        <div class="px-4 py-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <!-- Profile Picture -->
                <div class="relative">
                    <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-base"></i>
                    </div>
                </div>
                
                <!-- User Info -->
                <div>
                    <h1 class="text-lg font-semibold text-gray-900">Admin User</h1>
                    <p class="text-gray-500 text-xs">Administrator • admin@nfa.gov.ph</p>
                    <p class="text-gray-400 text-xs mt-0.5">NFA Central Office</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="space-y-4">
        <!-- Personal Information -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-900">Personal Information</h2>
            </div>
            
            <form class="p-4 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">First Name</label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none" value="Admin">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Last Name</label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none" value="User">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Email</label>
                        <input type="email" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none" value="admin@nfa.gov.ph">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Phone</label>
                        <input type="tel" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none" value="+63 912 345 6789">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Department</label>
                        <select class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none">
                            <option>Administration</option>
                            <option>Procurement</option>
                            <option>Warehouse</option>
                            <option>Finance</option>
                            <option>Distribution</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Position</label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none" value="System Administrator">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200">
                    <button type="button" class="px-3 py-1.5 border border-gray-300 text-gray-600 text-xs font-medium rounded hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-3 py-1.5 bg-gray-800 text-white text-xs font-medium rounded hover:bg-gray-700 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Settings -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-900">Security</h2>
            </div>
            
            <div class="p-4 space-y-4">
                <!-- Password Change -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900 mb-3">Change Password</h3>
                    <form class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Current Password</label>
                            <input type="password" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">New Password</label>
                                <input type="password" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Confirm Password</label>
                                <input type="password" class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:border-gray-400 outline-none">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-3 py-1.5 bg-gray-800 text-white text-xs font-medium rounded hover:bg-gray-700 transition-colors">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-900">Recent Activity</h2>
            </div>
            
            <div class="p-4">
                <div class="space-y-3">
                    <div class="flex items-start space-x-2">
                        <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-sign-in-alt text-gray-500 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">User login</p>
                            <p class="text-xs text-gray-600">Successfully logged into the system</p>
                            <p class="text-xs text-gray-500 mt-0.5">Today at 09:15 AM</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-2">
                        <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-edit text-gray-500 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Updated inventory</p>
                            <p class="text-xs text-gray-600">Modified rice stock quantity</p>
                            <p class="text-xs text-gray-500 mt-0.5">Yesterday at 03:45 PM</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-2">
                        <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-file-invoice text-gray-500 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Created purchase order</p>
                            <p class="text-xs text-gray-600">Generated new purchase order</p>
                            <p class="text-xs text-gray-500 mt-0.5">Oct 25, 2024</p>
                        </div>
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
        // Form Submissions
        const personalInfoForm = document.querySelector('form');
        const passwordForm = document.querySelectorAll('form')[1];

        if (personalInfoForm) {
            personalInfoForm.addEventListener('submit', function(e) {
                e.preventDefault();
                showNotification('Profile updated successfully', 'success');
            });
        }

        if (passwordForm) {
            passwordForm.addEventListener('submit', function(e) {
                e.preventDefault();
                showNotification('Password updated successfully', 'success');
            });
        }

        // Notification function
        function showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-3 rounded shadow-lg z-50 ${
                type === 'success' ? 'bg-gray-800' : 'bg-red-500'
            } text-white`;
            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'} text-xs"></i>
                    <span class="text-xs">${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    });
</script>
@endsection