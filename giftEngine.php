<?php
require_once 'Database.php';

class GiftEngine {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function sendGift($mobile) {
        $sql = "INSERT INTO gift (mobile) VALUES (?)";
        $statement = $this->db->getConnection()->prepare($sql);
        $statement->bind_param("s", $mobile);
        $insert = $statement->execute();

        if ($insert) {
            // Подарок успешно отправлен, устанавливаем флаг в сессии
            session_start();
            $_SESSION['gift_modal_accepted'] = true;

            // Перенаправляем пользователя на главную страницу
            header("Location: http://localhost/rivageHotel/main.php");
            exit;
        } else {
            echo "CHYBA";
        }
    }
}

// Проверяем, были ли переданы данные POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Создаем экземпляр класса Database для подключения к базе данных
    $database = new Database();

    // Создаем экземпляр класса GiftEngine
    $giftEngine = new GiftEngine($database);

    // Получаем данные из формы
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);

    // Отправляем подарок
    if ($mobile !== false) {
        $giftEngine->sendGift($mobile);
    } else {
        echo "Nesprávne zadané údaje";
    }
}
?>
