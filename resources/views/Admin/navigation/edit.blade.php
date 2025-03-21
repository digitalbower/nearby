@extends('admin.layouts.masteradmin')

@section('content')
  
<div class="wrapper-div">
<div class="container">
        <h2>Edit Menu Item</h2>
        <form action="{{ route('admin.navigation.update', $navigationMenu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" name="label" class="form-control" value="{{ $navigationMenu->label }}" required>
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" value="{{ $navigationMenu->link }}" required>
            </div>

            <div class="form-group">
                <label for="navigation_placement">Placement</label>
                <select name="navigation_placement" class="form-control" required>
                    <option value="upper" {{ $navigationMenu->navigation_placement == 'upper' ? 'selected' : '' }}>Upper</option>
                    <option value="lower" {{ $navigationMenu->navigation_placement == 'lower' ? 'selected' : '' }}>Lower</option>
                </select>
            </div>

            <div class="form-group">
                <label for="active">Active</label>
                <input type="checkbox" name="active" value="1" {{ $navigationMenu->active ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

