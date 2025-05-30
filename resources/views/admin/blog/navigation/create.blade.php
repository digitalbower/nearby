@extends('admin.layouts.masteradmin')

@section('content')
<div class="container mt-5">
    <h2>{{ isset($navigation) ? 'Edit Navigation' : 'Add Navigation' }}</h2>

    <form action="{{ isset($navigation) ? route('admin.navigation.update', $navigation->id) : route('admin.navigation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($navigation))
            @method('PUT')
        @endif

        {{-- Placement --}}
        <div class="mb-3">
            <label class="form-label">Navigation Placement</label>
            <select name="navigation_placement" id="navigationPlacement" class="form-control" required>
                <option value="header" {{ old('navigation_placement', $navigation->navigation_placement ?? '') == 'header' ? 'selected' : '' }}>Header</option>
                <option value="footer" {{ old('navigation_placement', $navigation->navigation_placement ?? '') == 'footer' ? 'selected' : '' }}>Footer</option>
            </select>
        </div>

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

        {{-- FOOTER Fields --}}
        <div id="footerFields" style="display: none;">
            <hr>
            <h4>Footer Specific Fields</h4>

            <div class="mb-3">
                <label class="form-label">Social Media Icons</label>
                @php
                    $icons = old('social_media_icons', $navigation->social_media_icons ?? []);
                    if (!is_array($icons)) $icons = json_decode($icons, true);
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
@endsection

@push('scripts')
<script>
    function toggleFooterFields() {
        const placement = document.getElementById('navigationPlacement').value;
        const footerSection = document.getElementById('footerFields');
        const headerSection = document.getElementById('headerFields');

        if (placement === 'footer') {
            footerSection.style.display = 'block';
            headerSection.style.display = 'none';
        } else {
            footerSection.style.display = 'none';
            headerSection.style.display = 'block';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        toggleFooterFields();
        document.getElementById('navigationPlacement').addEventListener('change', toggleFooterFields);
    });
</script>
@endpush
