<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Sign In</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<?php
include_once("db_connect.php");
?>

<body style="background-color: #0061f7;">
  <script type="text/javascript" src="script/validation.min.js"></script>
  <script type="text/javascript" src="script/login.js"></script>

  <div class="layer"></div>
  <main class="page-center " >
    <div class="m-5 p-5 rounded shadow" style="background-color: #ffff;">
    <article class="sign-up " >
      <center>
        <picture>

          <img src="./img/categories/wuhlogo.png" alt="category" width="250px" height="auto">

        </picture>
      </center>
      <br>
      <h1 class="sign-up__title">WU-Hospital IoT</h1>

      <form class="form-login" method="post" id="login-form">

        <div id="error">
        </div>
        <div class="form-group my-2">
          <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
          <span id="check-e"></span>
        </div>
        <div class="form-group my-2">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
        <div class="form-group ">
        <input class="text-start" type="checkbox" value="lsRememberMe" id="rememberMe"> <label class="text-start" for="rememberMe">Remember me</label>
        </div>
        <div class="form-group ">
          <button type="submit" class="btn btn-primary m-2 p-2 " name="login_button" id="login_button" onclick="lsRememberMe()">
            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
          </button>
        </div>
      </form>
    </article>
    </div>
  </main>

<script>
  const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("user_email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
</script>

</body>

</html>