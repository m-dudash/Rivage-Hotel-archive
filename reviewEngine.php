<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'Database.php';

class ReviewEngine {
    private $conn;

    public function __construct() {
        // Создаем экземпляр класса Database для подключения к базе данных
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllReviews() {
        // Выполняем запрос к базе данных для получения всех отзывов с именем пользователя, если оно есть
        $query = "SELECT reviews.rating, users.email, users.name, reviews.content, reviews.review_date
                  FROM reviews
                  JOIN users ON reviews.user_id = users.id";
        $result = $this->conn->query($query);

        // Обрабатываем результат запроса и формируем массив с отзывами
        $reviews = [];
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        return $reviews;
    }

    public function addReview() {
        if (isset($_SESSION['user_id'])) { // Проверяем, установлен ли user_id в сессии
            if (isset($_POST['rating']) && isset($_POST['reviewText'])) { // Проверяем, переданы ли данные из формы
                $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
                $content = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_SPECIAL_CHARS);

                if ($rating !== false && $content !== false) {
                    // Получаем ID пользователя из сессии
                    $user_id = $_SESSION['user_id'];

                    // Получаем текущую дату
                    $review_date = date('Y-m-d');

                    // Подготавливаем запрос на добавление отзыва в базу данных
                    $stmt = $this->conn->prepare("INSERT INTO reviews (rating, user_id, content, review_date) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("iiss", $rating, $user_id, $content, $review_date);
                    if ($stmt->execute()) {
                        header("Location: http://localhost/rivageHotel/main.php");
                        exit;
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                } else {
                    echo "Invalid data submitted";
                }
            } else {
                echo "";
            }
        } else {
            echo "";
        }
    }

    public function __destruct() {
        $this->conn->close(); // Закрываем соединение с базой данных
    }
}

$reviewEngine = new ReviewEngine();
$reviewEngine->addReview();
?>
