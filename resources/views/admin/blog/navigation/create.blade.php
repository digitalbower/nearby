@extends('admin.layouts.masteradmin')

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
<div class="container mt-5">
    <h2>{{ isset($navigation) ? 'Edit Navigation' : 'Add Navigation' }}</h2>

    <form action="{{ isset($navigation) ? route('admin.navigation.update', $navigation->id) : route('admin.navigation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($navigation))
            @method('PUT')
        @endif

      
      

        {{-- HEADER Fields --}}
        <div id="headerFields">
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" class="form-control" name="logo">
                @if(isset($navigation) && $navigation->logo)
                    <img src="{{ asset('storage/' . $navigation->logo) }}" height="50" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Main Title</label>
                <input type="text" class="form-control" name="main_title" value="{{ old('main_title', $navigation->main_title ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description">{{ old('description', $navigation->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Main Image</label>
                <input type="file" class="form-control" name="main_image">
                @if(isset($navigation) && $navigation->main_image)
                    <img src="{{ asset('storage/' . $navigation->main_image) }}" height="50" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Button Text</label>
                <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $navigation->button_text ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Button Link</label>
                <input type="url" class="form-control" name="button_link" value="{{ old('button_link', $navigation->button_link ?? '') }}">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="button_hide" value="1" {{ old('button_hide', $navigation->button_hide ?? false) ? 'checked' : '' }}>
                <label class="form-check-label">Hide Button</label>
            </div>
        </div>

      

        <button type="submit" class="btn btn-success"> Save</button>
    </form>
</div>
                    </div>
                    </div>
@endsection


