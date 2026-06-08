<?php
require_once '../app/models/Course.php';
require_once '../app/models/career.php';
$courseModel = new Course();
$careerModel = new Career();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$course = $courseModel->getCourseById($id);
$careers = $careerModel->getByCourseId($id);
require_once __DIR__ . '/../app/views/layout/header.php';
if (!$course) {
    echo '<div class="alert alert-danger">Course not found.</div>';
    echo '<a href="courses.php" class="btn btn-outline-primary">Back to Courses</a>';
    require_once __DIR__ . '/../app/views/layout/footer.php';
    exit;
}
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-compact shadow-sm border-0 mb-4">
            <div class="card-body">
                <h1 class="h3 fw-bold mb-3"><?php echo htmlspecialchars($course['course_name']); ?></h1>
                <p class="mb-2"><strong>Description:</strong> <?php echo htmlspecialchars($course['description']); ?></p>
                <p class="mb-2"><strong>Duration:</strong> <?php echo htmlspecialchars($course['duration']); ?></p>
                <p class="mb-0"><strong>University:</strong> <?php echo htmlspecialchars($course['university_name']); ?></p>
            </div>
        </div>

        <div class="card card-compact shadow-sm border-0">
            <div class="card-body">
                <h2 class="h5 mb-3">Possible Careers</h2>
                <?php if (count($careers) > 0): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($careers as $career): ?>
                            <li class="list-group-item">
                                <strong><?php echo htmlspecialchars($career['career_name']); ?></strong>
                                <p class="mb-0 text-muted"><?php echo htmlspecialchars($career['description']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted mb-0">No related careers found.</p>
                <?php endif; ?>
            </div>
        </div>

        <a href="courses.php" class="btn btn-outline-primary mt-4">Back to Courses</a>
    </div>
</div>

<?php require_once __DIR__ . '/../app/views/layout/footer.php'; ?>