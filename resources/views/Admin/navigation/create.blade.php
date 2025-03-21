@extends('admin.layouts.masteradmin')

@section('content')
  
<div class="wrapper-div">
<div class="container">
        <h2>Add Menu Item</h2>
        <form action="{{ route('admin.navigation.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" name="label" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="navigation_placement">Placement</label>
                <select name="navigation_placement" class="form-control" required>
                    <option value="upper">Upper</option>
                    <option value="lower">Lower</option>
                </select>
            </div>

            <div class="form-group">
                <label for="active">Active</label>
                <input type="checkbox" name="active" value="1" checked>
            </div>

            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</div>
@endsection

