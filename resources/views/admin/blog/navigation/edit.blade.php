@extends('admin.layouts.masteradmin')

@section('content')
<div class="container mt-5">
    <h2>Edit Navigation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.navigation.update', $navigation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="navigation_placement" class="form-label">Placement</label>
            <select name="navigation_placement" id="navigation_placement" class="form-control" required>
                <option value="">Select Placement</option>
                <option value="header" {{ old('navigation_placement', $navigation->navigation_placement) == 'header' ? 'selected' : '' }}>Header</option>
                <option value="footer" {{ old('navigation_placement', $navigation->navigation_placement) == 'footer' ? 'selected' : '' }}>Footer</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="main_title" class="form-label">Main Title</label>
            <input type="text" name="main_title" id="main_title" class="form-control" value="{{ old('main_title', $navigation->main_title) }}" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if (!empty($navigation->logo))
                <img src="{{ asset('storage/' . $navigation->logo) }}" height="40" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label for="main_image" class="form-label">Main Image</label>
            <input type="file" name="main_image" id="main_image" class="form-control">
            @if (!empty($navigation->main_image))
                <img src="{{ asset('storage/' . $navigation->main_image) }}" height="40" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
