<?php
require_once '../app/models/User.php';

$message = '';
$messageType = '';

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($fullname) && !empty($email) && !empty($password)) {
        $user = new User();
        if ($user->create($fullname, $email, $password)) {
            session_start();
            $_SESSION['user_id'] = $user->findByEmail($email)['id'];
            $_SESSION['fullname'] = $fullname;
            $_SESSION['role'] = 'user';
            header('Location: dashboard.php');
            exit();
        } else {
            $message = 'Registration failed. Email may already exist.';
            $messageType = 'danger';
        }
    } else {
        $message = 'Please fill in all fields.';
        $messageType = 'warning';
    }
}
?>
<?php require_once __DIR__ . '/../app/views/layout/auth_header.php'; ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">
    <div class="col-12 col-sm-10 col-md-8 col-lg-5 px-3">
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                <h2 class="h5 mb-0">Create UniversityHub Account</h2>
            </div>
            <div class="card-body p-4 p-md-5">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($message); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <p class="text-center text-muted mb-4">Register to access course recommendations, university guidance, and student resources.</p>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">✉️</span>
                            <input type="email" id="email" name="email" class="form-control border-start-0" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">🔒</span>
                            <input type="password" id="password" name="password" class="form-control border-start-0" placeholder="Enter a secure password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                </form>
                <div class="text-center mt-4">
                    <small class="text-muted">Already have an account? <a href="login.php" class="text-primary text-decoration-none fw-semibold">Login here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../app/views/layout/auth_footer.php'; ?>
