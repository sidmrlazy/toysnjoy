<div class="container input-data-form mt-5 mb-5">
    <div class="section-heading">
        <h5>Edit Student</h5>
        <p>Update details below to edit Student data</p>
    </div>
    <?php
    require_once 'config/db.php';

    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = 0;
    }

    echo "STUDENT ID: " . $student_id;
    if (isset($_POST['update'])) {


        // $student_first_name = $_POST['student_first_name'];
        // $student_last_name = $_POST['student_last_name'];
        // $student_age = $_POST['student_age'];
        // $student_class = $_POST['student_class'];
        // $student_father_name = $_POST['student_father_name'];
        // $student_father_contact = $_POST['student_father_contact'];
        // $student_father_occupation = $_POST['student_father_occupation'];
        // $student_mother_name = $_POST['student_mother_name'];
        // $student_mother_contact = $_POST['student_mother_contact'];
        // $student_mother_occupation = $_POST['student_mother_occupation'];
        // $student_fee_structure = $_POST['student_fee_structure'];
        // $student_gross_fee = $_POST['student_gross_fee'];
        // $total_fee = $student_gross_fee * $student_fee_structure;
        // $student_total_fee = $total_fee;
        // $generated_login_id = "TNJ" . $_POST['student_login_id'];
        // $student_login_id = $generated_login_id;
        // $student_added_by = $user_id;

        // $search_student_query = "SELECT * FROM `student_data` WHERE student_id = $student_login_id";
        // $search_student_result = mysqli_query($connection, $search_student_query);

        while ($row = mysqli_fetch_assoc($search_student_result)) {
            $student_login_id_db = $row['student_login_id'];
            $student_first_name = $row['student_first_name']; ?>
    <form method="POST" action="">

        <div class="form-floating mb-3">
            <input name="student_first_name" type="text" class="form-control" id="firstName" placeholder="First Name">
            <label for="floatingInput"><?php echo $student_first_name; ?></label>
        </div>
        <div class="form-floating mb-3">
            <input name="student_last_name" type="text" class="form-control" id="lastName" placeholder="Last Name">
            <label for="floatingInput">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="student_age" type="number" class="form-control" id="studentAge" placeholder="Student Age">
            <label for="floatingInput">Student Age</label>
        </div>
        <div class="form-floating mb-3">
            <select name="student_class" class="form-select" id="fetchClasses"
                aria-label="Floating label select example">
                <option selected>Open this menu</option>
                <?php
                        require_once('config/db.php');
                        $fetch_class = "SELECT * FROM `classes`";
                        $fetch_result = mysqli_query($connection, $fetch_class);
                        while ($row = mysqli_fetch_assoc($fetch_result)) {
                            $class_name = $row['class_name']; ?>
                <option name="student_class" value="<?php echo $class_name; ?>"><?php echo $class_name; ?></option>
                <?php
                        } ?>
            </select>
            <label for="floatingSelect">For class</label>
        </div>

        <div class="d-flex mb-3">
            <div class="form-floating col-md-4">
                <input name="student_father_name" type="text" class="form-control" id="fathersName"
                    placeholder="Father's Name">
                <label for="floatingInput">Father's Name</label>
            </div>
            <div class="form-floating col-md-4">
                <input name="student_father_contact" type="number" class="form-control" id="fathersContact"
                    placeholder="Father's Contact">
                <label for="floatingInput">Father's Mobile Number</label>
            </div>
            <div class="form-floating col-md-4">
                <select name="student_father_occupation" class="form-select" id="fathersOccupation"
                    aria-label="Floating label select example">
                    <option selected>Open this menu</option>
                    <option name="student_father_occupation" value="Service">Service</option>
                    <option name="student_father_occupation" value="Business">Business</option>
                </select>
                <label for="floatingSelect">Occupation</label>
            </div>
        </div>

        <div class="d-flex mb-3">
            <div class="form-floating col-md-4">
                <input name="student_mother_name" type="text" class="form-control" id="mothersName"
                    placeholder="Mother's Name">
                <label for="floatingInput">Mother's Name</label>
            </div>
            <div class="form-floating col-md-4">
                <input name="student_mother_contact" type="number" class="form-control" id="mothersContact"
                    placeholder="Mother's Contact">
                <label for="mothersContactLabel">Mother's Mobile Number</label>
            </div>
            <div class="form-floating col-md-4">
                <select name="student_mother_occupation" class="form-select" id="mothersOccupation"
                    aria-label="Floating label select example">
                    <option selected>Open this menu</option>
                    <option name="student_mother_occupation" value="Service">Service</option>
                    <option name="student_mother_occupation" value="Business">Business</option>
                </select>
                <label for="mothersOccupationLabel">Occupation</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <select name="student_fee_structure" class="form-select" id="firstNum"
                aria-label="Floating label select example">
                <option name="student_fee_structure" selected>Open this menu</option>
                <option name="student_fee_structure" value="1" id="firstNum">Monthly</option>
                <option name="student_fee_structure" value="3" id="firstNum">Quarterly</option>
                <option name="student_fee_structure" value="6" id="firstNum">Half Yearly</option>
                <option name="student_fee_structure" value="12" id="firstNum">Yearly</option>
            </select>
            <label for="floatingSelect">Fee Structure</label>
        </div>

        <script>
        function multiply() {
            num1 = document.getElementById("firstNum").value;
            num2 = document.getElementById("secondNum").value;
            document.getElementById("result").innerHTML = num1 * num2;
            console.log(document.getElementById("result").innerHTML = num1 * num2);
        }
        </script>

        <div class="d-flex mb-3">
            <div class="form-floating col-md-6">
                <input name="student_gross_fee" type="number" class="form-control" id="secondNum" oninput="multiply()"
                    placeholder="Set Fee">
                <label for="feeSetLabel">Set Fee (in ₹)</label>
            </div>
            <div class="form-floating col-md-6">
                <input name="student_total_fee" type="number" value="student_total_fee" readonly class="form-control"
                    placeholder="Total Payable Fee">
                <label id="result">Total Payable Fee</label>
            </div>
        </div>


        <div class="form-floating mb-3">
            <input name="student_login_id" maxlength="4" type="text" class="form-control" id="floatingPassword"
                placeholder="Mobile Number">
            <label for="floatingPassword">Enter the last 4 Digits of Parent's Mobile Number to generate Student
                ID</label>
        </div>

        <button type="submit" name="submit" class="btn confirm-button">ADD STUDENT</button>

    </form>
    <?php
        }
    }
    ?>

</div>