@extends('Components.layouts.app')

@section('title', 'My Profile - NFA ERP System')
@section('page-title', 'My Profile')
@section('page-description', 'Manage your account settings')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Profile Header -->
    <div class="bg-white border border-gray-200 rounded-lg mb-6">
        <div class="px-6 py-6 border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <!-- Profile Picture -->
                <div class="relative">
                    <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-xl"></i>
                    </div>
                </div>
                
                <!-- User Info -->
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">Admin User</h1>
                    <p class="text-gray-600 text-sm">Administrator • admin@nfa.gov.ph</p>
                    <p class="text-gray-500 text-xs mt-1">NFA Central Office</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="space-y-6">
        <!-- Personal Information -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Personal Information</h2>
            </div>
            
            <form class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none" value="Admin">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none" value="User">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none" value="admin@nfa.gov.ph">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none" value="+63 912 345 6789">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none">
                            <option>Administration</option>
                            <option>Procurement</option>
                            <option>Warehouse</option>
                            <option>Finance</option>
                            <option>Distribution</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none" value="System Administrator">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <button type="button" class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Settings -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Security Settings</h2>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Password Change -->
                <div>
                    <h3 class="text-md font-medium text-gray-900 mb-4">Change Password</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                            <input type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                <input type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                <input type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-gray-400 outline-none">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
            </div>
            
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-sign-in-alt text-gray-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">User login</p>
                            <p class="text-sm text-gray-600">Successfully logged into the system</p>
                            <p class="text-xs text-gray-500 mt-1">Today at 09:15 AM</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-edit text-gray-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Updated inventory</p>
                            <p class="text-sm text-gray-600">Modified rice stock quantity</p>
                            <p class="text-xs text-gray-500 mt-1">Yesterday at 03:45 PM</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-file-invoice text-gray-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Created purchase order</p>
                            <p class="text-sm text-gray-600">Generated new purchase order</p>
                            <p class="text-xs text-gray-500 mt-1">Oct 25, 2024</p>
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
                showNotification('Personal information updated successfully!', 'success');
            });
        }

        if (passwordForm) {
            passwordForm.addEventListener('submit', function(e) {
                e.preventDefault();
                showNotification('Password updated successfully!', 'success');
            });
        }

        // Notification function
        function showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-gray-800' : 'bg-red-500'
            } text-white`;
            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'} text-sm"></i>
                    <span class="text-sm">${message}</span>
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