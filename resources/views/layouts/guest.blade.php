<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-container {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        }
        .form-input {
            @apply block w-full px-4 py-3 rounded-lg transition duration-150 ease-in-out;
            @apply bg-white border border-gray-300;
            @apply focus:ring-2 focus:ring-blue-400 focus:border-blue-400;
            @apply text-gray-700 placeholder-gray-400;
        }
        .btn-primary {
            @apply px-6 py-3 rounded-lg transition duration-150 ease-in-out;
            @apply bg-blue-500 hover:bg-blue-600 text-white;
            @apply focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2;
        }
        .link-hover {
            @apply text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out;
        }
        .custom-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-6xl">
            <div class="custom-card rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
                <!-- Left side - Image -->
                <div class="login-container hidden md:block md:w-1/2 p-12 text-white">
                    <div class="h-full flex flex-col justify-between">
                        <div>
                            <a href="/" class="inline-block">
                                <x-application-logo class="w-20 h-20 fill-current text-white" />
                            </a>
                            <h2 class="mt-8 text-4xl font-bold">Selamat Datang!</h2>
                            <p class="mt-4 text-lg text-gray-100">Sistem e-Eviden SK@S</p>
                        </div>
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Secure Access</h3>
                                    <p class="text-sm text-gray-200">Your data is protected with us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right side - Form -->
                <div class="md:w-1/2 p-8 md:p-12 bg-white">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>