@extends('admin.layouts.masteradmin')
@section('title', 'Vendors')
@section('content')
  
    <div class="card shadow-none px-4 bg-transparent mt-5">
        <div class="card-body shadow-lg bg-white rounded-3">
            <h3 class="text-start mb-4">Add Vendor</h3>

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
                <div class="mb-4">
                    <label for="validityto" class="form-label">Validity To</label> 
                    <input type="date" class="form-control" id="validityto" name="validityto" value="{{ old('validityto') }}">
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.vendors.index') }}" class="btn btn-secondary ms-3">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor.js') }}"></script>
@endpush


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date().toISOString().split("T")[0];
        const fromDate = document.getElementById("validityfrom");
        const toDate = document.getElementById("validityto");

        // Prevent past dates in "Validity From"
        fromDate.setAttribute("min", today);

        // When "Validity From" is selected, set that as the min for "Validity To"
        fromDate.addEventListener("change", function () {
            const selectedFromDate = this.value;
            toDate.value = ""; // Clear any previously selected "to" date
            toDate.setAttribute("min", selectedFromDate);
        });
    });
</script>