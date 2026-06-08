<?php

require_once __DIR__ . '/../config/Database.php';
class University {
    private PDO $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
   
    // method to create a new university
    public function create(string $university_name, string $location, string $description): bool {
        $sql = "INSERT INTO universities (university_name, location, description) VALUES (:university_name, :location, :description)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':university_name', $university_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':description', $description);

        return $stmt->execute();
    }

    // method to get all universities
    public function getAllUniversities(): array {
        $sql = "SELECT * FROM universities ORDER BY university_name DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countUniversities(): int {
        $sql = "SELECT COUNT(*) as count FROM universities";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$result['count'];
    }

    public function findById(int $id): ?array {
        $sql = "SELECT * FROM universities WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $university_name, string $location, string $description): bool {
        $sql = "UPDATE universities SET university_name = :university_name, location = :location, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':university_name', $university_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM universities WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}