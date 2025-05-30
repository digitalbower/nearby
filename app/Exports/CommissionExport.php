<?php

namespace App\Exports;

use App\Models\BookingConfirmationItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class CommissionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BookingConfirmationItem::with(['variant.product.category', 'variant.product.salesPerson'])
            ->where('verification_status','redeemed')
            ->get()
            ->map(function ($item) {
                $agreementPrice = $item->variant?->agreement_unit_price ?? 0;
                $sellingPrice = $item->variant?->unit_price ?? 0;
                $markup = $item->variant?->markup ?? 0;
                $commissionPercent = $item->variant?->product?->category?->commission ?? 0;
                $commissionableAmount = $sellingPrice - $agreementPrice;
                $commission = ($commissionableAmount * $commissionPercent) / 100;

                return [
                    'Product' => $item->variant?->product?->name ?? '-',
                    'Product Variant' => $item->variant?->title ?? '-',
                    'Qty' => $item->quantity,
                    'Agreement Unit Price' => $agreementPrice,
                    'Selling Unit Price' => $sellingPrice,
                    'Markup' => $markup,
                    'Category' => $item->variant?->product?->category?->name ?? '-',
                    'Commission %' => $commissionPercent,
                    'Commissionable Amount' => $commissionableAmount,
                    'Commission' => $commission,
                    'Verification Status' => $item->verification_status,
                    'Sales Person' => $item->variant?->product?->salesPerson?->name ?? '-',
                    'Redeemed Date' => $item->redeemed_date,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Product',
            'Product Variant',
            'Qty',
            'Agreement Unit Price',
            'Selling Unit Price',
            'Markup',
            'Category',
            'Commission %',
            'Commissionable Amount',
            'Commission',
            'Verification Status',
            'Sales Person',
            'Redeemed Date',
        ];
    }
}
