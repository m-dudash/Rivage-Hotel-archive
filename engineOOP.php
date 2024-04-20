<?php
class formEngine {
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
        $meno = filter_input(INPUT_POST, 'meno', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($meno !== false && $email !== false && $mobile !== false) {
            $sql = "INSERT INTO otazky (meno, mail, mobile) VALUES (:meno, :mail, :mobile)";
            $statement = $this->conn->prepare($sql);

            $insert = $statement->execute(array(':meno' => $meno, ':mail' => $email, ':mobile' => $mobile));

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

    public function __destruct() {
        $this->conn = null;
    }
}
$forma = new formEngine();
$forma->send();


