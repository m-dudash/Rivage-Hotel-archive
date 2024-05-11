<?php
class FormEngine {
    private $host = "localhost";
    private $dbname = "rivage_db";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};port={$this->port}", $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    public function send() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
            $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id !== false && $question !== false && $answer !== false) {
                $sql = "UPDATE faq SET question = :question, answer = :answer WHERE id = :id";
                $statement = $this->conn->prepare($sql);

                $update = $statement->execute(array(':question' => $question, ':answer' => $answer, ':id' => $id));

                if ($update) {
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
        $this->conn = null;
    }
}

$forma = new FormEngine();
$forma->send();
?>
