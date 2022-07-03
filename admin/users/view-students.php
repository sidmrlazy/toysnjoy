<div class="container mt-5 mb-5 view-data-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STUDENT ID</th>
                <th scope="col">FIRST NAME</th>
                <th scope="col">LAST NAME</th>
                <th scope="col">AGE</th>
                <th scope="col">FOR CLASS</th>
                <th scope="col">FEE STRUCTURE</th>
                <th scope="col">FATHER'S CONTACT NUMBER</th>
                <th scope="col">ADMITTED ON</th>
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

            // DELETE QUERY
            if (isset($_POST['del'])) {
                $student_id = $_POST['student_id'];
                $del_query = "DELETE FROM `student_data` WHERE `student_id` = $student_id";
                $del_result = mysqli_query($connection, $del_query);

                if ($del_result) {
                    echo "<div class='alert alert-secondary' role='alert'>ENTRY DELETED!</div>";
                } else {
                    die();
                }
            }

            // FETCH QUERY
            $fetch_data_query = "SELECT * FROM `student_data` WHERE `student_added_by` = $user_id";
            $fetch_data_result = mysqli_query($connection, $fetch_data_query);
            while ($row = mysqli_fetch_assoc($fetch_data_result)) {
                $student_id = $row['student_id'];
                $student_login_id = $row['student_login_id'];
                $student_first_name = $row['student_first_name'];
                $student_last_name = $row['student_last_name'];
                $student_age = $row['student_age'];
                $student_class = $row['student_class'];
                $student_fee_structure = $row['student_fee_structure'];
                if ($student_fee_structure == "1") {
                    $student_fee_structure = "Monthly";
                } elseif ($student_fee_structure == "3") {
                    $student_fee_structure =  "Quarterly";
                } elseif ($student_fee_structure == "6") {
                    $student_fee_structure =  "Half Yearly";
                } elseif ($student_fee_structure == "12") {
                    $student_fee_structure =  "Yearly";
                }
                $student_father_contact = $row['student_father_contact'];
                $student_added_date = $row['student_added_date'];
                if ($student_added_date = $student_added_date) {
                    $new_added_date =  gmdate("d-M-Y");
                }
                $new_date = str_replace(array(
                    '\'', '"', ',', ';', '<', '-', " "
                ), '', $new_added_date);
                $student_added_by = $row['student_added_by'];
            ?>
            <tr>
                <form action="" method="POST">
                    <input type="text" hidden name="student_id" value="<?php echo $student_id; ?>">
                    <th scope="row"><?php echo $student_login_id ?></th>
                    <td><?php echo $student_first_name ?></td>
                    <td><?php echo $student_last_name ?></td>
                    <td><?php echo $student_age ?> Years</td>
                    <td><?php echo $student_class ?></td>
                    <td><?php echo $student_fee_structure ?></td>
                    <td><?php echo $student_father_contact ?></td>
                    <td><?php echo $new_added_date ?></td>
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