@extends('vendor.auth.layouts.master')
@section('content')
<main class="login-form w-full max-w-sm rounded-2xl border-gray-600 border mx-auto bg-white/10 backdrop-blur-lg border-0 shadow-2xl">
  <div class="p-6">
    <div class="card">
        <h2 class="text-2xl font-semibold text-white text-left">Reset Password</h2>
        <div class="card-body">
            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email_address" class="text-base font-semibold text-white mb-2 block">E-Mail Address</label>
                    <input type="text" id="email_address" class="w-full p-2 bg-white/10 rounded-md border-0 text-white placeholder:text-gray-100 focus:outline-none" name="email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password" class="text-base font-semibold text-white mb-2 block">Password</label>
                    <input type="password" id="password" class="w-full p-2 bg-white/10 rounded-md border-0 text-white placeholder:text-gray-100 focus:outline-none" name="password" required autofocus>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="text-base font-semibold text-white mb-2 block">Confirm Password</label>
                    <input type="password" id="password-confirm" class="w-full p-2 bg-white/10 rounded-md border-0 text-white placeholder:text-gray-100 focus:outline-none" name="password_confirmation" required autofocus>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-full bg-gray-100 rounded-md hover:bg-gray-300 text-black py-2">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>
@endsection