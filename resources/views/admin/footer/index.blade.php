@extends('admin.layouts.masteradmin')

@section('title', 'Footer Management')

@section('content')

<div class="wrapper-div pt-0">
    <div class="card shadow-none bg-transparent px-4 mt-5">
        <div class="card-body shadow-lg bg-white p-4">
            <h4 class="text-center mb-4">Footer Management</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- Add New Footer Item --}}
            @if(auth()->guard('admin')->user()->hasPermission('add_footer'))
            <h5>Add New Footer Item</h5>
            <form action="{{ route('admin.footer.store') }}" id="footerForm" method="POST">
                @csrf
                <div class="form-group">
                    <label>Type:</label>
                    <select name="type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Top Destination" {{ old('type') == "Top Destination" ? 'selected' : '' }}>Top Destination</option>
                        <option value="Information" {{ old('type') == "Information" ? 'selected' : '' }}>Information</option>
                        <option value="Follow Us" {{ old('type') == "Follow Us" ? 'selected' : '' }}>Follow Us</option>
                        <option value="payment_channels" {{ old('type') == "payment_channels" ? 'selected' : '' }}>Payment Channels</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Item Text:</label>
                    <input type="text" name="item_text" class="form-control" value="{{ old('item_text')}}">
                </div>
                <div class="form-group">
                    <label>Link (optional):</label>
                    <input type="text" name="link" class="form-control" value="{{ old('link')}}">
                </div>
                <div class="form-group">
                    <label>Select Icon</label>
                    <select name="icon" class="form-control">
                        <option value="">-- Select Icon --</option>

                        <!-- Social Media Icons -->
                        <option value="fab fa-facebook text-white" {{ old('icon') == "fab fa-facebook text-white" ? 'selected' : '' }}>Facebook</option>
                        <option value="fab fa-instagram text-white" {{ old('icon') == "fab fa-instagram text-white" ? 'selected' : '' }}>Instagram</option>
                        <option value="fab fa-twitter text-white" {{ old('icon') == "fab fa-twitter text-white" ? 'selected' : '' }}>Twitter</option>
                        <option value="fab fa-youtube text-white" {{ old('icon') == "fab fa-youtube text-white" ? 'selected' : '' }}>YouTube</option>
                        <option value="fab fa-linkedin text-white" {{ old('icon') == "fab fa-linkedin text-white" ? 'selected' : '' }}>LinkedIn</option>
                        <option value="fab fa-pinterest text-white" {{ old('icon') == "fab fa-pinterest text-white" ? 'selected' : '' }}>Pinterest</option>

                        <!-- Payment Channel Icons -->
                        <option value="https://img.icons8.com/color/48/visa.png" {{ old('icon') == "https://img.icons8.com/color/48/visa.png" ? 'selected' : '' }}>Visa</option>
                        <option value="https://img.icons8.com/color/48/mastercard-logo.png" {{ old('icon') == "https://img.icons8.com/color/48/mastercard-logo.png" ? 'selected' : '' }}>Mastercard</option>
                        <option value="https://img.icons8.com/color/48/amex.png" {{ old('icon') == "https://img.icons8.com/color/48/amex.png" ? 'selected' : '' }}>Amex</option>
                        <option value="https://img.icons8.com/color/48/discover.png" {{ old('icon') == "https://img.icons8.com/color/48/discover.png" ? 'selected' : '' }}>Discover</option>
                        <option value="https://img.icons8.com/color/48/bank-card-back-side.png" {{ old('icon') == "https://img.icons8.com/color/48/bank-card-back-side.png" ? 'selected' : '' }}>Credit Card</option>
                        <option value="https://img.icons8.com/color/48/bank.png" {{ old('icon') == "https://img.icons8.com/color/48/bank.png" ? 'selected' : '' }}>Bank Transfer</option>
                        <option value="https://img.icons8.com/color/48/rupay.png" {{ old('icon') == "https://img.icons8.com/color/48/rupay.png" ? 'selected' : '' }}>Rupay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status:</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Add</button>
            </form>
            @endif
            {{-- Existing Footer Items --}}
            @if(auth()->guard('admin')->user()->hasPermission('view_footer'))
            <h5 class="mt-5 mb-3">Existing Footer Items</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Type</th>
                        <th>Item Text</th>
                        <th>Link</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($footers as $footer)
                        <tr>
                            <td>{{ $footer->type }}</td>
                            <td>{{ $footer->item_text }}</td>
                            <td>{{ $footer->link ?? 'N/A' }}</td>
                            <td>{{ $footer->icon ?? 'N/A' }}</td>
                            <td>{{ $footer->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                @if(auth()->guard('admin')->user()->hasPermission('delete_footer'))
                                <form action="{{ route('admin.footer.delete', $footer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
    $("#footerForm").validate({
        rules: {
            type: { required: true},
        },
        messages: {
            type: { required: "Type is required"},
        }
    });
});
</script>
@endpush