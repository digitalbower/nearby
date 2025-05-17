@extends('vendor.auth.layouts.master')
@section('content')
<h1>Forget Password Email</h1>

   

You can reset password from bellow link:

<a href="{{ route('vendor.password.reset', $token) }}">Reset Password</a>
@endsection