<form action="{{ route('user.stripe.session') }}" method="POST">
    @csrf
    <button type="submit">Confirm Order & Pay</button>
</form>