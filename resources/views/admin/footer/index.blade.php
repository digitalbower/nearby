@extends('admin.layouts.masteradmin')

@section('title', 'Footer Management')

@section('content')

<div class="wrapper-div">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
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
                    <option value="fa fa-cc-visa" {{ old('icon') == "fa fa-cc-visa" ? 'selected' : '' }}>Visa</option>
                    <option value="fa fa-cc-mastercard" {{ old('icon') == "fa fa-cc-mastercard" ? 'selected' : '' }}>Mastercard</option>
                    <option value="fa fa-cc-amex" {{ old('icon') == "fa fa-cc-amex" ? 'selected' : '' }}>Amex</option>
                    <option value="fa fa-cc-discover" {{ old('icon') == "fa fa-cc-discover" ? 'selected' : '' }}>Discover</option>
                    <option value="fa fa-credit-card" {{ old('icon') == "fa fa-credit-card" ? 'selected' : '' }}>Credit Card</option>
                    <option value="fa fa-university" {{ old('icon') == "fa fa-university" ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="fa fa-money-check-alt" {{ old('icon') == "fa fa-money-check-alt" ? 'selected' : '' }}>Rupay</option>

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
            <hr>

            {{-- Existing Footer Items --}}
            <h5>Existing Footer Items</h5>
            <table class="table">
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
                            <form action="{{ route('admin.footer.delete', $footer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
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