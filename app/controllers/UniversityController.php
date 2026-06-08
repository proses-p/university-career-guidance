<?php

require_once __DIR__ . '/../models/University.php';

class UniversityController {
    //private University $universityModel;

    /*public function __construct() {
        $this->universityModel = new University();
    }
    */

    // method to handle university creation
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $name = trim($_POST['name']);
        $location = trim($_POST['location']);
        $description = trim($_POST['description']);

        $university = new University();

        $university->create($name, $location, $description);
        header('Location: add_university.php');
        exit();

    
    }

    public function addUniversity() {
        $this->store();
    }

    public function updateUniversity() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $id = (int)$_POST['id'];
        $name = trim($_POST['name']);
        $location = trim($_POST['location']);
        $description = trim($_POST['description']);

        $university = new University();
        $university->update($id, $name, $location, $description);
        header('Location: universities.php');
        exit();
    }

    public function deleteUniversity() {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return;
        }

        $id = (int)$_GET['id'];
        $university = new University();
        $university->delete($id);
        header('Location: universities.php');
        exit();
    }
}