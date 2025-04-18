@extends('admin.layouts.masteradmin')
@section('title', 'Vendors')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Sales Person</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.sales_person.update', $sales_person->id) }}"  id="salesForm" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $sales_person->name }}">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.sales_person.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/sales_person.js') }}"></script>
@endpush

