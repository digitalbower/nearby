@extends('admin.auth.layouts.master')
@section('content')
    <div class="w-full min-h-screen flex items-center justify-center bg-gray-100  overflow-hidden bg-white rounded-2xl shadow-xl" x-data="{ email: '', password: '' }">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <!-- Left section with animated background -->
            <div class="relative p-8 md:p-12 animated-bg flex items-center h-screen text-white overflow-hidden">
                <div class="relative z-10 lg:w-2/3">
                    <h1 class="text-4xl font-bold mb-4">Welcome to our platform</h1>
                    <p class="text-cyan-100">
                        Experience the next generation of web applications. 
                        Login to access your personalized dashboard and start your journey.
                    </p>
                </div>
                <!-- Animated shapes -->
                <div class="floating-shape" style="left: 10%; top: 20%; animation: float 20s infinite;"></div>
                <div class="floating-shape" style="left: 70%; top: 50%; animation: float 25s infinite;"></div>
                <div class="floating-shape" style="left: 10%; top: 20%; animation: float 20s infinite;"></div>
                <div class="floating-shape" style="left: 50%; top: 80%; animation: float 25s infinite;"></div>
                <div class="floating-shape" style="left: 20%; top: 80%; animation: float 30s infinite;"></div>
            </div>

            <!-- Right section with login form -->
            <div class="flex items-center justify-center p-8 md:p-12">
                <div class="w-full max-w-md space-y-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-900">Login</h2>
                        <p class="mt-2 text-gray-600">Sign in to your account</p>
                    </div>
                    <form class="mt-8 space-y-6" id="login" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="email" class="sr-only">Email address</label>
                                <input id="email" name="email" type="email" autocomplete="email" 
                                    class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                    placeholder="Email address"
                                    value="{{ old('email') ?: Cookie::get('remember_email') }}">
                                    @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password" 
                                    class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 focus:z-10 sm:text-sm"
                                    placeholder="Password" value="{{ old('password') ?: Cookie::get('remember_password') }}">
                                    @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember" type="checkbox"
                                    class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded" {{ old('remember') || Cookie::get('remember_admin') == '1' ? 'checked' : '' }}>
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-cyan-600 hover:text-cyan-500">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection