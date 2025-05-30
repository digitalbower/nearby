@extends('admin.layouts.masteradmin')
@section('title', 'Vendors')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="card shadow-none px-4 bg-transparent mt-5">
        <div class="card-body shadow-lg bg-white rounded-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="status-message"></div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="text-center mb-0">Vendors</h4>
                <a href="{{ route('admin.products.vendors.create') }}" class="btn btn-primary">Add New Vendor</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Validity From</th>
                            <th>validity To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vendors as $index => $vendor)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $vendor->name }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->validityfrom }}</td>
                                <td>{{ $vendor->validityto }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <!-- Toggle Switch -->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-status" type="checkbox" 
                                            data-id="{{ $vendor->id }}" 
                                            {{ $vendor->status ? 'checked' : '' }}>
                                    </div>
                                
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.products.vendors.edit', $vendor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.products.vendors.destroy', $vendor->id) }}" method="POST" class="d-inline" 
                                        onsubmit="return confirm('Are you sure you want to delete this vendor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>                            
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No vendors available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor.js') }}"></script>
@endpush