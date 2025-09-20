<div class="admission-section container mt-5 mb-5" id="summer-camp">
    <h1>Connect Now</h1>
    <p>Unlock Your Potential - Apply Now!</p>

    <div class="admission-form-row">
        <div class="col-md-6 admission-form-lottie">
            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_eroqjb7w.json" background="transparent"
                speed="1" class="home-section-2-lottie" loop autoplay></lottie-player>
        </div>

        <div class="col-md-6">
            <?php
            include('includes/server/config.php');

            if (isset($_POST['submit'])) {
                // --- Read inputs safely ---
                $contact_name    = mysqli_real_escape_string($connection, $_POST['contact_name'] ?? '');
                $contact_number  = mysqli_real_escape_string($connection, $_POST['contact_number'] ?? '');
                $contact_email   = mysqli_real_escape_string($connection, $_POST['contact_email'] ?? '');
                $contact_reason  = mysqli_real_escape_string($connection, $_POST['contact_reason'] ?? '');
                $contact_details = mysqli_real_escape_string($connection, $_POST['contact_details'] ?? '');

                // --- Insert into DB ---
                $query = "INSERT INTO `contact`(
                        `contact_name`,
                        `contact_number`,
                        `contact_email`,
                        `contact_reason`,
                        `contact_details`
                    )
                    VALUES(
                        '$contact_name',
                        '$contact_number',
                        '$contact_email',
                        '$contact_reason',
                        '$contact_details'
                    )";

                $result = mysqli_query($connection, $query);

                if ($result) {

                    // ---------- Email Build ----------
                    $to       = "tnjplayschool@gmail.com";
                    $subject  = "Website Visitor | Toys N Joy Play School";

                    // if the select wasn't changed by user
                    if ($contact_reason === "Open this menu for options" || $contact_reason === "") {
                        $contact_reason = "General Enquiry";
                    }

                    // Escape values for HTML email
                    $e_name    = htmlspecialchars($contact_name,   ENT_QUOTES, 'UTF-8');
                    $e_mobile  = htmlspecialchars($contact_number, ENT_QUOTES, 'UTF-8');
                    $e_email   = htmlspecialchars($contact_email,  ENT_QUOTES, 'UTF-8');
                    $e_reason  = htmlspecialchars($contact_reason, ENT_QUOTES, 'UTF-8');
                    $e_details = nl2br(htmlspecialchars($contact_details, ENT_QUOTES, 'UTF-8'));

                    $message = "
                        <html>
                            <head>
                                <meta charset='UTF-8'>
                                <title>New Enquiry</title>
                            </head>
                            <body style='font-family:Arial,Helvetica,sans-serif;'>
                                <h3 style='margin:0 0 12px;'>New Enquiry - Toys N Joy Play School</h3>
                                <table cellpadding='8' cellspacing='0' border='0' style='border:1px solid #e7e7e7; border-collapse:collapse;'>
                                    <tr style='background:#f7f7f7;'>
                                        <th align='left' style='border-bottom:1px solid #e7e7e7;'>Full Name</th>
                                        <th align='left' style='border-bottom:1px solid #e7e7e7;'>Contact</th>
                                        <th align='left' style='border-bottom:1px solid #e7e7e7;'>Email</th>
                                        <th align='left' style='border-bottom:1px solid #e7e7e7;'>Contact For</th>
                                        <th align='left' style='border-bottom:1px solid #e7e7e7;'>Details</th>
                                    </tr>
                                    <tr>
                                        <td style='border-top:1px solid #e7e7e7;'>$e_name</td>
                                        <td style='border-top:1px solid #e7e7e7;'>$e_mobile</td>
                                        <td style='border-top:1px solid #e7e7e7;'>$e_email</td>
                                        <td style='border-top:1px solid #e7e7e7;'>$e_reason</td>
                                        <td style='border-top:1px solid #e7e7e7;'>$e_details</td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                    ";

                    // Headers
                    $headers  = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    // Use a domain you control here for better deliverability:
                    $headers .= "From: Toys N Joy <no-reply@yourdomain.com>\r\n";
                    if (!empty($contact_email) && filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
                        $headers .= "Reply-To: $e_name <$contact_email>\r\n";
                    }

                    // Send email (suppress warnings with @; you can remove @ for debugging)
                    $mail_ok = @mail($to, $subject, $message, $headers);
            ?>

                    <?php if ($mail_ok): ?>
                        <div class="alert alert-success" role="alert">
                            Thank you for connecting with <strong>Toys N Joy Play School</strong>. Someone will connect with you shortly.
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                            Your enquiry has been saved. We couldn't send the email notification right now, but we will reach out soon.
                        </div>
                    <?php endif; ?>

                <?php
                } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Sorry, something went wrong while saving your enquiry. Please try again.
                    </div>
            <?php
                }
            }
            ?>

            <form action="" method="POST" class="admission-form">
                <div class="mb-3">
                    <label for="contactName" class="form-label">Full Name</label>
                    <input type="text" name="contact_name" class="form-control" id="contactName"
                        placeholder="Your full name" required>
                </div>

                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Mobile Number</label>
                    <input type="number" name="contact_number" class="form-control" id="contactNumber"
                        placeholder="+91 XXXXX XXXXX" required>
                </div>

                <div class="mb-3">
                    <label for="contactEmail" class="form-label">Email</label>
                    <input type="email" name="contact_email" class="form-control" id="contactEmail"
                        placeholder="name@example.com">
                </div>

                <div class="mb-3">
                    <label for="contactReason" class="form-label">Contact For</label>
                    <select required name="contact_reason" id="contactReason" class="form-select" aria-label="Default select example">
                        <option>Open this menu for options</option>
                        <!-- <option value="Summer Camp 2023 - Group A">Summer Camp 2023 - Group A</option>
                        <option value="Summer Camp 2023 - Group B">Summer Camp 2023 - Group B</option> -->
                        <option value="Admissions">Admissions</option>
                        <option value="Courses">Courses</option>
                        <option value="Career">Career</option>
                        <option value="Fee Structure">Fee Structure</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="contactDetails" class="form-label">Details</label>
                    <textarea class="form-control" name="contact_details" id="contactDetails" rows="3"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-outline-warning w-100">Apply</button>
            </form>
        </div>
    </div>
</div>