@extends('admin.layouts.masteradmin')
@section('title', 'Vendor Terms')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Vendor Terms</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.vendor_terms.update', $vendor_term->id) }}" id="vendorTermForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="vendor_id" class="form-label">Vendors</label>
                    <select class="form-control" name="vendor_id">
                        <option value="">Select Vendors</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}"  {{ old('vendor_id', $vendor_term->vendor_id ?? '') == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Vendor Terms Name</label>
                    <input type="text" class="form-control" id="name" name="name"  value="{{ $vendor_term->name}}"/>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"  value="{{ $vendor_term->title }}"/>
                </div>
                <div class="mb-3">
                    <label for="terms" class="form-label">Terms</label>
                    <textarea class="form-control" id="terms" name="terms">{{ $vendor_term->terms }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.vendor_terms.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor_terms.js') }}"></script>
    <script>
        $(document).ready(function() {
                $('#terms').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']]
                    ]
                });
            });
    </script>
@endpush


