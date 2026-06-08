<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniversityHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --brand-dark: #0d1b2a;
            --bg-light: #f8f9fa;
            --text-dark: #212529;
        }
        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .navbar, .bg-primary {
            background-color: var(--brand-dark) !important;
        }
        .navbar .navbar-brand, .navbar .nav-link, .nav-link {
            color: #ffffff !important;
        }
        .navbar .nav-link:hover, .navbar .nav-link.active {
            color: #adb5bd !important;
        }
        .dashboard-hero {
            min-height: 70vh;
            background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
            color: #ffffff;
        }
        .dashboard-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
        }
        .dashboard-hero .hero-content {
            position: relative;
            z-index: 1;
        }
        .card-compact {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08);
        }
        .sidebar-card {
            min-height: 100%;
            border: none;
            box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.08);
        }
        .list-group-item {
            border: none;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="/university_course_guidance/public/dashboard.php">UniversityHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/university_course_guidance/public/dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/university_course_guidance/public/admin/universities.php">Universities</a></li>
                <li class="nav-item"><a class="nav-link" href="/university_course_guidance/public/admin/courses.php">Courses</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/university_course_guidance/public/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="container-fluid py-4">
    <div class="container">

