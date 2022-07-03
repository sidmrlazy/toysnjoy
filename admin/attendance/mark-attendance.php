<div class="container mt-5 mb-5 view-data-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STAFF LOGIN ID</th>
                <th scope="col">STAFF NAME</th>
                <th scope="col">STAFF TYPE</th>
                <th scope="col" colspan="4" class="text-center">MARK ATTENDANCE</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('config/db.php');
            if (!empty($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                $user_id = 0;
            }
            if (isset($_POST['mark'])) {
                $staff_attendance_user_id = $_POST['staff_id'];
                $staff_attendance_user_name = $_POST['staff_name'];
                $staff_attendance_user_type = $_POST['staff_type'];
                $staff_attendance_marked_by = $user_id;
                $staff_attendance_details = $_POST['staff_attendance_details'];
                $insert_attendance_query = "INSERT INTO `staff_attendance`(
                        `staff_attendance_user_id`,
                        `staff_attendance_user_name`,
                        `staff_attendance_user_type`, 
                        `staff_attendance_marked_by`,
                        `staff_attendance_details`) VALUES (
                            '$staff_attendance_user_id',
                            '$staff_attendance_user_name',
                            '$staff_attendance_user_type',
                            '$staff_attendance_marked_by',
                            '$staff_attendance_details')";
                $insert_attendance_result = mysqli_query($connection, $insert_attendance_query);
                if ($insert_attendance_result) {
                    echo "<div class='alert alert-secondary' role='alert'>
                    ATTENDANCE MARKED FOR $staff_attendance_user_name!
                  </div>";
                } else {
                    echo "<div class='alert alert-secondary' role='alert'>
                    ERROR! COULD NOT MARK ATTENDANCE.
                  </div>";
                    die();
                }
            }

            $fetch_data_query = "SELECT * FROM `staff` WHERE `staff_added_by` = $user_id";
            $fetch_data_result = mysqli_query($connection, $fetch_data_query);
            while ($row = mysqli_fetch_assoc($fetch_data_result)) {
                $staff_id = $row['staff_id'];
                $staff_login_id = $row['staff_login_id'];
                $staff_name = $row['staff_name'];
                $staff_contact = $row['staff_contact'];
                $staff_email = $row['staff_email'];
                $staff_type = $row['staff_type'];

                if ($staff_type == "1") {
                    $staff_type = "Teacher";
                } elseif ($staff_type == "2") {
                    $staff_type =  "Helper";
                }

                $staff_added_date = $row['staff_added_date'];

                if ($staff_added_date = $staff_added_date) {
                    $new_added_date =  gmdate("d-M-Y");
                }
                $new_date = str_replace(array(
                    '\'', '"', ',', ';', '<', '-', " "
                ), '', $new_added_date);
            ?>
            <tr>
                <form action="" method="POST">
                    <!-- FORM DATA START -->
                    <input type="text" name="staff_id" hidden value="<?php echo $staff_id; ?>">
                    <input type="text" name="staff_type" hidden value="<?php echo $staff_type; ?>">
                    <input type="text" name="staff_name" hidden value="<?php echo $staff_name; ?>">

                    <!-- FORM DATA END -->
                    <th scope="row"><?php echo $staff_login_id ?></th>
                    <td><?php echo $staff_name ?></td>
                    <td><?php echo $staff_type ?></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox" value="1"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Present
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox" value="2"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Absent
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox" value="3"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Half day
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox" value="4"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                On Leave
                            </label>
                        </div>
                    </td>
                    <td><button type="submit" name="mark" value="mark" class="edit-btn-sm">Update</button>
                    </td>
                </form>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>