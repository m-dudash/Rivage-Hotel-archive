<?php
require_once 'Database.php';

// Класс для работы с формой
class FormEngine {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function send() {
        $conn = $this->db->getConnection();

        $meno = filter_input(INPUT_POST, 'meno', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($meno !== false && $email !== false && $mobile !== false) {
            // Подготовка запроса
            $sql = "INSERT INTO otazky (meno, mail, mobile) VALUES (?, ?, ?)";
            $statement = $conn->prepare($sql);

            // Привязка параметров и выполнение запроса
            $statement->bind_param("sss", $meno, $email, $mobile);
            $insert = $statement->execute();

            if ($insert) {
                header("Location: http://localhost/rivageHotel/thanks.php");
                exit;
            } else {
                echo "CHYBA";
            }
        } else {
            echo "Nespvane zadane data";
        }
    }
}

// Создаем экземпляр класса Database
$database = new Database();

// Создаем экземпляр класса FormEngine и передаем ему экземпляр базы данных
$forma = new FormEngine($database);

// Вызываем метод send()
$forma->send();
?>
