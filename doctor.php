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
  <link href="css/stylesheets/doctor.min.css" rel="stylesheet">
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
          <a id="marca" class="navbar-brand" href="doctor.php"><span style="padding-right: 30px;" class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav">
            <!--Fichas Médicas-->
            <li><a href="doctor.php">Fichas Médicas</a></li>
            <!--Control de citas-->
            <li><a href="doctor-cita.php">Control de Citas Médicas</a></li>
            <!--Demandas de seguridad-->
            <li><a href="doctor-demanda.php">Demandas de Seguridad</a></li>
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
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Fichas Médicas</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">

      <div id="the-alert" class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          Bienvenido <strong>Doctor/Enfermero! </strong> <br>
          Sistema de Gestión y Control de Seguridad y Salud Ocupacional.
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
          <th>Historia</th>
          <th>Cedula</th>
          <th>Empleado</th>
          <th>Birthday</th>
          <th>Telefono/Celular</th>
          <th>Email</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php
            include 'dbh.php';
            $query = "SELECT * FROM ficha";
            $result = mysqli_query($conn, $query) or die;

            while ($data = mysqli_fetch_assoc($result)) {
              $idUsuario = (string) $data['idUsuario'];
              
              $search = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
              $resultado = mysqli_query($conn, $search) or die; 
              $row = $resultado->fetch_assoc();
          ?>

          <tr>
            <td><?php echo $data['idFicha']; ?></td>
            <td><?php echo $data['idUsuario']; ?></td>
            <td><?php echo $row['nombres']; echo " "; echo $row['apellidos']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['telefono']; echo " - "; echo $row['celular'] ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
              <button class='btn btn-info modificar' onclick="modificarFicha('<?php echo $data['idFicha']; ?>', '<?php echo $data['idUsuario']; ?>', '<?php echo $data['fechaIngreso']; ?>', '<?php echo $data['vulnerabilidad']; ?>', '<?php echo $data['detalle']; ?>', '<?php echo $data['grupoSanguineo']; ?>', '<?php echo $data['nombreEmergencia']; ?>', '<?php echo $data['celularEmergencia']; ?>', '<?php echo $data['peso']; ?>', '<?php echo $data['talla']; ?>', '<?php echo $data['imc']; ?>', '<?php echo $data['pa']; ?>', '<?php echo $data['fc']; ?>', '<?php echo $data['fr']; ?>', '<?php echo $data['quirurgicos']; ?>', '<?php echo $data['traumaticos']; ?>', '<?php echo $data['alergicos']; ?>', '<?php echo $data['enfermedades']; ?>', '<?php echo $data['medicamento']; ?>', '<?php echo $data['medicamentoDetalle']; ?>')" data-toggle='modal' data-target='#ModalModificar'>
                <span class='glyphicon glyphicon-pencil'></span>
              </button>
            </td>
            <td>
              <button class='btn btn-danger eliminar' onclick="eliminarFicha('<?php echo $data['idFicha']; ?>')" data-toggle='modal' data-target='#ModalEliminar'>
                <span class='glyphicon glyphicon-trash'></span>
              </button>
            </td>
          </tr>
          <?php 
            }
            if (isset($result)) { mysqli_free_result($result); }
            if (isset($resultado)) { mysqli_free_result($resultado); }
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
          <h4 class="modal-title">Nueva Ficha Medica</h4>
        </div>
        <div class="modal-body">
          <form id="FormNuevo" action="server/crearFicha.php" method="POST">
            Historia<br>
            <input type="text" name="idFicha" id="idFicha-Nuevo" minlength="5" maxlength="5" placeholder="FM000"><br>
            Empleado<br>
            <select name="idUsuario" id="idUsuario-Nuevo">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM usuario ORDER BY nombres";
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
            Fecha de Ingreso<br>
            <input type="date" name="fechaIngreso" id="fechaIngreso-Nuevo"><br>
            Vulnerabilidad<br>
            <select name="vulnerabilidad" id="vulnerabilidad-Nuevo">
              <option value="Discapacidad Auditiva">Discapacidad Auditiva</option>
              <option value="Discapacidad Fisica">Discapacidad Fisica</option>
              <option value="Discapacidad Intelectual">Discapacidad Intelectual</option>
              <option value="Discapacidad Psicologica">Discapacidad Psicologica</option>
              <option value="Discapacidad Visual">Discapacidad Visual</option>
              <option value="Embarazo">Embarazo</option>
              <option value="Enfermedades Cronicas">Enfermedades Cronicas</option>
              <option value="Tercera Edad">Tercera Edad</option>
              <option value="Ninguna">Ninguna</option>
            </select><br>
            Observación<br>
            <input type="text" name="detalle" id="detalle-Nuevo" minlength="5" maxlength="100"><br>
            Grupo Sanquineo<br>
            <select name="grupoSanguineo" id="grupoSanguineo-Nuevo">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Contactar en caso de Emergencia</h4>
            Nombre (Familiar)<br>
            <input type="text" name="nombreEmergencia" id="nombreEmergencia-Nuevo" minlength="10" maxlength="40"><br>
            Celular (Familiar)<br>
            <input type="text" name="celularEmergencia" id="celularEmergencia-Nuevo" minlength="10" maxlength="10"><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Datos Generales</h4>
            Peso [Kg]<br>
            <input type="number" name="peso" id="peso-Nuevo" step="any" placeholder="0.00"><br>
            Altura [cm]<br>
            <input type="number" name="talla" id="talla-Nuevo" step="any" placeholder="0.00"><br>
            Indice de Masa Corporal<br>
            <input type="number" name="imc" id="imc-Nuevo" step="any" placeholder="0.00"><br>
            Presion Arterial<br>
            <input type="number" name="pa" id="pa-Nuevo" step="any" placeholder="0.00"><br>
            Frecuencia Cardiaca<br>
            <input type="number" name="fc" id="fc-Nuevo" step="any" placeholder="0.00"><br>
            Frecuencia Respiratoria<br>
            <input type="number" name="fr" id="fr-Nuevo" step="any" placeholder="0.00"><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Antecedentes Patológicos Personales</h4>
            Quirúrgicos<br>
            <input type="text" name="quirurgicos" id="quirurgicos-Nuevo" minlength="5" maxlength="200"><br>
            Traumáticos<br>
            <input type="text" name="traumaticos" id="traumaticos-Nuevo" minlength="5" maxlength="200"><br>
            Alérgicos<br>
            <input type="text" name="alergicos" id="alergicos-Nuevo" minlength="5" maxlength="200"><br>
            Enfermedades<br>
            <input type="text" name="enfermedades" id="enfermedades-Nuevo" minlength="5" maxlength="200"><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Medicamentos</h4>
            ¿Toma medicamentos?
            <select name="medicamento" id="medicamento-Nuevo">
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select><br>
            Medicamentos (Suministrados)<br>
            <input type="text" name="medicamentoDetalle" id="medicamentoDetalle-Nuevo" minlength="5" maxlength="200"><br>
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
          <h4 class="modal-title">Modificar Ficha Medica</h4>
        </div>
        <div class="modal-body">
          <form id="FormModificar" action="server/modificarFicha.php" method="POST">
            Historia<br>
            <input type="text" name="idFicha" id="idFicha-Modificar" minlength="5" maxlength="5" readonly><br>
            Empleado<br>
            <select name="idUsuario" id="idUsuario-Modificar">
              <?php
                include 'dbh.php';
                $query = "SELECT * FROM usuario ORDER BY nombres";
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
            Fecha de Ingreso<br>
            <input type="date" name="fechaIngreso" id="fechaIngreso-Modificar"><br>
            Vulnerabilidad<br>
            <select name="vulnerabilidad" id="vulnerabilidad-Modificar">
              <option value="Discapacidad Auditiva">Discapacidad Auditiva</option>
              <option value="Discapacidad Fisica">Discapacidad Fisica</option>
              <option value="Discapacidad Intelectual">Discapacidad Intelectual</option>
              <option value="Discapacidad Psicologica">Discapacidad Psicologica</option>
              <option value="Discapacidad Visual">Discapacidad Visual</option>
              <option value="Embarazo">Embarazo</option>
              <option value="Enfermedades Cronicas">Enfermedades Cronicas</option>
              <option value="Tercera Edad">Tercera Edad</option>
              <option value="Ninguna">Ninguna</option>
            </select><br>
            Observación<br>
            <input type="text" name="detalle" id="detalle-Modificar" minlength="5" maxlength="100"><br>
            Grupo Sanquineo<br>
            <select name="grupoSanguineo" id="grupoSanguineo-Modificar">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Contactar en caso de Emergencia</h4>
            Nombre de un Familiar<br>
            <input type="text" name="nombreEmergencia" id="nombreEmergencia-Modificar" minlength="10" maxlength="40"><br>
            Celular del Familiar<br>
            <input type="text" name="celularEmergencia" id="celularEmergencia-Modificar" minlength="10" maxlength="10"><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Datos Generales</h4>
            Peso [Kg]<br>
            <input type="number" name="peso" id="peso-Modificar" step="any"><br>
            Altura [cm]<br>
            <input type="number" name="talla" id="talla-Modificar" step="any"><br>
            Indice de Masa Corporal<br>
            <input type="number" name="imc" id="imc-Modificar" step="any"><br>
            Presion Arterial<br>
            <input type="number" name="pa" id="pa-Modificar" step="any"><br>
            Frecuencia Cardiaca<br>
            <input type="number" name="fc" id="fc-Modificar" step="any"><br>
            Frecuencia Respiratoria<br>
            <input type="number" name="fr" id="fr-Modificar" step="any"><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Antecedentes Patológicos Personales</h4>
            Quirúrgicos<br>
            <input type="text" name="quirurgicos" id="quirurgicos-Modificar" minlength="5" maxlength="200"><br>
            Traumáticos<br>
            <input type="text" name="traumaticos" id="traumaticos-Modificar" minlength="5" maxlength="200"><br>
            Alérgicos<br>
            <input type="text" name="alergicos" id="alergicos-Modificar" minlength="5" maxlength="200"><br>
            Enfermedades<br>
            <input type="text" name="enfermedades" id="enfermedades-Modificar" minlength="5" maxlength="200"><br>
            <h4 class="modal-title" style="border-style: none none ridge none; border-width: 1.4px; margin-left: 0px; margin-right: 0px; margin-top: 15px; margin-bottom: 15px; padding-bottom: 15px;">Medicamentos</h4>
            ¿Toma medicamentos?
            <select name="medicamento" id="medicamento-Modificar">
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select><br>
            Medicamentos (Suministrados)<br>
            <input type="text" name="medicamentoDetalle" id="medicamentoDetalle-Modificar" minlength="5" maxlength="200"><br>
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
          <h4 class="modal-title">Eliminar Ficha Medica</h4>
        </div>
        <div class="modal-body">
          <form id="FormEliminar" action="server/eliminarFicha.php" method="POST">
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
    function eliminarFicha(idFicha) {
      $("#idFicha-Eliminar").val(idFicha);
    }

    function modificarFicha(idFicha, idUsuario, fechaIngreso, vulnerabilidad, detalle, grupoSanguineo, nombreEmergencia, celularEmergencia, peso, talla, imc, pa, fc, fr, quirurgicos, traumaticos, alergicos, enfermedades, medicamento, medicamentoDetalle) {
      $("#idFicha-Modificar").val(idFicha);
      $("#idUsuario-Modificar").val(idUsuario);
      $("#fechaIngreso-Modificar").val(fechaIngreso);
      $("#vulnerabilidad-Modificar").val(vulnerabilidad);
      $("#detalle-Modificar").val(detalle);
      $("#grupoSanguineo-Modificar").val(grupoSanguineo);
      $("#nombreEmergencia-Modificar").val(nombreEmergencia);
      $("#celularEmergencia-Modificar").val(celularEmergencia);
      $("#peso-Modificar").val(peso);
      $("#talla-Modificar").val(talla);
      $("#imc-Modificar").val(imc);
      $("#pa-Modificar").val(pa);
      $("#fc-Modificar").val(fc);
      $("#fr-Modificar").val(fr);
      $("#quirurgicos-Modificar").val(quirurgicos);
      $("#traumaticos-Modificar").val(traumaticos);
      $("#alergicos-Modificar").val(alergicos);
      $("#enfermedades-Modificar").val(enfermedades);
      $("#medicamento-Modificar").val(medicamento);
      $("#medicamentoDetalle-Modificar").val(medicamentoDetalle);
    }
  </script>
</body>
</html>