const form = document.querySelector("#reg");

form.addEventListener("submit", function(event){
  event.preventDefault();
  psw = form.elements["psw"].value;
  cpsw = form.elements["cpsw"].value;
  if(psw == cpsw) form.submit();
  else {
    $("#err1").html("Le password non coincidono");
    $("#err2").html("Le password non coincidono");
  }
});