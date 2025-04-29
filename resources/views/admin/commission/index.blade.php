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
            </tr>
        </thead>
        <tbody>
            @foreach ($productVariants as $variant)
                @php
                    $qty = 1;
                    $agreementPrice = $variant->agreement_unit_price;
                    $sellingPrice = $variant->unit_price;
                    $markup = $sellingPrice - $agreementPrice;
                    $commissionPercent = $variant->product->category->commission ?? 0;
                    $commissionableAmount = $markup;
                    $commission = $commissionableAmount * $commissionPercent;
                @endphp

                <tr>
                    <td>{{ $variant->product->name ?? '-' }}</td>
                    <td>{{ $variant->title }}</td>
                    <td>{{ $qty }}</td>
                    <td>{{ number_format($agreementPrice, 2) }}</td>
                    <td>{{ number_format($sellingPrice, 2) }}</td>
                    <td>{{ number_format($markup, 2) }}</td>
                    <td>{{ $variant->product->category->name ?? '-' }}</td>
                    <td>{{ number_format($commissionPercent, 2) }}</td>
                    <td>{{ number_format($commissionableAmount, 2) }}</td>
                    <td>{{ number_format($commission, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
