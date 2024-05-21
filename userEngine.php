<?php

require_once 'Database.php';

class UserEngine {
    private $conn;

    public function __construct() {
        // Создаем экземпляр класса Database для подключения к базе данных
        $db = new Database();
        $this->conn = $db->getConnection();

        // Начинаем сессию, если она ещё не была начата
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function register($email, $password, $password2) {
        if ($password !== $password2) {
            return "Passwords do not match!";
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return "Prepare failed: " . $this->conn->error;
        }
        $stmt->bind_param("ss", $email, $hashed_password);
        if ($stmt->execute()) {
            return "Registration successful!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function login($email, $password) {
        $query = "SELECT id, password FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return "Prepare failed: " . $this->conn->error;
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // Устанавливаем сессию
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $email;
            return "Login successful!";
        } else {
            return "Invalid email or password!";
        }
    }

    public function updatePassword($email, $new_password) {
        // Хешируем новый пароль
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Обновляем пароль в базе данных
        $query = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return "Prepare failed: " . $this->conn->error;
        }
        $stmt->bind_param("ss", $hashed_password, $email);
        if ($stmt->execute()) {
            return "Success";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function redirectToMainIfLoggedIn() {
        if ($this->isLoggedIn()) {
            header("Location: main.php");
            exit();
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function __destruct() {
        $this->conn->close(); // Закрываем соединение с базой данных
    }
}
?>
