@extends('admin.layouts.masteradmin')

@section('content')
<div class="container mt-5">
    <h2>Edit Featured Item</h2>

    <form action="{{ route('admin.featured-items.update', $featured_item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $featured_item->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $featured_item->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" value="{{ $featured_item->link }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if($featured_item->image)
                <img src="{{ asset('storage/' . $featured_item->image) }}" height="50"><br>
            @endif
            <input type="file" name="image" class="form-control mt-2">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
