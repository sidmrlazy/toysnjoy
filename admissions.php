<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<div class="container admission-section">
    <h1>Admission Form</h1>
    <p>Fill this form below to give your child the best start with educational journey</p>

    <form action="" method="POST" class="admission-form">
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
        ?>
        <div class="form-row">
            <div class="col-md-6 m-2 form-floating mb-3">
                <input name="af_child_name" type="text" class="form-control" id="af_child_name"
                    placeholder="Child's Name">
                <label class="form-label" for="floatingInput">Name of Child</label>
            </div>

            <div class="col-md-6 m-2 form-floating mb-3">
                <select name="af_child_gender" class="form-select form-dropdown-option" id="af_child_gender"
                    aria-label="Floating label select example">
                    <option name="af_child_gender" value="none" class="form-dropdown-option">Click here for options
                    </option>
                    <option name="af_child_gender" class="form-dropdown-option" value="Male">Male</option>
                    <option name="af_child_gender" class="form-dropdown-option" value="Female">female</option>
                </select>
                <label class="form-label" for="floatingSelectAdmissions">Gender</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 form-floating mb-3">
                <input name="af_mother_name" type="text" class="form-control" id="af_mother_name"
                    placeholder="Mother's Name">
                <label class="form-label" for="floatingInput">Mother's Name</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
                <input name="af_mother_contact" type="number" class="form-control" id="af_mother_contact"
                    placeholder="+91 XXXXX XXXXX">
                <label class="form-label" for="floatingInput">Mother's Contact No.</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
                <input name="af_mother_occupation" type="text" class="form-control" id="af_mother_occupation"
                    placeholder="Occupation">
                <label class="form-label" for="floatingInput">Mother's Occupation</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 form-floating mb-3">
                <input name="af_father_name" type="text" class="form-control" id="af_father_name"
                    placeholder="Father's Name">
                <label class="form-label" for="floatingInput">Father's Name</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
                <input name="af_father_contact" type="number" class="form-control" id="af_father_contact"
                    placeholder="Father's Contact">
                <label class="form-label" for="floatingInput">Father's Contact No.</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
                <input name="af_father_occupation" type="text" class="form-control" id="af_father_occupation"
                    placeholder="Occupation">
                <label class="form-label" for="floatingInput">Father's Occupation</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 form-floating w-100">
                <textarea name="af_address" class="form-control" placeholder="Leave a comment here" id="af_address"
                    style="height: 100px"></textarea>
                <label class="form-label" for="floatingTextarea2">Current Address</label>
            </div>
        </div>

        <div class="form-row ">
            <div class="col-md-12 m-2 form-floating mb-3">
                <input name="af_distance" type="number" class="form-control" id="af_distance"
                    placeholder="Ditance in Kms">
                <label class="form-label" for="floatingInput">Distance of Home in KMS from School:</label>
            </div>
        </div>

        <div class="form-row table-responsive w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th class="form-label" scope="col">Name of other members in family</th>
                        <th class="form-label" scope="col">Age</th>
                        <th class="form-label" scope="col">Relationship</th>
                        <th class="form-label" scope="col">Occupation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_one_name" type="text" class="form-control"
                                    id="af_member_one_name" placeholder="Member 1">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_one_age" type="number" class="form-control"
                                    id="af_member_one_age" placeholder="Age">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_one_relation" type="text" class="form-control"
                                    id="af_member_one_relation" placeholder="Relationship">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_one_occupation" type="text" class="form-control"
                                    id="af_member_one_occupation" placeholder="Occupation">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_two_name" type="text" class="form-control"
                                    id="af_member_two_name" placeholder="Member 2">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_two_age" type="number" class="form-control"
                                    id="af_member_two_age" placeholder="Age">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_two_relation" type="text" class="form-control"
                                    id="af_member_two_relation" placeholder="Relationship">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_two_occupation" type="text" class="form-control"
                                    id="af_member_two_occupation" placeholder="Occupation">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_three_name" type="text" class="form-control"
                                    id="af_member_three_name" placeholder="Member 3">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_three_age" type="number" class="form-control"
                                    id="af_member_three_age" placeholder="Age">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_three_relation" type="text" class="form-control"
                                    id="af_member_three_relation" placeholder="Relationship">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_three_occupation" type="text" class="form-control"
                                    id="af_member_three_occupation" placeholder="Occupation">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_four_name" type="text" class="form-control"
                                    id="af_member_four_name" placeholder="Member 4">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_four_age" type="number" class="form-control"
                                    id="af_member_four_age" placeholder="Age">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_four_relation" type="text" class="form-control"
                                    id="af_member_four_relation" placeholder="Relationship">
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12 m-2 mb-3">
                                <input name="af_member_four_occupation" type="text" class="form-control"
                                    id="af_member_four_occupation" placeholder="Occupation">
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="form-row">
            <div class="col-md-4 form-floating mb-3">
                <input name="af_emergency_name" type="text" class="form-control" id="af_emergency_name"
                    placeholder="Emergency Contact Name">
                <label class="form-label" for="floatingInput">Emergency Contact Name</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
                <input name="af_emergency_relation" type="text" class="form-control" id="af_emergency_relation"
                    placeholder="Relationship">
                <label class="form-label" for="floatingInput">Relationship</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
                <input name="af_emergency_contact" type="number" class="form-control" id="af_emergency_contact"
                    placeholder="Contact">
                <label class="form-label" for="floatingInput">Contact Number</label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <select name="af_class" class="form-select form-dropdown-option" id="af_class"
                aria-label="Floating label select example">
                <option name="af_class" class="form-dropdown-option">Click here for options</option>
                <option name="af_class" class="form-dropdown-option" value="Daycare">Daycare</option>
                <option name="af_class" class="form-dropdown-option" value="Play Group">Play Group
                </option>
                <option name="af_class" class="form-dropdown-option" value="Nursery">Nursery</option>
                <option name="af_class" class="form-dropdown-option" value="Kindergarten">Kindergarten
                </option>
                <option name="af_class" class="form-dropdown-option" value="Upper KG">Upper KG</option>
                <option name="af_class" class="form-dropdown-option" value="School Readiness Program">
                    School
                    Readiness Program
                </option>
            </select>
            <label class="form-label" for="floatingSelectAdmissions">Seeking Admission to</label>
        </div>

        <input onclick="pay_now()" type="button" class="admission-btn btn mt-3" value="submit" name="btn" />
    </form>

</div>
<?php //include('admissions/admission-form.php') 
?>
<?php include('includes/footer.php') ?>