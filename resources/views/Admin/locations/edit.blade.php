@extends('admin.layouts.masteradmin')

@section('content')
  
<div class="wrapper-div">
<div class="container">
    <h2>Edit Location</h2>
    <form action="{{ route('admin.locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Emirate Name</label>
            <input type="text" name="emirate_name" class="form-control" value="{{ $location->emirate_name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $location->active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$location->active ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
</div>
@endsection

