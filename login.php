<?php
require_once 'UserEngine.php';

class Login {
    private $userEngine;

    public function __construct() {
        $this->userEngine = new UserEngine();
    }

    public function handleLogin() {
        $this->userEngine->redirectToMainIfLoggedIn();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['mail'];
            $password = $_POST['password'];

            $result = $this->userEngine->login($email, $password);
            if ($result === "Login successful!") {
                header("Location: main.php"); // Перенаправление на защищенную страницу
                exit();
            } else {
                echo $result;
            }
        }
    }
}

$login = new Login();
$login->handleLogin();
?>
