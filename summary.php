<form name="loginForm" action="" class="summary" method="post" onsubmit="remember()">
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
    <label> Dai un voto a questa sessione*: </label> <br>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="voto1" value="1" required>
        <label class="form-check-label" for="inlineRadio1"> ★ </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="voto2" value="2">
        <label class="form-check-label" for="inlineRadio3"> ★★ </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="voto3" value="3">
        <label class="form-check-label" for="inlineRadio3"> ★★★	 </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="voto4" value="4">
        <label class="form-check-label" for="inlineRadio3"> ★★★★ </label>
    </div>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="voto5" value="5">
        <label class="form-check-label" for="inlineRadio3"> ★★★★★ </label>
    </div> <br> <br>
    <div>
        <label class="form-label" for="comm"> Lascia un commento: </label>
        <textarea class="form-control" id="comm" rows="4"> </textarea>
    </div> <br>
    <button type="submit" class="btn btn-warning button-ss" name="submitButton"> Invia </button>
    <button type="reset" class="btn btn-warning button-ss" name="resetButton"> Reset </button>
    <a href="" style="text-decoration:none; float: right;" class="linknav"> Torna indietro </a>
</form>
