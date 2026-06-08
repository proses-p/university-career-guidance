<?php

require_once __DIR__ . '/../config/Database.php';

class Course {
    private PDO $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
   
    // method to create a new course
    public function create(string $course_name, string $description, string $duration, int $university_id): bool {
        $sql = "INSERT INTO courses (course_name, description, duration, university_id) VALUES (:course_name, :description, :duration, :university_id)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':course_name', $course_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':university_id', $university_id);

        return $stmt->execute();
    }

    // method to get all courses for a university
    public function getCoursesByUniversity(int $university_id): array {
        $sql = "SELECT courses.*, universities.university_name FROM courses JOIN universities ON courses.university_id = universities.id WHERE university_id = :university_id ORDER BY courses.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':university_id', $university_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // method to get all courses across universities
    public function getAllCourses(): array {
        $sql = "SELECT courses.id, courses.course_name, courses.description, courses.duration, universities.university_name FROM courses LEFT JOIN universities ON courses.university_id = universities.id ORDER BY courses.id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchCourses(string $keyword): array {
        $sql = "SELECT courses.id, courses.course_name, courses.description, courses.duration, universities.university_name FROM courses LEFT JOIN universities ON courses.university_id = universities.id WHERE courses.course_name LIKE :keyword OR courses.description LIKE :keyword ORDER BY courses.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':keyword', "%$keyword%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array {
        $sql = "SELECT * FROM courses WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getCourseById(int $id): ?array {
        $sql = "SELECT courses.*, universities.university_name FROM courses LEFT JOIN universities ON courses.university_id = universities.id WHERE courses.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function update(int $id, string $course_name, string $description, string $duration, int $university_id): bool {
        $sql = "UPDATE courses SET course_name = :course_name, description = :description, duration = :duration, university_id = :university_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':course_name', $course_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':university_id', $university_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM courses WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function countCourses(): int {
        $sql = "SELECT COUNT(*) as count FROM courses";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$result['count'];
    }
}