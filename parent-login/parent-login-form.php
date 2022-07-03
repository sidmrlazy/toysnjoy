<div class="container mt-5 mb-5">
    <?php
    include 'includes/server/config.php';
    if (isset($_POST['submit'])) {
        $user_contact = mysqli_real_escape_string($connection, $_POST['user_contact']);
        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

        $query = "SELECT * FROM users WHERE `user_contact` = '$user_contact' AND `user_password` = '$user_password' AND `user_type` = '1'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("<div class='alert alert-danger' role='alert'>Login Failed! Please try again.</div>" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success' role='alert'>Logged in</div>";
        }
    }

    ?>
    <form class="admission-form" action="" method="POST">
        <div class="form-floating mb-3">
            <input name="user_contact" type="number" class="form-control" id="floatingInput"
                placeholder="+91 XXXXXXXXXX">
            <label for="floatingInput">Registered Mobile Number</label>
        </div>
        <div class="form-floating mb-3">
            <input name="user_password" type="password" class="form-control" id="floatingPassword"
                placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100 p-2">Login</button>
    </form>

    <div class="mt-3 inner-login-form">
        <p>Not a user yet? Click here to <a href="parent-registration.php"> Register</a></p>
    </div>
</div>