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

            {{-- Navigation Links --}}
            <h5>Navigation Links</h5>
            <form action="{{ route('admin.footer.navigation.update') }}" method="POST">
                @csrf
                <label>Page Label:</label>
                <input type="text" name="label" class="form-control" value="{{ $navigation->label ?? '' }}">
                
                <label>Link:</label>
                <input type="text" name="link" class="form-control" value="{{ $navigation->link ?? '' }}">

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Social Media Links --}}
            <h5>Social Media Links</h5>
            <form action="{{ route('admin.footer.social.update') }}" method="POST">
                @csrf
                <label>Platform:</label>
                <input type="text" name="platform" class="form-control" value="{{ $social->platform ?? '' }}">

                <label>URL:</label>
                <input type="text" name="url" class="form-control" value="{{ $social->url ?? '' }}">

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Contact Information --}}
            <h5>Contact Information</h5>
            <form action="{{ route('admin.footer.contact.update') }}" method="POST">
                @csrf
                <label>Address:</label>
                <input type="text" name="address" class="form-control" value="{{ $contact->address ?? '' }}">

                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $contact->email ?? '' }}">

                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ $contact->phone ?? '' }}">

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Newsletter Subscription --}}
            <h5>Newsletter Subscription</h5>
            <form action="{{ route('admin.footer.newsletter.update') }}" method="POST">
                @csrf
                <label>Newsletter Signup Text:</label>
                <input type="text" name="email" class="form-control" value="{{ $newsletter->email ?? '' }}">

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Legal Disclaimer --}}
            <h5>Legal Disclaimer</h5>
            <form action="{{ route('admin.footer.legal.update') }}" method="POST">
                @csrf
                <textarea name="title" class="form-control">{{ $legal->title ?? '' }}</textarea>

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Dynamic Quick Links --}}
            <h5>Quick Links</h5>
            <form action="{{ route('admin.footer.quick.update') }}" method="POST">
                @csrf
                <label>Link Name:</label>
                <input type="text" name="title" class="form-control" value="{{ $quick->title ?? '' }}">

                <label>URL:</label>
                <input type="text" name="link" class="form-control" value="{{ $quick->link ?? '' }}">

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Payment Methods --}}
            <h5>Payment Methods</h5>
            <form action="{{ route('admin.footer.payment.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Upload Payment Method Logo:</label>
                <input type="file" class="form-control" name="payment_logo">

                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
            <hr>

            {{-- Language and Currency Selector (Disabled) --}}
            <h5>Language and Currency</h5>
            <div class="alert alert-info">
                <strong>Note:</strong> Language and currency selection is disabled.  
                <p><strong>Default Language:</strong> English</p>
                <p><strong>Default Currency:</strong> AED</p>
            </div>

        </div>
    </div>
</div>

@endsection
