<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "rivage_db";
    protected $connection;

    // Устанавливаем соединение с базой данных
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Закрываем соединение с базой данных
    public function closeConnection() {
        $this->connection->close();
    }

    // Получаем объект соединения с базой данных
    public function getConnection() {
        return $this->connection;
    }
}
?>
