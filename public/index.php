<?php require_once __DIR__ . '/../app/views/layout/header.php'; ?>

<div class="row align-items-center min-vh-75">
    <div class="col-lg-6">
        <div class="card card-compact shadow-sm border-0 mb-4">
            <div class="card-body p-5">
                <h1 class="display-5 fw-bold">Welcome to UniversityHub</h1>
                <p class="lead text-muted">A modern university career guidance system for students and administrators.</p>
                <div class="d-flex flex-column flex-sm-row gap-3 mt-4">
                    <a href="login.php" class="btn btn-primary btn-lg">Login</a>
                    <a href="register.php" class="btn btn-outline-primary btn-lg">Register</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-flex justify-content-center">
        <div class="w-100 rounded shadow-sm overflow-hidden" style="max-width: 520px;">
            <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=1200&q=80" alt="University library" class="img-fluid">
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../app/views/layout/footer.php'; ?>
