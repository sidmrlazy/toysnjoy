<div class="container mt-5 mb-5">
    <div class="accordion container" id="accordionExample">

        <div class="accordion-item">
            <?php
            include('config.php');

            $query = "SELECT * FROM `admission_form`";
            $get_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($get_users)) {
                $af_id = $row['af_id'];
                $af_child_name = $row['af_child_name'];
                $af_child_gender = $row['af_child_gender'];
                $af_mother_name = $row['af_mother_name'];
                $af_mother_contact = $row['af_mother_contact'];
                $af_mother_occupation = $row['af_mother_occupation'];
                $af_father_name = $row['af_father_name'];
                $af_father_contact = $row['af_father_contact'];
                $af_father_occupation = $row['af_father_occupation'];
                $af_address = $row['af_address'];
                $af_distance = $row['af_distance'];
                $af_member_one_name = $row['af_member_one_name'];
                $af_member_one_age = $row['af_member_one_age'];
                $af_member_one_relation = $row['af_member_one_relation'];
                $af_member_one_occupation = $row['af_member_one_occupation'];
                $af_member_two_name = $row['af_member_two_name'];
                $af_member_two_age = $row['af_member_two_age'];
                $af_member_two_relation = $row['af_member_two_relation'];
                $af_member_two_occupation = $row['af_member_two_occupation'];
                $af_member_three_name = $row['af_member_three_name'];
                $af_member_three_age = $row['af_member_three_age'];
                $af_member_three_relation = $row['af_member_three_relation'];
                $af_member_three_occupation = $row['af_member_three_occupation'];
                $af_member_four_name = $row['af_member_four_name'];
                $af_member_four_age = $row['af_member_four_age'];
                $af_member_four_relation = $row['af_member_four_relation'];
                $af_member_four_occupation = $row['af_member_four_occupation'];
                $af_emergency_name = $row['af_emergency_name'];
                $af_emergency_contact = $row['af_emergency_contact'];
                $af_emergency_relation = $row['af_emergency_relation'];
                $af_class = $row['af_class'];
                $af_payment_amount = $row['af_payment_amount'];
                $af_payment_status = $row['af_payment_status'];
                $af_payment_date = $row['af_payment_date'];
                $af_payment_id = $row['af_payment_id'];

            ?>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#<?php echo "item" . $af_id ?>" aria-expanded="true">
                    <?php echo $af_child_name ?>
                </button>
            </h2>
            <div id="<?php echo "item" . $af_id ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="mid-acc-section col-md-3">
                        <h5>Child's Details</h5>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Gender</p>
                            <h5 class="acc-response"><?php echo $af_child_gender ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Seeking Admission to</p>
                            <h5 class="acc-response"><?php echo $af_class ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Distance from school</p>
                            <h5 class="acc-response"><?php echo $af_distance ?>Km</h5>
                        </div>
                    </div>
                    <div class="mid-acc-section col-md-3">
                        <h5>Parents Details</h5>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Mother's Name</p>
                            <h5 class="acc-response"><?php echo $af_mother_name ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Mother's Contact Number</p>
                            <h5 class="acc-response"><?php echo $af_mother_contact ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Mother's Occupation</p>
                            <h5 class="acc-response"><?php echo $af_mother_occupation ?></h5>
                        </div>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Fathers's Name</p>
                            <h5 class="acc-response"><?php echo $af_father_name ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Fathers's Contact Number</p>
                            <h5 class="acc-response"><?php echo $af_father_contact ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Fathers's Occupation</p>
                            <h5 class="acc-response"><?php echo $af_father_occupation ?></h5>
                        </div>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Fathers's Name</p>
                            <h5 class="acc-response"><?php echo $af_address ?></h5>
                        </div>

                    </div>
                    <div class="mid-acc-section col-md-3">
                        <h5>Other Family Members Details</h5>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Member Name</p>
                            <h5 class="acc-response"><?php echo $af_member_one_name ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Age</p>
                            <h5 class="acc-response"><?php echo $af_member_one_age ?>Years</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Relation</p>
                            <h5 class="acc-response"><?php echo $af_member_one_relation ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Occupation</p>
                            <h5 class="acc-response"><?php echo $af_member_one_occupation ?></h5>
                        </div>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Member Name</p>
                            <h5 class="acc-response"><?php echo $af_member_two_name ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Age</p>
                            <h5 class="acc-response"><?php echo $af_member_two_age ?>Years</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Relation</p>
                            <h5 class="acc-response"><?php echo $af_member_two_relation ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Occupation</p>
                            <h5 class="acc-response"><?php echo $af_member_two_occupation ?></h5>
                        </div>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Member Name</p>
                            <h5 class="acc-response"><?php echo $af_member_three_name ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Age</p>
                            <h5 class="acc-response"><?php echo $af_member_three_age ?>Years</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Relation</p>
                            <h5 class="acc-response"><?php echo $af_member_three_relation ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Occupation</p>
                            <h5 class="acc-response"><?php echo $af_member_three_occupation ?></h5>
                        </div>
                    </div>
                    <div class="acc-row">
                        <div class="col-md-3">
                            <p class="acc-label">Member Name</p>
                            <h5 class="acc-response"><?php echo $af_member_four_name ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Age</p>
                            <h5 class="acc-response"><?php echo $af_member_four_age ?>Years</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Relation</p>
                            <h5 class="acc-response"><?php echo $af_member_four_relation ?></h5>
                        </div>
                        <div class="col-md-3">
                            <p class="acc-label">Member Occupation</p>
                            <h5 class="acc-response"><?php echo $af_member_four_occupation ?></h5>
                        </div>
                    </div>

                    <div class="mid-acc-section col-md-3">
                        <h5>Payment Details</h5>
                    </div>
                    <div class="acc-row">

                        <div class="col-md-3">
                            <p class="acc-label">Payment Status</p>
                            <?php
                                if ($af_payment_status == 'pending') {
                                    echo "<h5 class='acc-response-failed'>Pending</h5>";
                                } elseif ($af_payment_status == 'complete') {
                                    echo "<h5 class='acc-response-success'>Complete</h5>";
                                }
                                ?>

                        </div>
                        <div class="col-md-3">
                            <?php

                                if ($af_payment_status == 'pending') {
                                    echo
                                    "<p class='acc-label'></p>
                            <h5 class='acc-response'></h5>";
                                } elseif ($af_payment_status == 'complete') {
                                    echo
                                    "<p class='acc-label'>Payment Date</p>
                            <h5 class='acc-response'>$af_payment_date</h5>";
                                }
                                ?>
                        </div>
                        <div class="col-md-3">
                            <?php

                                if ($af_payment_status == 'pending') {
                                    echo
                                    "<p class='acc-label'></p>
<h5 class='acc-response'></h5>";
                                } elseif ($af_payment_status == 'complete') {
                                    echo
                                    "<p class='acc-label'>Transaction ID</p>
<h5 class='acc-response'>$af_payment_id</h5>";
                                }
                                ?>
                        </div>
                        <div class="col-md-3">
                            <?php

                                if ($af_payment_status == 'pending') {
                                    echo
                                    "<p class='acc-label'></p>
<h5 class='acc-response'></h5>";
                                } elseif ($af_payment_status == 'complete') {
                                    echo
                                    "<p class='acc-label'>Paid</p>
<h5 class='acc-response'>$af_payment_amount</h5>";
                                }
                                ?>

                        </div>

                    </div>

                </div>
            </div>
            <?php

            }
            ?>
        </div>
    </div>
</div>