@extends('admin.layouts.masteradmin')

@section('title', 'Popular Products')
@section('content')

<div class="container mt-5">
    <h2>Popular Products</h2>
    <a href="{{ route('admin.popular.edit') }}" class="btn btn-success mb-3">Update Popular Products</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($popularProducts as $popular)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $popular->product->name }}</td>
                    <td>
                    <a href="{{ route('admin.popular.edit', $popular->id) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('admin.popular.destroy', $popular->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
