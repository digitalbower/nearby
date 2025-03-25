@extends('admin.layouts.masteradmin')

@section('title', 'Support Section')
@section('content')

<div class="container mt-5">
    <h2>Support Section</h2>
    <a href="{{ route('admin.support.create') }}" class="btn btn-success mb-3">Add Support Section</a>

    @if ($support)
        <div class="card">
            <div class="card-body">
                <h5><strong>Label:</strong> {{ $support->label }}</h5>
                <h5><strong>Title:</strong> {{ $support->title }}</h5>
                <h5><strong>Button Text:</strong> {{ $support->button_text }}</h5>
                <h5><strong>Form Action:</strong> {{ $support->form_action }}</h5>
                <img src="{{ asset('storage/' . $support->icon) }}" width="100" alt="Support Icon">
                <br><br>
                <a href="{{ route('admin.support.edit') }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.support.destroy', $support->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endif
</div>

@endsection