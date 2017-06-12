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
  <link href="css/stylesheets/admin-establecimiento.min.css" rel="stylesheet">
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
          <a id="marca" class="navbar-brand" href="admin.php"><span style="padding-right: 30px;" class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--Usuarios-->
            <li><a class="active" href="admin.php">Usuarios</a></li>
            <!--Mantenimiento-->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mantenimiento<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><label id="label-admin">Area Administrativa</label></li>
                <li><a href="admin-entidad.php">Entidades</a></li>
                <li><a href="admin-establecimiento.php">Establecimientos</a></li>
                <li><a href="admin-departamento.php">Departamentos</a></li>
                <li><label id="label-med">Area Medica</label></li>
                <li><a href="admin-enfermedad.php">Enfermedades</a></li>
                <li><a href="admin-examen.php">Exámenes</a></li>
                <li><a href="admin-medicamento.php">Medicamentos</a></li>
                <li><a href="admin-servicio.php">Servicios por especialidad</a></li> 
                <li><a href="admin-tipoenfermedad.php">Tipos de enfermedades</a></li>
                <li><a href="admin-tipoexamen.php">Tipos de exámenes</a></li>
                <li><a href="admin-tipomedicamento.php">Tipos de medicamentos</a></li>
                <li><a href="admin-especialidad.php">Especialidades</a></li>
              </ul>
            </li><!--/Mantenimiento-->
            <!--Configuración-->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuración<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><label id="label-gen">General</label></li>
                <li><a href="admin-trabajo.php">Puestos de trabajo</a></li>
                <li><a href="admin-medida.php">Medidas correctivas</a></li>
                <li><label id="label-seg">Seguridad</label></li>
                <li><a href="admin-hallazgo.php">Hallazgos Estandarizados</a></li>
                <li><a href="admin-tipohallazgo.php">Tipos de Hallazgos</a></li>
              </ul>
            </li><!--/Configuración-->
            <!--Prev. de Riesgo-->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Prev. de Riesgo<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="admin-demanda.php">Demandas de seguridad</a></li>
                <li><a href="admin-reporte.php">Reporte por demandas de seguridad</a></li>
              </ul>
            </li><!--/Prev. de Riesgo-->
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
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Establecimientos</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">

      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          &nbsp; Registro eliminado exitosamente.
      </div>
      
      <div class="row">
        <div class="dt-buttons btn-group" id="botoneria">
          <button class="btn btn-success nuevo" data-toggle="modal" data-target="#ModalNuevo"><span class="glyphicon glyphicon-plus"></span></button>
          <a class="btn btn-default btn-nuevo" data-toggle="modal" data-target="#ModalNuevo"><span>Nuevo Registro</span></a>
        </div>
      </div>    
      <table id="dt-usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th>Codigo</th>
          <th>Entidad</th>
          <th>Direccion</th>
          <th>Ciudad</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php
            include 'dbh.php';
            $query = "SELECT * FROM establecimiento";
            $result = mysqli_query($conn, $query) or die;

            while ($data = mysqli_fetch_assoc($result)) {
              $idEntidad = (string) $data['idEntidad'];
              
              $search = "SELECT * FROM entidad WHERE idEntidad='$idEntidad'";
              $resultado = mysqli_query($conn, $search) or die; 
              $row = $resultado->fetch_assoc();
          ?>

          <tr>
            <td><?php echo $data['idEstab']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $data['direccion']; ?></td>
            <td><?php echo $data['ciudad']; ?></td>
            <td>
              <button class='btn btn-info modificar' onclick="modificarEstab('<?php echo $data['idEstab']; ?>', '<?php echo $data['idEntidad']; ?>', '<?php echo $data['direccion']; ?>', '<?php echo $data['telefono']; ?>', '<?php echo $data['ciudad']; ?>', '<?php echo $data['estado']; ?>')" data-toggle='modal' data-target='#ModalModificar'>
                <span class='glyphicon glyphicon-pencil'></span>
              </button>
            </td>
            <td>
              <button class='btn btn-danger eliminar' onclick="eliminarEstab('<?php echo $data['idEstab']; ?>')" data-toggle='modal' data-target='#ModalEliminar'>
                <span class='glyphicon glyphicon-trash'></span>
              </button>
            </td>
          </tr>
          <?php 
            }
            if (isset($result)) { mysqli_free_result($result); }
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
          <h4 class="modal-title">Nuevo Establecimiento</h4>
        </div>
        <div class="modal-body">
          <form id="FormNuevo" action="server/crearEstab.php" method="POST">
            Codigo<br>
            <input type="text" name="idEstab" id="idEstab-Nuevo" minlength="5" maxlength="5" placeholder="ES000"><br>
            Entidad<br>
            <select name="idEntidad" id="idEntidad-Nuevo">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM entidad ORDER BY nombre";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  $nombre = (string) $data['nombre'];
              ?>
              <option value="<?php echo $data['idEntidad']?>"><?php echo $nombre;?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Direccion<br>
            <input type="text" name="direccion" id="direccion-Nuevo" minlength="5" maxlength="50"><br>
            Telefono<br>
            <input type="text" name="telefono" id="telefono-Nuevo" minlength="5" maxlength="9"><br>
            Ciudad<br>
            <input type="text" name="ciudad" id="ciudad-Nuevo" minlength="5" maxlength="20"><br>
            Pais<br>
            <input type="text" name="estado" id="estado-Nuevo" minlength="5" maxlength="10"><br>
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
          <h4 class="modal-title">Modificar Establecimiento</h4>
        </div>
        <div class="modal-body">
          <form id="FormModificar" action="server/modificarEstab.php" method="POST">
            Codigo<br>
            <input type="text" name="idEstab" id="idEstab-Modificar" minlength="5" maxlength="5" readonly><br>
            Entidad<br>
            <select name="idEntidad" id="idEntidad-Modificar">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM entidad ORDER BY nombre";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  $nombre = (string) $data['nombre'];
              ?>
              <option value="<?php echo $data['idEntidad']?>"><?php echo $nombre;?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Direccion<br>
            <input type="text" name="direccion" id="direccion-Modificar" minlength="5" maxlength="50"><br>
            Telefono<br>
            <input type="text" name="telefono" id="telefono-Modificar" minlength="5" maxlength="9"><br>
            Ciudad<br>
            <input type="text" name="ciudad" id="ciudad-Modificar" minlength="5" maxlength="20"><br>
            Pais<br>
            <input type="text" name="estado" id="estado-Modificar" minlength="5" maxlength="10"><br>
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
          <h4 class="modal-title">Eliminar Establecimiento</h4>
        </div>
        <div class="modal-body">
          <form id="FormEliminar" action="server/eliminarEstab.php" method="POST">
            <input type="hidden" id="idEstab-Eliminar" name="idEstab" value="">
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
    function eliminarEstab(idEstab) {
      $("#idEstab-Eliminar").val(idEstab);
    }

    function modificarEstab(idEstab, idEntidad, direccion, telefono, ciudad, estado) {
      $("#idEstab-Modificar").val(idEstab);
      $("#idEntidad-Modificar").val(idEntidad);
      $("#direccion-Modificar").val(direccion);
      $("#telefono-Modificar").val(telefono);
      $("#ciudad-Modificar").val(ciudad);
      $("#estado-Modificar").val(estado);
    }
  </script>
</body>
</html>