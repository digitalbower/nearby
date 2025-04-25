@extends('admin.layouts.masteradmin')
@section('title', 'Vendors')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Vendor</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.vendors.update', $vendor->id) }}"  id="vendorUpdateForm" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Vendor Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $vendor->name }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $vendor->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password') }}">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation') }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $vendor->phone }}">
                </div>
                <div class="mb-3">
                    <label for="validityfrom" class="form-label">Validity From</label> 
                    <input type="date" class="form-control" id="validityfrom" name="validityfrom" value="{{ $vendor->validityfrom }}">
                </div>
                <div class="mb-3">
                    <label for="validityto" class="form-label">Validity To</label> 
                    <input type="date" class="form-control" id="validityto" name="validityto" value="{{ $vendor->validityto }}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.vendors.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor.js') }}"></script>
@endpush

