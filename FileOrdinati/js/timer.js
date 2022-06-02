var hours = 0;
var mins = 0;
var seconds = 0;
var pause = 0;
var timex;

function start() {
    startTimer();
    $('#controls').html("<button id=\"stop\" onclick=stopTimer() class=\"btn btn-warning button-ss\"> Pausa </button> <button id=\"terminate\" onclick=terminateTimer() class=\"btn btn-warning button-ss\"> Termina </button>");
}

function stopTimer() {
    pause++;
    clearTimeout(timex);
    $('#img').html('<img src="../assets/timer2.jpeg" style="width: 35%">');
    $('#controls').html("<button id=\"resume\" onclick=resumeTimer() class=\"btn btn-warning button-ss\"> Riprendi </button> <button id=\"terminate\" onclick=terminateTimer() class=\"btn btn-warning button-ss\"> Termina </button>");
}

function resumeTimer() {
    $('#img').html('<img src="../assets/timer.png" style="width: 20%">');
    $('#controls').html("<button id=\"stop\" onclick=stopTimer() class=\"btn btn-warning button-ss\"> Pausa </button> <button id=\"terminate\" onclick=terminateTimer() class=\"btn btn-warning button-ss\"> Termina </button>");
    startTimer();
}

function terminateTimer() {
    clearTimeout(timex);
    var study_time = ((hours.toString() < 10) ? '0'+hours.toString() : hours.toString()) + ":" +
                     ((mins.toString() < 10) ? '0'+mins.toString() : mins.toString()) + ":" +
                     ((seconds.toString() < 10) ? '0'+seconds.toString() : seconds.toString());
    
    $.ajax({
      url: "summary.php",
      method: "POST",
      data: {studyTime:study_time, pause:pause},
    }).done(function(response) {
      $("#main").html(response);
    });  
}

function startTimer(){
  timex = setTimeout(function(){
      seconds++;
    if(seconds >59){seconds=0;mins++;
       if(mins>59) {
       mins=0;hours++;
         if(hours <10) {$("#hours").text('0'+hours+' :')} else $("#hours").text(hours+' :');
        }
                       
    if(mins<10){                     
      $("#mins").text('0'+mins+' :');}       
       else $("#mins").text(mins+' :');
                   }    
    if(seconds <10) {
      $("#seconds").text('0'+seconds);} else {
      $("#seconds").text(seconds);
      }

      startTimer();
  },1000);
}