<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../app/middleware/Admin.php';
require_once __DIR__ . '/../../app/controllers/CourseController.php';
require_once __DIR__ . '/../../app/models/University.php';
Admin::check();
$courseController = new CourseController();
$courseController->addCourse();
$universityModel = new University();
$universities = $universityModel->getAllUniversities();
?>
<?php require_once __DIR__ . '/../../app/views/layout/header.php'; ?>
<div class="row">
    <aside class="col-lg-3 mb-4">
        <?php require_once __DIR__ . '/../../app/views/layout/admin_sidebar.php'; ?>
    </aside>
    <section class="col-lg-9">
        <div class="card card-compact shadow-sm border-0 p-4">
            <h2 class="h5 mb-3">Add Course</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="course_name" class="form-label">Course Name</label>
                    <input type="text" id="course_name" name="course_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" id="duration" name="duration" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="university_id" class="form-label">University</label>
                    <select id="university_id" name="university_id" class="form-select" required>
                        <option value="">Select University</option>
                        <?php foreach ($universities as $university): ?>
                            <option value="<?php echo $university['id']; ?>"><?php echo htmlspecialchars($university['university_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Course</button>
                <a href="admin_dashboard.php" class="btn btn-outline-primary ms-2">Back</a>
            </form>
        </div>
    </section>
</div>
<?php require_once __DIR__ . '/../../app/views/layout/footer.php'; ?>