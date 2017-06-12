<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Fernando Sánchez">
  <title>Interlab | Project</title>
  <!--My Stylesheet--> 
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stylesheets/login.css">
  <!--Font Stylesheet-->
  <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <img id="logo" class="img-responsive" src="images/loginLogo.png" alt="logo">
      <h2 id="titulo">Sistema de Gestión y Control de Seguridad y Salud Ocupacional</h2>
      <form class="login-form" action="server/login.php" method="POST">
        <input type="text" name="user" placeholder="Usuario"/>
        <input type="password" name="pass" placeholder="Contraseña"/>
        <button type="submit">Iniciar Sesión</button>
      </form>
    </div>
  </div>
  <!--Template JavaScript-->
  <script type="text/javascript" src='js/libs/jquery.min.js'></script>
  <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
</body>
</html>