<div class="container admission-section">
    <h1>Admission Form</h1>
    <p>Fill this form below to give your child the best start with educational journey</p>
    <div class="admission-row">
        <div class="col-md-6">
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_fsonufza.json" background="transparent"
                speed="1" class="admission-lottie" loop autoplay></lottie-player>

        </div>

        <form class="col-md-6 admission-form" method="POST" action="">
            <?php
            include 'includes/server/config.php';
            if (isset($_POST['submit'])) {
                $admission_child_name = $_POST['admission_child_name'];
                $admission_child_age = $_POST['admission_child_age'];
                $admission_child_dob = $_POST['admission_child_dob'];
                $admission_mother_name = $_POST['admission_mother_name'];
                $admission_father_name = $_POST['admission_father_name'];
                $admission_address = $_POST['admission_address'];
                $admission_playschool = $_POST['admission_playschool'];
                $admission_class = $_POST['admission_class'];

                $query = "INSERT INTO admissions (
                    admission_child_name, 
                    admission_child_age, 
                    admission_child_dob, 
                    admission_mother_name, 
                    admission_father_name,
                    admission_address,
                    admission_playschool,
                    admission_class) VALUES(
                        '$admission_child_name', 
                        '$admission_child_age',
                        '$admission_child_dob',
                        '$admission_mother_name',
                        '$admission_father_name',
                        '$admission_address',
                        '$admission_playschool',
                        '$admission_class'
                        )";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
                } else {
                    echo "<div class='alert alert-success' role='alert'>Thank you! Your form has been submitted, we will contact you shortly</div>";
                }
            }

            ?>
            <div class="form-floating mb-3">
                <input name="admission_child_name" type="text" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label class="form-label" for="floatingInput">Child's Name</label>
            </div>
            <div class="form-floating mb-3">
                <input name="admission_child_age" type="number" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label class="form-label" for="floatingInput">Child's Age</label>
            </div>
            <div class="form-floating mb-3">
                <input name="admission_child_dob" type="date" class="form-control" id="floatingInput"
                    placeholder="DD/MM/YYYY">
                <label class="form-label" for="floatingInput">Date of Birth</label>
            </div>
            <div class="form-floating mb-3">
                <input name="admission_mother_name" type="text" class="form-control" id="floatingInput"
                    placeholder="DD/MM/YYYY">
                <label class="form-label" for="floatingInput">Mother's Name</label>
            </div>
            <div class="form-floating mb-3">
                <input name="admission_father_name" type="text" class="form-control" id="floatingInput"
                    placeholder="DD/MM/YYYY">
                <label class="form-label" for="floatingInput">Father's Name</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="admission_address" class="form-control" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label class="form-label" for="floatingTextarea2">Residential Address</label>
            </div>
            <div class="form-floating mb-3">
                <select name="admission_playschool" class="form-select form-dropdown-option" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option class="form-dropdown-option" admission="admission_playschool" value="Yes">Yes</option>
                    <option class="form-dropdown-option" admission="admission_playschool" value="No">No</option>
                </select>
                <label class="form-label" for="floatingSelect">Has the child ever been to a playschool?</label>
            </div>

            <div class="form-floating mb-3">
                <select name="admission_class" class="form-select form-dropdown-option" id="floatingSelectAdmissions"
                    aria-label="Floating label select example">
                    <option name="admission_class" class="form-dropdown-option">Click here for options</option>
                    <option name="admission_class" class="form-dropdown-option" value="Daycare">Daycare</option>
                    <option name="admission_class" class="form-dropdown-option" value="Play Group">Play Group</option>
                    <option name="admission_class" class="form-dropdown-option" value="Nursery">Nursery</option>
                    <option name="admission_class" class="form-dropdown-option" value="Kindergarten">Kindergarten
                    </option>
                    <option name="admission_class" class="form-dropdown-option" value="Upper KG">Upper KG</option>
                    <option name="admission_class" class="form-dropdown-option" value="School Readiness Program">School
                        Readiness Program
                    </option>
                </select>
                <label class="form-label" for="floatingSelectAdmissions">Seeking Admission to</label>
            </div>

            <button class="admission-btn btn mt-3" type="submit" name="submit">Submit</button>

        </form>
    </div>
</div>