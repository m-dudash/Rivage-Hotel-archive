<?php
require_once 'userEngine.php';

$userEngine = new UserEngine();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $result = $userEngine->login($email, $password);
    echo $result;
}
?>
