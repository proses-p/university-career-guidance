<?php
require_once '../app/config/Database.php';

class User {
    private PDO $conn;

    public function __construct() {
        $database = new Database();

        $this->conn = $database->connect();
    }
    
    // method to create a new user
    public function create(string $fullname, string $email, string $password): bool {
        $sql = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

        return $stmt->execute();
    }

    // method to find a user by email
    public function findByEmail(string $email): ?array {
        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}