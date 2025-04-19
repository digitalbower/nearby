@extends('admin.layouts.masteradmin')
@section('title', 'Edit Quick Card')
@section('content')

<div class="container mt-5">
    <h2>Edit Quick Card</h2>
    <form action="{{ route('admin.quick.update', $quickCard->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $quickCard->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" required>{{ $quickCard->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" value="{{ $quickCard->button_text }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" class="form-control" name="link" value="{{ $quickCard->link }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($quickCard->image)
                <img src="{{ asset('storage/'.$quickCard->image) }}" width="100">
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Upload New Image (Optional)</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
