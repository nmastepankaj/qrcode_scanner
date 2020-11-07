<?php

$api_key = "rzp_test_3MHbAFmeiBZTLX";


if(isset($_POST['proceed_to_pay'])){
    $name = $_POST['name'];
    $price = $_POST["price"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
}
?>

<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?php echo $api_key;?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $price*100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "id": "1", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "<?php echo $name ?>",
        "email": "<?php echo $email ?>",
        "contact": "<?php echo $mobile ?>"
    },
    "notes": {
        "address": "<?php echo $address ?>"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
   
}
</script>