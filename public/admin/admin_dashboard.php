<?php
require_once __DIR__ . '/../../app/middleware/Admin.php';
require_once __DIR__ . '/../../app/models/University.php';
require_once __DIR__ . '/../../app/models/Course.php';
require_once __DIR__ . '/../../app/models/career.php';

Admin::check();
$universityModel = new University();
$courseModel = new Course();
$careerModel = new Career();
?>
<?php require_once __DIR__ . '/../../app/views/layout/header.php'; ?>
<div class="row">
    <aside class="col-lg-3 mb-4">
        <?php require_once __DIR__ . '/../../app/views/layout/admin_sidebar.php'; ?>
    </aside>
    <section class="col-lg-9">
        <div class="d-flex flex-column gap-4">
            <div class="card card-compact shadow-sm border-0 p-4">
                <h2 class="h4 mb-3">Admin Dashboard</h2>
                <p class="text-muted mb-0">Manage universities, courses, careers, and view system statistics from one place.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-compact p-4">
                        <h6 class="text-uppercase text-muted">Universities</h6>
                        <p class="display-5 fw-bold mb-0"><?php echo $universityModel->countUniversities(); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-compact p-4">
                        <h6 class="text-uppercase text-muted">Courses</h6>
                        <p class="display-5 fw-bold mb-0"><?php echo $courseModel->countCourses(); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-compact p-4">
                        <h6 class="text-uppercase text-muted">Careers</h6>
                        <p class="display-5 fw-bold mb-0"><?php echo count($careerModel->getAllCareers()); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once __DIR__ . '/../../app/views/layout/footer.php'; ?>