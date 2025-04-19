@extends('admin.layouts.masteradmin')

@section('title', 'Trending Products')
@section('content')

<div class="container mt-5">
    <h2>Trending Products</h2>
    <a href="{{ route('admin.trending.create') }}" class="btn btn-success mb-3">Update Trending Products</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trendingProducts as $trending)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trending->product->name }}</td>
                    <td>
                    <a href="{{ route('admin.trending.edit', $trending->id) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('admin.trending.destroy', $trending->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
