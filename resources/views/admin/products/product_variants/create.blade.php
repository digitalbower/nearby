@extends('admin.layouts.masteradmin')
@section('title', 'Product variants')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Add Product Variant</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.product_variants.store') }}" id="variantForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Products</label>
                    <select class="form-control" name="product_id" id="product_id">
    <option value="">Select Products</option>
    @foreach ($products as $product)
        <option 
            value="{{ $product->id }}" 
            data-category="{{ $product->category_id }}"
            data-markup="{{ $product->category->markup ?? 0 }}"
            {{ old('product_id') == $product->id ? 'selected' : '' }}>
            {{ $product->name }}
        </option>
    @endforeach
</select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="product_variant_icon" class="form-label">Product Variant Icon</label>
                    <select class="form-control" name="product_variant_icon" id="product_variant_icon">
                        <option value="">Select Product Variant Icon</option>
                        <option value='<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M280-280h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>' {{ old('product_variant_icon') == '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M280-280h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>' ? 'selected' : '' }}>Notes</option>
                   </select>
                </div>
                <div class="mb-3">
                    <label for="short_legend" class="form-label">Short Legend</label>
                    <textarea class="form-control" id="short_legend" name="short_legend">{{old('short_legend')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="short_legend_icon" class="form-label">Short Legend Icon</label>
                    <select class="form-control" name="short_legend_icon" id="short_legend_icon">
                        <option value="">Select Short Legend Icon</option>
                        <option value='<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>' {{ old('short_legend_icon') == '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>' ? 'selected' : '' }}>Notification</option>
                        <option value='<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M420-360h120l-23-129q20-10 31.5-29t11.5-42q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 23 11.5 42t31.5 29l-23 129Zm60 280q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>' {{ old('short_legend_icon') == '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M420-360h120l-23-129q20-10 31.5-29t11.5-42q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 23 11.5 42t31.5 29l-23 129Zm60 280q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>' ? 'selected' : '' }}>Encrypted</option>
                        <option value='<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm0 200q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Z"/></svg>' {{ old('short_legend_icon') == '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm0 200q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Z"/></svg>' ? 'selected' : '' }}>Release Alert</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="short_info" class="form-label">Short Info</label>
                    <div id="editor" style="height: 200px;">{{old('short_info')}}</div>
                    <input type="hidden" name="short_info" id="short_info">
                </div>
                <div class="mb-3">
                    <label for="unit_type_id" class="form-label">Unit Type</label>
                    <select class="form-control" name="unit_type_id" id="unit_type_id">
                        <option value="">Select Unit Types</option>
                    </select>
                </div>
             
                <div class="mb-3">
                    <label for="unit_price" class="form-label">Market Unit Price</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="{{old('unit_price') }}">
                </div>
               

               

               

                <div class="mb-3">
    <label for="markup" class="form-label">Markup (%)</label>
    <input type="text" id="markup" name="markup" class="form-control @error('markup') is-invalid @enderror" value="{{ old('markup') }}">
    
    
    @error('markup')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

               

                <div class="mb-3">
                    <label for="agreement_unit_price" class="form-label">Agreement Unit Price</label>
                    <input type="text" class="form-control" id="agreement_unit_price" name="agreement_unit_price" value="{{old('agreement_unit_price') }}">
                </div>

                    <div class="mb-3">
        <label for="discounted_price" class="form-label">Selling Unit Price</label>
        <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="{{ old('discounted_price') }}" readonly>
        @error('discounted_price')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
    </div>
               
                <div class="mb-3">
                    <label for="available_quantity" class="form-label">Available Quantity</label>
                    <input type="number" class="form-control" id="available_quantity" name="available_quantity" value="{{old('available_quantity') }}">
                </div>
                <div class="mb-3">
                    <label for="threshold_quantity" class="form-label">Threshold Quantity</label>
                    <input type="number" class="form-control" id="threshold_quantity" name="threshold_quantity" value="{{old('threshold_quantity') }}">
                </div>
                <div class="mb-3">
                    <label for="validity_from" class="form-label">Validity From</label>
                    <input type="date" class="form-control" id="validityfrom" name="validity_from" value="{{old('validity_from') }}">
                </div>
                <div class="mb-3">
                    <label for="validity_to" class="form-label">Validity To</label>
                    <input type="date" class="form-control" id="validityto" name="validity_to" value="{{old('validity_to') }}">
                </div>
                <div class="mb-3">
                    <label for="timer_flag" class="form-label">Timer</label>
                    <select class="form-control" name="timer_flag" id="timer_flag">
                        <option value="0" {{ old('timer_flag') == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('timer_flag') == '1' ? 'selected' : '' }}>Yes</option>
                   </select>
                </div>
                
                <div id="timer" class="hidden">
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Select Start Time</label> 
                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Select End Time</label> 
                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.product_variants.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product_variant.js') }}"></script>
    <script>  
        var quill = new Quill('#editor', {
          theme: 'snow',
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline'],
              [{ list: 'ordered' }, { list: 'bullet' }],
              ['link']
            ]
          }
        });
        
    </script>
   

   <script>
document.addEventListener('DOMContentLoaded', function () {
    const unitPrice = document.getElementById('unit_price');
    const agreementPrice = document.getElementById('agreement_unit_price');
    const markup = document.getElementById('markup');
    const discountedPrice = document.getElementById('discounted_price');
    const priceError = document.getElementById('price-error');
    const form = document.querySelector('form');

    function calculateSellingPrice() {
        const unit = parseFloat(unitPrice.value);
        const agreement = parseFloat(agreementPrice.value);
        const markupValue = parseFloat(markup.value);

        // Only calculate if all 3 values are valid numbers
        if (!isNaN(unit) && !isNaN(agreement) && !isNaN(markupValue)) {
            const calculatedPrice = (agreement + ((agreement * markupValue) / 100)).toFixed(2);
            discountedPrice.value = calculatedPrice;
            priceError.style.display = 'none';
        } else {
            discountedPrice.value = '';
        }
    }

    // Trigger calculation only after input is finished (on blur)
    unitPrice.addEventListener('blur', calculateSellingPrice);
    agreementPrice.addEventListener('blur', calculateSellingPrice);
    markup.addEventListener('blur', calculateSellingPrice);

    form.addEventListener('submit', function (e) {
        if (discountedPrice.value === '') {
            e.preventDefault();
            priceError.style.display = 'block';
            priceError.textContent = "Selling Unit Price is required.";
        }
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


