<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login-registrazione.css">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/logo-sk.jpg" />
</head>

<body >  
  <?php 
    session_start();
    if(isset($_SESSION["user_error"])) {
      $userror = "Username errato";
      unset($_SESSION["user_error"]);
    } else {
      $userror = "";
    }
    if(isset($_SESSION["psw_error"])) {
      $pswerror = "Password errata";
      unset($_SESSION["psw_error"]);
    } else {
      $pswerror = "";
    }
    if(isset($_COOKIE["LoggedUser"])) {
      header("Location: http://localhost:3000/main.php");
    }
  ?> 

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light nav-bg">
      <div class="container">
          <span> <a href="index.html" style="text-decoration: none;"> <l1 class="logoS">Study</l1><l2 class="logoK">Keeper</l2> </a> </span>
      </div>
  </nav>

  
  <!-- CENTRO DELLA PAGINA -->
  <form action="check.php" class="ui-form" method="post">
    <h1 class="welcome">Bentornato!</h1>
     <div class="form-row">
        <input name="username" required autofocus>
        <label for="username">Username</label>
        <span style="color: red;"> <?=$userror?> </span>
    </div>
    <div class="form-row">
      <input type="password" name="password" required>
      <label for="password">Password</label>
      <span style="color: red;"> <?=$pswerror?> </span>
    </div>
    <input type="submit" value="Accedi a StudyKeeper" class="btn btn-warning">
    <input type="reset" value="Reset" class="btn btn-warning">
    <p></p>
    <div> Non possiedi ancora un account? 
      <a href="registrazione.php">Registrati</a>
    </div>
  </form>

  <!-- FOOTER -->
  <footer class="text-center text-lg-start footer-bg text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span class="foo-log">Copyright ?? 2022, All Right Reserved Seobin</span>
            </div>
            <div>
                <a href="https://github.com/mrynaa/StudyKeeper" class="me-4 text-reset" style="text-decoration: none;">
                  <i class="fa fa-github icon"></i>
                </a>
              </div>
        </section>           
    </footer>
</body>
</html>

