<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../app/middleware/Admin.php';
require_once '../../app/controllers/UniversityController.php';
require_once '../../app/models/University.php';
Admin::check();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: universities.php');
    exit;
}

$controller = new UniversityController();
$controller->deleteUniversity($_GET['id']);