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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
            $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id !== false && $question !== false && $answer !== false) {
                $sql = "UPDATE faq SET question = ?, answer = ? WHERE id = ?";
                $statement = $this->conn->prepare($sql);
                $statement->bind_param("ssi", $question, $answer, $id);

                if ($statement->execute()) {
                    header("Location: http://localhost/rivageHotel/faq.php");
                    exit;
                } else {
                    echo "CHYBA";
                }
            } else {
                echo "Nespvane zadane data";
            }
        } else {
            echo "ID not provided for editing.";
        }
    }

    public function __destruct() {
        $this->conn->close(); // Закрываем соединение с базой данных
    }
}

$forma = new FormEngine();
$forma->send();
?>
