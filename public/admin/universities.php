<?php
require_once __DIR__ . '/../../app/middleware/Admin.php';
require_once __DIR__ . '/../../app/models/University.php';
Admin::check();
$universityModel = new University();
$universities = $universityModel->getAllUniversities();
?>
<?php require_once __DIR__ . '/../../app/views/layout/header.php'; ?>
<div class="row">
    <aside class="col-lg-3 mb-4">
        <?php require_once __DIR__ . '/../../app/views/layout/admin_sidebar.php'; ?>
    </aside>
    <section class="col-lg-9">
        <div class="card card-compact shadow-sm border-0 p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="h5 mb-1">Universities</h2>
                    <p class="text-muted mb-0">Manage all registered universities.</p>
                </div>
                <a href="add_university.php" class="btn btn-primary">Add University</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($universities as $uni): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($uni['university_name']); ?></td>
                        <td><?php echo htmlspecialchars($uni['location']); ?></td>
                        <td><?php echo htmlspecialchars($uni['description']); ?></td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary me-2" href="edit_university.php?id=<?php echo $uni['id']; ?>">Edit</a>
                            <a class="btn btn-sm btn-outline-danger" href="delete_university.php?id=<?php echo $uni['id']; ?>" onclick="return confirm('Delete this university?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?php require_once __DIR__ . '/../../app/views/layout/footer.php'; ?>