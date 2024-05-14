<?php
require_once 'UserEngine.php';

class Registration {
    private $userEngine;

    public function __construct() {
        $this->userEngine = new UserEngine();
    }

    public function handleRegistration() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['mail'];
            $password = $_POST['pass'];
            $password2 = $_POST['pass2'];

            $result = $this->userEngine->register($email, $password, $password2);

            if ($result === "Success") {
                header("Location: main.php");
                exit();
            } else {
                echo $result;
            }
        }
    }
}

$registration = new Registration();
$registration->handleRegistration();
?>
