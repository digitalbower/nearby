@extends('admin.layouts.masteradmin')
@section('title', 'Reviews')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="card shadow-none px-4 bg-transparent mt-5">
        <div class="card-body shadow-lg bg-white rounded-3">
            <h3 class="text-start mb-4">Reviews</h3>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="status-message"></div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>User</th>
                            <th>Review Title</th>
                            <th>Review Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $index => $review)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $review->product ? $review->product->name : 'No Product' }}</td>
                                <td>{{ $review->user ? $review->user->first_name : 'No User' }}</td>
                                <td>{{ $review->review_title}}</td>
                                <td>{{ $review->review_rating}}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <!-- Toggle Switch -->
                                    @if(auth()->guard('admin')->user()->hasPermission('changestatus_report'))
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-status" type="checkbox" 
                                            data-id="{{ $review->id }}" 
                                            {{ $review->status ? 'checked' : '' }}>
                                    </div>
                                    @endif
                                    @if(auth()->guard('admin')->user()->hasPermission('delete_report'))   
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.reports.reviews.destroy', $review->id) }}" method="POST" class="d-inline" 
                                        onsubmit="return confirm('Are you sure you want to delete this product review?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    @endif
                                </td>                            
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Product reviews available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/reviews.js') }}"></script>
@endpush