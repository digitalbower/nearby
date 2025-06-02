@extends('admin.layouts.masteradmin')

@section('content')
<div class="container">
    <h2>Create Blog</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.blogs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection
