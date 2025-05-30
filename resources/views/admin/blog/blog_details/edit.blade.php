@extends('admin.layouts.masteradmin')
@section('content')
<div class="container">
    <h2>Edit Blog Detail</h2>
    <form action="{{ route('admin.blog-details.update', $blog_detail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Blog</label>
            <select name="blog_id" class="form-control">
                @foreach($blogs as $blog)
                    <option value="{{ $blog->id }}" {{ $blog_detail->blog_id == $blog->id ? 'selected' : '' }}>
                        {{ $blog->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>Title</label><input type="text" name="title" class="form-control" value="{{ $blog_detail->title }}"></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control">{{ $blog_detail->description }}</textarea></div>
        <div class="form-group"><label>Button Text</label><input type="text" name="button_text" class="form-control" value="{{ $blog_detail->button_text }}"></div>
        <div class="form-group"><label>Button Link</label><input type="text" name="button_link" class="form-control" value="{{ $blog_detail->button_link }}"></div>
        <div class="form-group"><label>Images</label><input type="file" name="images[]" class="form-control" multiple></div>
        <div class="form-group"><label>Featured</label><input type="checkbox" name="is_featured" value="1" {{ $blog_detail->is_featured ? 'checked' : '' }}></div>
        <div class="form-group"><label>Validity Date</label><input type="date" name="validity_date" class="form-control" value="{{ $blog_detail->validity_date }}"></div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
