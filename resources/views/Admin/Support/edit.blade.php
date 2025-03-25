@extends('admin.layouts.masteradmin')
@section('title', 'Edit Support Section')
@section('content')

<div class="container mt-5">
    <h2>Edit Support Section</h2>
    <form action="{{ route('admin.support.update', $support->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Label</label>
            <input type="text" class="form-control" name="label" value="{{ $support->label }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $support->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" value="{{ $support->button_text }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Form Action</label>
            <input type="text" class="form-control" name="form_action" value="{{ $support->form_action }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Icon</label><br>
            @if($support->icon)
                <img src="{{ asset('storage/' . $support->icon) }}" width="100" alt="Support Icon">
            @else
                <p>No icon uploaded.</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Upload New Icon (Optional)</label>
            <input type="file" class="form-control" name="icon">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
