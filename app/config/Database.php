<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "university_course_guidance";

    public function connect() {
        try {
            return new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
        } catch (PDOEXception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}