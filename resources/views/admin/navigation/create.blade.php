@extends('admin.layouts.masteradmin')

@section('content')
<div class="wrapper-div">
    <div class="">
        <h2>Add Menu Item</h2>
        
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

        <form action="{{ route('admin.navigation.store') }}" id="navigationForm" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" value="{{old('link')}}">
            </div>

            <div class="form-group">
                <label for="icon">Icon</label>
                <select name="icon" class="form-control">
                    <option value="">Select Icon</option>
                    <option value="fa fa-credit-card" {{ old('icon') == "fa fa-credit-card" ? 'selected' : '' }}>Payment Release</option>
                    <option value="fa fa-user-tie" {{ old('icon') == "fa fa-user-tie" ? 'selected' : '' }}>Vendor</option>
                    <option value="fa fa-address-book" {{ old('icon') == "fa fa-address-book" ? 'selected' : '' }}>Contact</option>
                </select>
            </div>


            <div class="form-group">
                <label for="type">Type</label>
                <select name="navigation_placement" class="form-control">
                    <option value="">Select Type</option>
                    <option value="upper" {{ old('icon') == "upper" ? 'selected' : '' }}>Upper</option>
                    <option value="lower" {{ old('icon') == "lower" ? 'selected' : '' }}>Lower</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="checkbox" name="active" value="1" checked>
            </div>

            <button type="submit" class="btn btn-success">Add</button>
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