<div class="container mt-5 mb-5">
    <?php
    require_once('includes/server/config.php');

    $user_contact = $user_password = $confirm_user_password = "";
    $user_contact_err = $user_password_err = $confirm_user_password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = $_POST['user_name'];
        if (empty(trim($_POST["user_contact"]))) {
            $user_contact_err = "Please enter User Contact.";
        } else {
            $sql = "SELECT user_id FROM users WHERE user_contact = ?";
            if ($stmt = mysqli_prepare($connection, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_user_contact);
                $param_user_contact = trim($_POST["user_contact"]);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $user_contact_err = "This Mobile number is already registered with us. Please Login";
                    } else {
                        $user_contact = trim($_POST["user_contact"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        }

        if (empty(trim($_POST["user_password"]))) {
            $user_password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["user_password"])) < 6) {
            $user_password_err = "Password must have atleast 6 characters.";
        } else {
            $user_password = trim($_POST["user_password"]);
        }

        if (empty(trim($_POST["confirm_user_password"]))) {
            $confirm_user_password_err = "Please confirm password.";
        } else {
            $confirm_user_password = trim($_POST["confirm_user_password"]);
            if (empty($user_password_err) && ($user_password != $confirm_user_password)) {
                $confirm_user_password_err = "Password did not match.";
            }
        }

        if (empty($user_contact_err) && empty($user_password_err) && empty($confirm_user_password_err)) {
            // $user_name = $_POST['user_name'];
            $sql = "INSERT INTO users (`user_name`, `user_contact`, `user_password`, `user_type`) VALUES (?, ?, ?, 1)";
            if ($stmt = mysqli_prepare($connection, $sql)) {
                mysqli_stmt_bind_param($stmt, "sisi", $user_name, $param_user_contact, $param_user_password);
                $param_user_contact = $user_contact;
                // $param_user_password = password_hash($user_password, PASSWORD_DEFAULT);
                $param_user_password = $user_password;
                if (mysqli_stmt_execute($stmt)) {
                    header("location: login.php");
                    // if ($stmt) {
                    //     $update_query = "UPDATE `users` SET `user_name`='$user_name' WHERE `user_id` = $user_id";
                    //     $update_query_result = mysqli_query($connection, $update_query);

                    //     if ($update_query_result) {
                    //         header("location: login.php");
                    //     }
                    // }
                }
                mysqli_stmt_close($stmt);
            } else {
                die("Oops! Something went wrong. Please try again later. " . mysqli_error($connection));
            }
        }

        mysqli_close($connection);
    }

    // if (isset($_POST['submit'])) {
    //     $user_name = $_POST['user_name'];
    //     $user_contact = $_POST['user_contact'];
    //     $user_email = $_POST['user_email'];
    //     $user_password = $_POST['user_password'];
    //     $confirm_user_password = $_POST['confirm_user_password'];

    //     if ($user_password !== $confirm_user_password) {
    //         echo "<div class='alert alert-danger' role='alert'>Passwords do not match!</div>";
    //     } else {
    //         $query = "INSERT INTO `users` (
    //             `user_name`,
    //             `user_contact`,
    //             `user_email`,
    //             `user_password`,
    //             `user_type`
    //         ) VALUES (
    //             '$user_name',
    //             '$user_contact',
    //             '$user_email',
    //             '$user_password',
    //             '1'
    //         )";
    //         $result = mysqli_query($connection, $query);

    //         if ($result) {
    //             echo "<div class='alert alert-success' role='alert'>User registered! Please go back and login</div>";
    //         } else {
    //             die("<div class='alert alert-danger' role='alert'>User Registration Failed! Please try again.</div>" . mysqli_error($connection));
    //         }
    //     }
    // }

    ?>
    <form class="admission-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-floating mb-3">
            <input name="user_name" type="text"
                class="form-control <?php echo (!empty($user_contact_err)) ? 'is-invalid' : ''; ?>" id="floatingInput"
                placeholder="Full Name">
            <label for="floatingInput">Parent Name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="user_contact" value="<?php echo $user_contact; ?>" type="number" class="form-control"
                id="floatingInput" placeholder="+91 XXXXXXXXXX">
            <label for="floatingInput">Registered Mobile Number</label>
        </div>
        <div class="form-floating mb-3">
            <input name="user_email" type="email" class="form-control" id="floatingInput" placeholder="name@domain.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input name="user_password" value="<?php echo $user_password; ?>" type="password"
                class="form-control <?php echo (!empty($user_password_err)) ? 'is-invalid' : ''; ?>"
                id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input name="confirm_user_password" value="<?php echo $confirm_user_password; ?>" type="password"
                class="form-control <?php echo (!empty($confirm_user_password_err)) ? 'is-invalid' : ''; ?>"
                id="floatingPassword" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100 p-2">Register Now</button>
    </form>

    <div class="mt-3 inner-login-form">
        <p>Not a user yet? Click here to <a href=""> Register</a></p>
    </div>
</div>