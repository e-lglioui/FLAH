
@include('includes.header') 

    <form action="{{ route('process.payment') }}" method="POST">
        @csrf
        <label for="cardholderName">Cardholder's Name</label>
        <input type="text" id="cardholderName" name="cardholderName" required><br>

        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" required><br>

        <label for="expMonth">Expiration Month</label>
        <input type="text" id="expMonth" name="expMonth" required><br>

        <label for="expYear">Expiration Year</label>
        <input type="text" id="expYear" name="expYear" required><br>

        <label for="cvc">CVC</label>
        <input type="text" id="cvc" name="cvc" required><br>

        <button type="submit">Submit Payment</button>
    </form>
