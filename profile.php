<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'userEngine.php';

// Проверяем, залогинен ли пользователь
if (!isset($_SESSION['user_email'])) {
    header("Location: loginPage.php");
    exit();
}

// Проверяем, был ли запрос на выход из учетной записи
if (isset($_POST['logout'])) {
    // Уничтожаем сессию
    session_destroy();
    // Перенаправляем на главную страницу
    header("Location: main.php");
    exit();
}

$user_email = $_SESSION['user_email'];

// Проверяем, была ли отправлена форма изменения пароля
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_password'])) {
    $new_password = $_POST['new_password'];

    // Обновляем пароль пользователя
    $userEngine = new UserEngine();
    $update_result = $userEngine->updatePassword($user_email, $new_password);

    if ($update_result === "Success") {
        $update_message = "Password updated successfully.";
    } else {
        $update_message = "Failed to update password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="img/logoR.ico" />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/main.css" />
</head>
<body style="margin-top: 200px">
<?php include 'components/header.php'?>
<div style="margin-left: 100px">
    <h1>Welcome to your profile!</h1>
    <p>Your email: <?php echo htmlspecialchars($user_email); ?></p>
    <br><br>
    <!-- Форма для изменения пароля -->
    <form method="post" action="">
        <label for="new_password" style="margin-right: 20px">New Password:</label>
        <input style="margin-right: 20px" type="password" id="new_password" name="new_password" required>
        <button type="submit">Change Password</button>
    </form>
    <?php if (isset($update_message)): ?>
        <p><?php echo $update_message; ?></p>
    <?php endif; ?>
    <!-- Форма для кнопки logout -->
    <br><br><br>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</div>

</body>
</html>
