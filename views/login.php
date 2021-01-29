<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <title>Login</title>

</head>

<body class="container-sm bg-dark">
  <form method="POST" action="../controllers/home.controller.php?a=login">
      <table class="borde text-white mb-2">
        <thead class="text-center">
          <tr>
            <th>Login</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="box"><input type="text" name="txtdni" id="txtdni"></td>
          </tr>

          <tr>
            <td class="box"><input type="password" name="txtpwd" id="txtpwd" /></td>
          </tr>

          <tr>
            <td class="box" colspan="2"><button class="btn btn-primary" type="submit" id="bton">Continuar</button>
            </td>
          </tr>
      </table>
    </form>
</body>

<script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../js/fetch_ajax.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</html>