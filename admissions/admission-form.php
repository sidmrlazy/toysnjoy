<div class="admission-section container mt-5 mb-5" id="summer-camp">
    <h1>Connect Now</h1>
    <p>Unlock Your Potential - Apply Now!</p>

    <div class="admission-form-row">
        <div class="col-md-6 admission-form-lottie">
            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_eroqjb7w.json" background="transparent"
                speed="1" class="home-section-2-lottie" loop autoplay></lottie-player>
        </div>
        <?php
        include('includes/server/config.php');

        if (isset($_POST['submit'])) {
            $contact_name = mysqli_real_escape_string($connection, $_POST['contact_name']);
            $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
            $contact_email = mysqli_real_escape_string($connection, $_POST['contact_email']);
            $contact_reason = mysqli_real_escape_string($connection, $_POST['contact_reason']);
            $contact_details = mysqli_real_escape_string($connection, $_POST['contact_details']);

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
                $to = "care.toysnjoy@gmail.com, connectonlyn@onlynus.com";
                $subject = "Website Visitor | Toys N Joy Playschool ";
                $message = "
                        <html>
                            <head>

                            </head>
                                <body>
                                
                                    <table style='border: 1px solid #e7e7e7e7'>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Contact For</th>
                                            <th>Details</th>
                                            <th>Date</th>
                                        </tr>
                        
                                        <tr>
                                        <td>$contact_name</td>
                                        <td>$contact_number</td>
                                        <td>$contact_email</td>
                                        <td>$contact_reason</td>
                                        <td>$contact_details</td>
                                        <td>$contact_date</td>
                                        </tr>
                                    </table>
                                </body>
                        </html>
                        ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to, $subject, $message, $headers);
        ?>
        <div class="alert alert-success" role="alert">
            Thank you! We will connect with you shortly.
        </div>
        <?php

            }
        }

        ?>
        <form action="" method="POST" class="col-md-6 admission-form">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" name="contact_name" class="form-control" id="exampleFormControlInput1"
                    placeholder="Your full name" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                <input type="number" name="contact_number" class="form-control" id="exampleFormControlInput1"
                    placeholder="+91 XXXXX XXXXX" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="number" name="contact_email" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact For</label>
                <select required class="form-select" aria-label="Default select example">
                    <option>Open this menu for options</option>
                    <option value="Summer Camp 2023 - Group A">Summer Camp 2023 - Group A</option>
                    <option value="Summer Camp 2023 - Group B">Summer Camp 2023 - Group B</option>
                    <option value="Admissions">Admissions</option>
                    <option value="Courses">Courses</option>
                    <option value="Career">Career</option>
                    <option value="Fee Structure">Fee Structure</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-outline-warning w-100">Apply</button>
        </form>
    </div>
</div>