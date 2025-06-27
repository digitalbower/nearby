@extends('vendor.layouts.master')
@section('title', 'Booking History')
@section('content')
<!-- Main Content -->
<main class="flex-1  space-y-6">
<!-- Header -->
@if (session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif

<div class="md:px-6 px-2 pb-10 h-[100%]">
    <div class="p-3 mb-4 md:mb-0 bg-white md:bg-transparent flex items-center justify-between md:justify-start">
        <a href="javascript:void(0);"><img src="{{asset('images/admin-logo.svg')}}" class="max-w-[180px] md:hidden" alt="" srcset=""></a>
        <a href="javascript:void(0);" class="inline-block sidemenu_btn p-3 text-xl"><i class="fa-solid fa-bars"></i></a>
    </div>
    <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Booking History</h1>
    <div class="overflow-hidden rounded-lg shadow-lg border bg-white">
        <div class="relative w-full overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                    <tr class="whitespace-nowrap">
                        <th class="px-6 py-3">Booking ID</th>
                        <th class="px-6 py-3">Product Name</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Check In Date</th>
                        <th class="px-6 py-3">Check Out Date</th>
                        <th class="px-6 py-3">Customer Name</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($booking_items as $booking_item)
                        <tr class="hover:bg-gray-50 whitespace-nowrap">
                            <td class="px-6 py-4 font-medium text-gray-900">{{$booking_item->bookingConfirmation->booking_id}}</td>
                            <td class="px-6 py-4">{{$booking_item->variant->product->name}}</td>
                            <td class="px-6 py-4">{{$booking_item->quantity}}</td>
                            <td class="px-6 py-4">{{$booking_item->bookingConfirmation->created_at->format('Y-m-d')}}</td>
                            <td class="px-6 py-4">{{$booking_item->check_in_date}}</td>
                            <td class="px-6 py-4">{{$booking_item->check_out_date}}</td><td class="px-6 py-4">{{$booking_item->bookingConfirmation->user->first_name}}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                    {{$booking_item->verification_status}}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Repeat for more rows -->
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
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $(".sidemenu_btn").click(function(){
        $(".vendor-sidebar").toggleClass("active");
    });

    $(".close_sidemenu_btn").click(function(){
        $(".vendor-sidebar").removeClass("active");
    });
});
</script>