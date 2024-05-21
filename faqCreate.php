<?php
require_once 'Database.php';

class FormEngine {
    private $conn;

    public function __construct() {
        // Создаем экземпляр класса Database для подключения к базе данных
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function send() {
        $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
        $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($question !== false && $answer !== false) {
            $sql = "INSERT INTO faq (question, answer) VALUES (?, ?)";
            $statement = $this->conn->prepare($sql);

            $insert = $statement->bind_param("ss", $question, $answer); // Заменили параметры в запросе на плейсхолдеры и использовали bind_param

            if ($statement->execute()) {
                header("Location: http://localhost/rivageHotel/faq.php");
                exit;
            } else {
                echo "CHYBA";
            }
        } else {
            echo "Nespvane zadane data";
        }
    }

    public function __destruct() {
        $this->conn->close(); // Закрываем соединение с базой данных
    }
}

$forma = new FormEngine();
$forma->send();
?>
