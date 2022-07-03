<div class="container mt-5 mb-5 view-data-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STAFF TYPE</th>
                <th scope="col">STAFF NAME</th>
                <th scope="col">ATTENDANCE DATE</th>
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

            // UPDATE ATTENDANCE QUERY
            if (isset($_POST['update'])) {
                $staff_attendance_id = $_POST['staff_attendance_id'];
                $staff_attendance_user_id = $_POST['staff_attendance_user_id'];
                $staff_attendance_user_name = $_POST['staff_attendance_user_name'];
                $staff_attendance_user_type = $_POST['staff_attendance_user_type'];
                $staff_attendance_user_type = $_POST['staff_attendance_user_type'];


                $update_query = "UPDATE `staff_attendance` SET
                `staff_attendance_user_id`='$staff_attendance_user_id',
                `staff_attendance_user_name`='$staff_attendance_user_name',
                `staff_attendance_user_type`='$staff_attendance_user_type',
                `staff_attendance_marked_by`='$user_id',
                `staff_attendance_details`='$staff_attendance_details' WHERE `staff_attendance_id` = $staff_attendance_id";
                $update_result = mysqli_query($connection, $update_query);

                if ($update_result) {
                    echo "<div class='alert alert-secondary' role='alert'>
                    ATTENDANCE UPDATED FOR $staff_attendance_user_name!
                  </div>";
                } else {
                    die();
                }
            }

            // EDIT ATTENDANCE QUERY
            if (isset($_POST['edit'])) {
                $staff_attendance_id = $_POST['staff_attendance_id'];
                $fetch_data_query = "SELECT * FROM `staff_attendance` WHERE `staff_attendance_id` = $staff_attendance_id";
                $fetch_data_result = mysqli_query($connection, $fetch_data_query);
                while ($row = mysqli_fetch_assoc($fetch_data_result)) {
                    $staff_attendance_id = $row['staff_attendance_id'];
                    $staff_attendance_user_id = $row['staff_attendance_user_id'];
                    $staff_attendance_user_name = $row['staff_attendance_user_name'];
                    $staff_attendance_user_type = $row['staff_attendance_user_type'];
                    $staff_attendance_marked_by = $row['staff_attendance_marked_by'];
                    $staff_attendance_details = $row['staff_attendance_details'];
                    $staff_attendance_date = $row['staff_attendance_date'];            ?>

            <tr>
                <form action="" method="POST">
                    <!-- FORM DATA START -->
                    <input type="text" name="staff_attendance_id" hidden value="<?php echo $staff_attendance_id; ?>">
                    <input type="text" name="staff_attendance_user_id" hidden
                        value="<?php echo $staff_attendance_user_id; ?>">
                    <input type="text" name="staff_attendance_user_name" hidden
                        value="<?php echo $staff_attendance_user_name; ?>">
                    <input type="text" name="staff_attendance_user_type" hidden
                        value="<?php echo $staff_attendance_user_type; ?>">
                    <input type="text" name="staff_attendance_marked_by" hidden
                        value="<?php echo $staff_attendance_marked_by; ?>">
                    <input type="text" name="staff_attendance_details" hidden
                        value="<?php echo $staff_attendance_details; ?>">

                    <!-- FORM DATA END -->
                    <th scope="row"><?php echo $staff_attendance_user_type ?></th>
                    <td><?php echo $staff_attendance_user_name ?></td>
                    <td><?php echo $staff_attendance_date ?></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox"
                                value="<?php echo $staff_attendance_details ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Present
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox"
                                value="<?php echo $staff_attendance_details ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Absent
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox"
                                value="<?php echo $staff_attendance_details ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Half day
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="staff_attendance_details" type="checkbox"
                                value="<?php echo $staff_attendance_details ?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                On Leave
                            </label>
                        </div>
                    </td>
                    <td><button type="submit" name="update" value="update" class="edit-btn-sm">Update</button>
                    </td>
                </form>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>