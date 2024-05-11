<?php

class QnaEngine {
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

    public function getQuestionsAndAnswers(){
        // Выполняем запрос к базе данных для получения вопросов и ответов
        $query = "SELECT id, question, answer FROM faq";
        $result = $this->conn->query($query);

        // Обрабатываем результат запроса и формируем массив с вопросами и ответами
        $qna_data = [];
        while ($row = $result->fetch()) {
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
