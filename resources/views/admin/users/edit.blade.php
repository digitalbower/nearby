@extends('admin.layouts.masteradmin')
@section('title', 'Admin Users')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h3 class="text-start mb-4">Edit User</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.users.update',$user->id) }}" id="adminUserForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
                <div class="mb-4">
                <label for="user_role_id" class="form-label">User Role</label>
                <select class="form-control" name="user_role_id" id="user_role_id">
                    <option value="">Select User Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->user_role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->role_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
    $.validator.addMethod("pwcheck", function(value) {
        return /[A-Z]/.test(value) &&    // at least one uppercase letter
               /[a-z]/.test(value) &&    // at least one lowercase letter
               /[0-9]/.test(value) &&    // at least one digit
               /[@$!%*?&#]/.test(value); // at least one special character
    });
    $("#adminUserForm").validate({
        rules: {
            name: { required: true, minlength: 3 },
            email: { required: true, email: true },
            user_role_id: { required: true},
            password: {
                minlength: {
                    param: 6,
                    depends: function(element) {
                        return $(element).val().length > 0;
                    }
                },
                pwcheck: {
                    depends: function(element) {
                        return $(element).val().length > 0;
                    }
                }
            },
            password_confirmation: {
                equalTo: "#password",
                required: {
                    depends: function(element) {
                        return $("#password").val().length > 0;
                    }
                }
            }
        },
        messages: {
            name: { required: "Name is required", minlength: "Must be at least 3 characters" },
            email: { required: "Email is required", email: "Enter a valid email" },
            user_role_id: { required: "User Role is required"},
            password: {
                minlength: "Password must be at least 6 characters",
                pwcheck: "Password must contain uppercase, lowercase, number, and special character"
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        }
    });
});
</script>
@endpush
