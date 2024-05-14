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
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($mobile !== false) {
            $sql = "INSERT INTO gift (mobile) VALUES (:mobile)";
            $statement = $this->conn->prepare($sql);

            $insert = $statement->execute(array(':mobile' => $mobile));

            if ($insert) {
                header("Location: http://localhost/rivageHotel/main.php");
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


