@extends('vendor.layouts.master')
@section('title', 'Booking Management')
@section('content')
<!-- Main Content -->
<main class="flex-1  space-y-6">
<!-- Header -->
@if(session('success'))
      <div x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show" 
            class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300 flex justify-between items-center">
          <span>{{ session('success') }}</span>
          <button @click="show = false" class="text-green-700 hover:text-green-900">&times;</button>
      </div>
  @endif
@if(session('error'))
    <div x-data="{ show: true }" 
         x-show="show" 
         class="mb-4 p-4 rounded-md bg-red-100 text-red-800 border border-red-300 flex justify-between items-center">
        <span>{{ session('error') }}</span>
        <button @click="show = false" class="text-red-700 hover:text-red-900">&times;</button>
    </div>
@endif


<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Booking Management</h1>
    <div class="overflow-hidden rounded-lg shadow-lg border bg-white">
        <div class="relative w-full overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-3">Booking ID</th>
                        <th class="px-6 py-3">Product Name</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Customer Name</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($booking_items as $booking_item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{$booking_item->bookingConfirmation->booking_id}}</td>
                            <td class="px-6 py-4">{{$booking_item->variant->product->name}}</td>
                            <td class="px-6 py-4">{{$booking_item->quantity}}</td>
                            <td class="px-6 py-4">{{$booking_item->bookingConfirmation->created_at->format('Y-m-d')}}</td>
                            <td class="px-6 py-4">{{$booking_item->bookingConfirmation->user->first_name}}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                    {{$booking_item->bookingConfirmation->booking_status}}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button
                                    class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none"
                                    onclick="openModal(
                                        {{ json_encode($booking_item->id) }}, 
                                        {{ json_encode($booking_item->bookingConfirmation->booking_id) }}, 
                                        {{ json_encode($booking_item->variant->product->name ?? 'N/A') }}, 
                                        {{ json_encode($booking_item->bookingConfirmation->user->first_name ?? 'N/A') }}, 
                                        {{ json_encode($booking_item->bookingConfirmation->created_at->format('Y-m-d')) }}
                                    )">
                                    Approve
                                </button>
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

    <!-- OTP Modal -->
    <div id="otp-modal"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div
            class="relative bg-white rounded-2xl shadow-lg w-full max-w-md p-8 space-y-6 transform transition-all duration-300 scale-100">
            <!-- Close Icon -->
            <button
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-full"
                onclick="closeModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Title -->
            <h2 class="text-2xl font-semibold text-gray-900 tracking-tight">Approve Booking</h2>
            <form action="{{route('vendor.approve_booking')}}"id="approveBookingForm" method="POST" class="space-y-5">
                @csrf
                <!-- Booking Details -->
                <div class="space-y-4 text-sm text-gray-700">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Booking ID:</span>
                        <span id="modal-booking-id" class="text-gray-800 font-semibold">#12345</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Product Name:</span>
                        <span id="modal-product-name" class="text-gray-800 font-semibold">Premium Plan</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Customer Name:</span>
                        <span id="modal-customer-name" class="text-gray-800 font-semibold">John Doe</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Date:</span>
                        <span id="modal-date" class="text-gray-800 font-semibold">Jan 12, 2025</span>
                    </div>
                </div>


                @if ($errors->any())
                    <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="otp-error-box" class="mb-2"></div>

                <!-- OTP Input -->
                <div class="space-y-5">
                    <input type="hidden" id="modal-booking-confirmation-item-id" name="booking_confirmation_item_id">
                    <label for="otp" class="block text-sm font-medium text-gray-600 mb-2">Enter OTP</label>
                    <input type="text" id="otp" name="verification_number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        placeholder="Enter OTP">
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-4">
                    <button type="button"  onclick="closeModal()"
                        class="px-5 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 shadow-md transition">
                        Cancel 
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 shadow-md transition">
                        Approve
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>
</main>
@endsection
@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#approveBookingForm').submit(function (e) {
        let isValid = true;
        let otp = $('#otp').val().trim();

        // Reset previous error state
        $('#otp-error-box').html('');
        $('#otp').removeClass('border-red-500');

        // Check if OTP is empty
        if (otp === '') {
            isValid = false;
            $('#otp').addClass('border-red-500');
            $('#otp-error-box').html(`
                <div class="px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
                    OTP is required.
                </div>
            `);
        }

        if (!isValid) {
            e.preventDefault(); // prevent form from submitting
        }
    });

    // Clear error on typing
    $('#otp').on('input', function () {
        $(this).removeClass('border-red-500');
        $('#otp-error-box').html('');
    });
});
</script>
<script>
    function openModal(id,bookingId, productName, customerName, date) {
        document.getElementById('modal-booking-confirmation-item-id').value = id;
        document.getElementById('modal-booking-id').textContent = bookingId;
        document.getElementById('modal-product-name').textContent = productName;
        document.getElementById('modal-customer-name').textContent = customerName;
        document.getElementById('modal-date').textContent = date;
        document.getElementById('otp-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('otp-modal').classList.add('hidden');
    }
</script>

@endpush