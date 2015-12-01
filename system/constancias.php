<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Generar Constancias</title>
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
          	<h3><i class="fa fa-angle-right"></i> Alumnos</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Materias y calificaciones</h4>
                      <div class="form-horizontal style-form" >
                          <div class="form-group" id="buscar_alumno">
                            <label class="col-sm-2 col-sm-2 control-label">Buscar Alumnos</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="alumno" id="alumno" required>
                              <span class="help-block">Puedes buscar por Nombre, Apellido o CURP</span>
                            </div>
                          </div>
                          <div class="row" id="tablas_grupo">
                            <div class="col-md-12">
                                  <div class="content-panel">
                                      <table class="table table-striped table-advance table-hover">
                                        <h4><i class="fa fa-angle-right"></i> Resultado de Busqueda</h4>
                                        <hr>
                                          <thead>
                                          <tr>
                                              <th><i class="fa fa-bookmark"></i> Nombres</th>
                                              <th><i class="fa fa-bookmark"></i> Apellido Paterno</th>
                                              <th><i class="fa fa-bookmark"></i> Apellido Materno</th>
                                              <th><i class=" fa fa-edit"></i> Opción</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          <tbody id="resultado_alumnos">
                                          
                                          </tbody>
                                      </table>
                                  </div><!-- /content-panel -->
                              </div><!-- /col-md-6 -->
                            </div>
                      </div><!-- form-->
            		</div>
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
    $("#alumno").keyup(function(){
      $.post("../control/ajax.php?option=31",{busqueda:$("#alumno").val()}).done(function(data){
        $("#resultado_alumnos").html(data);
      });
    });
    //comprobar
    $.post("../control/ajax.php?option=28",{permiso:"2"}).done(function(data){
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
      $.post("../control/ajax.php?option=29",{terminar:2}).done(function(data){
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