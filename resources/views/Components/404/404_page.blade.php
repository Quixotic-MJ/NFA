<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - NFA ERP System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
        }
        
        .error-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.15);
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="max-w-2xl w-full mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-box text-white"></i>
                </div>
                <span class="text-xl font-bold text-gray-800">NFA ERP System</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">404 - Page Not Found</h1>
            <p class="text-gray-600">The page you're looking for doesn't exist or has been moved.</p>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden glow mb-8">
            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Illustration -->
                    <div class="md:w-1/2 mb-8 md:mb-0 flex justify-center">
                        <div class="relative">
                            <div class="error-animation">
                                <div class="w-48 h-48 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-full flex items-center justify-center pulse-slow">
                                    <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-exclamation-triangle text-yellow-500 text-5xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-purple-100 rounded-full opacity-70"></div>
                            <div class="absolute -top-4 -left-4 w-16 h-16 bg-blue-100 rounded-full opacity-70"></div>
                        </div>
                    </div>
                    
                    <!-- Error Details -->
                    <div class="md:w-1/2 md:pl-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">Oops! Something went wrong</h2>
                            <p class="text-gray-600 mb-4">We can't find the page you're looking for. It might have been moved, deleted, or you may have entered the wrong URL.</p>
                            
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-800">What you can do:</h3>
                                        <div class="mt-2 text-sm text-blue-700">
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Check the URL for typos</li>
                                                <li>Go back to the previous page</li>
                                                <li>Visit our homepage or contact support</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="space-y-4">
                            <button onclick="goBack()" class="w-full flex items-center justify-between p-4 bg-white border border-gray-300 rounded-xl hover:border-blue-400 hover:bg-blue-50 transition-all duration-200 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors">
                                        <i class="fas fa-arrow-left text-blue-600"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-medium text-gray-900">Go Back</p>
                                        <p class="text-sm text-gray-500">Return to the previous page</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                            </button>
                            
                            <button onclick="goHome()" class="w-full flex items-center justify-between p-4 bg-white border border-gray-300 rounded-xl hover:border-green-400 hover:bg-green-50 transition-all duration-200 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors">
                                        <i class="fas fa-home text-green-600"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-medium text-gray-900">Homepage</p>
                                        <p class="text-sm text-gray-500">Go to the main dashboard</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600 transition-colors"></i>
                            </button>
                            
                            <button onclick="contactSupport()" class="w-full flex items-center justify-between p-4 bg-white border border-gray-300 rounded-xl hover:border-purple-400 hover:bg-purple-50 transition-all duration-200 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-200 transition-colors">
                                        <i class="fas fa-headset text-purple-600"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-medium text-gray-900">Contact Support</p>
                                        <p class="text-sm text-gray-500">Get help from our team</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600 transition-colors"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Help Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Need more help?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition-colors">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-3">
                        <i class="fas fa-search text-blue-600"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 mb-1">Search Our Site</h4>
                    <p class="text-sm text-gray-600">Use the search function to find what you need.</p>
                </div>
                
                <div class="border border-gray-200 rounded-xl p-4 hover:border-green-300 transition-colors">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-3">
                        <i class="fas fa-book text-green-600"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 mb-1">Documentation</h4>
                    <p class="text-sm text-gray-600">Browse our guides and documentation.</p>
                </div>
                
                <div class="border border-gray-200 rounded-xl p-4 hover:border-purple-300 transition-colors">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-3">
                        <i class="fas fa-envelope text-purple-600"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 mb-1">Email Us</h4>
                    <p class="text-sm text-gray-600">Send us a message and we'll respond quickly.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-500 text-sm">
            <p>NFA ERP System &copy; 2024. All rights reserved.</p>
            <p class="mt-1">If you believe this is an error, please <a href="#" class="text-blue-600 hover:underline">contact our support team</a>.</p>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
        
        function goHome() {
            window.location.href = '/';
        }
        
        function contactSupport() {
            window.location.href = 'mailto:support@nfaerp.gov.ph';
        }
        
        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add a subtle animation to the error code
            const errorCode = document.querySelector('.text-3xl');
            errorCode.classList.add('transition', 'duration-500');
            
            setInterval(() => {
                errorCode.classList.toggle('text-blue-600');
            }, 2000);
            
            // Add hover effect to help boxes
            const helpBoxes = document.querySelectorAll('.border-gray-200');
            helpBoxes.forEach(box => {
                box.addEventListener('mouseenter', function() {
                    this.classList.add('shadow-md', 'transform', '-translate-y-1');
                });
                
                box.addEventListener('mouseleave', function() {
                    this.classList.remove('shadow-md', 'transform', '-translate-y-1');
                });
            });
        });
    </script>
</body>
</html>