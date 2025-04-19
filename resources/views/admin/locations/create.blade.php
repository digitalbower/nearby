@extends('admin.layouts.masteradmin')

@section('content')
  
<div class="wrapper-div">

<div class="container">
    <h2>Add Location</h2>
    <form action="{{ route('admin.locations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Emirate Name</label>
            <input type="text" name="emirate_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Active</label>
            <select name="active" class="form-control">
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>


</div>
@endsection

