<?php
require_once 'Database.php';

class ReservationEngine {
    private $conn;

    public function __construct() {
        // Создаем экземпляр класса Database для подключения к базе данных
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function reserve() {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $arrival_date = filter_input(INPUT_POST, 'arrival_date');
        $departure_date = filter_input(INPUT_POST, 'departure_date');
        $guests = filter_input(INPUT_POST, 'guests', FILTER_VALIDATE_INT);
        $pets = isset($_POST['pets']) ? 1 : 0;
        $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';



        if ($name && $phone && $email && $arrival_date && $departure_date && $guests !== false && $payment_method) {
            $sql = "INSERT INTO reservations (name, phone, email, arrival_date, departure_date, guests, pets, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->conn->prepare($sql);

            $insert = $statement->bind_param("sssssiis", $name, $phone, $email, $arrival_date, $departure_date, $guests, $pets, $payment_method);

            if ($statement->execute()) {
                header("Location: http://localhost/rivageHotel/thankyou.php");
                exit;
            } else {
                echo "Error: " . $this->conn->error;
            }
        } else {
            // Добавим отладочные выводы
            echo "Invalid data provided <br>";
            echo "Name: $name <br>";
            echo "Phone: $phone <br>";
            echo "Email: $email <br>";
            echo "Arrival Date: $arrival_date <br>";
            echo "Departure Date: $departure_date <br>";
            echo "Guests: $guests <br>";
            echo "Pets: $pets <br>";
            echo "Payment Method: $payment_method <br>";;
        }
    }

    public function __destruct() {
        $this->conn->close(); // Закрываем соединение с базой данных
    }
}

$reservation = new ReservationEngine();
$reservation->reserve();
?>
