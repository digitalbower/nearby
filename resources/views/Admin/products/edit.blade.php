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
                    <label for="name" class="form-label">Nbv Terms</label>
                    <select class="form-control" name="nbv_terms_id">
                        <option value="">Select Nbv Terms</option>
                        @foreach ($terms as $term)
                            <option value="{{ $term->id }}" {{ old('nbv_terms_id', $product->nbv_terms_id ?? '') == $term->id ? 'selected' : '' }}>
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
                            <option value="{{ $vendor->id }}" {{ old('vendor_id', $product->vendor_id ?? '') == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="vendor_terms_id" class="form-label">Vendor Terms</label>
                    <input type="hidden" id="vendorterms_id" name="vendor_terms_id" value="{{$product->vendor_terms_id}}">
                    <select class="form-control" name="vendor_terms_id" id="vendor_terms_id">
                        <option value="">Select Vendor Terms</option>
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
                    <div id="existing-image-preview" class="mt-2 d-flex flex-wrap">
                        @if (!empty($product->image))
                            <div class="position-relative me-2 mb-2">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail" width="100">
                            </div>
                        @endif
                    </div>
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    
                    <!-- Image Preview -->
                    <div id="image-preview" class="mt-2 d-flex flex-wrap">
                    </div>
                
                    <div id="image-error" class="text-danger mt-1" style="display: none;">Please upload an image.</div>
                </div>
                
                <div class="mb-3">
                    <div id="existing-images">
                        @if(!empty($product->gallery))
                        @foreach(json_decode($product->gallery, true) as $image)
                            <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" width="100">
                        @endforeach
                        @endif
                      </div>
                    <label for="gallery" class="form-label">Product Gallery</label>
                    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                    <div id="images-preview" class="d-flex flex-wrap mt-3"></div>
                    <div id="images-error" class="text-danger mt-1" style="display: none;">Please upload at least one valid image.</div>
                </div>
                <div class="mb-3">
                    <label for="tags_id" class="form-label">Tags</label>
                    <select class="form-control" name="tags_id">
                        <option value="">Select Tags</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"  {{ old('tags_id', json_decode($product->tags_id ?? '')) == $tag->id ? 'selected' : '' }}>
                                {{ $tag->tags }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product_support_phone" class="form-label">Product Support Phone</label>
                    <input type="text" class="form-control" id="product_support_phone" name="product_support_phone" value="{{ $product->product_support_phone }}">
                </div>
                <div class="mb-3">
                    <label for="product_support_email" class="form-label">Product Support Email</label>
                    <input type="text" class="form-control" id="product_support_email" name="product_support_email" value="{{ $product->product_support_email }}">
                </div>
                <div class="mb-3">
                    <label for="emirates_id" class="form-label">Emirates</label>
                    <select class="form-control" name="emirates_id">
                        <option value="">Select Emirates</option>
                        @foreach ($emirates as $emirate)
                            <option value="{{ $emirate->id }}" {{ old('emirates_id', $product->emirates_id ?? '') == $emirate->id ? 'selected' : '' }}>
                                {{ $emirate->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productlocation_address" class="form-label">Product location address</label>
                    <textarea name="productlocation_address"  class="form-control" id="productlocation_address">{{$product->productlocation_address}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="productlocation_link" class="form-label">Product location link</label>
                    <textarea name="productlocation_link"  class="form-control" id="productlocation_link">{{$product->productlocation_link}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="importantinfo" class="form-label">Important Info</label>
                    <textarea name="importantinfo"  class="form-control" id="importantinfo">{{$product->importantinfo}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="validity_from" class="form-label">Validity From</label> 
                    <input type="date" class="form-control" id="validity_from" name="validity_from" value="{{$product->validity_from }}">
                </div>
                <div class="mb-3">
                    <label for="validity_to" class="form-label">Validity To</label> 
                    <input type="date" class="form-control" id="validity_to" name="validity_to" value="{{ $product->validity_to }}">
                </div>
                <div class="mb-3">
                    <label for="about_description" class="form-label">About Description</label>
                    <textarea name="about_description" id="about_description">{!! $product->about_description !!}</textarea>
                </div>
                <div class="mb-3">

                    <!-- Giftable Toggle -->
                    <div class="form-check form-switch">
                        <input class="form-check-input toggle-giftable" type="checkbox"  name="giftable"
                        value="1"
                        {{ old('giftable', $product->giftable) ? 'checked' : '' }}>
                        <label class="form-check-label">Giftable</label>
                    </div>
                
                    <!-- Hero Carousel Toggle -->
                    <div class="form-check form-switch">
                        <input class="form-check-input toggle-herocarousel" type="checkbox"  name="herocarousel"
                        value="1"
                        {{ old('herocarousel', $product->herocarousel) ? 'checked' : '' }}>
                        <label class="form-check-label">Hero Carousel</label>
                    </div>
                
                    <!-- Trending Toggle -->
                    <div class="form-check form-switch">
                        <input class="form-check-input toggle-trending" type="checkbox"  name="trending"
                        value="1"
                        {{ old('trending', $product->trending) ? 'checked' : '' }}>
                        <label class="form-check-label">Trending</label>
                    </div>
                
                    <!-- Category Carousel Toggle -->
                    <div class="form-check form-switch">
                        <input class="form-check-input toggle-categorycarousel" type="checkbox"  name="categorycarousel"
                        value="1"
                        {{ old('categorycarousel', $product->categorycarousel) ? 'checked' : '' }}>
                        <label class="form-check-label">Category Carousel</label>
                    </div>
                    <div class="mb-3">
                        <label for="sales_person_id" class="form-label">Sales Person</label>
                        <select class="form-control" name="sales_person_id">
                            <option value="">Select Sales Person</option>
                            @foreach ($persons as $person)
                            <option value="{{ $person->id }}" {{ old('sales_person_id', $product->sales_person_id ?? '') == $person->id ? 'selected' : '' }}>
                                    {{ $person->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
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


