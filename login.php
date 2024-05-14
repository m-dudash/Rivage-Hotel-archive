<?php
require_once 'UserEngine.php';

$userEngine = new UserEngine();
$userEngine->redirectToMainIfLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $result = $userEngine->login($email, $password);
    if ($result === "Login successful!") {
        header("Location: main.php"); // Перенаправление на защищенную страницу
        exit();
    } else {
        echo $result;
    }
}
?>
