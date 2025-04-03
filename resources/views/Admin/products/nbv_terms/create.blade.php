@extends('admin.layouts.masteradmin')
@section('title', 'Nbv Terms')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Create Nbv Terms</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.nbv_terms.store') }}" id="nbvTermForm" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">                
                </div>
                <div class="mb-3">
                    <label for="terms" class="form-label">Terms</label>
                    <textarea class="form-control" id="terms" name="terms">{{old('terms')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}">                
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.nbv_terms.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/nbv_terms.js') }}"></script>
@endpush

