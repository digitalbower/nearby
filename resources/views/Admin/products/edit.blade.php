@extends('admin.layouts.masteradmin')
@section('title', 'Products')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Product</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.update', $product->id) }}"  id="editProductForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categories</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sub_category_id" class="form-label">Sub Categories</label>
                    <input type="hidden" id="sub_category_id" name="sub_category_id" value="{{$product->sub_category_id}}">
                    <select class="form-control" name="sub_category_id" id="subcategory_id">
                        <option value="">Select Sub Categories</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Vendors</label>
                    <select class="form-control" name="vendor_id">
                        <option value="">Select Vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ old('vendor_id', $product->vendor_id ?? '') == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name }}">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description">{{$product->short_description}}</textarea>
                </div>
                
                <div class="mb-3">
                    <div id="existing-images">
                        @if(!empty($product->gallery))
                        @foreach(json_decode($product->gallery, true) as $image)
                            <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" width="100">
                        @endforeach
                        @endif
                      </div>
                    <label for="images" class="form-label">Product Images</label>
                    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                    <div id="images-preview" class="d-flex flex-wrap mt-3"></div>
                    <div id="images-error" class="text-danger mt-1" style="display: none;">Please upload at least one valid image.</div>
                </div>
                @php
                    $oldTags = old('tags', $product->tags ?? '[]'); // Use old tags if available, else use product tags
                
                    if (is_array($oldTags)) {
                        $tags = $oldTags; // Use directly if it's already an array
                    } elseif (is_string($oldTags)) {
                        $tags = json_decode($oldTags, true) ?? []; // Decode only if it's a string
                    } else {
                        $tags = [];
                    }
                @endphp
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" id="tag-input" class="form-control" placeholder="Enter a tag">
                    <button type="button" id="add-tag" class="btn btn-primary mt-2">Add Tag</button>
                    <div id="tags-container" class="mt-2">
                        <!-- Load old tags if available -->
                        @foreach($tags as $tag)
                            <span class="badge bg-primary me-2 tag-item">
                                {{ $tag }} 
                                <button type="button" class="btn-close ms-1 remove-tag" data-tag="{{ $tag }}"></button>
                            </span>
                        @endforeach
                    </div>
                
                    <!-- Hidden input to store tags -->
                    <input type="hidden" name="tags" id="tags-hidden"  value="{{ json_encode($tags) }}">
                    <div id="tags-error" class="text-danger mt-1" style="display: none;">Please add at least one tag.</div>
                </div>
                <div class="mb-3">
                    <label for="about_description" class="form-label">About Description</label>
                    <textarea name="about_description" id="about_description">{!! $product->about_description !!}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
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


