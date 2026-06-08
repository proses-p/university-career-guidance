<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../app/controllers/CourseController.php';
$controller = new CourseController();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$controller->deleteCourse($id);
