<?php
require_once 'faq_read.php';

class QnaDeleter {
    private $db_connection;

    public function __construct($db_connection) {
        $this->db_connection = $db_connection;
    }

    public function deleteQna($id) {
        $delete_query = "DELETE FROM qna_table WHERE id = $id";
        $delete_result = mysqli_query($this->db_connection, $delete_query);

        if ($delete_result) {
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

    // Подключаемся к базе данных
    $db_connection = mysqli_connect("localhost", "root", "", "qna_db");

    if (mysqli_connect_errno()) {
        echo "Chyba: " . mysqli_connect_error();
        exit();
    }

    // Создаем экземпляр класса QnaDeleter
    $qna_deleter = new QnaDeleter($db_connection);

    // Вызываем метод deleteQna для удаления
    if ($qna_deleter->deleteQna($id)) {
        // Если успешно, перенаправляем пользователя на страницу FAQ
        header("Location: faq.php");
        exit();
    } else {
        // Если произошла ошибка при удалении, выводим сообщение об ошибке
        echo "Error: Unable to delete Q&A.";
    }

    // Закрываем соединение с базой данных
    mysqli_close($db_connection);
} else {
    // Если ID не был отправлен, выводим сообщение об ошибке
    echo "ID not provided for deletion.";
}
?>
