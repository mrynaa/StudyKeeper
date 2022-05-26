<?php
     if(!isset($_POST["studyTime"])) {
        header("Location: http://localhost:3000/timer.php"); 
    } else {
        session_start();
    }
?>

<form name="loginForm" action="session.php" class="summary2" method="post" onsubmit="remember()">
    <h2 style="font-family:'Times New Roman', Times, serif;"> Complimenti, la tua sessione di studio è terminata! </h2>
    <p></p>
    <caption><i>Riepilogo</i></caption>
    <table class="table">
        <tbody>
            <tr>
                <td> Tempo di studio: </td>
                <td> <?= $_POST["studyTime"] ?> </td>
            </tr>
            <tr>
                <td>Numero delle pause:</td>
                <td> <?= $_POST["pause"] ?> </td>
            </tr>
        </tbody>
    </table> 

    <input type="hidden" name="studyTime" value="<?= $_POST["studyTime"] ?>">
    <input type="hidden" name="pause" value="<?= $_POST["pause"] ?>">
    <label> Dai un voto a questa sessione*: </label> <br>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="valutation" id="voto1" value="1" required>
        <label class="form-check-label" for="inlineRadio1"> ★ </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="valutation" id="voto2" value="2">
        <label class="form-check-label" for="inlineRadio3"> ★★ </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="valutation" id="voto3" value="3">
        <label class="form-check-label" for="inlineRadio3"> ★★★	 </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="valutation" id="voto4" value="4">
        <label class="form-check-label" for="inlineRadio3"> ★★★★ </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="valutation" id="voto5" value="5">
        <label class="form-check-label" for="inlineRadio3"> ★★★★★ </label>
    </div> <br> <br>
    <div>
        <label class="form-label" for="comm"> Lascia un commento: </label>
        <textarea class="form-control" id="comm" name="commento" rows="4"> </textarea>
    </div> <br>
    <button type="submit" class="btn btn-warning button-ss" name="submitButton"> Invia </button>
    <button type="reset" class="btn btn-warning button-ss" name="resetButton"> Reset </button>
    <a href="" style="text-decoration:none; float: right;" class="linknav"> Torna indietro </a>
</form>
