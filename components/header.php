<?php
require_once 'UserEngine.php';

$userEngine = new UserEngine();

$user_email = "";
$login_link = '<a class="nav-link" style="margin-left: 14%; color: #500505" aria-current="page" href="loginPage.php">|&nbsp;MyRivage</a>';

if ($userEngine->isLoggedIn()) {
    $user_email = htmlspecialchars($_SESSION['user_email']);
    $login_link = '<a class="nav-link" style="margin-left: 10%; color:#500505; font-size: 120%;" aria-current="page" href="profile.php">|&nbsp;' . $user_email . '</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
<header style="position: fixed; z-index: 1">
    <nav
            class="navbar navbar-expand-lg navbar-light"
            style="position: fixed; z-index: 1; width: 100%"
    >
        <div class="container-fluid">
            <a href="main.php" class="nav-logo">
                <img src="img/logo.png" alt="logo" class="nav-logo" />
            </a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="main.php"
                    >|&nbsp;O&nbsp;nás</a
                    >
                    <a class="nav-link" aria-current="page" href="gallery.php"
                    >|&nbsp;Galéria</a
                    >
                    <a class="nav-link" aria-current="page" href="main.php"
                    >|&nbsp;Recenzie</a
                    >
                    <a class="nav-link" aria-current="page" href="faq.php"
                    >|&nbsp;FAQ</a
                    >
                    <!-- Здесь мы вставляем ссылку или текст MyRivage -->
                    <?php echo $login_link; ?>
                    <span></span>
                    <a aria-current="page" href="reservation.php" class="nav-link">
                <span class="RB" style="position: absolute; right: 7%"
                >| Reservation</span
                ></a
                    >
                </div>
            </div>
        </div>
    </nav>
</header>

</body>
</html>
