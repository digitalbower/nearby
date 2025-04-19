@extends('admin.layouts.masteradmin')
@section('title', 'Sales Person')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Sales Person</h4>
            

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="status-message"></div>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.products.sales_person.create') }}" class="btn btn-primary">Add New Sales Person</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($persons as $index => $person)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $person->name }}</td>
                            <td class="d-flex align-items-center gap-2">
                                <!-- Toggle Switch -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" 
                                           data-id="{{ $person->id }}" 
                                           {{ $person->status ? 'checked' : '' }}>
                                </div>
                            
                                <!-- Edit Button -->
                                <a href="{{ route('admin.products.sales_person.edit',$person->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                                <!-- Delete Form -->
                                <form action="{{ route('admin.products.sales_person.destroy', $person->id) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this person?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No sales person available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/sales_person.js') }}"></script>
@endpush