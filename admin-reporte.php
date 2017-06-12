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
  <link href="css/stylesheets/seguridad-reporte.min.css" rel="stylesheet">
  <!--Font Stylesheet-->
  <link rel="shortcut icon" href="images/favicon.ico">
  <style type="text/css">
    #inputReporte {
      height: 30px;
      width: 190px; 
      padding-left: 5px; 
      margin-left: 30px; 
      margin-bottom: 10px; 
      padding-top: 1px; 
      padding-bottom: 1px;
    }
    #change-chart {
      border-radius: 4px;
      height: 30px;
      width: 120px;
      padding-left: 5px; 
      margin-left: 30px; 
      margin-top: 1px;
      margin-bottom: 4px; 
      padding-top: 1px; 
      padding-bottom: 1px;"
    }
  </style>
  <!--My JavaScript-->
  <script type="text/javascript" src="js/libs/loader.js"></script>
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
            <h1 id="super-titulo" style="font-family: Arimo; font-weight: lighter;">Reporte por Demandas de Seguridad</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="data">
    <div class="container">
      <div class="row">
        <form id="FormReporte" method="GET">
          <input id="inputReporte" type="number" name="año" min="1900" max="2099" step="1" placeholder="Año del reporte ej. 2017">
        </form>
        <button id="change-chart" form="FormReporte" type="submit" class="btn btn-success">Generar reporte</button>
        <br><br>
        <?php 
          
          include 'dbh.php';
          $año = !empty($_GET['año']) ? $_GET['año'] : '2017';
          $meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
          $query = "SELECT count(d.idDemanda) as NumeroDemandas, MONTH(d.fecha) as MES 
                          FROM demanda d
                          WHERE YEAR(d.fecha) LIKE $año
                          GROUP by MONTH(d.fecha) 
                          ORDER by MONTH(d.fecha)";

          $result = mysqli_query($conn, $query) or die;
        ?>
        <div id="chart_div"></div>
      </div>    

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
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var button = document.getElementById('change-chart');
      var chartDiv = document.getElementById('chart_div');
      var data = google.visualization.arrayToDataTable([
        ['Mes', 'Demandas de Seguridad'],
        <?php 
          while ($data = mysqli_fetch_assoc($result)) { 
        ?>
        ['<?php echo $meses[$data['MES']]?>', <?php echo $data['NumeroDemandas']?>],
        <?php 
          } 
        ?>
      ]);
  
      var options = {
        colors: ['#78c176','yellow', 'blue'], 
        width: '100%',
        series: {
          0: {targetAxisIndex: 0}
        },
        title: 'Reporte por demandas de seguridad del año ' + <?php echo $año ?>,
        hAxis: {title: 'Mes'},
        vAxes: {
          // Adds titles to each axis.
          0: {title: 'Demandas de seguridad'}
        }
      };
      
      //var chart = new google.visualization.ColumnChart(chartDiv);
      //chart.draw(data, options);

      function drawChart() {
          console.log("Se dibuja el chart de nuevo");
          var chart = new google.visualization.ColumnChart(chartDiv);
          chart.draw(data, options);
          button.onclick = drawChart;
        }

      drawChart();
    }

  $(window).resize(function(){
    drawStuff();
  });

  </script>
</body>
</html>