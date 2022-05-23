<?php 
    session_start();
    if(!isset($_COOKIE["LoggedUser"])) {
        header("Location: http://localhost:3000/login.php");
    } else {
        $_SESSION["userSession"] = $_COOKIE["LoggedUser"];
    }
?>

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
    <link rel="stylesheet" href="profilo.css">
    <!-- <script src="psw.js" type="application/javascript"></script> -->
    <script src="mod.js" type="application/javascript"></script>
    <title>Password</title>
    <link rel="shortcut icon" href="logo-sk.jpg" />

</head>

<body>

    <?php
        $opswerr = "";
        if(isset($_SESSION["opsw_error"])) {
            $opswerr = "Password errata";
            unset($_SESSION["opsw_error"]);
        }
        if(isset($_SESSION["succ_cgpsw"])) {
            echo "<script> alert(\"Pasword modificata con successo\"); </script>";
            unset($_SESSION["succ_cgpsw"]);
        }
    ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
        <div class="container">
            <span> <a href="index.html" style="text-decoration: none;"> <l1 class="logoS">Study</l1><l2 class="logoK">Keeper</l2> </a> </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link linknav" href="main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linknav" href="profilo.php">Profilo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linknav" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--PAGINA CENTRALE-->
    <form id="pswform" class="container_center" action="pswsave.php" method="post">
	    <div class="main-body">
			<div class="row">
				<div class="col-sm-8 m-auto mt-5">
					<div class="card">
						<div class="card-body">
							<h5 class="d-flex align-items-center mb-3">Cambia Password</h5>
							<p></p>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Vecchia Password*</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" name="opsw" class="form-control" value="" required>
									<span style="color: red;"> <?= $opswerr ?> </span>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nuova Password*</h6>
								    </div>
								    <div class="col-sm-9 text-secondary">
									    <input type="password" name="psw" class="form-control" value="" required>
										<span id="err1" style="color: red;">  </span>
								    </div>
                                </div>
                                <div class="row mb-3">
								    <div class="col-sm-3">
									    <h6 class="mb-0">Conferma Password*</h6>
								    </div>
								    <div class="col-sm-9 text-secondary">
									    <input type="password" name="cpsw" class="form-control" value="" required>
										<span id="err2" style="color: red;">  </span>
								    </div>
                                </div>
                            </div>
						</div>
					</div>
                </div>	
			</div>
        </div>
		<div id="d_button" class="gap-3 d-md-flex justify-content-md-center text-center">
            <button type="submit" class="btn btn-warning button-ss"> Salva password </button>
            <p></p> 
            <a href="profilo.php" style="text-decoration: none;"> <button type="button" class="btn btn-warning button-ss"> Torna indietro </button> </a>
        </div>
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
