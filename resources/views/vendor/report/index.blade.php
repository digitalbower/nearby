@extends('vendor.layouts.master')
@section('title', 'Report Management')
@section('content')
    <!-- Main Content -->
    <main class="flex-1  space-y-6">
        <!-- Header -->


        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-8">Report Management</h1>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left"><i class="fas fa-hashtag mr-2"></i>Booking ID</th>
                                <th class="py-3 px-6 text-left"><i class="fas fa-box mr-2"></i>Product Name</th>
                                <th class="py-3 px-6 text-center"><i class="fas fa-sort-amount-up mr-2"></i>Quantity
                                </th>
                                <th class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Date</th>
                                <th class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($booking_items as $booking_item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <span class="font-medium">{{$booking_item->bookingConfirmation->booking_id}}</span>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <span>{{$booking_item->variant->product->name}}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span
                                            class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{$booking_item->quantity}}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>{{ $booking_item->bookingConfirmation->created_at->format('Y-m-d') }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="{{ route('vendor.report.download_pdf', $booking_item->id) }}"
                                            class="blue-card text-white py-1 px-3 rounded-full text-xs hover:bg-secondary transition duration-300 ease-in-out"
                                            target="_blank">
                                            <i class="fas fa-download mr-1"></i>Download
                                         </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $booking_items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection