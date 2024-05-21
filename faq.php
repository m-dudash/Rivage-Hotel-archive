<?php
require_once 'faq_read.php';
require_once 'Database.php';

session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: loginPage.php");
    exit();
}

$isAdmin = false;
if ($_SESSION['user_email'] === 'admin@dudash.mk') {
    $isAdmin = true;
}

$db = new Database();
$db_connection = $db->getConnection();

$qna_engine = new QnaEngine(); // Убираем передачу соединения в конструктор
$qna_data = $qna_engine->getQuestionsAndAnswers();

// Закрываем соединение с базой данных после использования
unset($qna_engine);
$db->closeConnection();

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQ | HR</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/faq.css" />
    <link rel="icon" href="img/logoR.ico" />
</head>
<body>
<!-- HEADER -->
<?php include 'components/header.php'?>
<main>
    <br><br><br><br>
    <!-- Код для вывода вопросов и ответов -->
    <div class="accordion" id="accordionExample">
        <?php foreach ($qna_data as $index => $qna) { ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                        <?php echo $qna['question']; ?>
                    </button>
                    <!-- Кнопки Edit и Delete -->
                    <?php if ($isAdmin): ?>
                        <div class="btn-group" role="group">
                            <button type="button" style="background-color: white; color: #500505;margin-right: 20px; margin-left: 20px; margin-bottom: 5px" onclick="editQna(<?php echo $qna['id']; ?>)">Edit</button>
                            <button type="button" style="margin-right: 20px; margin-left: 20px; margin-bottom: 5px;  color: aliceblue" onclick="deleteQna(<?php echo $qna['id']; ?>)">Delete</button>
                        </div>
                    <?php endif; ?>
                </h2>
                <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php echo $qna['answer']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Форма для новых вопросов -->
    <?php if ($isAdmin): ?>
        <br><br><br>
        <div class="otazky">
            <form action="faqCreate.php" id="otazky" method="post">
                <br>
                <div>
                    <label for="question">NEW QUESTION:</label>
                    <input class="inp" type="text" id="question" name="question" required />
                    <br /><br />
                    <label for="answer">NEW ANSWER:</label>
                    <input class="inp" type="text" id="answer" name="answer" required />
                    <br /><br />
                    <button type="submit">POST</button>
                </div>
            </form>
        </div>
        </div>
    <?php endif; ?>
    <br /><br /><br /><br /><br /><br /><br /><br />
    <p class="thm" style="font-size: 200%">Your comfort is our priority</p>
    <br /><br /><br /><br /><br /><br /><br /><br />
    <!-- Конец формы -->
</main>
<!-- FOOTER -->
<?php include 'components/footer.php'?>
<!-- BOOTSTRAP SCRIPT -->
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
></script>
<!-- SCRIPT -->
<script src="script.js"></script>
<!-- Функции для удаления и редактирования -->
<script>
    function deleteQna(id) {
        if (confirm('Are you sure you want to delete this Q&A?')) {
            // Отправляем запрос на удаление
            window.location.href = 'faqDel.php?id=' + id;
        }
    }
    function editQna(id) {
        window.location.href = 'faqEdit.php?id=' + id;
    }
</script>
</body>
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
<script>
    function deleteQna(id) {
        if (confirm('Are you sure you want to delete this Q&A?')) {
            // Отправляем запрос на удаление
            window.location.href = 'faqDel.php?id=' + id;
        }
    }
    function editQna(id) {
        window.location.href = 'faqEdit.php?id=' + id;
    }


</script>
</html>
