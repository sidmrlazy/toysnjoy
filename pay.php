<?php
$final_order_id = '0';
include 'includes/server/config.php';
require('razorpay/src/Api.php');
require('razorpay/Razorpay.php');
session_start();

use Razorpay\Api\Api;

if (!empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo $user_id;
} else {
    $user_id = 0;
    echo $user_id;
}
if (isset($_POST["submit"])) {
    $af_child_name = mysqli_real_escape_string($connection, $_POST['af_child_name']);
    $af_child_gender = mysqli_real_escape_string($connection, $_POST['af_child_gender']);
    $af_mother_name = mysqli_real_escape_string($connection, $_POST['af_mother_name']);
    $af_mother_contact = mysqli_real_escape_string($connection, $_POST['af_mother_contact']);
    $af_mother_occupation = mysqli_real_escape_string($connection, $_POST['af_mother_occupation']);
    $af_father_name = mysqli_real_escape_string($connection, $_POST['af_father_name']);
    $af_father_contact = mysqli_real_escape_string($connection, $_POST['af_father_contact']);
    $af_father_occupation = mysqli_real_escape_string($connection, $_POST['af_father_occupation']);
    $af_address = mysqli_real_escape_string($connection, $_POST['af_address']);
    $af_distance = mysqli_real_escape_string($connection, $_POST['af_distance']);
    $af_member_one_name = mysqli_real_escape_string($connection, $_POST['af_member_one_name']);
    $af_member_one_age = mysqli_real_escape_string($connection, $_POST['af_member_one_age']);
    $af_member_one_relation = mysqli_real_escape_string($connection, $_POST['af_member_one_relation']);
    $af_member_one_occupation = mysqli_real_escape_string($connection, $_POST['af_member_one_occupation']);
    $af_member_two_name = mysqli_real_escape_string($connection, $_POST['af_member_two_name']);
    $af_member_two_age = mysqli_real_escape_string($connection, $_POST['af_member_two_age']);
    $af_member_two_relation = mysqli_real_escape_string($connection, $_POST['af_member_two_relation']);
    $af_member_two_occupation = mysqli_real_escape_string($connection, $_POST['af_member_two_occupation']);
    $af_member_three_name = mysqli_real_escape_string($connection, $_POST['af_member_three_name']);
    $af_member_three_age = mysqli_real_escape_string($connection, $_POST['af_member_three_age']);
    $af_member_three_relation = mysqli_real_escape_string($connection, $_POST['af_member_three_relation']);
    $af_member_three_occupation = mysqli_real_escape_string($connection, $_POST['af_member_three_occupation']);
    $af_member_four_name = mysqli_real_escape_string($connection, $_POST['af_member_four_name']);
    $af_member_four_age = mysqli_real_escape_string($connection, $_POST['af_member_four_age']);
    $af_member_four_relation = mysqli_real_escape_string($connection, $_POST['af_member_four_relation']);
    $af_member_four_occupation = mysqli_real_escape_string($connection, $_POST['af_member_four_occupation']);
    $af_emergency_name = mysqli_real_escape_string($connection, $_POST['af_emergency_name']);
    $af_emergency_contact = mysqli_real_escape_string($connection, $_POST['af_emergency_contact']);
    $af_emergency_relation = mysqli_real_escape_string($connection, $_POST['af_emergency_relation']);
    $af_class = mysqli_real_escape_string($connection, $_POST['af_class']);
    $af_payment_status = '0';
    $af_payment_amount = '1';

    $query = "INSERT INTO `admission_form` ( 
        af_child_name,
        af_child_gender,
        af_mother_name,
        af_mother_contact,
        af_mother_occupation,
        af_father_name,
        af_father_contact,
        af_father_occupation,
        af_address,
        af_distance,
        af_member_one_name,
        af_member_one_age,
        af_member_one_relation,
        af_member_one_occupation,
        af_member_two_name,
        af_member_two_age,
        af_member_two_relation,
        af_member_two_occupation,
        af_member_three_name,
        af_member_three_age,
        af_member_three_relation,
        af_member_three_occupation,
        af_member_four_name,
        af_member_four_age,
        af_member_four_relation,
        af_member_four_occupation,
        af_emergency_name,
        af_emergency_contact,
        af_emergency_relation,
        af_class,
        af_payment_amount,
        af_payment_status) 
    VALUES (
        '$af_child_name',
        '$af_child_gender',
        '$af_mother_name',
        '$af_mother_contact',
        '$af_mother_occupation',
        '$af_father_name',
        '$af_father_contact',
        '$af_father_occupation',
        '$af_address',
        '$af_distance',
        '$af_member_one_name',
        '$af_member_one_age',
        '$af_member_one_relation',
        '$af_member_one_occupation',
        '$af_member_two_name',
        '$af_member_two_age',
        '$af_member_two_relation',
        '$af_member_two_occupation',
        '$af_member_three_name',
        '$af_member_three_age',
        '$af_member_three_relation',
        '$af_member_three_occupation',
        '$af_member_four_name',
        '$af_member_four_age',
        '$af_member_four_relation',
        '$af_member_four_occupation',
        '$af_emergency_name',
        '$af_emergency_contact',
        '$af_emergency_relation',
        '$af_class',
        '$af_payment_amount',
        '$af_payment_status');";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $final_order_id  = $order_id = mysqli_insert_id($connection);
        $new_query = "SELECT * FROM `admission_form` WHERE `af_id` = $af_mother_contact";
        $new_result = mysqli_query($connection, $new_query);
        while ($row = mysqli_fetch_array($new_result)) {
            $af_id = $row['af_id'];
        }
        $af_child_gender = $_POST['af_child_gender'];
        $af_mother_contact = $_POST['af_mother_contact'];
        $total_amount = $af_payment_amount;

        $keyId = 'rzp_test_zeDungDg7fYUFp';
        $keySecret = 'Za05LFSAzGhmzKe6enBh2vsm';

        $api = new Api($keyId, $keySecret);

        $orderData = [
            'receipt' => rand(1000, 9999) . 'DRM',
            'amount' => $total_amount * 100,
            'currency' => 'INR',
            'payment_capture' => 1
        ];
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $displayAmount = $amount = $orderData['amount'];
        $data = [
            "key" => $keyId,
            "amount" => $amount,
            "name" => 'Toys N Joy Play School Aliganj',
            "description" => 'Your neighbourhood playschool',
            "image" => "assets/images/logo/logo.png",
            "prefill" => [
                "name" => $af_child_name,
                "email" => 'mona.asthana05@gmail.com',
                "contact" => $af_mother_contact,
            ],
            "theme" => [
                "color" => "#eb4634"
            ],
            "order_id" => $razorpayOrderId,
        ];

        $json = json_encode($data);
    }
} else {
    die("Something Went Wrong!: " . mysqli_error($connection));
}
?>
<?php include('includes/header_without_session.php'); ?>
<?php include('includes/navbar.php'); ?>]
<div class="container mt-5 d-flex justify-content-center align-items-center">
    <button type="submit" name="submit" id="rzp-button1" class="btn btn-primary mb-5">Continue to Pay</button>
</div>
<?php include('includes/footer.php'); ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="success.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="customer_order_id" id="customer_order_id" value="<?php echo $final_order_id; ?>">
</form>
<script>
var options = <?php echo $json ?>
options.handler = function(response) {
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
    document.razorpayform.submit();
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e) {
    rzp.open();
    e.preventDefault();
}
</script>