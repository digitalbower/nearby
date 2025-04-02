@extends('admin.layouts.masteradmin')
@section('title', 'Vendor Terms')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Vendor Terms</h4>
            

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="status-message"></div>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.products.vendor_terms.create') }}" class="btn btn-primary">Add New Vendor Terms</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vendor</th>
                        <th>Vendor Terms Name</th>
                        <th>Terms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vendor_terms as $index => $vendor_term)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $vendor_term->vendor ? $vendor_term->vendor->name : 'N/A' }}</td>
                            <td>{{ $vendor_term->name }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($vendor_term->terms, 50, '...') }}</td>
                            <td class="d-flex align-items-center gap-2">
                                <!-- Toggle Switch -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" 
                                           data-id="{{ $vendor_term->id }}" 
                                           {{ $vendor_term->status ? 'checked' : '' }}>
                                </div>
                            
                                <!-- Edit Button -->
                                <a href="{{ route('admin.products.vendor_terms.edit', $vendor_term->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                                <!-- Delete Form -->
                                <form action="{{ route('admin.products.vendor_terms.destroy', $vendor_term->id) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this vendor term?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No vendor terms available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor_terms.js') }}"></script>
@endpush