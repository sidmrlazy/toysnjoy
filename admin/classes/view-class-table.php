<div class="container mt-5 mb-5 view-data-table">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">CLASS ID</th>
                <th scope="col">CLASS NAME</th>
                <th scope="col">DETAILS</th>
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
            $fetch_data_query = "SELECT * FROM `classes` WHERE `class_added_by` = $user_id";
            $fetch_data_result = mysqli_query($connection, $fetch_data_query);

            while ($row = mysqli_fetch_assoc($fetch_data_result)) {
                $class_id = $row['class_id'];
                $class_name = $row['class_name'];
                $class_added_date = $row['class_added_date'];
                $class_description = $row['class_description'];

                if ($class_added_date = $class_added_date) {
                    $new_added_date =  gmdate("d-m-Y");
                }
                $new_date = str_replace(array(
                    '\'', '"', ',', ';', '<', '-', " "
                ), '', $new_added_date);
            ?>
            <tr>
                <th scope="row">TNJCL<?php echo $new_date ?><?php echo $class_id ?></th>
                <td><?php echo $class_name ?></td>
                <td><?php echo $class_description ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>