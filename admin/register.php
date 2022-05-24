<?php include('includes/header.php') ?>

<div class="login-section">
    <form class="col-md-6 login-form" method="POST" action="">
        <?php
        // Include config file
        require_once "config.php";

        // Define variables and initialize with empty values
        $user_name = $user_password = $confirm_user_password = "";
        $user_name_err = $user_password_err = $confirm_user_password_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate username
            if (empty(trim($_POST["user_name"]))) {
                $user_name_err = "Please enter a username.";
            } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user_name"]))) {
                $user_name_err = "Username can only contain letters, numbers, and underscores.";
            } else {
                // Prepare a select statement
                $query = "SELECT user_id FROM users WHERE user_name = ?";

                if ($statement = mysqli_prepare($connection, $query)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($statement, "s", $param_username);

                    // Set parameters
                    $param_username = trim($_POST["user_name"]);

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($statement)) {
                        /* store result */
                        mysqli_stmt_store_result($statement);

                        if (mysqli_stmt_num_rows($statement) == 1) {
                            $user_name_err = "This username is already taken.";
                        } else {
                            $user_name = trim($_POST["user_name"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($statement);
                }
            }

            // Validate password
            if (empty(trim($_POST["user_password"]))) {
                $user_password_err = "Please enter a password.";
            } elseif (strlen(trim($_POST["user_password"])) < 6) {
                $user_password_err = "Password must have atleast 6 characters.";
            } else {
                $user_password = trim($_POST["user_password"]);
            }

            // Validate confirm password
            if (empty(trim($_POST["confirm_user_password"]))) {
                $confirm_user_password_err = "Please confirm password.";
            } else {
                $confirm_user_password = trim($_POST["confirm_user_password"]);
                if (empty($user_password_err) && ($user_password != $confirm_user_password)) {
                    $confirm_user_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if (empty($user_name_err) && empty($user_password_err) && empty($confirm_user_password_err)) {

                // Prepare an insert statement
                $sql = "INSERT INTO users (user_name, user_password) VALUES (?,?)";

                if ($statement = mysqli_prepare($connection, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($statement, "ss", $param_username, $param_password);

                    // Set parameters
                    $param_username = $user_name;
                    $param_password = password_hash($user_password, PASSWORD_DEFAULT); // Creates a password hash

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($statement)) {
                        // Redirect to login page
                        header("location: dashboard.php");
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($statement);
                }
            }

            // Close connection
            mysqli_close($connection);
        }
        ?>
        <img src="assets/images/logo/logo.png" alt="">
        <!-- <h1>Login</h1>
        <p>Welcome, Admin</p>
        <div class="form-floating w-100 mb-3">
            <input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="admin">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating w-100">
            <input type="password" name="user_password" class="form-control" id="floatingPassword"
                placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating w-100">
            <input type="password" name="confirm_user_password" class="form-control" id="floatingPassword"
                placeholder="Password">
            <label for="floatingPassword">Confirm Password</label>
        </div>

        <button class="login-btn" type="submit" name="submit">Submit</button>
        <div>
            <a href="register.php">Register</a>
        </div> -->
        <div class="wrapper">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user_name"
                        class="form-control <?php echo (!empty($user_name_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $user_name; ?>">
                    <span class="invalid-feedback"><?php echo $user_name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="user_password"
                        class="form-control <?php echo (!empty($user_password_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $user_password; ?>">
                    <span class="invalid-feedback"><?php echo $user_password_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_user_password"
                        class="form-control <?php echo (!empty($confirm_user_password_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $confirm_user_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_user_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </form>
        </div>
    </form>


</div>
<?php include('includes/footer.php') ?>