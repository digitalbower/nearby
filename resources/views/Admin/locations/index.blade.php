@extends('admin.layouts.masteradmin')
@section('title', 'Logo Preview')
@section('content')

<div class="wrapper-div">
<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Emirate Management </h2>
  
</div>
<hr>

        
 
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
@endsection
