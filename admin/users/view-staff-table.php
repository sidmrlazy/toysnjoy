<div class="container mt-5 mb-5 view-data-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STAFF LOGIN ID</th>
                <th scope="col">STAFF NAME</th>
                <th scope="col">CONTACT NUMBER</th>
                <th scope="col">EMAIL</th>
                <th scope="col">STAFF TYPE</th>
                <th scope="col">ADDED ON</th>
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

            $fetch_data_query = "SELECT * FROM `staff` WHERE `staff_added_by` = $user_id";
            $fetch_data_result = mysqli_query($connection, $fetch_data_query);

            while ($row = mysqli_fetch_assoc($fetch_data_result)) {
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
                <th scope="row"><?php echo $staff_login_id ?></th>
                <td><?php echo $staff_name ?></td>
                <td><?php echo $staff_contact ?></td>
                <td><?php echo $staff_email ?></td>
                <td><?php echo $staff_type ?></td>
                <td><?php echo $new_added_date ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>