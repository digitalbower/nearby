@extends('admin.layouts.masteradmin')
@section('title', 'Nbv Terms')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Nbv Terms List</h4>
        
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div id="status-message"></div>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.products.nbv_terms.create') }}" class="btn btn-primary">Add NbvTerms</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Terms</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($terms as $term)
                        <tr>
                            <td>{{$term->name}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($term->terms, 50, '...') }}</td>
                            <td>{{$term->type}}</td>
                            <td class="d-flex align-items-center gap-2">
                                <!-- Toggle Switch -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" 
                                           data-id="{{ $term->id }}" 
                                           {{ $term->status ? 'checked' : '' }}>
                                </div>
                            <a href="{{ route('admin.products.nbv_terms.edit', $term) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.products.nbv_terms.destroy', $term->id) }}" method="POST" class="d-inline" 
                                onsubmit="return confirm('Are you sure you want to delete this nbv term?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Nbv Terms available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/nbv_terms.js') }}"></script>
@endpush