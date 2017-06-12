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
  <link href="css/stylesheets/jefe.min.css" rel="stylesheet">
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
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Demandas de Seguridad</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">

      <div id="the-alert" class="alert alert-warning alert-dismissable collapse">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          &nbsp; Usted no tiene permisos para acceder a esta opción.
      </div>

      <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
          &nbsp; Error al guardar la imagen, vuelva a intentarlo.
      </div>

      <div class="row">
        <div class="dt-buttons btn-group" id="botoneria">
          <button class="btn btn-success nuevo"><span class="glyphicon glyphicon-plus"></span></button>
          <a class="btn btn-default btn-nuevo"><span>Nuevo Registro</span></a>
        </div>
      </div>    
      <table id="dt-usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th>Codigo</th>
          <th>Fecha</th>
          <th>Sucursal</th>
          <th>Departamento</th>
          <th>Asignado a</th>
          <th>Estado</th>
          <th>Hallazgo</th>
          <th>Correctivo</th>
          <th>Fecha Maxima</th>
          <th>Fecha de Cierre</th>
          <th>Descripcion</th>
          <th>Implementos</th>
          <th>Aceptar</th>
          <th>Redirigir</th>
          <th>Comentar</th>
          <th>Adjuntar</th>
        </tr>
        </thead>
        <tbody>
          <?php
            include 'dbh.php';
            $actual_ini = (string) $_SESSION['user'];
            $query_ini = "SELECT * FROM usuario WHERE user='$actual_ini'";
            if ($result_ini = mysqli_query($conn, $query_ini)) {
              while ($data_ini = mysqli_fetch_assoc($result_ini)) {
                $actual = (string) $data_ini['idUsuario'];
                $query = "SELECT * FROM demanda WHERE idUsuario='$actual'";
                if ($result = mysqli_query($conn, $query)) {
                  while ($data = mysqli_fetch_assoc($result)) {
                    $variable = (string) "Aceptada";
                    $idUsuario = (string) $data['idUsuario'];
                    $idLista = (string) $data['idLista'];
                    $idHallazgo = (string) $data['idHallazgo'];
                    $idCorrectivo = (string) $data['idCorrectivo']; 
                    
                    $search = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
                    $resultado = mysqli_query($conn, $search); 
                    $row = $resultado->fetch_assoc();

                    //Variables, establecimiento, departamento
                    $idDep = (string) $row['idDep'];
                    
                    //Departamento del usuario
                    $search_2 = "SELECT * FROM departamento WHERE idDep='$idDep'";
                    $resultado_2 = mysqli_query($conn, $search_2); 
                    $row_2 = $resultado_2->fetch_assoc();

                    //Establecimiento del usuario
                    $idEstab = (string) $row_2['idEstab'];

                    //Establecimiento del usuario
                    $search_3 = "SELECT * FROM establecimiento WHERE idEstab='$idEstab'";  
                    $resultado_3 = mysqli_query($conn, $search_3);
                    $row_3 = $resultado_3->fetch_assoc();

                    //Variable entidad
                    $idEntidad = (string) $row_3['idEntidad'];

                    //Entidad a la que el usuario pertenece
                    $search_4 = "SELECT * FROM entidad WHERE idEntidad='$idEntidad'";
                    $resultado_4 = mysqli_query($conn, $search_4);
                    $row_4 = $resultado_4->fetch_assoc();
                    
                    //Nombre del elemento de la lista (CHECKLIST). Motivo
                    $search_5 = "SELECT * FROM listaverificacion WHERE idLista='$idLista'";
                    $resultado_5 = mysqli_query($conn, $search_5);
                    $row_5 = $resultado_5->fetch_assoc();

                    //Nombre del elemento de la Hallazgo
                    $search_6 = "SELECT * FROM hallazgo WHERE idHallazgo='$idHallazgo'";
                    $resultado_6 = mysqli_query($conn, $search_6);
                    $row_6 = $resultado_6->fetch_assoc();

                    //Nombre del elemento de la Medida
                    $search_7 = "SELECT * FROM medidacorrectiva WHERE idCorrectivo='$idCorrectivo'";
                    $resultado_7 = mysqli_query($conn, $search_7);
                    $row_7 = $resultado_7->fetch_assoc();
          ?>

          <tr>
            <td><?php echo $data['idDemanda']; ?></td>
            <td><?php echo $data['fecha']; ?></td>        
            <td><?php echo $row_4['nombre']; echo " - "; echo $row_3['ciudad']; ?></td>
            <td><?php echo $row_2['nombre']; ?></td>
            <td><?php echo $row['nombres']; echo " "; echo $row['apellidos'];?></td>
            <td><?php echo $data['estado']; ?></td>
            <td><?php echo $row_6['nombre']; ?></td> <!--Hallazgo--> 
            <td><?php echo $row_7['nombre']; ?></td> <!--Medida-->
            <td><?php echo $data['fechaMax']; ?></td>
            <td><?php echo $data['fechaCierre']; ?></td> 
            <td><?php echo $data['descripcion']; ?></td>
            <td><?php echo $row_5['nombre']; ?></td> <!--Motivo-->
            <td>
              <button class='btn btn-success modificar' onclick="aceptarDemanda('<?php echo $data['idDemanda'];?>')" data-toggle='modal' data-target='#ModalAceptar'>
                <span class='glyphicon glyphicon-ok'></span>
              </button>
            </td>
            <td>
              <button class='btn btn-info eliminar' onclick="redirigirDemanda('<?php echo $data['idDemanda'];?>', '<?php echo $data['idUsuario'];?>')" data-toggle='modal' data-target='#ModalRedirigir'>
                <span class='glyphicon glyphicon-share-alt'></span>
              </button>
            </td>
            <td>
              <button class='btn btn-primary eliminar' onclick="comentarDemanda('<?php echo $data['idDemanda'];?>', '<?php echo $data['comentario'];?>')" data-toggle='modal' data-target='#ModalComentar'>
                <span class='glyphicon glyphicon-comment'></span>
              </button>
            </td> 
            <td>
              <button class='btn btn-warning eliminar' onclick="adjuntarDemanda('<?php echo $data['idDemanda'];?>')" data-toggle='modal' data-target='#ModalAdjuntar'>
                <span class='glyphicon glyphicon glyphicon-save'></span>
              </button>
            </td> 
          </tr>
          <?php 
                  }
                }
              }
            }
            if (isset($result)) { mysqli_free_result($result); }
            if (isset($resultado)) { mysqli_free_result($resultado); }
            if (isset($resultado_2)) { mysqli_free_result($resultado_2); }
            if (isset($resultado_3)) { mysqli_free_result($resultado_3); }
            if (isset($resultado_4)) { mysqli_free_result($resultado_4); }
            if (isset($resultado_5)) { mysqli_free_result($resultado_5); }
            if (isset($resultado_6)) { mysqli_free_result($resultado_6); }
            if (isset($resultado_7)) { mysqli_free_result($resultado_7); }
            mysqli_close($conn);
          ?>
        </tbody>

      </table>
    </div>
  </section>

  <!--Modal Aceptar-->
  <div id="ModalAceptar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Aceptar Demanda de Seguridad</h4>
        </div>
        <div class="modal-body">
          <form id="FormAceptar" action="server/doctor-aceptarDemanda.php" method="POST">
            <input type="hidden" id="idDemanda-Aceptar" name="idDemanda" value="">
            <input type="hidden" id="estado-Aceptar" name="estado" value="">
          </form>
          ¿Esta seguro de aceptar la responsabilidad que implica esta demanda de seguridad?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="FormAceptar" class="btn btn-success btn-modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Redirigir-->
  <div id="ModalRedirigir" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Redirigir Demanda de Seguridad</h4>
        </div>
        <div class="modal-body">
          <form id="FormRedirigir" action="server/doctor-redirigirDemanda.php" method="POST">
            <input type="hidden" id="idDemanda-Redirigir" name="idDemanda" value="" placeholder="">
            Responsable<br>
            <select name="idUsuario" id="idUsuario-Redirigir">
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
            <input type="hidden" id="estado-Redirigir" name="estado" value="">
          </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="FormRedirigir" class="btn btn-info btn-modal">Redirigir</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Comentar-->
  <div id="ModalComentar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Comentar Demanda de Seguridad</h4>
        </div>
        <div class="modal-body">
          <form id="FormComentar" action="server/doctor-comentarDemanda.php" method="POST">
            <input type="hidden" id="idDemanda-Comentar" name="idDemanda" value="">
            Comentario<br>
            <input type="text" name="comentario" id="comentario-Comentar" minlength="5" maxlength="200"><br>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="FormComentar" class="btn btn-info btn-primary">Comentar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Adjuntar-->
  <div id="ModalAdjuntar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adjuntar Evidencia por Demanda de Seguridad</h4>
        </div>
        <div class="modal-body">
          <form id="FormAdjuntar" enctype="multipart/form-data" action="server/doctor-adjuntarDemanda.php" method="POST">
            <input type="hidden" id="idDemanda-Adjuntar" name="idDemanda" value="" placeholder="">
            Seleccione una imagen<br>  
            <input type="file" name="image">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="submit" form="FormAdjuntar" class="btn btn-warning btn-modal">Guardar</button>
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
    $(document).ready( function () {
      $("#botoneria").click( function () {
        $("#the-alert").show();
      }) 

    });

    function aceptarDemanda(idDemanda) {
      $("#idDemanda-Aceptar").val(idDemanda);
      $("#estado-Aceptar").val("Aceptada");
    }
    function redirigirDemanda(idDemanda, idUsuario) {
      $("#idDemanda-Redirigir").val(idDemanda);
      $("#idUsuario-Redirigir").val(idUsuario);
      $("#estado-Redirigir").val("Pendiente");
    }
    function comentarDemanda(idDemanda, comentario) {
      $("#idDemanda-Comentar").val(idDemanda);
      $("#comentario-Comentar").val(comentario);
    }
    function adjuntarDemanda(idDemanda) {
      $("#idDemanda-Adjuntar").val(idDemanda);
    }
  </script>
</body>
</html>