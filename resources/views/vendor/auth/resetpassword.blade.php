@extends('vendor.auth.layouts.master')
@section('content')
<main class="login-form w-full max-w-sm rounded-2xl border-gray-600 border mx-auto bg-white/10 backdrop-blur-lg border-0 shadow-2xl">
  <div class="p-6">
    <div class="flex justify-center mb-10">
        <div class="relative bg-gradient-to-r from-blue-200 via-blue-100 to-cyan-500 p-2 rounded-full">
            <img src="{{asset('images/NearByVoucherswide.svg')}}" 
                    class="w-[200px]  p-5 mx-auto" 
                    alt="Logo" />
            <div class="absolute -bottom-2 -right-2 bg-white/20 rounded-full h-4 w-4"></div>
            <div class="absolute -top-2 -left-2 bg-white/20 rounded-full h-4 w-4"></div>
        </div>
    </div>

    <div class="space-y-4">
        <h2 class="text-2xl font-semibold text-white text-left">Reset Password</h2>
        <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-success text-white" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('vendor.password.email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email_address" class="text-base font-semibold text-white mb-2 block">E-Mail Address</label>
                    <input type="text" id="email_address" class="w-full p-2 bg-white/10 rounded-md border-0 text-white placeholder:text-gray-100 focus:outline-none" name="email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mt-4">
                    <button type="submit" class="w-full bg-gray-100 rounded-md hover:bg-gray-300 text-black py-2">
                         Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>

@endsection