<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Проверяем, установлен ли флаг в сессии
$show_gift_modal = !isset($_SESSION['gift_modal_accepted']) || $_SESSION['gift_modal_accepted'] !== true;
?>
<!DOCTYPE html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservation | HR</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/reservation.css" />
    <link rel="icon" href="img/logoR.ico" />
  </head>
  <body>
    <!-- HEADER -->
    <?php include 'components/header.php'?>
    <!-- KREATIVNE - POPUP -->
    <?php if ($show_gift_modal) : ?>
    <div class="modaldarcek" id="darcekModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" style="margin-left: 30px">
              <img src="img\darcek.png" alt="darcekove ubytovanie" />
            </h5>
          </div>
          <div class="modal-body">
            <p style="text-align: center">
              Potešte svojich blízkych a zarezervujte im tie najlepšie spomienky
              na dovolenku v centre Amsterdamu v Rivage Hotel v pohodlí a
              harmónii.
            </p>
            <form action="giftEngine.php" method="post">
              <input
                type="text"
                class="inp"
                name="mobile"
                placeholder="Zadajte svoj e-mail alebo telefónne číslo"
              />


          </div>
          <div class="modal-footer">
              <button
                      type="submit"
                      class="btn btn-primary"
                      onclick="acceptDarcek()"
              >
                  Prijať
              </button>
            <button
              type="button"
              class="btn btn-secondary"
              onclick="rejectDarcek()"
            >
              Odmietnuť
            </button>
          </div>
        </div>
      </div>
    </div>
        </form>
    <?php endif; ?>
    <main>
      <br /><br /><br />
      <div class="mpic" id="reservation">
        <h1 style="font-size: 1.2em"><b>RESERVATION </b></h1>
      </div>
      <br />
      <div class="offers">
        <!-- LARGE LUXE -->
        <div class="container" id="main">
          <div class="centered">LARGE LUXE</div>
          <img src="img/reservation/img4.png" alt="Amsterdam" />
          <div class="details">
            <form action="idk">
              <div style="display: flex; flex-direction: column">
                <label for="name">MENO HLAVNÉHO HOSŤA: </label>
                <input class="inp" type="text" id="name" />
                <label for="cislo">KONTAKTNÉ TELEFÓNNE ČÍSLO:</label>
                <input class="inp" type="tel" id="cislo" />
                <label for="mail">E-MAIL:</label>
                <input class="inp" type="email" id="mail" />
              </div>
              <div
                style="display: flex; flex-direction: column; margin-left: 8%"
              >
                <label for="from">DÁTUM PRÍCHODU:</label>
                <input class="inp" type="date" id="from" />
                <label for="to">DÁTUM ODCHODU:</label>
                <input class="inp" type="date" id="to" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 8%;
                  align-items: center;
                "
              >
                <label for="count">POČET HOSTÍ:</label>
                <select name="guests" id="count">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="pets">PETS:</label>
                <input class="chek" type="checkbox" id="pets" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 7%;
                  align-items: center;
                "
              >
                <label for="karta">KARTOU</label>
                <input class="rd" type="radio" id="karta" name="pay" />
                <label for="hot">V HOTOVOSTI</label>
                <input class="rd" type="radio" id="hot" name="pay" />
              </div>
              <button>RESERVE</button>
            </form>
          </div>
        </div>
        <!-- KARPATSKA CHATA -->
        <div class="container">
          <div class="centered">CARPATHIAN HOUSE</div>
          <img src="img/reservation/img3.png" alt="Amsterdam" />
          <div class="details">
            <form action="id">
              <div style="display: flex; flex-direction: column">
                <label for="name1">MENO HLAVNÉHO HOSŤA: </label>
                <input class="inp" type="text" id="name1" />
                <label for="cislo1">KONTAKTNÉ TELEFÓNNE ČÍSLO:</label>
                <input class="inp" type="tel" id="cislo1" />
                <label for="mail1">E-MAIL:</label>
                <input class="inp" type="email" id="mail1" />
              </div>
              <div
                style="display: flex; flex-direction: column; margin-left: 8%"
              >
                <label for="from1">DÁTUM PRÍCHODU:</label>
                <input class="inp" type="date" id="from1" />
                <label for="to1">DÁTUM ODCHODU:</label>
                <input class="inp" type="date" id="to1" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 8%;
                  align-items: center;
                "
              >
                <label for="count1">POČET HOSTÍ:</label>
                <select name="guests" id="count1">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="pets1">PETS:</label>
                <input class="chek" type="checkbox" id="pets1" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 7%;
                  align-items: center;
                "
              >
                <label for="karta1">KARTOU</label>
                <input class="rd" type="radio" id="karta1" name="pay1" />
                <label for="hot1">V HOTOVOSTI</label>
                <input class="rd" type="radio" id="hot1" name="pay1" />
              </div>
              <button>RESERVE</button>
            </form>
          </div>
        </div>
        <!-- AMSTERDAM CLASSIC -->
        <div class="container">
          <div class="centered">AMSTERDAM CLASSIC</div>
          <img src="img/reservation/img0.png" alt="Amsterdam" />
          <div class="details">
            <form action="idk">
              <div style="display: flex; flex-direction: column">
                <label for="name2">MENO HLAVNÉHO HOSŤA: </label>
                <input class="inp" type="text" id="name2" />
                <label for="cislo2">KONTAKTNÉ TELEFÓNNE ČÍSLO:</label>
                <input class="inp" type="tel" id="cislo2" />
                <label for="mail2">E-MAIL:</label>
                <input class="inp" type="email" id="mail2" />
              </div>
              <div
                style="display: flex; flex-direction: column; margin-left: 8%"
              >
                <label for="from2">DÁTUM PRÍCHODU:</label>
                <input class="inp" type="date" id="from2" />
                <label for="to2">DÁTUM ODCHODU:</label>
                <input class="inp" type="date" id="to2" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 8%;
                  align-items: center;
                "
              >
                <label for="count2">POČET HOSTÍ:</label>
                <select name="guests" id="count2">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="pets2">PETS:</label>
                <input class="chek" type="checkbox" id="pets2" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 7%;
                  align-items: center;
                "
              >
                <label for="karta2">KARTOU</label>
                <input class="rd" type="radio" id="karta2" name="pay2" />
                <label for="hot2">V HOTOVOSTI</label>
                <input class="rd" type="radio" id="hot2" name="pay2" />
              </div>
              <button>RESERVE</button>
            </form>
          </div>
        </div>
        <!-- NEW WEST -->
        <div class="container">
          <div class="centered">NEW WEST</div>
          <img src="img/reservation/img2.png" alt="Amsterdam" />
          <div class="details">
            <form action="idk">
              <div style="display: flex; flex-direction: column">
                <label for="name3">MENO HLAVNÉHO HOSŤA: </label>
                <input class="inp" type="text" id="name3" />
                <label for="cislo3">KONTAKTNÉ TELEFÓNNE ČÍSLO:</label>
                <input class="inp" type="tel" id="cislo3" />
                <label for="mail3">E-MAIL:</label>
                <input class="inp" type="email" id="mail3" />
              </div>
              <div
                style="display: flex; flex-direction: column; margin-left: 8%"
              >
                <label for="from3">DÁTUM PRÍCHODU:</label>
                <input class="inp" type="date" id="from3" />
                <label for="to3">DÁTUM ODCHODU:</label>
                <input class="inp" type="date" id="to3" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 8%;
                  align-items: center;
                "
              >
                <label for="count3">POČET HOSTÍ:</label>
                <select name="guests" id="count3">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="pets3">PETS:</label>
                <input class="chek" type="checkbox" id="pets3" />
              </div>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  margin-left: 7%;
                  align-items: center;
                "
              >
                <label for="karta3">KARTOU</label>
                <input class="rd" type="radio" id="karta3" name="pay3" />
                <label for="hot3">V HOTOVOSTI</label>
                <input class="rd" type="radio" id="hot3" name="pay3" />
              </div>
              <button>RESERVE</button>
            </form>
          </div>
        </div>
      </div>
      <br /><br /><br /><br /><br /><br /><br /><br />
      <p class="thm" style="font-size: 200%">
        Every room - comfort in Perfection
      </p>
      <br /><br /><br /><br /><br /><br /><br /><br />
    </main>
    <!-- FOOTER -->
    <?php include 'components/footer.php'?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
  </body>
</html>
