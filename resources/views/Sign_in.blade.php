<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFA ERP System - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #b91c1c 100%);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-2xl overflow-hidden w-full max-w-5xl mx-4">

        <!-- Left - Login Form -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <div class="mb-8">
                <img src="{{ asset('images/image.png') }}" alt="NFA Logo" class="w-16 h-16 mb-4">
                <h1 class="text-3xl font-bold text-gray-900">ERP System Access</h1>
                <p class="text-gray-500">National Food Authority</p>
            </div>

            <form>
                @csrf

                <!-- Username -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none"
                        required>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none"
                            required>
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition transform hover:-translate-y-0.5 hover:shadow-lg">
                    Log In
                </button>
            </form>
        </div>

        <!-- Right - Branding Panel -->
        <div
            class="w-full md:w-1/2 bg-gradient-to-br from-blue-900 via-blue-800 to-red-900 text-white p-10 flex flex-col items-center justify-center relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=1200&q=80')] bg-cover bg-center opacity-20">
            </div>
            <div class="relative z-10 text-center">
                <h2 class="text-4xl font-bold mb-4">National Food Authority</h2>
                <p class="text-blue-200 text-lg">ERP Management Portal</p>
                <div class="mt-8 text-sm text-gray-300">
                    <p>© 2025 National Food Authority</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>
