@extends('admin.layouts.masteradmin')
@section('title', 'Vendors')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Add Vendor</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.vendors.store') }}" id="vendorForm" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Vendor Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone') }}">
                </div>
                <div class="mb-3">
                    <label for="validityfrom" class="form-label">Validity From</label> 
                    <input type="date" class="form-control" id="validityfrom" name="validityfrom" value="{{ old('validityfrom') }}">
                </div>
                <div class="mb-3">
                    <label for="validityto" class="form-label">Validity To</label> 
                    <input type="date" class="form-control" id="validityto" name="validityto" value="{{ old('validityto') }}">
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.vendors.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor.js') }}"></script>
@endpush


