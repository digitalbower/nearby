@extends('admin.layouts.masteradmin')
@section('title', 'Nbv Terms')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Nbv Terms</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.nbv_terms.update', $nbv_term->id) }}" id="nbvTermForm" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$nbv_term->name}}">                
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" id="type" value="{{ $nbv_term->type }}">                
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$nbv_term->title}}">                
                </div>
                <div class="mb-3">
                    <label for="terms" class="form-label">Terms</label>
                    <textarea class="form-control" id="terms" name="terms">{{$nbv_term->terms}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.nbv_terms.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/nbv_terms.js') }}"></script>
    <script>
        $(document).ready(function() {
                $('#terms').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']]
                    ]
                });
            });
    </script>
@endpush

