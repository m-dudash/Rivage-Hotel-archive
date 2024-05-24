<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviews | HR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/faq.css" />
    <link rel="icon" href="img/logoR.ico" />
    <style>
        .review{
            width: 100%;
            padding: 70px;
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            /*justify-content: center;*/
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
    </style>
</head>
<body>
<?php include 'components/header.php'?>
<br><br><br><br><br>

<?php
require_once 'reviewEngine.php';

$reviewEngine = new ReviewEngine();

$reviews = $reviewEngine->getAllReviews();

if (!empty($reviews)) {
    foreach ($reviews as $review) {
        ?>
        <div class="review">
            <p class="thm" style="margin-left: 140px">✩ <?php echo $review["rating"]; ?></p>
            <p style="margin-left: 14px; color: #500505; font-size: 23px"><?php echo htmlspecialchars($review["email"]); ?></p>
            <div style="width: 50%; margin-left: 140px">
                <p><?php echo htmlspecialchars($review["content"]); ?></p>
            </div>
            <div>
                <p style="right: 70px; position: absolute; margin-top: 50px"><?php echo date("d F Y", strtotime($review["review_date"])); ?></p>
            </div>
        </div>
        <br><br><br><br>
        <?php
    }
} else {
    echo "0 reviews";
}
?>

<?php include 'components/footer.php'; ?>
</body>
</html>
