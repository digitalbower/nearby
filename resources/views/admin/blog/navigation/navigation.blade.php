@extends('admin.layouts.masteradmin')

@section('title', isset($navigation) ? 'Edit Navigation' : 'Add Navigation')

@section('content')
<div class="container mt-5">
    <h2>{{ isset($navigation) ? 'Edit Navigation' : 'Add Navigation' }}</h2>

    <form action="{{ isset($navigation) ? route('navigation.update', $navigation->id) : route('admin.navigation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($navigation))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Navigation Placement</label>
            <select name="navigation_placement" id="navigationPlacement" class="form-control" required>
                <option value="upper" {{ old('navigation_placement', $navigation->navigation_placement ?? '') == 'upper' ? 'selected' : '' }}>Header</option>
                <option value="lower" {{ old('navigation_placement', $navigation->navigation_placement ?? '') == 'lower' ? 'selected' : '' }}>Footer</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type }}" {{ old('type', $navigation->type ?? '') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo">
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
        </div>

        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $navigation->button_text ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Button Link</label>
            <input type="url" class="form-control" name="button_link" value="{{ old('button_link', $navigation->button_link ?? '') }}">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="button_hide" value="1" {{ old('button_hide', $navigation->button_hide ?? false) ? 'checked' : '' }}>
            <label class="form-check-label">Hide Button</label>
        </div>

        {{-- Footer Specific Section --}}
        <div id="footerFields" style="display: none;">
            <hr>
            <h4>Footer Specific Fields</h4>

            <div class="mb-3">
                <label class="form-label">Social Media Icons</label>
                @php
                    $icons = old('social_media_icons', $navigation->social_media_icons ?? []);
                @endphp
                @foreach($icons as $icon)
                    <input type="url" class="form-control mb-2" name="social_media_icons[]" value="{{ $icon }}" placeholder="https://facebook.com/...">
                @endforeach
                <input type="url" class="form-control mb-2" name="social_media_icons[]" placeholder="Add another icon">
            </div>

            <div class="mb-3">
                <label class="form-label">Footer Text</label>
                <textarea class="form-control" name="footer_text">{{ old('footer_text', $navigation->footer_text ?? '') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($navigation) ? 'Update' : 'Save' }}</button>
    </form>
</div>

{{-- JavaScript Section --}}
@section('scripts')
<script>
    function toggleFooterFields() {
        const placement = document.getElementById('navigationPlacement').value;
        document.getElementById('footerFields').style.display = (placement === 'lower') ? 'block' : 'none';
    }

    // On page load
    document.addEventListener('DOMContentLoaded', function () {
        toggleFooterFields(); // Initial check

        document.getElementById('navigationPlacement').addEventListener('change', function () {
            toggleFooterFields(); // Toggle on change
        });
    });
</script>
@endsection
