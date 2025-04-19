<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <h2>Pay with Card</h2>

    <form id="payment-form" method="POST" action="{{ route('user.checkout_booking') }}">
        @csrf
        <div id="card-element"></div>
        <div id="card-errors" style="color: red;"></div>
        <input type="hidden" name="stripeToken" id="stripeToken">
        <button type="submit">Pay</button>
    </form>

    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const { token, error } = await stripe.createToken(card);

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                document.getElementById('stripeToken').value = token.id;
                form.submit();
            }
        });
    </script>
</body>
</html>
