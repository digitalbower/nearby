@extends('admin.layouts.masteradmin')

@section('title', 'Commission')

<style>
.commission-listing-wrapper .table tr th {
    white-space: nowrap;
}

.commission-listing-wrapper .card .card-body{
    -webkit-box-shadow: 2px 6px 15px 0 rgba(69, 65, 78, .1);
    -moz-box-shadow: 2px 6px 15px 0 rgba(69,65,78,.1);
    box-shadow: 2px 6px 15px 0 rgba(69, 65, 78, .1);
}
</style>

@section('content')
<div class="commission-listing-wrapper">
    <div class="card bg-transparent p-3 mb-0 shadow-none">
        <div class="card-body bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Commission Listing</h4>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.commission.export') }}" class="btn btn-success">Download Excel</a>
                </div>
            </div>
            <div class="table-responsive">
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
                                $qty = $item->quantity;
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
        </div>
    </div>
</div>
@endsection
