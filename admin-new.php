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
  <link href="css/stylesheets/admin.min.css" rel="stylesheet">
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
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Registro de Usuarios</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">

      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
          &nbsp; Registro creado exitosamente.
      </div>

      <div class="row">
        <div class="dt-buttons btn-group" id="botoneria">
          <button class="btn btn-success nuevo" data-toggle="modal" data-target="#ModalNuevo"><span class="glyphicon glyphicon-plus"></span></button>
          <a class="btn btn-default btn-nuevo" data-toggle="modal" data-target="#ModalNuevo"><span>Nuevo Usuario</span></a>
        </div>
      </div>    
      <table id="dt-usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th>Cedula</th>
          <th>Trabajo</th>
          <th>Sucursal</th>
          <th>Departamento</th>
          <th>Empleado</th>
          <th>Rol</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php
            include 'dbh.php';
            $query = "SELECT * FROM usuario";
            $result = mysqli_query($conn, $query) or die;

            while ($data = mysqli_fetch_assoc($result)) {
              $cedula = (string) $data['idUsuario'];
              $trabajo = (string) $data['idTrabajo'];
              
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

              //Nombre del elemento de la lista (CHECKLIST). Motivo
              $search_5 = "SELECT * FROM puestotrabajo WHERE idTrabajo='$trabajo'";
              $resultado_5 = mysqli_query($conn, $search_5) or die;
              $row_5 = $resultado_5->fetch_assoc();
          ?>

          <tr>
            <td><?php echo $data['idUsuario']; ?></td>
            <td><?php echo $row_5['nombre']; ?></td>
            <td><?php echo $row_4['nombre']; echo " - "; echo $row_3['ciudad']; ?></td>
            <td><?php echo $row_2['nombre']; ?></td>
            <td><?php echo $row['nombres']; echo " "; echo $row['apellidos'];?></td>
            <td><?php echo $data['rol']; ?></td>
            <td>
              <button class='btn btn-info modificar' onclick="modificarUsuario('<?php echo $data['idUsuario']; ?>', '<?php echo $data['idTrabajo']; ?>', '<?php echo $data['nombres']; ?>', '<?php echo $data['apellidos']; ?>', '<?php echo $data['birthday']; ?>', '<?php echo $data['sexo']; ?>', '<?php echo $data['estadoCivil']; ?>', '<?php echo $data['educacion']; ?>', '<?php echo $data['idDep']; ?>', '<?php echo $data['telefono']; ?>', '<?php echo $data['celular']; ?>', '<?php echo $data['direccion']; ?>', '<?php echo $data['email']; ?>', '<?php echo $data['estado']; ?>', '<?php echo $data['user']; ?>', '<?php echo $data['pass']; ?>', '<?php echo $data['rol']; ?>')" data-toggle='modal' data-target='#ModalModificar'>
                <span class='glyphicon glyphicon-pencil'></span>
              </button>
            </td>
            <td>
              <button class='btn btn-danger eliminar' onclick="eliminarUsuario('<?php echo $data['idUsuario']; ?>')" data-toggle='modal' data-target='#ModalEliminar'>
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
          <h4 class="modal-title">Nuevo Usuario</h4>
        </div>
        <div class="modal-body">
          <form id="FormNuevo" action="server/crearUsuario.php" method="POST">
            Cédula<br>
            <input type="text" name="idUsuario" id="idUsuario-Nuevo" minlength="10" maxlength="10"><br>
            Departamento<br>
            <select name="idDep" id="idDep-Nuevo">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM departamento";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  //Variable del establecimiento
                  $idEstab = (string) $data['idEstab'];

                  //Establecimiento al que el departamento pertenece
                  $search = "SELECT * FROM establecimiento WHERE idEstab='$idEstab'";
                  $resultado = mysqli_query($conn, $search) or die; 
                  $row = $resultado->fetch_assoc();

                  //Entidad a la que el usuario pertenece
                  $search_2 = "SELECT nombre FROM entidad WHERE idEntidad='$idEntidad'";
                  $resultado_2 = mysqli_query($conn, $search_2) or die;
                  $row_2 = $resultado_2->fetch_assoc();
              ?>
              <option value="<?php echo $data['idDep']; ?>"><?php echo $data['nombre']; echo " - "; echo $row_2['nombre']; echo " - "; echo $row['ciudad']; ?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                if (isset($resultado)) { mysqli_free_result($resultado); }
                if (isset($resultado_2)) { mysqli_free_result($resultado_2); }
                mysqli_close($conn);
              ?>
            </select><br>
            Puesto de Trabajo<br>
            <select name="idTrabajo" id="idTrabajo-Nuevo">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM puestotrabajo";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
              ?>
              <option value="<?php echo $data['idTrabajo']; ?>"><?php echo $data['nombre']; ?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Nombres<br>
            <input type="text" name="nombres" id="nombres-Nuevo" minlength="10" maxlength="40"><br>
            Apellidos<br>
            <input type="text" name="apellidos" id="apellidos-Nuevo" minlength="10" maxlength="40"><br>
            Birthday<br>
            <input type="date" name="birthday" id="birthday-Nuevo"><br>
            Sexo
            <select name="sexo" id="sexo-Nuevo">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select><br>
            Estado Civil <br>
            <select name="estadoCivil" id="estadoCivil-Nuevo">
              <option value="Soltero">Soltero/a</option>
              <option value="Casado/a">Casado/a</option>
              <option value="Casado/a">Divorciado/a</option>
            </select><br>
            Educacion<br>
            <select name="educacion" id="educacion-Nuevo">
              <option value="Primer Nivel">Primer Nivel</option>
              <option value="Segundo Nivel">Segundo Nivel</option>
              <option value="Tercer Nivel">Tercer Nivel</option>
              <option value="Cuarto Nivel">Cuarto Nivel</option>
            </select><br>
            Teléfono<br>
            <input type="text" name="telefono" id="telefono-Nuevo" minlength="9" maxlength="9"><br>
            Celular<br>
            <input type="text" name="celular" id="celular-Nuevo" minlength="10" maxlength="10"><br>
            Dirección<br>
            <input type="text" name="direccion" id="direccion-Nuevo" minlength="10" maxlength="50"><br>
            E-Mail<br>
            <input type="email" name="email" id="email-Nuevo" minlength="10" maxlength="40"><br>
            Estado
            <select name="estado" id="estado-Nuevo">
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select><br>
            Usuario<br>
            <input type="text" name="user" id="user-Nuevo" minlength="5" maxlength="50"><br>
            Contraseña<br>
            <input type="password" name="pass" id="pass-Nuevo" minlength="8" maxlength="40"><br>
            Rol
            <select name="rol" id="rol-Nuevo">
              <option value="Administrador">Administrador</option>
              <option value="Tecnico/Seguridad">Tecnico/Seguridad</option>
              <option value="Doctor/Enfermero">Doctor/Enfermero</option>
              <option value="Jefe/Lider">Jefe/Lider</option>
              <option value="Usuario">Usuario</option>
            </select>
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
          <h4 class="modal-title">Modificar Usuario</h4>
        </div>
        <div class="modal-body">
          <form id="FormModificar" action="server/modificarUsuario.php" method="POST">
            Cédula<br>
            <input type="text" name="idUsuario" id="idUsuario-Modificar" minlength="10" maxlength="10" disabled><br>
            Departamento<br>
            <select name="idDep" id="idDep-Modificar">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM departamento";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
                  //Variable del establecimiento
                  $idEstab = (string) $data['idEstab'];

                  //Establecimiento al que el departamento pertenece
                  $search = "SELECT * FROM establecimiento WHERE idEstab='$idEstab'";
                  $resultado = mysqli_query($conn, $search) or die; 
                  $row = $resultado->fetch_assoc();

                  //Entidad a la que el usuario pertenece
                  $search_2 = "SELECT nombre FROM entidad WHERE idEntidad='$idEntidad'";
                  $resultado_2 = mysqli_query($conn, $search_2) or die;
                  $row_2 = $resultado_2->fetch_assoc();
              ?>
              <option value="<?php echo $data['idDep']; ?>"><?php echo $data['nombre']; echo " - "; echo $row_2['nombre']; echo " - "; echo $row['ciudad']; ?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                if (isset($resultado)) { mysqli_free_result($resultado); }
                if (isset($resultado_2)) { mysqli_free_result($resultado_2); }
                mysqli_close($conn);
              ?>
            </select><br>
            Puesto de Trabajo<br>
            <select name="idTrabajo" id="idTrabajo-Modificar">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM puestotrabajo";
                $result = mysqli_query($conn, $query) or die;

                while ($data = mysqli_fetch_assoc($result)) {
              ?>
              <option value="<?php echo $data['idTrabajo']; ?>"><?php echo $data['nombre']; ?></option>
              <?php 
                }
                if (isset($result)) { mysqli_free_result($result); }
                mysqli_close($conn);
              ?>
            </select><br>
            Nombres<br>
            <input type="text" name="nombres" id="nombres-Modificar" minlength="10" maxlength="40"><br>
            Apellidos<br>
            <input type="text" name="apellidos" id="apellidos-Modificar" minlength="10" maxlength="40"><br>
            Birthday<br>
            <input type="date" name="birthday" id="birthday-Modificar"><br>
            Sexo
            <select name="sexo" id="sexo-Modificar">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select><br>
            Estado Civil <br>
            <select name="estadoCivil" id="estadoCivil-Modificar">
              <option value="Soltero">Soltero/a</option>
              <option value="Casado/a">Casado/a</option>
              <option value="Casado/a">Divorciado/a</option>
            </select><br>
            Educacion<br>
            <select name="educacion" id="educacion-Modificar">
              <option value="Primer Nivel">Primer Nivel</option>
              <option value="Segundo Nivel">Segundo Nivel</option>
              <option value="Tercer Nivel">Tercer Nivel</option>
              <option value="Cuarto Nivel">Cuarto Nivel</option>
            </select><br>
            Teléfono<br>
            <input type="text" name="telefono" id="telefono-Modificar" minlength="9" maxlength="9"><br>
            Celular<br>
            <input type="text" name="celular" id="celular-Modificar" minlength="10" maxlength="10"><br>
            Dirección<br>
            <input type="text" name="direccion" id="direccion-Modificar" minlength="10" maxlength="50"><br>
            E-Mail<br>
            <input type="email" name="email" id="email-Modificar" minlength="10" maxlength="40"><br>
            Estado
            <select name="estado" id="estado-Modificar">
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select><br>
            Usuario<br>
            <input type="text" name="user" id="user-Modificar" minlength="5" maxlength="50"><br>
            Contraseña<br>
            <input type="password" name="pass" id="pass-Modificar" minlength="8" maxlength="40"><br>
            Rol
            <select name="rol" id="rol-Modificar">
              <option value="Administrador">Administrador</option>
              <option value="Tecnico/Seguridad">Tecnico/Seguridad</option>
              <option value="Doctor/Enfermero">Doctor/Enfermero</option>
              <option value="Jefe/Lider">Jefe/Lider</option>
              <option value="Usuario">Usuario</option>
            </select>
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
          <h4 class="modal-title">Eliminar Usuario</h4>
        </div>
        <div class="modal-body">
          <form id="FormEliminar" action="server/eliminarUsuario.php" method="POST">
            <input type="hidden" id="idUsuario-Eliminar" name="idUsuario" value="">
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
    function eliminarUsuario(idUsuario) {
      $("#idUsuario-Eliminar").val(idUsuario);
    }

    function modificarUsuario(idUsuario, idTrabajo, nombres, apellidos, birthday, sexo, estadoCivil, educacion, idDep, telefono, celular, direccion, email, estado, user, pass, rol) {
      $("#idUsuario-Modificar").val(idUsuario);
      $("#idTrabajo-Modificar").val(idTrabajo);
      $("#nombres-Modificar").val(nombres);
      $("#apellidos-Modificar").val(apellidos);
      $("#birthday-Modificar").val(birthday);
      $("#sexo-Modificar").val(sexo);
      $("#estadoCivil-Modificar").val(estadoCivil);
      $("#educacion-Modificar").val(educacion);
      $("#idDep-Modificar").val(idDep);
      $("#telefono-Modificar").val(telefono);
      $("#celular-Modificar").val(celular);
      $("#direccion-Modificar").val(direccion);
      $("#email-Modificar").val(email);
      $("#estado-Modificar").val(estado);
      $("#user-Modificar").val(user);
      $("#pass-Modificar").val(pass);
      $("#rol-Modificar").val(rol);
    }
  </script>
</body>
</html>