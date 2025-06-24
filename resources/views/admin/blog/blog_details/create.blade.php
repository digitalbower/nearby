@extends('admin.layouts.masteradmin')
@section('content')

<style>
    .ck-editor__editable_inline {
        min-height: 350px;
    }
</style>
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
<div class="container">
    <h2>Create Blog Detail</h2>
    <form action="{{ route('admin.blog.blog-details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Blog</label>
            <select name="blog_id" class="form-control">
                @foreach($blogs as $blog)
                    <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>Title</label><input type="text" name="title" class="form-control"></div>
        <div class="form-group">
    <label>Description</label>
    <textarea name="description" id="description-editor" class="form-control"></textarea>
</div>




        <div class="form-group"><label>Button Text</label><input type="text" name="button_text" class="form-control"></div>
        <div class="form-group"><label>Button Link</label><input type="text" name="button_link" class="form-control"></div>
        <div class="form-group"><label>Images</label><input type="file" name="images[]" class="form-control" multiple></div>
        <div class="form-group"><label>Featured</label><input type="checkbox" name="is_featured" value="1"></div>
        <div class="form-group"><label>Validity Date</label><input type="date" name="validity_date" class="form-control"></div>
        <button class="btn btn-success mt-2">Save</button>
    </form>
</div>
</div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description-editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
