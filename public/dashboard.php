<?php
require_once '../app/models/University.php';
require_once '../app/models/Course.php';
require_once '../app/models/career.php';
$universityModel = new University();
$courseModel = new Course();
$careerModel = new Career();
?>
<?php require_once __DIR__ . '/../app/views/layout/header.php'; ?>

<div class="dashboard-hero mb-5 d-flex align-items-center justify-content-center text-center">
    <div class="hero-content px-4">
        <h1 class="display-5 fw-bold">Welcome to UniversityHub Career Guidance System</h1>
        <p class="lead text-white-75 mt-3">Explore courses, universities and career paths</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card card-compact p-4">
            <h6 class="text-uppercase text-muted">Total Universities</h6>
            <p class="display-5 fw-bold mb-0"><?php echo $universityModel->countUniversities(); ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-compact p-4">
            <h6 class="text-uppercase text-muted">Total Courses</h6>
            <p class="display-5 fw-bold mb-0"><?php echo $courseModel->countCourses(); ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-compact p-4">
            <h6 class="text-uppercase text-muted">Total Careers</h6>
            <p class="display-5 fw-bold mb-0"><?php echo count($careerModel->getAllCareers()); ?></p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../app/views/layout/footer.php'; ?>
