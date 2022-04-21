var hours = 0;
var mins = 0;
var seconds = 0;
var timex;

function start() {
    startTimer();
    $('#controls').html("<button id=\"stop\" onclick=stopTimer() class=\"btn btn-lg btn-info button-ss\"> Pausa </button> <button id=\"terminate\" onclick=terminateTimer() class=\"btn btn-lg btn-info button-ss\"> Termina </button>");
};

function stopTimer() {
    clearTimeout(timex);
    $('#controls').html("<button id=\"resume\" onclick=resumeTimer() class=\"btn btn-lg btn-info button-ss\"> Riprendi </button> <button id=\"terminate\" onclick=terminateTimer() class=\"btn btn-lg btn-info button-ss\"> Termina </button>");
};

function resumeTimer() {
    $('#controls').html("<button id=\"stop\" onclick=stopTimer() class=\"btn btn-lg btn-info button-ss\"> Pausa </button> <button id=\"terminate\" onclick=terminateTimer() class=\"btn btn-lg btn-info button-ss\"> Termina </button>");
    startTimer();
}

function terminateTimer() {
    clearTimeout(timex);
    hours = 0;      mins = 0;      seconds = 0;
    $('#hours').html('00 :');
    $('#mins').html('00 :');
    $('#seconds').html('00');
    $('#controls').html("<button id=\"start\" onclick=start() class=\"btn btn-lg btn-info button-ss\"> Inizia </button>");
};

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
