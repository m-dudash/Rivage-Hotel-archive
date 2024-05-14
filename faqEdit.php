<?php
// Подключение к базе данных
$db_connection = mysqli_connect("localhost", "root", "", "rivage_db");

if (mysqli_connect_errno()) {
    echo "Chyba: " . mysqli_connect_error();
    exit();
}

// Получение идентификатора вопроса из параметра GET
$id = $_GET['id'];

// Получение данных о вопросе из базы данных
$query = "SELECT * FROM faq WHERE id = $id";
$result = mysqli_query($db_connection, $query);

if ($result) {
    // Извлечение данных
    $row = mysqli_fetch_assoc($result);
    $question = $row['question'];
    $answer = $row['answer'];
} else {
    // Обработка ошибки
    echo "Error: " . mysqli_error($db_connection);
}

// Закрытие соединения с базой данных
mysqli_close($db_connection);
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit FAQ | HR</title>
    <!-- Подключение стилей и скриптов -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="icon" href="img/logoR.ico">
</head>
<body>
<?php include 'components/header.php'?>
<main>
    <br><br>
    <!-- Форма для редактирования вопроса и ответа -->
    <p class="thm" style="font-size: 180%">Edit Question</p>
    <br>
    <div class="otazky">
        <form action="updateEngine.php" id="otazky" method="post">
            <br>
            <!-- Скрытое поле для передачи идентификатора вопроса -->
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div>
                <label for="question">UPDATE QUESTION:</label>
                <input class="inp" type="text" id="question" name="question" value="<?php echo $question; ?>" required />
                <br /><br />
                <label for="answer">UPDATE ANSWER:</label>
                <input class="inp" type="text" id="answer" name="answer" value="<?php echo $answer; ?>" required />
                <br /><br />
                <button type="submit">POST</button>
            </div>
        </form>
    </div>

</main>
<?php include 'components/footer.php'?>
<!-- Подключение скриптов -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<style>
    .otazky {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -80px;
    }
    .otazky form {
        margin: 6%;
        padding: 4%;
        padding-top: 3%;

        width: 50%;
        box-shadow: 1px 5px 20px rgba(0, 0, 0, 0.3);
        border-radius: 15px 15px 15px 15px;
    }
    .otazky .thm {
        padding: 10%;
    }
    label {
        font-family: helvetica;
        font-weight: 600;
        font-size: 70%;
    }
    .inp {
        border: 2px solid #ffffff00;
        border-radius: 5px;
        background-color: #f0f0f0;
        height: 2.5em;
        padding: 8px;
        margin-bottom: 10px;
        width: 80%;
        margin-left: 10%;
    }
    input[type="checkbox"] {
        height: 1em;
        width: 1em;
        margin-left: 0%;
    }
    button {
        padding: 8px;
        padding-left: 20px;
        padding-right: 20px;
        background-color: #500505;
        color: aliceblue;
        border-radius: 5px;
        border: none;
        font-size: 15px;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #5f0a0a;
    }
</style>
</body>
</html>
