<?php
class formEngine {
    private $host = "localhost";
    private $dbname = "qna_db";
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
        $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
        $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($question !== false && $answer !== false) {
            $sql = "INSERT INTO qna_table (question, answer) VALUES (:question, :answer)";
            $statement = $this->conn->prepare($sql);

            $insert = $statement->execute(array(':question' => $question, ':answer' => $answer));

            if ($insert) {
                header("Location: http://localhost/rivageHotel/faq.php");
                exit;
            } else {
                echo "CHYBA";
            }
        } else {
            echo "Nespvane zadane data";
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}
$forma = new formEngine();
$forma->send();


