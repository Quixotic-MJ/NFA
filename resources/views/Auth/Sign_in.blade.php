<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFA ERP System - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4">
    <div class="flex flex-col md:flex-row bg-white border border-gray-200 w-full max-w-4xl mx-4">

        <!-- Left - Login Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-13 bg-gray-900 flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">ERP System</h1>
                        <p class="text-gray-600 text-sm">National Food Authority</p>
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-2">Secure access to the management portal</p>
            </div>

            <form action="{{ route('dashboard') }}" method="GET">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username"
                        class="w-full px-4 py-3 border border-gray-300 focus:border-gray-400 focus:ring-1 focus:ring-gray-200 outline-none transition-colors"
                        required>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="w-full px-4 py-3 border border-gray-300 focus:border-gray-400 focus:ring-1 focus:ring-gray-200 outline-none transition-colors pr-12"
                            required>
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-eye" id="password-toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-gray-900 text-white font-medium hover:bg-gray-800 transition-colors focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 outline-none">
                    Log In
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-gray-500 text-sm text-center">© 2025 National Food Authority</p>
            </div>
        </div>

        <!-- Right - Branding Panel -->
        <div class="w-full md:w-1/2 bg-gray-900 text-white p-8 md:p-12 flex flex-col items-center justify-center">
            <div class="text-center max-w-xs">
                <h2 class="text-2xl font-semibold mb-4">National Food Authority</h2>
                <p class="text-gray-300 text-sm mb-8">Enterprise Resource Planning System</p>

                <!-- Feature List -->
                <div class="space-y-4 text-left">
                    <div class="flex items-center space-x-3">
                        <div class="w-6 h-6 bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-shield-alt text-xs"></i>
                        </div>
                        <span class="text-gray-300 text-sm">Secure & Encrypted</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-6 h-6 bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-chart-line text-xs"></i>
                        </div>
                        <span class="text-gray-300 text-sm">Real-time Analytics</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-6 h-6 bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-warehouse text-xs"></i>
                        </div>
                        <span class="text-gray-300 text-sm">Inventory Management</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('password-toggle-icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Add focus states for better UX
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-1', 'ring-gray-300');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-1', 'ring-gray-300');
                });
            });
        });
    </script>
</body>

</html>
