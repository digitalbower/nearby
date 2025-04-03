@extends('admin.layouts.masteradmin')

@section('content')

<div class="wrapper-div">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Logo</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.logos.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <!-- Type -->
                <div class="mb-3">
                <label for="type" class="form-label">Type</label>
    <select class="form-control" id="type" name="type" required>
        <option value="company" {{ $logo->type == 'company' ? 'selected' : '' }}>Header</option>
        <option value="footer" {{ $logo->type == 'footer' ? 'selected' : '' }}>Footer</option>
    </select>
                </div>

                <!-- Link -->
                <div class="mb-3">
                    <label for="link" class="form-label">Website Link (Optional)</label>
                    <input type="url" class="form-control" id="link" name="link" value="{{ $logo->link }}">
                </div>

                <!-- Current Logo -->
                <div class="mb-3">
                    <label class="form-label">Current Logo</label><br>
                    <img src="{{ asset('storage/'.$logo->logo) }}" width="120" class="img-thumbnail" alt="Logo">
                </div>

                <!-- Upload New Logo -->
                <div class="mb-3">
                    <label for="logo" class="form-label">Upload New Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    <small class="text-muted">Leave empty if you don't want to change.</small>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="1" {{ $logo->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $logo->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update Logo</button>
                <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
