<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Fernando Sánchez">
  <title>Interlab S.A.</title>
  <!--Template Stylesheet-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!--Data table Stylesheet-->
  <link href="css/libs/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="css/libs/buttons.bootstrap.min.css" rel="stylesheet">
  <!--Responsive Data table Stylesheet-->
  <link href="css/libs/responsive.bootstrap.min.css" rel="stylesheet">
  <!--My Stylesheet-->
  <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
  <link href="css/stylesheets/seguridad.min.css" rel="stylesheet">
  <!--Font Stylesheet-->
  <link rel="shortcut icon" href="images/favicon.ico">
  <style type="text/css">
    .modal-footer > * {
    border-radius: 4px;
    }
  </style>
</head>

<body>

  <div class="preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
  <header id="home">
    <nav class="navbar-inverse" style="margin-bottom: 0px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a id="marca" class="navbar-brand" href="seguridad.php"><span style="padding-right: 30px;" class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav">
            <!--Demandas de seguridad-->
            <li><a href="seguridad.php">Demandas de Seguridad</a></li>
            <!--Otros Informes-->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Otros Informes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="seguridad-inspeccion.php">Inspecciones de Seguridad</a></li>
                <li><a href="seguridad-epp.php">Equipos de Protección Personal</a></li>
                <li><a href="seguridad-cai.php">Control de Accidentes e Incidentes</a></li>
                <li><a href="seguridad-orden.php">Ordenes de Servicio Estandarizado</a></li>
              </ul>
            </li><!--/Informes-->
            <!--Opciones-->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Opciones<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="seguridad-reporte.php">Reporte por demandas de seguridad</a></li>
              </ul>
            </li><!--/Opciones-->
          </ul><!--/nav navbar-nav-->
          <ul class="nav navbar-nav navbar-right">
            <li><a id="user-name" href="#"><span class="glyphicon glyphicon-user"></span> 
              <?php if (isset($_SESSION['user'])) {echo $_SESSION['user'];} else {header("Location: index.php");} ?>
            </a></li>
            <li><a id="logout" href="server/logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
          </ul><!--/nav navbar-nav navbar-right-->
        </div>
      </div>
    </nav>
  </header>

  <section id="inicio">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px;">
          <div class="text-left col-sm-8 col-sm-offset-2">
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Demandas de Seguridad</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
          &nbsp; No se encontró el recurso solicitado.
      </div>

      <?php
        displayImage();

        function displayImage() {
          include 'dbh.php';

          if(isset($_GET['idDemanda'])){
              $idDemanda=$_GET['idDemanda'];
          }

          $query = "SELECT * FROM foto WHERE idFoto='$idDemanda'";
          $result = mysqli_query($conn, $query);

          while ($data = mysqli_fetch_assoc($result)) {
            echo '<img height="300" width="300" src="data:image;base64,'.$data['image'].'" >';
          }

          if (isset($result)) { mysqli_free_result($result); }
          mysqli_close($conn);
          
        }
      ?> 

      <form action="server/link.php" method="POST">
      <button style="border-radius: 4px;" type="submit" class="btn btn-default">Regresar a Demandas de seguridad <span class="glyphicon glyphicon-back" aria-hidden="true"></span></button>
      </form>
         
    </div>
  </section>

  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <!--Something Here-->
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2017 Derechos Reservados.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Diseñado por <a href="https://www.facebook.com/veronicaelizabeth.salinasvera">Verónica Salinas</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!--Template JavaScript-->
  <script type="text/javascript" src="js/libs/jquery.js"></script>
  <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/libs/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/libs/wow.min.js"></script>
  <script type="text/javascript" src="js/libs/mousescroll.js"></script>
  <script type="text/javascript" src="js/libs/smoothscroll.js"></script>
  <script type="text/javascript" src="js/libs/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/libs/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <!--Data table JavaScripts-->
  <script type="text/javascript" src="js/libs/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="js/libs/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/libs/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/libs/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="js/libs/buttons.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/libs/jszip.min.js"></script>
  <script type="text/javascript" src="js/libs/pdfmake.min.js"></script>
  <script type="text/javascript" src="js/libs/vfs_fonts.js"></script>
  <script type="text/javascript" src="js/libs/buttons.html5.min.js"></script>
  <script type="text/javascript" src="js/libs/buttons.print.min.js"></script>
  <script type="text/javascript" src="js/libs/buttons.colVis.min.js"></script>
  <!--Responsive Data table JavaScripts-->
  <script type="text/javascript" src="js/libs/dataTables.responsive.min.js"></script>
  <!--My JavaScript-->
  <script type="text/javascript" src="js/admin.min.js"></script>
  <script type="text/javascript">
    function eliminarDemandaa(idDemanda) {
      $("#idDemanda-Eliminar").val(idDemanda);
    }

    function modificarDemanda(idDemanda, idUsuario, idHallazgo, idCorrectivo, idLista, fecha, fechaMax, fechaCierre, descripcion, estado, comentario) {
      $("#idDemanda-Modificar").val(idDemanda);
      $("#idUsuario-Modificar").val(idUsuario);
      $("#idHallazgo-Modificar").val(idHallazgo);
      $("#idCorrectivo-Modificar").val(idCorrectivo);
      $("#idLista-Modificar").val(idLista);
      $("#fecha-Modificar").val(fecha);
      $("#fechaMax-Modificar").val(fechaMax);
      $("#fechaCierre-Modificar").val(fechaCierre);
      $("#descripcion-Modificar").val(descripcion);
      $("#estado-Modificar").val(estado);
      $("#comentario-Modificar").val(comentario);
      //Hidden value
      $("#idDemanda-Foto").val(idDemanda);
    }
  </script>
</body>
</html>