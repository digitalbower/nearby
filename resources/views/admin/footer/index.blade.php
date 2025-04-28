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

            {{-- Add New Footer Item --}}
            <h5>Add New Footer Item</h5>
            <form action="{{ route('admin.footer.store') }}" method="POST">
                @csrf

                <label>Type:</label>
                <select name="type" class="form-control" required>
                    <option value="Top Destination">Top Destination</option>
                    <option value="Information">Information</option>
                    <option value="Follow Us">Follow Us</option>
                    <option value="payment_channels">Payment Channels</option>
                </select>

                <label>Item Text:</label>
                <input type="text" name="item_text" class="form-control">

                <label>Link (optional):</label>
                <input type="text" name="link" class="form-control">

                <div class="form-group">
    <label>Select Icon</label>
    <select name="icon" class="form-control" required>
        <option value="">-- Select Icon --</option>

        <!-- Social Media Icons -->
        <option value="fab fa-facebook text-white">Facebook</option>
        <option value="fab fa-instagram text-white">Instagram</option>
        <option value="fab fa-twitter text-white">Twitter</option>
        <option value="fab fa-youtube text-white">YouTube</option>
        <option value="fab fa-linkedin text-white">LinkedIn</option>
        <option value="fab fa-pinterest text-white">Pinterest</option>

        <!-- Payment Channel Icons -->
        <option value="fa fa-cc-visa">Visa</option>
        <option value="fa fa-cc-mastercard">Mastercard</option>
        <option value="fa fa-cc-amex">Amex</option>
        <option value="fa fa-cc-discover">Discover</option>
        <option value="fa fa-credit-card">Credit Card</option>
        <option value="fa fa-university">Bank Transfer</option>
        <option value="fa fa-money-check-alt">Rupay</option>

    </select>
</div>



                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

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
