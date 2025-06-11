@extends('vendor.auth.layouts.master')
@section('content')
<main class="login-form w-full max-w-sm rounded-2xl border-gray-600 border mx-auto bg-white/10 backdrop-blur-lg border-0 shadow-2xl">

      <div class="row justify-content-center">

          <div class="col-md-8">

              <div class="card">

                  <div class="card-header">Reset Password</div>

                  <div class="card-body">

  

                      <form action="{{ route('vendor.password.update') }}" method="POST">

                          @csrf

                          <input type="hidden" name="token" value="{{ $token }}">

  

                         <div class="form-group row">
    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
    <div class="col-md-6 relative">
        <input type="email" id="email_address" name="email" required autofocus
            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 focus:ring-[#6C5CE7] focus:ring-opacity-20 outline-none transition">

        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>

  

                      <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    <div class="col-md-6 relative">
        <input type="password" id="password" name="password" required autofocus
            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 focus:ring-[#6C5CE7] focus:ring-opacity-20 outline-none transition">

        <button type="button" onclick="togglePassword('password', 'passwordToggle')" 
            class="absolute right-4 top-1/2 -translate-y-1/2 text-[#718096]">
            <i id="passwordToggle" class="fas fa-eye"></i>
        </button>

        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
    <div class="col-md-6 relative">
        <input type="password" id="password-confirm" name="password_confirmation" required
            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 focus:ring-[#6C5CE7] focus:ring-opacity-20 outline-none transition">

        <button type="button" onclick="togglePassword('password-confirm', 'confirmPasswordToggle')" 
            class="absolute right-4 top-1/2 -translate-y-1/2 text-[#718096]">
            <i id="confirmPasswordToggle" class="fas fa-eye"></i>
        </button>

        @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>
</div>

  

                          <div class="col-md-6 offset-md-4">

                              <button type="submit"
    class="w-full bg-[#6C5CE7] hover:bg-[#5a4bd3] text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
    Reset Password
</button>


                          </div>

                      </form>

                        

                  </div>

              </div>

          </div>

      </div>

</main>

<script>
    function togglePassword(inputId, toggleIconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(toggleIconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

@endsection