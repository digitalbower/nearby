@extends('admin.layouts.masteradmin')
@section('title', 'Promo codes')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h3 class="text-start mb-4">Add Promo code</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.promos.store') }}" id="promoForm" method="POST">
            @csrf

            <div class="mb-3">
                <label for="promocode" class="form-label">Promo code</label>
                <input type="text" class="form-control" id="promocode" name="promocode" value="{{old('promocode') }}">
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label> 
                <input type="text" class="form-control" id="discount" name="discount" value="{{old('discount') }}">
            </div>
            <div class="mb-3">
                <label for="validity_from" class="form-label">Validity From</label> 
                <input type="date" class="form-control" id="validityfrom" name="validity_from" value="{{ old('validity_from') }}">
            </div>
            <div class="mb-4">
                <label for="validity_to" class="form-label">Validity To</label> 
                <input type="date" class="form-control" id="validityto" name="validity_to" value="{{ old('validity_to') }}">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('admin.products.promos.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/promos.js') }}"></script>
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
