$(document).ready(function () {
  $("#bton").on("click", function (e) {
    let user = document.getElementById("txtusuario").value;
    let password = document.getElementById("txtpassword").value;
    let urlLogin = "./controlador/controladorusuario.php?action=Login";
    
      console.debug( user);
      console.debug(password);
    $.ajax({
      url: urlLogin,
      method: "POST",
      data: { txtusuario: user, txtpassword: password },
    }).done(function (response) {
      $json = JSON.parse(response);
      if ($json.msg == "good") {
        console.log("bien");
        window.location.href = "./web/menu.php";
      } else {
        alert("usuario o contraseña incorrecta");
        Console.log("error");
      }
    });
  });

  // Solicitar Clase
});
