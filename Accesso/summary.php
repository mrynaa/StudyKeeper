<form name="loginForm" action="" class="summary" method="post" onsubmit="remember()">
    <h2> Studio terminato </h2>
    <table class="table">
        <caption> Riepilogo </caption>
        <tbody>
            <tr>
                <td> Tempo di studio </td>
                <td> <?= $_POST["studyTime"] ?> </td>
            </tr>
            <tr>
                <td> Pause </td>
                <td> <?= $_POST["pause"] ?> </td>
            </tr>
        </tbody>
    </table> 
    <label style="font-size: 20px;"> Dai un voto a questa sessione </label> <br>
    <div class="form-check checkbox-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="voto1" value="1">
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
        <label class="form-label" for="comm"> Lascia un commento </label>
        <textarea class="form-control" id="comm" rows="4"> </textarea>
    </div> <br>
    <button type="submit" class="btn btn-warning button-ss" name="submitButton"> Invia </button>
    <a href="" style="text-decoration: none; float: right;" class="linknav"> Indietro </a>
</form>