<?php
require_once 'userEngine.php';

$userEngine = new UserEngine();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $password2 = $_POST['pass2'];

    $result = $userEngine->register($email, $password, $password2);
    echo $result;
}
?>
