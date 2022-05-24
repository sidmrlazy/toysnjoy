<!-- <button id="rzp-button1">Pay</button> -->

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<!-- <script>
var options = {
    "key": "rzp_test_s5SlTgzdGzKQT9", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https:toysnjoy.in/assets/images/logo/logo.png",
    "handler": function(response) {
        console.log(response);
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#eb4634"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function(response) {
    alert(response.error.code);
    alert(response.error.description);
    alert(response.error.source);
    alert(response.error.step);
    alert(response.error.reason);
    alert(response.error.metadata.order_id);
    alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
}
</script> -->