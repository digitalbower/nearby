@extends('admin.layouts.masteradmin')

@section('content')
<div class="container">
    <h2>Edit Blog</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
