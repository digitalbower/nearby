@extends('admin.layouts.masteradmin')
@section('title', 'Company Terms')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Company Terms List</h4>
            

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Terms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terms as $term)
                        <tr>
                            <td>{{ \Illuminate\Support\Str::limit($term->terms, 50, '...') }}</td>
                            <td>
                            <a href="{{ route('admin.products.company_terms.edit', $term->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection