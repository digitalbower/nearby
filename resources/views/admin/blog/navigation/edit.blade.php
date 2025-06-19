@extends('admin.layouts.masteradmin') 

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
<div class="container">
    <h2>Edit Blog Header/Footer</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.blog.blognavigation.update', $navigation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Logo --}}
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label><br>
            @if ($navigation->logo)
                <img src="{{ asset('storage/' . $navigation->logo) }}" alt="Logo" width="120">
            @endif
            

                <div class="mb-3"> 
                        <label for="logo" class="form-label">Upload New Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept=".jpeg,.jpg,.png,.gif,.svg">
                        <small class="text-muted">Leave empty if you don't want to change.</small>
                    </div>

            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Main Title --}}
        <div class="mb-3">
            <label for="main_title" class="form-label">Main Title</label>
            <input type="text" name="main_title" class="form-control" value="{{ old('main_title', $navigation->main_title) }}">
            @error('main_title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $navigation->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Main Image --}}
        <div class="mb-3">
            <label for="main_image" class="form-label">Main Image</label><br>
            @if ($navigation->main_image)
                <img src="{{ asset('storage/' . $navigation->main_image) }}" alt="Main Image" width="120">
            @endif
            <input type="file" name="main_image" class="form-control mt-2">
            @error('main_image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Button Text --}}
        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text</label>
            <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $navigation->button_text) }}">
            @error('button_text') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Button Link --}}
        <div class="mb-3">
            <label for="button_link" class="form-label">Button Link</label>
            <input type="url" name="button_link" class="form-control" value="{{ old('button_link', $navigation->button_link) }}">
            @error('button_link') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Button Hide --}}
        <div class="mb-3 form-check">
            <input type="checkbox" name="button_hide" class="form-check-input" id="button_hide"
                {{ old('button_hide', $navigation->button_hide) ? 'checked' : '' }}>
            <label class="form-check-label" for="button_hide">Hide Button</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
</div>
@endsection
