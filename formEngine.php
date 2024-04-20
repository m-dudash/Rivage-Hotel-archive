<?php
$host = "localhost";
$dbname = "rivage_db";
$port = 3306;
$username = "root";
$password = "";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

try {
    $conn = new PDO("mysql:host={$host};dbname={$dbname};port={$port}", $username, $password, $options);

    $meno = filter_input(INPUT_POST, 'meno', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($meno !== false && $email !== false && $mobile !== false) {
        $sql = "INSERT INTO otazky (meno, mail, mobile) VALUES (:meno, :mail, :mobile)";
        $statement = $conn->prepare($sql);

        $insert = $statement->execute(array(':meno' => $meno, ':mail' => $email, ':mobile' => $mobile));

        if ($insert) {
            header("Location: http://localhost/rivageHotel/thanks.php");
        } else {
            echo "Failed to insert data.";
        }
    } else {
        echo "Invalid input data.";
    }
} catch (PDOException $e) {
    die("Chyba pripojenia: " . $e->getMessage());
} finally {
    $conn = null;
}


