@extends('user.layouts.main')


@section('content')
<div class="container text-center mt-5">
    <h1 class="text-success">Booking Confirmed!</h1>
    <p class="mt-3">Thank you for your booking. A confirmation email has been sent to you.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-4">Return to Home</a>
</div>
@endsection