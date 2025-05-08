@extends('admin.layouts.masteradmin')
@section('title', 'Seo')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Seo Management</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.seo.store') }}" id="seoMainForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Page Url</label>
                    <input type="text" name="page_url" value="{{ old('page_url') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <input type="text" name="meta_description" value="{{ old('meta_description') }}" class="form-control">

                </div>
                <div class="mb-3">
                    <label>OG Title</label>
                    <input type="text" name="og_title" value="{{ old('og_title') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>OG Description</label>
                    <input type="text" name="og_description" value="{{ old('og_description') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>OG Image</label>
                    <input type="file" name="og_image" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label>Schema (JSON-LD)</label>
                    <textarea name="schema" class="form-control" rows="4">{{ old('schema') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection