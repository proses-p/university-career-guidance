<?php

require_once __DIR__ . '/../models/career.php';

class CareerController {
    private Career $careerModel;

    public function __construct() {
        $this->careerModel = new Career();
    }

    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $career_name = $_POST['career_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $course_id = isset($_POST['course_id']) ? (int)$_POST['course_id'] : 0;

            if ($this->careerModel->create($career_name, $description, $course_id)) {
                echo "<p style='color: green;'>Career added successfully!</p>";
                header("Location: add_career.php");
                exit();
            } else {
                echo "<p style='color: red;'>Failed to add career. Please try again.</p>";
            }
        }
    }

    
}