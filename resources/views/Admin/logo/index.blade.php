@extends('admin.layouts.masteradmin')
@section('title', 'Upload Logo')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Logo List</h4>
            

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logos as $logo)
                        <tr>
                            <td>{{ $logo->title }}</td>
                            <td><img src="{{ asset('storage/'.$logo->image) }}" width="80" alt="Logo"></td>
                            <td>
                            <a href="{{ route('logos.edit', $logo->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ asset('storage/'.$logo->image) }}" class="btn btn-info" target="_blank">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection