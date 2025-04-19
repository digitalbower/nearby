@extends('admin.layouts.masteradmin')
@section('title', 'Quick Cards')
@section('content')

<div class="container mt-5">
    <h2>Quick Cards</h2>
    <a href="{{ route('admin.quick.create') }}" class="btn btn-success mb-3">Add Quick Card</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Button Text</th>
                <th>Link</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quickCards as $card)
                <tr>
                    <td>{{ $card->title }}</td>
                    <td>{{ $card->description }}</td>
                    <td>{{ $card->button_text }}</td>
                    <td><a href="{{ $card->link }}" target="_blank">View Link</a></td>
                    <td><img src="{{ asset('storage/'.$card->image) }}" width="50"></td>
                    <td>
                        <a href="{{ route('admin.quick.edit', $card->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.quick.destroy', $card->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
