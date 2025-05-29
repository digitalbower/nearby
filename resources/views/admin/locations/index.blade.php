@extends('admin.layouts.masteradmin')
@section('title', 'Logo Preview')
@section('content')

<div class="wrapper-div pt-0">
    <div class="card shadow-none bg-transparent px-4 mt-5">
        <div class="card-body bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Emirate Management </h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Emirate Name</th>
                        <th>Code</th>
                        
                    </tr>
                    @foreach ($locations as $location)
                        <tr>
                            <td>{{ $location->name }}</td>
                            <td>{{ $location->code }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
