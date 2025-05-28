<form action="{{ isset($blogDetail) ? route('blog-details.update', $blogDetail->id) : route('blog-details.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($blogDetail))
        @method('PUT')
    @endif

    <div>
        <label>Blog</label>
        <select name="blog_id" required>
            @foreach($blogs as $blog)
                <option value="{{ $blog->id }}" {{ isset($blogDetail) && $blogDetail->blog_id == $blog->id ? 'selected' : '' }}>
                    {{ $blog->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $blogDetail->title ?? '') }}" required>
    </div>

    <div>
        <label>Description</label>
        <textarea name="description">{{ old('description', $blogDetail->description ?? '') }}</textarea>
    </div>

    <div>
        <label>Button Text</label>
        <input type="text" name="button_text" value="{{ old('button_text', $blogDetail->button_text ?? '') }}">
    </div>

    <div>
        <label>Button Link</label>
        <input type="url" name="button_link" value="{{ old('button_link', $blogDetail->button_link ?? '') }}">
    </div>

    <div>
        <label>Images (you can upload multiple)</label>
        <input type="file" name="images[]" multiple>
        @if(isset($blogDetail->images))
            <div>
                @foreach($blogDetail->images as $img)
                    <img src="{{ asset('storage/' . $img) }}" width="80">
                @endforeach
            </div>
        @endif
    </div>

    <div>
        <label>Is Featured?</label>
        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $blogDetail->is_featured ?? false) ? 'checked' : '' }}>
    </div>

    <div>
        <label>Validity Date</label>
        <input type="date" name="validity_date" value="{{ old('validity_date', isset($blogDetail) ? $blogDetail->validity_date->format('Y-m-d') : '') }}">
    </div>

    <button type="submit">{{ isset($blogDetail) ? 'Update' : 'Create' }}</button>
</form>
