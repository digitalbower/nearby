@extends('vendor.layouts.master')
@section('title', 'Payment Management')
@section('content')
    <!-- Main Content -->
    <main class="flex-1  space-y-6">
        <div class="md:px-6 px-2 pb-10 h-[100%]">
            <a href="javascript:void(0);" class="inline-block sidemenu_btn p-3 text-xl"><i class="fa-solid fa-bars"></i></a>
            <h1 class="text-2xl font-bold text-gray-800 mb-8">Payment Management</h1>

            <div class="bg-white rounded-lg shadow-lg w-full">
                <div class="">
                    <table id="paymentTable" class=" overflow-x-auto w-[600px] sm:w-full table-auto text-left border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th onclick="sortTable(0)" class="py-3 px-4 text-indigo-700 font-semibold cursor-pointer hover:bg-gray-200">
                                    <i class="fas fa-sort mr-2"></i> Booking ID
                                </th>
                                <th onclick="sortTable(1)" class="py-3 px-4 text-indigo-700 font-semibold cursor-pointer hover:bg-gray-200">
                                    <i class="fas fa-sort mr-2"></i> Amount
                                </th>
                                <th onclick="sortTable(2)" class="py-3 px-4 text-indigo-700 font-semibold cursor-pointer hover:bg-gray-200">
                                    <i class="fas fa-sort mr-2"></i> Date
                                </th>
                                <th onclick="sortTable(3)" class="py-3 px-4 text-indigo-700 font-semibold cursor-pointer hover:bg-gray-200">
                                    <i class="fas fa-sort mr-2"></i> Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4" data-label="Booking ID">{{$booking->booking_id}}</td>
                                <td class="py-3 px-4" data-label="Amount">AED {{$booking->payment->total_amount}}</td>
                                <td class="py-3 px-4" data-label="Date">{{$booking->payment->created_at->format('Y-m-d')}}</td>
                                <td class="py-3 px-4" data-label="Status">
                                    @if($booking->payment->payment_status == "completed")
                                        <span class="inline-flex items-center py-1 px-3 rounded-full bg-green-100 text-green-700 font-semibold">
                                            <i class="fas fa-check-circle mr-1"></i> Paid
                                        </span>
                                    @elseif ($booking->payment->payment_status == "pending")
                                        <span class="inline-flex items-center py-1 px-3 rounded-full bg-yellow-100 text-yellow-700 font-semibold">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @elseif ($booking->payment->payment_status == "failed")
                                        <span class="inline-flex items-center py-1 px-3 rounded-full bg-red-100 text-red-700 font-semibold">
                                            <i class="fas fa-times-circle mr-1"></i> Cancelled
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $bookings->links() }}
                    </div>
                </div>
                

                

            </div>
        </div>

    </main>
@endsection
@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("paymentTable");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    
    $(document).ready(function(){
        $(".sidemenu_btn").click(function(){
            $(".vendor-sidebar").toggleClass("active");
        });
        
        $(".close_sidemenu_btn").click(function(){
            $(".vendor-sidebar").removeClass("active");
        });
    });
</script>
@endpush