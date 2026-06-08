<?php

require_once __DIR__ . '/../models/Course.php';

class CourseController {
    private Course $courseModel;

    public function __construct() {
        $this->courseModel = new Course();
    }
    

    public function addCourse(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course_name = $_POST['course_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $duration = $_POST['duration'] ?? '';
            $university_id = $_POST['university_id'] ?? 0;

            if ($this->courseModel->create($course_name, $description, $duration, (int)$university_id)) {
                echo "<p style='color: green;'>Course added successfully!</p>";
                header("Location: add_course.php");
                exit();
            } else {
                echo "<p style='color: red;'>Failed to add course. Please try again.</p>";
            }
        }
    }

    public function updateCourse(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            $course_name = $_POST['course_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $duration = $_POST['duration'] ?? '';
            $university_id = $_POST['university_id'] ?? 0;

            if ($id > 0 && $this->courseModel->update($id, $course_name, $description, $duration, (int)$university_id)) {
                header("Location: courses.php");
                exit();
            } else {
                echo "<p style='color: red;'>Failed to update course. Please try again.</p>";
            }
        }
    }

    public function deleteCourse(int $id): void {
        if ($id > 0) {
            $this->courseModel->delete($id);
        }
        header("Location: courses.php");
        exit();
    }
}
