@extends('admin.layouts.masteradmin')

@section('content')

<div class="wrapper-div">
    <div class="container">
        <h2>Edit Menu Item</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.navigation.update', $navigationMenu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $navigationMenu->name }}" required>
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" value="{{ $navigationMenu->link }}">
            </div>

            <div class="form-group">
            <label for="icon">Icon</label>
            <select name="icon" class="form-control" required>
                <option value="fa fa-credit-card" {{ $navigationMenu->icon == 'fa fa-credit-card' ? 'selected' : '' }}>Payment Release</option>
                <option value="fa fa-user-tie" {{ $navigationMenu->icon == 'fa fa-user-tie' ? 'selected' : '' }}>Vendor</option>
                <option value="fa fa-address-book" {{ $navigationMenu->icon == 'fa fa-address-book' ? 'selected' : '' }}>Contact</option>
            </select>
        </div>



            
            <div class="form-group">
                <label for="type">Type</label>
                <select name="navigation_placement" class="form-control" required>
                    <option value="upper" {{ $navigationMenu->type == 'upper' ? 'selected' : '' }}>Upper</option>
                    <option value="lower" {{ $navigationMenu->type == 'lower' ? 'selected' : '' }}>Lower</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Active</label>
                <input type="checkbox" name="active" value="1" {{ $navigationMenu->active ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
