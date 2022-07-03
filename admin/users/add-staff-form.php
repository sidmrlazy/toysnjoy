<div class="container input-data-form mt-5 mb-5">
    <div class="section-heading">
        <h5>Add Staff</h5>
        <p>Enter details below to generate Staff ID</p>
    </div>
    <?php
    require_once 'config/db.php';

    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = 0;
    }

    if (isset($_POST['submit'])) {
        $generated_staff_id = "TNJ" . $_POST['staff_login_id'];

        $staff_name = $_POST['staff_name'];
        $staff_contact = $_POST['staff_contact'];
        $staff_email = $_POST['staff_email'];
        $staff_login_id = $generated_staff_id;
        $staff_added_by = $user_id;
        $staff_type = $_POST['staff_type'];

        $add_staff_query = "INSERT INTO `staff`(
            `staff_name`, 
            `staff_contact`, 
            `staff_email`, 
            `staff_login_id`, 
            `staff_added_by`, 
            `staff_type`) VALUES (
                '$staff_name',
                '$staff_contact',
                '$staff_email',
                '$staff_login_id',
                '$staff_added_by',
                '$staff_type'
                )";
        $add_staff_result = mysqli_query($connection, $add_staff_query);

        if (!$add_staff_result) {
            die("<div class='alert alert-dark' role='alert'>
            THERE WAS A PROBLEM IN ADDING THIS STAFF!
          </div>" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-secondary' role='alert'>
            $staff_name has been added with Login ID: $staff_login_id!
          </div>";
        }
    }
    ?>
    <form method="POST" action="">
        <div class="form-floating mb-3">
            <input name="staff_name" type="text" required class="form-control" id="staffName" placeholder="Staff Name">
            <label for="floatingInput">Staff Full Name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="staff_contact" type="number" required class="form-control" id="staffContact"
                placeholder="Staff Mobile">
            <label for="floatingInput">Registered Mobile Number</label>
        </div>
        <div class="form-floating mb-3">
            <input name="staff_email" type="email" class="form-control" id="staffEmail" placeholder="Staff Email">
            <label for="floatingInput">Email ID</label>
        </div>
        <div class="form-floating mb-3">
            <input name="staff_login_id" type="number" required maxlength="4" class="form-control" id="staffId"
                placeholder="Staff ID">
            <label for="floatingInput">Enter last 4 digits of Registered mobile number to generate login ID</label>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" required name="staff_type" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open this menu to select staff type</option>
                <option name="staff_type" value="1">Teacher</option>
                <option name="staff_type" value="2">Helper</option>
            </select>
            <label for="floatingSelect">Select Staff Type</label>
        </div>
        <button type="submit" name="submit" class="btn confirm-button">ADD STAFF</button>
    </form>
</div>