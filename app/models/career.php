<?php

require_once __DIR__ . '/../config/Database.php';

class Career {
    private PDO $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
   
    // method to create a new career
    public function create(string $career_name, string $description, int $course_id): bool {
        $sql = "INSERT INTO career_paths (course_id, career_name, description) VALUES (:course_id, :career_name, :description)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':career_name', $career_name);
        $stmt->bindParam(':description', $description);

        return $stmt->execute();
    }

    public function getByCourseId(int $course_id): ?array {
        $sql = "SELECT careers.* FROM careers JOIN course_careers ON careers.id = course_careers.career_id WHERE course_careers.course_id = :course_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // method to get all careers
    public function getAllCareers(): array {
        $sql = "SELECT * FROM careers ORDER BY career_name DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}