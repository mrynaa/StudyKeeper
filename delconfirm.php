<?php
	if(!isset($_POST["confirmDelete"])) {
        header("Location: http://localhost:3000/personalarea/profilo.php");
	}
?>

<div class="main-body">
	<div class="row">
		<div class="col-sm-5 m-auto mt-5">
			<div class="card">
				<div class="card-body">
					<h5 class="d-flex align-items-center mb-3">Stai per cancellare il tuo profilo, tutti i tuoi dati e le tue sessioni di studio verrano rimosse dal sito, desideri continuare?</h5>
					<p></p>
                </div>
			</div>
        </div>	
	</div>
</div>
<div id="d_button" class="gap-3 d-md-flex justify-content-md-center text-center">
    <button type="submit" name="del_button" class="btn btn-warning button-ss"> Sì </button>
    <p></p>
    <a href=profilo.php style="text-decoration: none;"> <button type="button" class="btn btn-warning button-ss"> No </button> </a>
</div>
