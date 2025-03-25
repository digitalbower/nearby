@extends('admin.layouts.masteradmin')
@section('title', 'Add Quick Card')
@section('content')

<div class="container mt-5">
    <h2>Add Quick Card</h2>
    <form action="{{ route('admin.quick.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" class="form-control" name="link" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection


