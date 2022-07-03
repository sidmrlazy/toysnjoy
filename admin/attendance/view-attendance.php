<div class="container mt-5 mb-5 view-data-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STAFF TYPE</th>
                <th scope="col">STAFF NAME</th>
                <th scope="col">ATTENDANCE DATE</th>
                <th scope="col">ATTENDANCE DETAIL</th>
                <th scope="col" colspan="2" class="text-center">ACTION</th>
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

            // DELETE STAFF ATTENDANCE QUERY 
            if (isset($_POST['del'])) {
                $staff_attendance_id = $_POST['staff_attendance_id'];
                $delete_query = "DELETE FROM `staff_attendance` WHERE staff_attendance_id = $staff_attendance_id";
                $delete_query_result = mysqli_query($connection, $delete_query);
                if (!$delete_query_result) {
                    die();
                } else {
                    echo "<div class='alert alert-secondary' role='alert'>
            ENTRY DELETED!
          </div>";
                }
            }

            $fetch_data_query = "SELECT * FROM `staff_attendance` WHERE `staff_attendance_marked_by` = $user_id";
            $fetch_data_result = mysqli_query($connection, $fetch_data_query);
            while ($row = mysqli_fetch_assoc($fetch_data_result)) {
                $staff_attendance_id = $row['staff_attendance_id'];
                $staff_attendance_user_type = $row['staff_attendance_user_type'];
                $staff_attendance_user_name = $row['staff_attendance_user_name'];
                $staff_attendance_date = $row['staff_attendance_date'];
                $staff_attendance_details = $row['staff_attendance_details'];
                if ($staff_attendance_details == "1") {
                    $staff_attendance_details = "Present";
                } elseif ($staff_attendance_details == "2") {
                    $staff_attendance_details =  "Absent";
                } elseif ($staff_attendance_details == "3") {
                    $staff_attendance_details =  "Half Day";
                } elseif ($staff_attendance_details == "4") {
                    $staff_attendance_details =  "On Leave";
                }
            ?>
            <tr>
                <?php
                    if (isset($_POST['edit'])) {
                    ?>
                <form action="edit-staff-attendance.php" method="POST">
                    <?php
                    } else {
                        ?>
                    <form action="" method="POST">
                        <?php
                        }
                            ?>
                        <input type="text" hidden name="staff_attendance_id" value="<?php echo $staff_attendance_id ?>">
                        <th scope="row"><?php echo $staff_attendance_user_type ?></th>
                        <td><?php echo $staff_attendance_user_name ?></td>
                        <td><?php echo $staff_attendance_date ?></td>
                        <td><?php echo $staff_attendance_details ?></td>
                        <td><button type="submit" name="del" value="del" class="del-btn-sm">Delete</button></td>
                        <td><button type="submit" name="edit" value="edit" class="edit-btn-sm">Edit</button></td>
                    </form>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>