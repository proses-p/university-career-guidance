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
        html, body {
            height: 100%;
        }
        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
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
        main {
            flex: 1;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold fs-5" href="/university_course_guidance/public/">UniversityHub</a>
    </div>
</nav>
<main class="container-fluid">
