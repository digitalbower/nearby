@extends('vendor.auth.layouts.master')
@section('content')
<div class="w-full max-w-sm rounded-2xl border-gray-600 border mx-auto bg-white/10 backdrop-blur-lg border-0 shadow-2xl">
    <div class="p-6">
        <div class="flex flex-col space-y-6">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <div class="relative bg-gradient-to-r from-blue-200 via-blue-100 to-cyan-500 p-2 rounded-full">
                    <img src="{{asset('images/NearByVoucherswide.svg')}}" 
                         class="w-[200px]  p-5 mx-auto" 
                         alt="Logo" />
                    <div class="absolute -bottom-2 -right-2 bg-white/20 rounded-full h-4 w-4"></div>
                    <div class="absolute -top-2 -left-2 bg-white/20 rounded-full h-4 w-4"></div>
                </div>
            </div>
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Login Form -->
            <div class="space-y-4">
                <h2 class="text-2xl font-semibold text-white text-left">Login</h2>
                <form method="POST" action="{{ route('vendor.login.submit') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="space-y-4">
                        <div>
                            <label class="text-base font-semibold text-white mb-2 block">Email</label>
                            <input type="email" placeholder="username@gmail.com" name="email"
                                class="w-full p-2 bg-white/10 rounded-md border-0 text-white placeholder:text-gray-100" />
                        </div>
                        <div>
                            <label class="text-base font-semibold text-white mb-2 block">Password</label>
                            <input type="password" placeholder="Password" name="password"
                                class="w-full p-2 bg-white/10 rounded-md border-0 text-white placeholder:text-gray-100" />
                        </div>
                    </div>

                    <div class="text-right">
    <a href="{{ route('vendor.password.request') }}" class="text-gray-100 py-2 h-auto font-normal hover:text-gray-200">
        Forgot Password?
    </a>
</div>


                    <button type="submit" class="w-full bg-gray-100 rounded-md hover:bg-gray-300 text-black py-2">Sign in</button>
                </form>
                <!-- Social Login -->
                


                <!-- Register Link -->
                <div class="text-center text-base text-gray-200">
                    Need assistance? <a href="#"
                        class="text-white text-lg font-semibold hover:text-blue-100">Contact Us</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection