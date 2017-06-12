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
  <link href="css/stylesheets/seguridad-epp.min.css" rel="stylesheet">
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
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Equipos de Proteccion Personal</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">
      <div class="row">

        <div class="alert alert-success alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            &nbsp; Registro actualizado exitosamente.
        </div>

        <div class="dt-buttons btn-group" id="botoneria">
          <button class="btn btn-success nuevo" data-toggle="modal" data-target="#ModalNuevo"><span class="glyphicon glyphicon-plus"></span></button>
          <a class="btn btn-default btn-nuevo" data-toggle="modal" data-target="#ModalNuevo"><span>Nuevo Informe</span></a>
        </div>
      </div>    
      <table id="dt-usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th>Codigo</th>
          <th>Fecha de Aprobacion</th>
          <th>Sucursal</th>
          <th>Departamento</th>
          <th>Asignado a</th>
          <th>Equipo de Proteccion Personal</th>
          <th>Cantidad</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php
            include 'dbh.php';
            $query = "SELECT * FROM informe";
            $result = mysqli_query($conn, $query) or die;

            while ($data = mysqli_fetch_assoc($result)) {
              $cedula = (string) $data['idUsuario'];
              
              $search = "SELECT * FROM usuario WHERE idUsuario='$cedula'";
              $resultado = mysqli_query($conn, $search) or die; 
              $row = $resultado->fetch_assoc();

              //Variables, establecimiento, departamento
              $idDep = (string) $row['idDep'];
              
              //Departamento del usuario
              $search_2 = "SELECT * FROM departamento WHERE idDep='$idDep'";
              $resultado_2 = mysqli_query($conn, $search_2) or die; 
              $row_2 = $resultado_2->fetch_assoc();

              //Establecimiento del usuario
              $idEstab = (string) $row_2['idEstab'];

              //Establecimiento del usuario
              $search_3 = "SELECT * FROM establecimiento WHERE idEstab='$idEstab'";  
              $resultado_3 = mysqli_query($conn, $search_3) or die;
              $row_3 = $resultado_3->fetch_assoc();

              //Variable entidad
              $idEntidad = (string) $row_3['idEntidad'];

              //Entidad a la que el usuario pertenece
              $search_4 = "SELECT * FROM entidad WHERE idEntidad='$idEntidad'";
              $resultado_4 = mysqli_query($conn, $search_4) or die;
              $row_4 = $resultado_4->fetch_assoc();

              //Variable idEpp
              $idEpp = (string) $data['idEpp'];

              $search_5 = "SELECT * FROM epp WHERE idEpp='$idEpp'";
              $resultado_5 = mysqli_query($conn, $search_5) or die;
              $row_5 = $resultado_5->fetch_assoc();
          ?>

          <tr>
            <td><?php echo $data['idInforme']; ?></td>
            <td><?php echo $data['fecha']; ?></td>        
            <td><?php echo $row_4['nombre']; echo " - "; echo $row_3['ciudad']; ?></td>
            <td><?php echo $row_2['nombre']; ?></td>
            <td><?php echo $row['nombres']; echo " "; echo $row['apellidos'];?></td>
            <td><?php echo $row_5['nombre']; ?></td>
            <td><?php echo $data['cantidad']; ?></td>
            <td>
              <button class='btn btn-info modificar' onclick="modificarInforme('<?php echo $data['idInforme']; ?>', '<?php echo $data['idUsuario']; ?>', '<?php echo $data['idEpp']; ?>', '<?php echo $data['fecha']; ?>', '<?php echo $data['cantidad']; ?>', '<?php echo $data['observacion']; ?>')" data-toggle='modal' data-target='#ModalModificar'>
                <span class='glyphicon glyphicon-pencil'></span>
              </button>
            </td>
            <td>
              <button class='btn btn-danger eliminar' onclick="eliminarInforme('<?php echo $data['idI']; ?>')" data-toggle='modal' data-target='#ModalEliminar'>
                <span class='glyphicon glyphicon-trash'></span>
              </button>
            </td>
          </tr>
          <?php 
            }
            if (isset($result)) { mysqli_free_result($result); }
            if (isset($resultado)) { mysqli_free_result($resultado); }
            if (isset($resultado_2)) { mysqli_free_result($resultado_2); }
            if (isset($resultado_3)) { mysqli_free_result($resultado_3); }
            if (isset($resultado_4)) { mysqli_free_result($resultado_4); }
            if (isset($resultado_5)) { mysqli_free_result($resultado_5); }
            mysqli_close($conn);
          ?>
        </tbody>

      </table>
    </div>
  </section>

  <!--Modal Nuevo-->
  <div id="ModalNuevo" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Informe, Equipo de Proteccion Personal</h4>
        </div>
        <div class="modal-body">
          <form id="FormNuevo" action="server/crearInforme.php" method="POST">
            Codigo<br>
            <input type="text" name="idInforme" id="idInforme-Nuevo" minlength="5" maxlength="5" placeholder="EE000"><br>
            Fecha de Aprobacion<br>
            <input type="date" name="fecha" id="fecha-Nuevo"><br>
            Asignado a<br>
            <select name="idUsuario" id="idUsuario-Nuevo">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM usuario WHERE rol='Jefe/Lider' ORDER BY nombres";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  $nombres = (string) $data['nombres'];
                  $apellidos = (string) $data['apellidos'];
              ?>
              <option value="<?php echo $data['idUsuario']?>"><?php echo $nombres; echo " "; echo $apellidos;?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Equipo de proteccion personal<br>
            <select name="idEpp" id="idEpp-Nuevo">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM epp ORDER BY nombre";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  $nombre = (string) $data['nombre'];
              ?>
              <option value="<?php echo $data['idEpp']?>"><?php echo $nombre?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Cantidad<br>
            <input type="number" name="cantidad" id="cantidad-Nuevo"><br>
            Observacion<br>
            <input type="text" name="observacion" id="observacion-Nuevo" minlength="5" maxlength="200"><br> 
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="FormNuevo" class="btn btn-success btn-modal">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Modificar-->
  <div id="ModalModificar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Informe, Equipo de Proteccion Personal</h4>
        </div>
        <div class="modal-body">
          <form id="FormModificar" action="server/modificarInforme.php" method="POST">
            Codigo<br>
            <input type="text" name="idInforme" id="idInforme-Modificar" minlength="5" maxlength="5" disabled><br>
            Fecha de Aprobacion<br>
            <input type="date" name="fecha" id="fecha-Modificar"><br>
            Responsable<br>
            <select name="idUsuario" id="idUsuario-Modificar">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM usuario WHERE rol='Jefe/Lider' ORDER BY nombres";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  $nombres = (string) $data['nombres'];
                  $apellidos = (string) $data['apellidos'];
              ?>
              <option value="<?php echo $data['idUsuario']?>"><?php echo $nombres; echo " "; echo $apellidos;?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Equipo de proteccion personal<br>
            <select name="idEpp" id="idEpp-Modificar">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM epp ORDER BY nombre";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  $nombre = (string) $data['nombre'];
              ?>
              <option value="<?php echo $data['idEpp']?>"><?php echo $nombre?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Cantidad<br>
            <input type="number" name="cantidad" id="cantidad-Modificar" placeholder="0"><br>
            Observacion<br>
            <input type="text" name="observacion" id="observacion-Modificar" minlength="5" maxlength="200"><br>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="FormModificar" class="btn btn-info btn-modal">Actualizar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Eliminar-->
  <div id="ModalEliminar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar Informe, Equipo de Proteccion Personal</h4>
        </div>
        <div class="modal-body">
          <form id="FormEliminar" action="server/eliminarInforme.php" method="POST">
            <input type="hidden" id="idInforme-Eliminar" name="idInforme" value="">
          </form>
          ¿Esta seguro que desea borrar permanentemente este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="FormEliminar" class="btn btn-danger btn-modal">Eliminar</button>
        </div>
      </div>
    </div>
  </div>


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
    function eliminarInforme(idInforme) {
      $("#idInforme-Eliminar").val(idInforme);
    }

    function modificarInforme(idInforme, idUsuario, idEpp, fecha, cantidad, observacion) {
      $("#idInforme-Modificar").val(idInforme);
      $("#idUsuario-Modificar").val(idUsuario);
      $("#idEpp-Modificar").val(idEpp);
      $("#fecha-Modificar").val(fecha);
      $("#cantidad-Modificar").val(cantidad);
      $("#observacion-Modificar").val(observacion);
    }
  </script>
</body>
</html>