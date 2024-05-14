<?php

class UserEngine {
    private $host = "localhost";
    private $dbname = "rivage_db";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    private $conn;

    public function __construct() {
        try {
            // Устанавливаем соединение с базой данных
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};port={$this->port}", $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            // Если произошла ошибка при подключении, выводим сообщение об ошибке и завершаем скрипт
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    public function register($email, $password, $password2) {
        if ($password !== $password2) {
            return "Passwords do not match!";
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (email, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        try {
            $stmt->execute([$email, $hashed_password]);
            return "Registration successful!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function login($email, $password) {
        $query = "SELECT id, password FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return "Login successful!";
        } else {
            return "Invalid email or password!";
        }
    }
}
?>
