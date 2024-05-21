<?php

require_once 'Database.php';

class QnaEngine {
    private $conn;

    public function __construct() {
        // Создаем экземпляр класса Database для подключения к базе данных
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getQuestionsAndAnswers(){
        // Выполняем запрос к базе данных для получения вопросов и ответов
        $query = "SELECT id, question, answer FROM faq";
        $result = $this->conn->query($query);

        // Обрабатываем результат запроса и формируем массив с вопросами и ответами
        $qna_data = [];
        while ($row = $result->fetch_assoc()) { // Заменяем fetch() на fetch_assoc()
            $qna_data[] = $row;
        }

        return $qna_data;
    }


    public function updateQuestionAndAnswer($qna_id, $question, $answer) {
        // Подготавливаем запрос на обновление вопроса и ответа в базе данных
        $stmt = $this->conn->prepare("UPDATE faq SET question = ?, answer = ? WHERE id = ?");
        $stmt->execute([$question, $answer, $qna_id]);
    }
}

?>
