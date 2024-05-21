<?php
require_once 'Database.php';

class QnaDeleter {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteQna($id) {
        $delete_query = "DELETE FROM faq WHERE id = ?";
        $statement = $this->conn->prepare($delete_query);
        $statement->bind_param("i", $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

// Проверяем, был ли отправлен запрос на удаление
if (isset($_GET['id'])) {
    // Получаем ID для удаления
    $id = $_GET['id'];

    // Создаем экземпляр класса Database для подключения к базе данных
    $db = new Database();
    $conn = $db->getConnection();

    // Создаем экземпляр класса QnaDeleter
    $qna_deleter = new QnaDeleter($conn);

    // Вызываем метод deleteQna для удаления
    if ($qna_deleter->deleteQna($id)) {
        // Если успешно, перенаправляем пользователя на страницу FAQ
        header("Location: faq.php");
        exit();
    } else {
        // Если произошла ошибка при удалении, выводим сообщение об ошибке
        echo "Error: Unable to delete Q&A.";
    }
} else {
    // Если ID не был отправлен, выводим сообщение об ошибке
    echo "ID not provided for deletion.";
}
?>
