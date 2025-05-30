@extends('admin.layouts.masteradmin')
@section('title', 'Seo Management')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h3 class="text-start mb-4">Seo Management</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.seo.update',$seo->id) }}" id="seoMainForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Page Url</label>
                <input type="text" name="page_url" value="{{ $seo->page_url }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" value="{{ $seo->meta_title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <input type="text" name="meta_description" value="{{ $seo->meta_description }}" class="form-control">

            </div>
            <div class="mb-3">
                <label>OG Title</label>
                <input type="text" name="og_title" value="{{ $seo->og_title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>OG Description</label>
                <input type="text" name="og_description" value="{{ $seo->og_description }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>OG Image</label>
                @if($seo->og_image)
                    <div><img src="{{ asset('storage/' . $seo->og_image) }}" width="100"></div>
                @endif
                <input type="file" name="og_image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label>Schema (JSON-LD)</label>
                <textarea name="schema" class="form-control" rows="4">{{ $seo->schema }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
</div>
@endsection