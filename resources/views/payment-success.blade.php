
@include('includes.header') 

    <h1>Payment Successful</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>Your payment has been processed successfully.</p>
    <!-- You can customize this view further with additional information or a thank you message. -->

