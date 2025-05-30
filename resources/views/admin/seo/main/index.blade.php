@extends('admin.layouts.masteradmin')
@section('title', 'Seo Management')
@section('content')
    <div class="card shadow-none px-4 bg-transparent mt-5">
        <div class="card-body shadow-lg bg-white rounded-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="text-start">Seo Management</h3>
                <a href="{{ route('admin.seo.create') }}" class="btn btn-primary">Add New Seo</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Url</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $index => $page)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $page->page_url }}</td>
                                <td>{{ $page->meta_title }}</td>
                                <td>{{ $page->meta_description }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.seo.edit',$page) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>                            
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection