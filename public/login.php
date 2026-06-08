<?php
require_once '../app/models/User.php';

$message = '';
$messageType = '';

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $user = new User();
        $userData = $user->findByEmail($email);

        if ($userData && password_verify($password, $userData['password'])) {
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['fullname'] = $userData['fullname'];
            if ($userData['role'] === 'admin') {
                $_SESSION['role'] = 'admin';
                header('Location: admin/admin_dashboard.php');
            } else {
                $_SESSION['role'] = 'user';
                header('Location: dashboard.php');
            }
            exit();
        } else {
            $message = 'Invalid email or password.';
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
                <h2 class="h5 mb-0">UniversityHub Login</h2>
            </div>
            <div class="card-body p-4 p-md-5">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($message); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <p class="text-center text-muted mb-4">Sign in to your account to continue</p>
                <form method="POST" action="">
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
                            <input type="password" id="password" name="password" class="form-control border-start-0" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                </form>
                <div class="text-center mt-4">
                    <small class="text-muted">Don't have an account? <a href="register.php" class="text-primary text-decoration-none fw-semibold">Register here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../app/views/layout/auth_footer.php'; ?>
