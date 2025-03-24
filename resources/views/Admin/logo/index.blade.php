@extends('admin.layouts.masteradmin')
@section('title', 'Logo Preview')
@section('content')

<div class="wrapper-div">
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h4 class="text-center mb-4">Logo Management</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.logos.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Display Current Logo --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Current Logo</label><br>
                <img src="{{ $logo->logo_image ? asset('storage/'.$logo->logo_image) : asset('storage/'.$logo->logo_fallback) }}" 
                     width="150" class="border p-2 rounded">
            </div>

            {{-- Upload New Logo --}}
            <div class="mb-3">
                <label for="logo_image" class="form-label">Upload New Logo (PNG, JPG, SVG)</label>
                <input type="file" class="form-control" id="logo_image" name="logo_image">
            </div>

            {{-- Preview Image (Only Show, No Upload Option) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Preview Image</label><br>
                <img src="{{ $logo->logo_image ? asset('storage/'.$logo->logo_image) : asset('storage/logos/default-preview.png') }}" 
                     width="150" class="border p-2 rounded">
            </div>

            <button type="submit" class="btn btn-success">Update Logo</button>
        </form>
    </div>
</div>
</div>
@endsection
