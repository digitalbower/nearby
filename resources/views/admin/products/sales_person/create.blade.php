@extends('admin.layouts.masteradmin')
@section('title', 'Vendors')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h3 class="text-start mb-4">Add Sales Person</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.products.sales_person.store') }}" id="salesForm" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name') }}">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('admin.products.sales_person.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/sales_person.js') }}"></script>
@endpush


