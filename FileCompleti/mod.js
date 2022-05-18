function modIn() {
    $('#d_user').html("<input type=\"text\" class=\"form-control\" name=\"new_username\" maxlength=\"50\">");
    $('#d_email').html("<input type=\"text\" class=\"form-control\" name=\"new_email\">");
    $('#d_eta').html("<input type=\"text\" class=\"form-control\" name=\"new_old\" maxlength=\"3\">");
    $('#d_grado').html("<select class=\"form-control\" name = \"new_rank\"> <option disable value=\"\"> </option> <option value=\"superiori\"> Superiori </option> <option value=\"università\"> Università </option> <option value=\"altro\"> Altro </option> </select>");
    $('#d_button').html("<a href=\"cgpsw.php\" style=\"text-decoration: none;\"> <button type=\"button\" class=\"btn btn-warning button-ss\"> Cambia password </button> </a> <p></p> <button type=\"submit\" name=\"save_button\" class=\"btn btn-warning button-ss\"> Salva modifiche </button> <p></p> <a href=\"\" style=\"text-decoration: none;\"> <button type=\"button\" class=\"btn btn-warning button-ss\"> Annulla modifiche </button> </a>");
}

function goToCanc() {
 $.ajax({
      url: "delconfirm.php",
      method: "POST",
      data: {confirmDelete:true},
    }).done(function(response) {
      $("#mod").html(response);
    });
}
