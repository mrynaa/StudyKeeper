<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registrazione.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="registrazione.css">
    <title>StudyKeeper</title>

</head>

<body>  

  <?php 
    session_start();
    $us_error = "";
    $em_error = "";
    if(isset($_SESSION["key_error"])) {
      $us_error = "Username già presente";
      unset($_SESSION["key_error"]);
    } if(isset($_SESSION["email_error"])) {
      $em_error = "Email già presente";
      unset($_SESSION["email_error"]);
    } 
  ?> 

   <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg navbar-light nav-bg">
    <div class="container">
        <span> <a href="index.html" style="text-decoration: none;"> 
          <l1 class="logoS">Study</l1><l2 class="logoK">Keeper</l2> </a> 
        </span>
    </div>
  </nav>
   
  <!-- CENTRO DELLA PAGINA -->
  <form id="reg" action="reg.php" class="ui-form" method="post">
    <h3>Unisciti alla community!</h3>
     <div class="form-row">
        <input type="text" name="username" size ="30" maxlength="30" required autofocus>
        <label for="username">Username</label>
        <span style="color: red;"> <?=$us_error?> </span>
    </div>
    <div class="form-row">
      <input type="email" name="email" size="30" maxlength="30" required >
      <label for="email">Email</label>
      <span style="color: red;"> <?=$em_error?> </span>
    </div>
    <div class="form-row">
      <input type="password" id="psw" name="password" size="30" maxlength="30" required>
      <label for="password">Password</label>
      <span id="err1" style="color: red;">  </span>
    </div>
    <div class="form-row">
        <input type="password" id="cpsw" name="conferma_password" size="30" maxlength="30" required>
        <label for="conferma_password">Conferma Password</label>
        <span id="err2" style="color: red;">  </span>
      </div>
      <input type="submit" value="Iscriviti a StudyKeeper" class="btn btn-warning">
      <input type="reset" value="Reset" class="btn btn-warning">
    <p></p>
    <l3 id="option"> Possiedi già un account? <a href="login.php">Accedi</a></l3>
  </form>
  <script src="psw.js"></script>

  <!-- FOOTER -->
  <footer class="text-center text-lg-start footer-bg text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span class="foo-log">Copyright © 2022, All Right Reserved Seobin</span>
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