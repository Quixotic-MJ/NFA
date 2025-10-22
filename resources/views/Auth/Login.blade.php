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
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        
        .background-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="background-pattern flex items-center justify-center min-h-screen p-4">
    <div class="flex flex-col md:flex-row bg-white border border-gray-200 w-full max-w-4xl mx-4 card-shadow rounded-xl overflow-hidden">

        <!-- Left - Login Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white/95 backdrop-blur-sm">
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-gray-900 flex items-center justify-center rounded-lg">
                        <i class="fas fa-warehouse text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">ERP System</h1>
                        <p class="text-gray-600 text-sm">National Food Authority</p>
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-2">Secure access to the management portal</p>
            </div>

            <form action="{{ route('Dashboard') }}" method="GET">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <div class="relative">
                        <input type="text" id="username" name="username" placeholder="Enter your username"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-gray-400 focus:ring-2 focus:ring-gray-200 outline-none transition-colors"
                            required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-gray-400 focus:ring-2 focus:ring-gray-200 outline-none transition-colors pr-12"
                            required>
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-eye" id="password-toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-gray-900 text-white font-medium hover:bg-gray-800 transition-colors focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 outline-none rounded-lg">
                    Log In
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-gray-500 text-sm text-center">© 2025 National Food Authority</p>
            </div>
        </div>

        <!-- Right - Branding Panel -->
        <div class="w-full md:w-1/2 bg-gradient-to-br from-gray-900 to-gray-800 text-white p-8 md:p-12 flex flex-col items-center justify-center">
            <div class="text-center max-w-xs">
                <h2 class="text-2xl font-semibold mb-4">National Food Authority</h2>
                <p class="text-gray-300 text-sm mb-8">Enterprise Resource Planning System</p>

                <!-- Feature List -->
                <div class="space-y-4 text-left">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-700/50 flex items-center justify-center rounded-lg">
                            <i class="fas fa-shield-alt text-sm"></i>
                        </div>
                        <span class="text-gray-300 text-sm">Secure & Encrypted</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-700/50 flex items-center justify-center rounded-lg">
                            <i class="fas fa-chart-line text-sm"></i>
                        </div>
                        <span class="text-gray-300 text-sm">Real-time Analytics</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-700/50 flex items-center justify-center rounded-lg">
                            <i class="fas fa-warehouse text-sm"></i>
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
                    this.parentElement.classList.add('ring-2', 'ring-gray-300');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-gray-300');
                });
            });
        });
    </script>
</body>

</html>