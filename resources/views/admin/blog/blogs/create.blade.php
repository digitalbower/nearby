@extends('admin.layouts.masteradmin')

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
<div class="container">
    <h2>Create Blog</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.blog.blogs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Save</button>
    </form>
</div>
</div>
</div>
@endsection
