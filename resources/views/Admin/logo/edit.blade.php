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
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $logo->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Logo</label><br>
                    <img src="{{ asset('storage/'.$logo->image) }}" width="100" alt="Logo">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Logo</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-success">Update Logo</button>
                <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
</div>
@endsection

