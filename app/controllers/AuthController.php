<?php

require_once '../app/models/User.php';

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();

            if ($user->create($fullname, $email, $password)) {
                echo "User registered successfully!";
            } else {
                echo "Failed to register user.";
            }
        }
    }

    // method to handle user login
        
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

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
                echo "Invalid email or password.";
            }
        }
    }
