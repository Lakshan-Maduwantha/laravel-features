<form method="POST" action="{{ route('pharmacy.register') }}">
    @csrf
    <input type="text" name="name" placeholder="Pharmacy Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="tel" name="contact_number" placeholder="Contact Number" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>
