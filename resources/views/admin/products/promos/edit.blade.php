@extends('admin.layouts.masteradmin')
@section('title', 'Promo codes')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h4 class="text-start mb-4">Add Promo code</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.products.promos.update', $promo->id) }}" id="promoForm" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="promocode" class="form-label">Promo code</label>
                <input type="text" class="form-control" id="promocode" name="promocode" value="{{$promo->promocode }}">
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label> 
                <input type="text" class="form-control" id="discount " name="discount" value="{{ $promo->discount }}">
            </div>
            <div class="mb-3">
                <label for="validity_from" class="form-label">Validity From</label> 
                <input type="date" class="form-control" id="validity_from" name="validity_from" value="{{ $promo->validity_from }}">
            </div>
            <div class="mb-4">
                <label for="validity_to" class="form-label">Validity To</label> 
                <input type="date" class="form-control" id="validity_to" name="validity_to" value="{{ $promo->validity_to }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.products.promos.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/promos.js') }}"></script>
@endpush


