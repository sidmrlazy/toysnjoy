<div class="login-section">
    <form class="col-md-6 login-form" method="POST" action="">
        <?php
        session_start();
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: dashboard.php");
            exit;
        }
        // Include config file
        require_once "config.php";

        // Define variables and initialize with empty values
        $user_name = $user_password = "";
        $user_name_err = $user_password_err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if user_name is empty
            if (empty(trim($_POST["user_name"]))) {
                $user_name_err = "Please enter user_name.";
            } else {
                $user_name = trim($_POST["user_name"]);
            }

            // Check if password is empty
            if (empty(trim($_POST["user_password"]))) {
                $user_password_err = "Please enter your password.";
            } else {
                $user_password = trim($_POST["user_password"]);
            }

            // Validate credentials
            if (empty($user_name_err) && empty($user_password_err)) {
                // Prepare a select statement
                $query = "SELECT user_id, user_name, user_password FROM users WHERE user_name = ?";

                if ($statement = mysqli_prepare($connection, $query)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($statement, "s", $param_user_name);

                    // Set parameters
                    $param_user_name = $user_name;

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($statement)) {
                        // Store result
                        mysqli_stmt_store_result($statement);

                        // Check if user_name exists, if yes then verify password
                        if (mysqli_stmt_num_rows($statement) == 1) {
                            // Bind result variables
                            mysqli_stmt_bind_result($statement, $user_id, $user_name, $hashed_password);
                            if (mysqli_stmt_fetch($statement)) {
                                if (password_verify($user_password, $hashed_password)) {
                                    // Password is correct, so start a new session
                                    session_start();

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["user_id"] = $user_id;
                                    $_SESSION["user_name"] = $user_name;

                                    // Redirect user to welcome page
                                    header("location: index.php");
                                } else {
                                    // Password is not valid, display a generic error message
                                    $login_err = "<div class='alert w-100 alert-danger' role='alert'>Invalid Password!</div>";
                                    echo $login_err;
                                }
                            }
                        } else {
                            // user_name doesn't exist, display a generic error message
                            $login_err = "<div class='alert w-100 alert-danger' role='alert'>Invalid Username or Password!</div>";
                            echo $login_err;
                        }
                    } else {
                        $login_err = "<div class='alert w-100 alert-danger' role='alert'>Oops! Something went wrong. Please try again later.</div>";
                        echo $login_err;
                    }

                    // Close statement
                    mysqli_stmt_close($statement);
                }
            }

            // Close connection
            mysqli_close($connection);
        }
        ?>
        <!-- <img src="assets/images/logo/logo.png" alt=""> -->
        <h1>Login</h1>
        <p>Welcome, Admin</p>
        <div class="form-floating w-100 mb-3">
            <input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="admin">
            <label for="floatingInput">Username or Registered Mobile Number</label>
        </div>
        <div class="form-floating w-100">
            <input type="password" name="user_password" class="form-control" id="floatingPassword"
                placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="login-btn mb-1" type="submit" name="submit">Login</button>
        <a href="register.php" class="reg-btn mb-3">Register</a>
    </form>


</div>