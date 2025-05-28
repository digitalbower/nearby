@extends('admin.layouts.masteradmin')

@section('title', 'Commission')

@section('content')
<div class="container">
    <h4 class="mb-4">Commission Listing</h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Product Variant</th>
                <th>Qty</th>
                <th>Agreement Unit Price</th>
                <th>Selling Unit Price</th>
                <th>Markup</th>
                <th>Category</th>
                <th>Commission %</th>
                <th>Commissionable Amount</th>
                <th>Commission</th>
                <th>Verification Status</th>
                <th>Sales Person</th>
                <th>Redeemed Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
                @php
                    $qty = 1;
                    $agreementPrice = $item->variant?->agreement_unit_price;
                    $sellingPrice = $item->variant?->unit_price;
                    $markup = $item->variant?->markup;
                    $commissionPercent = $item->variant?->product?->category?->commission ?? 0;
                    $commissionableAmount = $sellingPrice - $agreementPrice;
                    $commission = ($commissionableAmount * $commissionPercent)/100;
                @endphp

                <tr> 
                    <td>{{ $item->variant?->product?->name ?? '-' }}</td>
                    <td>{{ $item->variant?->title }}</td>
                    <td>{{ $qty }}</td>
                    <td>{{ number_format($agreementPrice, 2) }}</td>
                    <td>{{ number_format($sellingPrice, 2) }}</td>
                    <td>{{ number_format($markup) }}</td> 
                    <td>{{ $item->variant?->product?->category?->name ?? '-' }}</td>
                    <td>{{ number_format($commissionPercent)}} % </td>
                    <td>{{ number_format($commissionableAmount, 2) }}</td>
                    <td>{{ number_format($commission, 2) }}</td>
                    <td>{{$item->verification_status}}</td>
                    <td>{{$item->variant?->product?->salesPerson?->name}}</td>
                    <td>{{$item->redeemed_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
