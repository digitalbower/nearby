@extends('admin.layouts.masteradmin')
@section('title', 'Products')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h3 class="text-start mb-4">Add Product</h3>

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
                <label for="category_id" class="form-label">Categories</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="sub_category_id" class="form-label">Sub Categories</label>
                <select class="form-control" name="sub_category_id" id="subcategory_id">
                    <option value="">Select Sub Categories</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nbv Terms</label>
                <select class="form-control" name="nbv_terms_id">
                    <option value="">Select Nbv Terms</option>
                    @foreach ($terms as $term)
                        <option value="{{ $term->id }}" {{ old('nbv_terms_id') == $term->id ? 'selected' : '' }}>
                            {{ $term->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Vendors</label>
                <select class="form-control" name="vendor_id" id="vendor_id">
                    <option value="">Select Vendor</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}" {{ old('vendor_id') == $vendor->id ? 'selected' : '' }}>
                            {{ $vendor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="vendor_terms_id" class="form-label">Vendor Terms</label>
                <select class="form-control" name="vendor_terms_id" id="vendor_terms_id">
                    <option value="">Select Vendor Terms</option>
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
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                
                <!-- Image Preview -->
                <div id="image-preview" class="mt-2 d-flex flex-wrap"></div>
            
                <div id="image-error" class="text-danger mt-1" style="display: none;">Please upload an image.</div>
            </div>
            
            <div class="mb-3">
                <label for="gallery" class="form-label">Product Gallery</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                <div id="images-preview" class="mt-2 d-flex flex-wrap"></div>
                <div id="images-error" class="text-danger mt-1" style="display: none;">Please upload at least one valid image.</div>
            </div>
            <input type="hidden" name="old_gallery" id="old-gallery" value="{{ old('gallery') }}">
            <div class="mb-3">
                <label for="product_type_id" class="form-label">Product Type</label>
                <select class="form-control" name="product_type_id" id="product_type_id">
                    <option value="">Select Product type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" 
                            {{ old('product_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->product_type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags_id" class="form-label">Tags</label>
                <select class="form-control" name="tags_id">
                    <option value="">Select Tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tags_id') == $tag->id ? 'selected' : '' }}>
                            {{ $tag->tags }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="product_support_phone" class="form-label">Product Support Phone</label>
                <input type="text" class="form-control" id="product_support_phone" name="product_support_phone" value="{{old('product_support_phone') }}">
            </div>
            <div class="mb-3">
                <label for="product_support_email" class="form-label">Product Support Email</label>
                <input type="text" class="form-control" id="product_support_email" name="product_support_email" value="{{old('product_support_email') }}">
            </div>
            <div class="mb-3">
                <label for="emirates_id" class="form-label">Emirates</label>
                <select class="form-control" name="emirates_id">
                    <option value="">Select Emirates</option>
                    @foreach ($emirates as $emirate)
                        <option value="{{ $emirate->id }}" {{ old('emirates_id') == $emirate->id ? 'selected' : '' }}>
                            {{ $emirate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="productlocation_address" class="form-label">Product location address</label>
                <textarea name="productlocation_address"  class="form-control" id="productlocation_address">{{old('productlocation_address')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="productlocation_link" class="form-label">Product location link</label>
                <textarea name="productlocation_link"  class="form-control"  id="productlocation_link">{{old('productlocation_link')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="importantinfo" class="form-label">Important Info</label>
                <textarea name="importantinfo"  class="form-control" id="importantinfo">{{old('importantinfo')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="validity_from" class="form-label">Validity From</label> 
                <input type="date" class="form-control" id="validityfrom" name="validity_from" value="{{ old('validity_from') }}">
            </div>
            <div class="mb-3">
                <label for="validity_to" class="form-label">Validity To</label> 
                <input type="date" class="form-control" id="validityto" name="validity_to" value="{{ old('validity_to') }}">
            </div>
            <div class="mb-3">
                <label for="about_description" class="form-label">About Description</label>
                <textarea name="about_description" id="about_description">{{old('about_description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="email_about" class="form-label">Email About</label>
                <textarea name="email_about" id="email_about">{{old('email_about')}}</textarea>
            </div>
            <div class="mb-3">

                <!-- Giftable Toggle -->
                <div class="form-check form-switch">
                    <input class="form-check-input toggle-giftable" type="checkbox"  name="giftable"
                    value="1"
                    {{ old('giftable', 1) ? 'checked' : '' }}>
                    <label class="form-check-label">Giftable</label>
                </div>
            
                <!-- Hero Carousel Toggle -->
                <div class="form-check form-switch">
                    <input class="form-check-input toggle-herocarousel" type="checkbox"  name="herocarousel"
                    value="1" {{ old('herocarousel',1) ? 'checked' : '' }}>
                    <label class="form-check-label">Hero Carousel</label>
                </div>
            
                <!-- Trending Toggle -->
                <div class="form-check form-switch">
                    <input class="form-check-input toggle-trending" type="checkbox"  name="trending"
                    value="1" {{ old('trending',1) ? 'checked' : '' }}>
                    <label class="form-check-label">Trending</label>
                </div>
            
                <!-- Category Carousel Toggle -->
                <div class="form-check form-switch">
                    <input class="form-check-input toggle-categorycarousel" type="checkbox"  name="categorycarousel"
                    value="1" {{ old('categorycarousel',1) ? 'checked' : '' }}>
                    <label class="form-check-label">Category Carousel</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="sales_person_id" class="form-label">Sales Person</label>
                <select class="form-control" name="sales_person_id">
                    <option value="">Select Sales Person</option>
                    @foreach ($persons as $person)
                        <option value="{{ $person->id }}" {{ old('sales_person_id') == $person->id ? 'selected' : '' }}>
                            {{ $person->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <input type="text" name="meta_description" value="{{ old('meta_description') }}" class="form-control">

            </div>
            <div class="mb-3">
                <label>OG Title</label>
                <input type="text" name="og_title" value="{{ old('og_title') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>OG Description</label>
                <input type="text" name="og_description" value="{{ old('og_description') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>OG Image</label>
                <input type="file" name="og_image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label>Schema (JSON-LD)</label>
                <textarea name="schema" class="form-control" rows="4">{{ old('schema') }}</textarea>
            </div>
                
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('admin.products.vendor_terms.index') }}" class="btn btn-secondary ms-3">Cancel</a>
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
            $('#email_about').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ]
            });
            $('#importantinfo').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ]
            });
            $('#productlocation_address').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ]
            });
        });
        
    </script>

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
@endpush


