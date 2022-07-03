<div class="container input-data-form mt-5 mb-5">
    <div class="section-heading">
        <h5>Add Class</h5>
        <p>Enter details below to create a new class</p>
    </div>
    <?php
    require_once 'config/db.php';
    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = 0;
    }
    if (isset($_POST['submit'])) {
        $class_name = $_POST['class_name'];
        $class_description = $_POST['class_description'];
        $class_added_by = $user_id;

        $add_class_query = "INSERT INTO `classes`(`class_name`, `class_description`, `class_added_by`) VALUES ('$class_name','$class_description', '$class_added_by')";
        $add_class_result = mysqli_query($connection, $add_class_query);

        if (!$add_class_result) {
            die("<div class='alert alert-dark' role='alert'>
            THERE WAS A PROBLEM IN ADDING THIS CLASS!
          </div>" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-secondary' role='alert'>
            $class_name has been as a class!
          </div>";
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-floating mb-3">
            <input name="class_name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Class Name</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="class_description" class="form-control" placeholder="Leave a comment here"
                id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Class Details (Optional)</label>
        </div>

        <button type="submit" name="submit" class="btn confirm-button">CREATE CLASS</button>
    </form>
</div>