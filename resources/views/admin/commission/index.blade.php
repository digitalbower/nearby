@extends('admin.layouts.masteradmin')

@section('title', 'Commission')

<style>
.commission-listing-wrapper .table tr th {
    white-space: nowrap;
}
.commission-listing-wrapper .card .card-body {
    box-shadow: 2px 6px 15px 0 rgba(69, 65, 78, .1);
}
</style>

@section('content')
<div class="commission-listing-wrapper">
    <div class="card bg-transparent p-3 mb-0 shadow-none">
        <div class="card-body bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Commission Listing</h4>
                 @if(auth()->guard('admin')->user()->hasPermission('download_commission'))
                <a href="{{ route('admin.commission.export') }}" class="btn btn-success">Download Excel</a>
                 @endif
            </div>

            {{-- Filter Fields --}}
            <div class="row g-3 mt-3 mb-4" id="filter-form">
                <div class="col-md-3">
                    <label for="from_date">From Date</label>
                    <input type="date" id="from_date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="to_date">To Date</label>
                    <input type="date" id="to_date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="sales_person_input">Sales Person</label>
                    <input type="text" id="sales_person_input" class="form-control" placeholder="Type name...">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-primary me-2" onclick="filterTable()">Filter</button>
                    <button class="btn btn-secondary" onclick="resetFilters()">Reset</button>
               
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table id="commission-table" class="table table-bordered table-striped">
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
                                $agreementPrice = $item->variant?->agreement_unit_price ?? 0;
                                $sellingPrice = $item->variant?->unit_price ?? 0;
                                $markup = $item->variant?->markup ?? 0;
                                $commissionPercent = $item->variant?->product?->category?->commission ?? 0;
                                $commissionableAmount = $sellingPrice - $agreementPrice;
                                $commission = ($commissionableAmount * $commissionPercent) / 100;
                            @endphp
                            <tr>
                                <td>{{ $item->variant?->product?->name ?? '-' }}</td>
                                <td>{{ $item->variant?->title ?? '-' }}</td>
                                <td>{{ $qty }}</td>
                                <td>{{ number_format($agreementPrice, 2) }}</td>
                                <td>{{ number_format($sellingPrice, 2) }}</td>
                                <td>{{ number_format($markup) }}</td>
                                <td>{{ $item->variant?->product?->category?->name ?? '-' }}</td>
                                <td>{{ number_format($commissionPercent) }}%</td>
                                <td>{{ number_format($commissionableAmount, 2) }}</td>
                                <td>{{ number_format($commission, 2) }}</td>
                                <td>{{ $item->verification_status }}</td>
                                <td class="sales_person">{{ $item->sales_person ?? '-' }}</td>
                                <td class="redeemed_date">{{ $item->redeemed_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- JS Filter Script --}}
<script>
function filterTable() {
    let from = document.getElementById('from_date').value;
    let to = document.getElementById('to_date').value;
    let salesPerson = document.getElementById('sales_person_input').value.toLowerCase();

    const rows = document.querySelectorAll('#commission-table tbody tr');

    rows.forEach(row => {
        let redeemedDate = row.querySelector('.redeemed_date')?.innerText;
        let salesName = row.querySelector('.sales_person')?.innerText.toLowerCase();

        let show = true;

        if (from && new Date(redeemedDate) < new Date(from)) show = false;
        if (to && new Date(redeemedDate) > new Date(to)) show = false;
        if (salesPerson && !salesName.includes(salesPerson)) show = false;

        row.style.display = show ? '' : 'none';
    });
}

function resetFilters() {
    document.getElementById('from_date').value = '';
    document.getElementById('to_date').value = '';
    document.getElementById('sales_person_input').value = '';
    filterTable();
}
</script>
@endsection
