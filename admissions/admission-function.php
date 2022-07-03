<?php
include 'includes/server/config.php';
if (
    isset($_POST['af_child_name']) &&
    isset($_POST['af_child_gender']) &&
    isset($_POST['af_mother_name']) &&
    isset($_POST['af_mother_contact']) &&
    isset($_POST['af_mother_occupation']) &&
    isset($_POST['af_father_name']) &&
    isset($_POST['af_father_contact']) &&
    isset($_POST['af_father_occupation']) &&
    isset($_POST['af_address']) &&
    isset($_POST['af_distance']) &&
    isset($_POST['af_member_one_name']) &&
    isset($_POST['af_member_one_age']) &&
    isset($_POST['af_member_one_relation']) &&
    isset($_POST['af_member_one_occupation']) &&
    isset($_POST['af_member_two_name']) &&
    isset($_POST['af_member_two_age']) &&
    isset($_POST['af_member_two_relation']) &&
    isset($_POST['af_member_two_occupation']) &&
    isset($_POST['af_member_three_name']) &&
    isset($_POST['af_member_three_age']) &&
    isset($_POST['af_member_three_relation']) &&
    isset($_POST['af_member_three_occupation']) &&
    isset($_POST['af_member_four_name']) &&
    isset($_POST['af_member_four_age']) &&
    isset($_POST['af_member_four_relation']) &&
    isset($_POST['af_member_four_occupation']) &
    isset($_POST['af_emergency_name']) &&
    isset($_POST['af_emergency_contact']) &&
    isset($_POST['af_emergency_relation']) &&
    isset($_POST['af_class'])
) {
    $af_payment_status = "pending";
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
    $af_payment_date = date('Y-m-d h:i:s');
    $af_payment_amount = "500";

    //$af_payment_id = mysqli_real_escape_string($connection, $_POST['af_payment_id']);

    $query = "INSERT INTO admission_form (
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
                                   af_payment_status,
                                   af_payment_date,
                                   af_payment_amount
                                   ) VALUES(
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
                                       '$af_payment_status',
                                       '$af_payment_date',
                                       '$af_payment_amount'
                                        )";
    $result = mysqli_query($connection, $query);
    $_SESSION['OID'] = mysqli_insert_id($connection);

    if (!$result) {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
    } else {
        echo "<div class='alert alert-success mt-3' role='alert'>Form submitted, Payment Pending!</div>";
    }
}

if (
    isset($_POST['af_payment_id']) && isset($_SESSION['OID'])
) {
    $af_payment_status = "complete";
    $af_payment_id = mysqli_real_escape_string($connection, $_POST['af_payment_id']);
    $query = "UPDATE admission_form SET af_payment_status='$af_payment_status', af_payment_id='$af_payment_id' WHERE af_id ='" . $_SESSION['OID'] . "' ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
    } else {
        echo "<div class='alert alert-success mt-3' role='alert'>Form submitted, Payment Pending!</div>";
    }
}