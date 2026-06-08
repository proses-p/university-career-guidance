<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../app/middleware/Admin.php';
require_once __DIR__ . '/../../app/controllers/career_controller.php';
require_once __DIR__ . '/../../app/models/Course.php';

Admin::check();
$controller = new CareerController();
$controller->store();
$courseModel = new Course();
$courses = $courseModel->getAllCourses();
?>
<?php require_once __DIR__ . '/../../app/views/layout/header.php'; ?>
<div class="row">
    <aside class="col-lg-3 mb-4">
        <?php require_once __DIR__ . '/../../app/views/layout/admin_sidebar.php'; ?>
    </aside>
    <section class="col-lg-9">
        <div class="card card-compact shadow-sm border-0 p-4">
            <h2 class="h5 mb-3">Add Career</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="career_name" class="form-label">Career Name</label>
                    <input type="text" id="career_name" name="career_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="course_id" class="form-label">Related Course</label>
                    <select id="course_id" name="course_id" class="form-select" required>
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Career</button>
                <a href="admin_dashboard.php" class="btn btn-outline-primary ms-2">Back</a>
            </form>
        </div>
    </section>
</div>
<?php require_once __DIR__ . '/../../app/views/layout/footer.php'; ?>