<!DOCTYPE html>
<!-- BY MYKHAILO M. DUDASH -->
<html lang="sk">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main | HR</title>

    <link rel="icon" href="img/logoR.ico" />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
<!-- HEADER -->
<?php include 'components/header.php'
?>

<main>
    <div class="container" id="main" style="padding-top: 40px">
        <div class="centered">THE BEST AMSTERDAM HOTEL</div>
        <img src="img/banner.png" alt="Amsterdam" />
    </div>
    <div class="CRvg" id="CRvg">
        <img src="img/Rvg.png" alt="Rivage Hotel" class="Rvg" />
        <hr />
        <br />
        <div class="pv">
            <p>
                Vitajte v našom luxusnom amsterdamskom hoteli! Zabudovaný v srdci
                tohto živého mesta, naša butiková ubytovňa ponúka útulné izby,
                prvotriednu obsluhu a úchvatné výhľady na kanály. Zažite skutočnú
                esenciu Amsterodamu s nami. Rezervujte si váš pobyt ešte dnes!
            </p>
        </div>
    </div>
    <br /><br />
    <!-- ABOUT -->
    <p class="thm" id="about">O nás</p>
    <br />
    <div style="display: flex">
        <img src="img/receptionS.png" alt="Reception" class="side-img" />
        <div style="flex-grow: 1">
            <p class="o-nas">
                <span class="vp"> S </span>me luxusný hotel v centre Amsterdamu,
                ktorý ponúka najvyšší komfort a výhľad na historické pamiatky. Od
                roku 1965 vytvárame nezabudnuteľné zážitky a poskytujeme
                starostlivosť našim hosťom. Vitajte v našom hoteli, kde sa staráme o
                vašu pohodu a zanechávame nezabudnuteľné spomienky.
                <br /><br /><br /><span class="vp"> N </span>áš hotelový komplex
                ponúka komfortné izby s nádherným dizajnom a moderným vybavením.
                Všetky izby sú starostlivo zariadené do najmenších detailov a
                vybavené modernými spotrebičmi, ktoré zaručujú pohodlie a relax. Od
                priestranných apartmánov až po útulné štandardné izby - pre každého
                hosťa máme dokonalý výber.
            </p>
        </div>
    </div>
    <br /><br />
    <!-- GALETRIA -->
    <p class="thm" id="gallery">Galéria</p>
    <br />
    <div class="galeria">
        <div class="card" style="min-width: 540px">
            <label>Modern</label>
            <img src="img/room.png" class="img-fluid rounded-start" alt="..." />
        </div>
        <div class="card" style="min-width: 540px">
            <label>Spacious</label>
            <img src="img/bath.png" class="img-fluid rounded-start" alt="..." />
        </div>
        <div class="card" style="min-width: 540px">
            <label>Classical</label>
            <img src="img/hall.png" class="img-fluid rounded-start" alt="..." />
        </div>
    </div>

    <br /><br />
    <div style="display: flex; justify-content: center">
        <a href="gallery.php" target="_blank"
        ><button class="more">MORE</button>
        </a>
    </div>
    <br /><br />
    <!-- REVIEWS (CAROUSEL) -->
    <p class="thm" id="reviews">Recenzie</p>
    <br />
    <div
            id="carouselExampleInterval"
            class="carousel slide mx-auto"
            data-bs-ride="carousel"
            style="width: 70%; max-width: 80%"
    >
        <div class="carousel-inner" style="width: 80%; margin-left: 50px">
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="img/rev1.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/rev20.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="img/rev4.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="img/rev3.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="img/rev5.png" class="d-block w-100" alt="..." />
            </div>
        </div>
        <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleInterval"
                data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br /><br />
    <!-- KREATIVNE - NAPISAT REVIEW-->
    <!-- KREATIVNE - NAPISAT REVIEW-->
    <div style="display: flex; justify-content: center">
        <a href="reviews.php" target="_blank" class="mr-2">
            <button class="more">MORE</button>
        </a>
        <?php
        // Проверяем, активна ли сессия
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Проверяем, залогинен ли пользователь (предполагая, что есть переменная сессии user_id)
        $isLoggedIn = isset($_SESSION['user_id']);

        // Если пользователь залогинен, отображаем кнопку "WRITE REVIEW"
        if ($isLoggedIn) {
            echo '<button class="more" data-bs-toggle="modal" data-bs-target="#writeReviewModal">WRITE REVIEW</button>';
        }
        ?>
    </div>

    <div id="writeReviewModal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered rev-modal">
            <div class="modal-content" style="padding: 20px">
                <div class="modal-header">
                    <h5 class="thm" style="font-size: 2em">Napíšte recenziu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="reviewEngine.php" method="post">
                        <div class="mb-3">
                            <label for="reviewText" style="font-family: 'Montserrat'; font-weight: 100; font-size: 1.2em">
                                <p><i>Napíšte recenziu svojho pobytu v Rivage Hotel</i></p>
                            </label>
                            <textarea class="form-control" id="reviewText" name="reviewText" rows="7" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label style="font-family: 'Montserrat'; font-weight: 100; font-size: 1.2em">Hodnotenie (1-10):</label>
                            <div class="rating">
                                <input type="radio" id="star10" name="rating" value="10">
                                <label for="star10" class="rating-label">10</label>

                                <input type="radio" id="star9" name="rating" value="9">
                                <label for="star9" class="rating-label">9</label>

                                <input type="radio" id="star8" name="rating" value="8">
                                <label for="star8" class="rating-label">8</label>

                                <input type="radio" id="star7" name="rating" value="7">
                                <label for="star7" class="rating-label">7</label>

                                <input type="radio" id="star6" name="rating" value="6">
                                <label for="star6" class="rating-label">6</label>

                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5" class="rating-label">5</label>

                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4" class="rating-label">4</label>

                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3" class="rating-label">3</label>

                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2" class="rating-label">2</label>

                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1" class="rating-label">1</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-send-form" aria-label="Submit">Odoslať recenziu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br /><br /><br /><br />
    <hr />
    <br />
    <br /><br /><br /><br />
    <script src="script.js"></script>
    <!--FORMULAR -->
    <div class="otazky">
        <p class="thm">MATE OTAZKY?</p>
        <form action="engineOOP.php" id="otazky" method="post">
            <div>
                <label for="meno">MENO:</label>
                <input class="inp" type="text" id="meno" name="meno" required />
                <br /><br /><br />
                <label for="mail">MAIL:</label>
                <input class="inp" type="email" id="mail" name="mail" required />
                <br /><br /><br />
                <label for="mobile">ČÍSLO:</label>
                <input class="inp" type="tel" id="mobile" name="mobile" required />
                <br /><br /><br />
                <input type="checkbox" id="agree" required />
                <label for="agree">SÚHLASÍM SO SPRACOVANÍM OSOBNÝCH ÚDAJOV</label>
                <br /><br /><br />
                <button type="submit">SUBMIT</button>
            </div>
        </form>
    </div>

</main>
<div>
    <br /><br /><br /><br /><br /><br /><br /><br />
    <p class="thm" style="font-size: 200%">
        You are always welcome at the Rivage Hotel
    </p>
    <br /><br /><br /><br /><br /><br /><br /><br />
</div>
<!-- FOOTER -->
<?php include 'components/footer.php'?>
<!-- BOOTSTRAP SCRIPT-->
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
></script>
<!-- SCRIPT -->
<script src="script.js"></script>
</body>
</html>
