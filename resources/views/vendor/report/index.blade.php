@extends('vendor.layouts.master')
@section('title', 'Report Management')
@section('content')
    <!-- Main Content -->
    <main class="flex-1  space-y-8">
        <!-- Header -->
        <div class="md:px-6 px-2 pb-10 h-[100%]">
            <div class="p-3 mb-4 md:mb-0 bg-white md:bg-transparent flex items-center justify-between md:justify-start">
                <a href="javascript:void(0);"><img src="{{asset('images/admin-logo.svg')}}" class="max-w-[180px] md:hidden" alt="" srcset=""></a>
                <a href="javascript:void(0);" class="inline-block sidemenu_btn p-3 text-xl"><i class="fa-solid fa-bars"></i></a>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-8">Report Management</h1>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                                <th scope="col" class="py-3 px-6 text-left"><i class="fas fa-hashtag mr-2"></i>Booking ID</th>
                                <th scope="col" class="py-3 px-6 text-left"><i class="fas fa-box mr-2"></i>Product Name</th>
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-box mr-2"></i>Product Variant</th>
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-sort-amount-up mr-2"></i>Quantity</th>
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Booked Date</th>
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Customer Name</th>
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Redeemed Date</th>
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Expiry Date</th> 
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Check In  Date</th> 
                                <th scope="col" class="py-3 px-6 text-center"><i class="fas fa-calendar-alt mr-2"></i>Check Out Date</th> 
                                <th scope="col" class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($booking_items as $booking_item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td scope="row" class="py-3 px-6 text-left whitespace-nowrap">
                                    <span class="font-medium">{{$booking_item->bookingConfirmation->booking_id}}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{$booking_item->variant?->product?->name}}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{$booking_item->variant?->title}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{$booking_item->quantity}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $booking_item->bookingConfirmation->created_at->format('Y-m-d') }}</span>
                                </td>
                                    <td class="py-3 px-6 text-center">
                                    <span>{{ $booking_item->bookingConfirmation?->user?->first_name }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $booking_item->redeemed_date }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $booking_item->validity }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $booking_item->check_in_date }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $booking_item->check_out_date }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <a href="{{ route('vendor.report.download_pdf', $booking_item->id) }}"
                                        class="blue-card text-white py-1 px-3 rounded-full text-xs hover:bg-secondary transition duration-300 ease-in-out"
                                        target="_blank">
                                        <i class="fas fa-download mr-1"></i>
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