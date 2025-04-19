@extends('admin.layouts.masteradmin')
@section('title', 'Add Support Section')
@section('content')

<div class="container mt-5">
    <h2>Add Support Section</h2>
    <form action="{{ route('admin.support.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Label</label>
            <input type="text" class="form-control" name="label" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Form Action</label>
            <input type="text" class="form-control" name="form_action" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Icon</label>
            <input type="file" class="form-control" name="icon">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
