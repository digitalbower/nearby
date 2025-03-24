@extends('admin.layouts.masteradmin')
@section('title', 'Products')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Add Product</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.store') }}" id="productForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Vendors</label>
                    <select class="form-control" name="vendor_id">
                        <option value="">Select Vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ old('vendor_id') == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Product Images</label>
                    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                    <div id="images-preview" class="mt-2 d-flex flex-wrap"></div>
                    <div id="images-error" class="text-danger mt-1" style="display: none;">Please upload at least one valid image.</div>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" id="tag-input" class="form-control" placeholder="Enter a tag">
                    <button type="button" id="add-tag" class="btn btn-primary mt-2">Add Tag</button>
                    <div id="tags-container" class="mt-2"></div>
            
                    <!-- Hidden input to store tags -->
                    <input type="hidden" name="tags" id="tags-hidden">
                    <div id="tags-error" class="text-danger mt-1" style="display: none;">Please add at least one tag.</div>
                </div>
                <div class="mb-3">
                    <label for="about_description" class="form-label">About Description</label>
                    <textarea name="about_description" id="about_description"></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.vendor_terms.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product.js') }}"></script>
    <script>
       $(document).ready(function() {
            $('#about_description').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ]
            });
        });
    </script>
@endpush


