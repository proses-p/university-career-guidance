<?php
require_once __DIR__ . '/../../app/middleware/Admin.php';
require_once __DIR__ . '/../../app/models/Course.php';
Admin::check();
$courseModel = new Course();
$courses = $courseModel->getAllCourses();
require_once __DIR__ . '/../../app/views/layout/header.php';

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $courses = $courseModel->searchCourses($searchTerm);
} else {
    $courses = $courseModel->getAllCourses();
}
?>

<div class="row">
    <aside class="col-lg-3 mb-4">
        <?php require_once __DIR__ . '/../../app/views/layout/admin_sidebar.php'; ?>
    </aside>
    <section class="col-lg-9">
        <div class="card card-compact shadow-sm border-0 p-4 mb-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h2 class="h5 mb-1">Courses</h2>
                    <p class="text-muted mb-0">Manage course listings and details.</p>
                </div>
                <a href="add_course.php" class="btn btn-primary">Add New Course</a>
            </div>
        </div>

        <div class="card card-compact shadow-sm border-0 p-4 mb-4">
            <form method="GET" action="" class="row g-3 align-items-center">
                <div class="col-sm-9">
                    <input type="text" name="search" class="form-control" placeholder="Search courses..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>University</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?php echo $course['id']; ?></td>
                            <td><a href="course_details.php?id=<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></a></td>
                            <td><?php echo htmlspecialchars($course['description']); ?></td>
                            <td><?php echo htmlspecialchars($course['duration']); ?></td>
                            <td><?php echo htmlspecialchars($course['university_name']); ?></td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-primary me-2" href="edit_course.php?id=<?php echo $course['id']; ?>">Edit</a>
                                <a class="btn btn-sm btn-outline-danger" href="delete_course.php?id=<?php echo $course['id']; ?>" onclick="return confirm('Delete this course?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <a href="admin_dashboard.php" class="btn btn-outline-primary mt-3">Back to Dashboard</a>
    </section>
</div>

<?php require_once __DIR__ . '/../../app/views/layout/footer.php'; ?> 