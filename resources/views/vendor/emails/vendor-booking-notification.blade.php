<p>Hello {{ $vendorName }},</p>

<p>You have received a new booking (Order #: {{ $orderNumber }}) on {{ $orderDate }}. Here are the details:</p>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Product</th>
            <th>Variant</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Verification Number</th>
            <th>Validity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item['product_name'] }}</td>
                <td>{{ $item['product_variant_name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['total_price'] }}</td>
                <td>{{ $item['verification_number'] }}</td>
                <td>{{ $item['validity_from'] }} to {{ $item['validity_to'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Kindly process the order as per your usual process.</p>

<p>Thanks,<br>The Booking Team</p>
