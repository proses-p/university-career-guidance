<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../app/middleware/Admin.php';
require_once __DIR__ . '/../../app/controllers/UniversityController.php';
Admin::check();
$controller = new UniversityController();
$controller->addUniversity();
?>
<?php require_once __DIR__ . '/../../app/views/layout/header.php'; ?>
<div class="row">
    <aside class="col-lg-3 mb-4">
        <?php require_once __DIR__ . '/../../app/views/layout/admin_sidebar.php'; ?>
    </aside>
    <section class="col-lg-9">
        <div class="card card-compact shadow-sm border-0 p-4">
            <h2 class="h5 mb-3">Add University</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">University Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" id="location" name="location" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add University</button>
                <a href="admin_dashboard.php" class="btn btn-outline-primary ms-2">Back</a>
            </form>
        </div>
    </section>
</div>
<?php require_once __DIR__ . '/../../app/views/layout/footer.php';