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
    <header style="position: fixed; z-index: 1">
      <nav
        class="navbar navbar-expand-lg navbar-light"
        style="position: fixed; z-index: 1; width: 100%"
      >
        <div class="container-fluid">
          <a href="#main" class="nav-logo">
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
              <a class="nav-link" aria-current="page" href="#about"
                >|&nbsp;O&nbsp;nás</a
              >
              <a class="nav-link" aria-current="page" href="#gallery"
                >|&nbsp;Galéria</a
              >
              <a class="nav-link" aria-current="page" href="#reviews"
                >|&nbsp;Recenzie</a
              >
              <a class="nav-link" aria-current="page" href="faq.html"
                >|&nbsp;FAQ</a
              >
              <span></span>
              <a aria-current="page" href="reservation.html" class="nav-link">
                <span class="RB" style="position: absolute; right: 10%"
                  >| Reservation</span
                ></a
              >
            </div>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <!-- KREATIVNE === COOKIES MODAL -->
      <div class="modalcookies" id="cookieModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="margin-left: 30px">Cookies</h5>
            </div>
            <div class="modal-body">
              <p
                style="
                  display: flex;
                  align-items: center;
                  margin-left: 30px;
                  margin-right: 30px;
                "
              >
                Používame cookies na zlepšenie vášho zážitku na našej stránke.
                Pokračovaním súhlasíte s našou politikou ochrany údajov.
              </p>
              <img src="img\cookie.png" alt="cookie" />
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-primary"
                onclick="acceptCookies()"
              >
                Accept
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                onclick="rejectCookies()"
              >
                Reject
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- BANNER -->
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
        <a href="gallery.html" target="_blank"
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
      <div style="display: flex; justify-content: center">
        <a href="https://www.booking.com/" target="_blank" class="mr-2">
          <button class="more">MORE</button>
        </a>
        <button
          class="more"
          data-bs-toggle="modal"
          data-bs-target="#writeReviewModal"
        >
          WRITE REVIEW
        </button>
      </div>
      <div id="writeReviewModal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered rev-modal">
          <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
              <h5 class="thm" style="font-size: 2em">Napíšte recenziu</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label
                  for="reviewText"
                  style="
                    font-family: 'Montserrat';
                    font-weight: 100;
                    font-size: 1.2em;
                  "
                  ><p><i>Napíšte recenziu svojho pobytu v Rivage Hotel</i></p>
                </label>
                <textarea
                  class="form-control"
                  id="reviewText"
                  rows="7"
                  required
                ></textarea>
                <br />
              </div>
              <button
                type="odoslat"
                class="btn btn-primary btn-send-form"
                onclick="closeRev()"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Odoslať recenziu
              </button>
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
        <form action="questions.php" id="otazky" method="post">
          <div>
            <label for="name">MENO:</label>
            <input class="inp" type="text" id="name" name="name" required />
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
        <!--MODAL WINDOW -->
        <div class="modal" tabindex="-1" id="success-otazky">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">FORM</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <p>Formulár bol úspešne odoslaný</p>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>

        <script src="script.js"></script>
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"
        ></script>
        <!-- SCRIPT PRE FORMU -->
        <script>
          document
            .querySelector("#otazky")
            .addEventListener("submit", function (event) {
              event.preventDefault();
              var myModal = new bootstrap.Modal(
                document.querySelector("#success-otazky")
              );
              myModal.show();
            });
     
        </script>
      </div>
      <br /><br /><br /><br /><br /><br /><br /><br />
      <p class="thm" style="font-size: 200%">
        You are always welcome at the Rivage Hotel
      </p>
      <br /><br /><br /><br /><br /><br /><br /><br />
    </main>
    <!-- FOOTER -->
    <footer>
      <img src="img/logoW.png" alt="Rivage Hotel" class="padding-logo" />
      <img src="img/brand.png" alt="Rivage Hotel" class="padding-logo" />
      <div class="adress">
        <p>Museumstraat 1, Amsterdam, Netherlands</p>
        <br />
        <p>+380 98 976 2400</p>
        <p>D. Portashka</p>
      </div>
      <div class="foot-a">
        <a href="#reviews">|&nbsp;Recenzie</a>
        <a href="#about">|&nbsp;O&nbsp;nás</a>
        <a href="gallery.html" target="_blank">|&nbsp;Galéria</a>
        <a href="faq.html">|&nbsp;FAQ</a>
      </div>
      <div class="foot-a">
        <a href="mailto:mykhailo@dudash.ukf"
          ><img src="img/mail.png" alt="" class="pics" style="width: 40px"
        /></a>
        <a href="tel:+380989762400">
          <img src="img/tel.png" alt="" class="pics" style="width: 40px"
        /></a>
      </div>
    </footer>
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
