<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRivage Account</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
<header style="position: fixed; z-index: 1">
    <nav
        class="navbar navbar-expand-lg navbar-light"
        style="position: fixed; z-index: 1; width: 100%"
    >
        <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="main.php" style="margin-left: 100%;"
                    ><&nbsp;&nbsp;&nbsp;Back</a
                    >
                    <span></span>
                    <p style="position: absolute; right: 13%; font-size: 170%; margin-top:17px; color: #500505"> MyRivage Account</p>
                </div>
            </div>
            <a href="main.php" class="nav-logo" style="margin-right: 50%;">
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
            
        </div>
    </nav>
</header>
<main>
<div class="otazky">
    <form action="login.php" id="otazky" method="post">
        <h3>LOGIN</h3>
        <br>
        <div>
            <label for="meno">EMAIL:</label>
            <input class="inp" type="email" id="mail" name="mail" required />
            <br /><br />
            <label for="mail">PASSWORD:</label>
            <input class="inp" type="password" id="pass" name="password" required />
            <br /><br /><br />
            <button type="submit">LOGIN</button>
        </div>
    </form>

    <h1 style="color: #500505; font-size: 50px">OR</h1>

    <form action="register.php" id="otazky" method="post" style="margin-top: 230px;">
        <h3>REGISTER</h3>
        <br>
        <div>
            <label for="meno">EMAIL:</label>
            <input class="inp" type="email" id="mail" name="mail" required />
            <br /><br />
            <label for="mail">PASSWORD:</label>
            <input class="inp" type="password" id="pass" name="pass" required />
            <br /><br />
            <label for="pass2">REPEAT PASSWORD:</label>
            <input class="inp" type="password" id="pass2" name="pass2" required />
            <br /><br />
            <input type="checkbox" id="agree" required />
            <label for="agree">SÚHLASÍМ СО SPRACOVANÍМ OSOBNÝCH ÚDAJOV</label>
            <br /><br /><br />
            <button type="submit">REGISTER</button>
        </div>
    </form>
      </div>
</main>
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
  width: 33%;
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
</html>