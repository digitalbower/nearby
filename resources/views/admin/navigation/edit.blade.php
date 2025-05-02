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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('admin.navigation.update', $navigationMenu->id) }}" id="navigationForm" method="POST">
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
            <select name="icon" class="form-control">
                <option value="">Select Icon</option>
                <option value="fa fa-credit-card"  {{ old('icon', 'fa fa-credit-card' ?? '') == $navigationMenu->icon ? 'selected' : '' }}>Payment Release</option>
                <option value="fa fa-user-tie" {{ old('icon', 'fa fa-user-tie' ?? '') == $navigationMenu->icon ? 'selected' : '' }}>Vendor</option>
                <option value="fa fa-address-book" {{ old('icon', 'fa fa-address-book' ?? '') == $navigationMenu->icon ? 'selected' : '' }}>Contact</option>
            </select>
        </div>



            
            <div class="form-group">
                <label for="navigation_placement">Type</label>
                <select name="navigation_placement" class="form-control">
                    <option value="">Select Type</option>
                    <option value="upper" {{ old('type', 'upper' ?? '') == $navigationMenu->navigation_placement ? 'selected' : '' }}>Upper</option>
                    <option value="lower" {{ old('type', 'lower' ?? '') == $navigationMenu->navigation_placement ? 'selected' : ''}}>Lower</option>
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
@push('scripts')
<script>
    $(document).ready(function () {
    $("#navigationForm").validate({
        rules: {
            name: { required: true},
            navigation_placement:{ required: true},
        },
        messages: {
            name: { required: "Name is required"},
            navigation_placement: { required: "Type is required"},
        }
    });
});
</script>
@endpush