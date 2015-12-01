<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Listado de Materias</title>
  <?php
      include("../control/connection.php");
      include("../estructura/head.php");
  ?> 
  </head>
  <body>
  <div id="info" class="info"></div>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php
          include("../estructura/header.php"); 
      ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?php
          include("../estructura/main.php");
      ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Materias</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Materias y calificaciones</h4>
                      <div class="form-horizontal style-form" >
                          <div class="row">
                            <div class="col-md-12">
                                <div class="content-panel">
                                    <table class="table table-striped table-advance table-hover">
                                      <h4><i class="fa fa-angle-right"></i> Materias Actuales</h4>
                                      <hr>
                                        <thead>
                                        <tr>
                                            <th><i>Alumno</i></th>
                                            <th><i class="fa fa-bookmark"></i> Materia</th>
                                            <th><i></i> Grupo</th>
                                            <th><i class="fa fa-bookmark"></i> Periodo</th>
                                            <th><i class="fa fa-bookmark"></i> Profesor</th>
                                            <th><i class=" fa fa-edit"></i> Opción</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="materias">
                                          <?php
                                            $usuario=$_SESSION['usuario'];
                                            $resultado=$mysqli->query("SELECT cm.Id_Cursa_Materia,m.Titulo,pe.Fecha_Inicio,pe.Fecha_Fin,p.Nombres,p.Apellido_P,p.Apellido_M,cm.Grupo, a.Nombres AS Alumno_Nombres, a.Apellido_P AS Alumno_Apellido_P, a.Apellido_M AS Alumno_Apellido_M FROM cursa_materia cm INNER JOIN materia m ON m.Id_Materia=cm.Id_Materia INNER JOIN periodo pe ON pe.Id_Periodo=cm.Id_Periodo INNER JOIN profesor p ON p.Id_Profesor=cm.Id_Profesor INNER JOIN alumno a ON a.Id_Alumno=cm.Id_Alumno INNER JOIN tutor_alumno ta ON ta.Id_Alumno=a.Id_Alumno WHERE ta.Id_Tutor={$usuario} AND cm.Estado='1'")or die("Error en: ".$mysqli->error);
                                            if(!$resultado->num_rows>0){
                                              echo "<tr><td>No se han encontrado grupos</td></tr>";
                                            }
                                            while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                              echo "
                                                    <tr>
                                                      <td>{$row['Titulo']}</td>
                                                      <td>{$row['Grupo']}</td>
                                                      <td>{$row['Fecha_Inicio']} A {$row['Fecha_Fin']}</td>
                                                      <td>{$row['Nombres']} {$row['Apellido_P']} {$row['Apellido_M']}</td>
                                                      <td><button class=\"btn btn-success btn-xs\" onclick=\"elegir({$row['Id_Cursa_Materia']});\">Elegir</button></td>
                                                    </tr>
                                                  ";
                                            }
                                          ?>
                                        </tbody>
                                    </table>
                                </div><!-- /content-panel -->
                            </div><!-- /col-md-12 -->
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="content-panel">
                                    <table class="table table-striped table-advance table-hover">
                                      <h4><i class="fa fa-angle-right"></i> Calificaciones</h4>
                                      <hr>
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-bookmark"></i> Unidad</th>
                                            <th><i class="fa fa-bullhorn"></i> Calificación</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="resultado_calificacion">
                                        
                                        </tbody>
                                    </table>
                                </div><!-- /content-panel -->
                            </div><!--fin col 12-->
                          </div>
                      </div><!-- form-->
            		</div>
          	</div>
			
		      </section>
      </section>
      <!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Todos los derechos reservados. Sistema Integral de Información. 2015
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <?php
        include("../estructura/scripts.php");
    ?>
    <!--script for this page-->
  <script>
    $("#info").hide();
    function elegir(id){
      $.post("../control/ajax.php?option=30",{id:id}).done(function(data){
        $("#resultado_calificacion").html(data);
      });
      return false;
    }
    //comprobar
    $.post("../control/ajax.php?option=28",{permiso:"3"}).done(function(data){
      if(data=="success"){

      }
      else if(data=="error_0"){
        alert("Error en base de datos");
      }
      else if(data=="error_1"){
        alert("No tienes permisos para acceder a esta pagina");
        window.location.href="../index.php";
      }
      else if(data=="error_2"){
        alert(data);
        window.location.href="../index.php";
      }
      else if(data=="error_3"){
        alert("No has iniciado sesión");
        window.location.href="../index.php";
      }  
    });
    $("#salir").click(function(){
      $.post("../control/ajax.php?option=29",{terminar:3}).done(function(data){
        if(data=="success"){
          alert("Sesión finalizada");
          window.location.href="../index.php";
        }
        else{
          alert(data);
        }
      });
    });
  </script>

  </body>
</html>