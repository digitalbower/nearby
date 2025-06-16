@extends('admin.layouts.masteradmin')
@section('title', 'Vendor Credentials')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h3 class="text-start mb-4">Edit Vendor Credentials</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.vendors.update',$id) }}" id="adminVendorForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="vendor_id" class="form-label">Vendor</label>
                <select class="form-control" name="vendor_id" id="vendor_id">
                    <option value="">Select Vendor</option>
                    @foreach ($vendors as $v)
                        <option value="{{ $v->id }}"{{ $vendor->id == $v->id ? 'selected' : '' }}>
                            {{ $vendor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
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
    $("#adminVendorForm").validate({
        rules: {
            vendor_id: { required: true},
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
            vendor_id: { required: "Vendor is required"},
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
