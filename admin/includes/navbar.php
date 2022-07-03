<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">

                    <a class="nav-link" aria-current="page" href="dashboard.php">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Class Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="add-class.php
                        ">Add Class</a></li>
                        <li><a class="dropdown-item" href="view-class.php">Edit | View Classes</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="add-class.php
                        ">Add Subjects</a></li>
                        <li><a class="dropdown-item" href="view-class.php">Edit | View Subjects</a></li>
                    </ul>
                </li>

                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="add-student.php
                        ">Add Student</a></li>
                        <li><a class="dropdown-item" href="view-student.php
                        ">View | Edit Student</a></li>
                        <li><a class="dropdown-item" href="#">Mark Student Attendance</a></li>
                        <li><a class="dropdown-item" href="#">View All Student Attendance</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="add-staff.php">Add Staff</a></li>
                        <li><a class="dropdown-item" href="view-staff.php">View | Edit Staff</a></li>
                        <li><a class="dropdown-item" href="mark-attendance.php">Mark Staff Attendance</a></li>
                        <li><a class="dropdown-item" href="view-staff-attendance.php">View All Staff Attendance</a></li>
                    </ul>
                </li>

                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Forms
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">View Parents Users</a></li>
                        <li><a class="dropdown-item" href="#">Edit Parent Users</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="view-students.php">View Admission Forms</a></li>
                    </ul>
                </li>

                <li class="nav-item  dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Fee Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">View all paid</a></li>
                        <li><a class="dropdown-item" href="#">Send Payment Link</a></li>
                    </ul>
                </li>

            </ul>
            <div class="d-flex">
                <div class="nav-item">
                    <a class="nav-link" href="settings.php">
                        Settings
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="home/logout.php">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>