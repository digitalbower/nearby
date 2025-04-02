@extends('admin.layouts.masteradmin')

@section('title', 'Footer Management')

@section('content')

<div class="wrapper-div">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Footer Management</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Footer Item Form --}}
            <h5>Footer Item</h5>
            <form action="{{ route('admin.footer.manage', $footer->id ?? '') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" name="type" class="form-control" value="{{ $footer->type ?? '' }}" required>
                </div>

                <div class="form-group">
                    <label for="item_text">Item Text:</label>
                    <textarea name="item_text" class="form-control" required>{{ $footer->item_text ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" name="link" class="form-control" value="{{ $footer->link ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="icon">Icon (JSON Format):</label>
                    <textarea name="icon" class="form-control">{{ $footer->icon ?? '{}' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ isset($footer) && $footer->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ isset($footer) && $footer->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

        </div>
    </div>
</div>

@endsection
