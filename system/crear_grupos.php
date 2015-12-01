<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Crear Grupos</title>
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
          	<h3><i class="fa fa-angle-right"></i> Crear Grupos</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Ingresa la información solicitada</h4>
                      <div id="form">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Buscar Profesor</label>
                              <div class="col-sm-10">
                                <input type="text" id="curp" name="curp" class="form-control" required>
                                <span class="help-block">Puedes buscar por Nombre, Apellido o CURP</span>   
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
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
                                          <tbody id="resultado_profesores">
                                          
                                          </tbody>
                                      </table>
                                  </div><!-- /content-panel -->
                              </div><!-- /col-md-6 -->
                              <div class="col-md-6">
                                <div class="content-panel">
                                      <table class="table table-striped table-advance table-hover">
                                        <h4><i class="fa fa-angle-right"></i> Grupos Actuales</h4>
                                        <hr>
                                          <thead>
                                          <tr>
                                              <th><i class="fa fa-bookmark"></i> Materia</th>
                                              <th><i class="fa fa-bullhorn"></i> Grado</th>
                                              <th><i class="fa fa-bullhorn"></i> Grupo</th>
                                              <th><i class=" fa fa-edit"></i> Opción</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          <tbody id="resultado_grupos">
                                          
                                          </tbody>
                                      </table>
                                  </div><!-- /content-panel -->
                              </div><!--fin col 6-->
                          </div>
                          <br>
                          <div id="crear_grupo">
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Seleccionar Periodo</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="periodo" id="periodo">
                                    <option value="0">Selecciona un periodo</option>
                                    <?php
                                      $resultado=$mysqli->query("SELECT Id_Periodo, Fecha_Inicio, Fecha_Fin FROM periodo WHERE Estado='1'")or die("Error en: ".$mysqli->error);
                                      while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                        echo "<option value=\"{$row['Id_Periodo']}\">{$row['Fecha_Inicio']} a {$row['Fecha_Fin']}</option>";
                                      }
                                    ?>
                                  </select>
                                  <span class="help-block">Periodo Actual</span>   
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Seleccionar Materia</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="materia" id="materia">
                                    <option value="0">Selecciona un materia</option>
                                    <?php
                                      $resultado=$mysqli->query("SELECT Id_Materia, Titulo FROM materia WHERE Estado='1'")or die("Error en: ".$mysqli->error);
                                      while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                        echo "<option value=\"{$row['Id_Materia']}\">{$row['Titulo']}</option>";
                                      }
                                      $mysqli->close();
                                    ?>
                                  </select>
                                  <span class="help-block">Escoje una materia</span> 
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ingresa el Grupo</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="grupo" id="grupo" required>
                                <span class="help-block">Ejemplo A, B, Grupo 1, Grupo 2, etc...</span>
                              </div>
                            </div>
                            <div class="form-group" style="text-align:center;" id="boton_crear">
                              <button class="btn btn-round btn-success" id="crear" name="crear">Crear</button>
                            </div>
                            </div><!--fin crear grupo-->
                          <div class="form-group" id="buscar_alumno">
                            <label class="col-sm-2 col-sm-2 control-label">Buscar Alumnos</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="alumno" id="alumno" required>
                              <span class="help-block">Puedes buscar por Nombre, Apellido o CURP</span>
                            </div>
                          </div>
                          <div class="row" id="tablas_grupo">
                            <div class="col-md-6">
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
                              <div class="col-md-6">
                                <div class="content-panel">
                                      <table class="table table-striped table-advance table-hover">
                                        <h4><i class="fa fa-angle-right"></i> Lista Actual del Grupo</h4>
                                        <hr>
                                          <thead>
                                          <tr>
                                              <th><i class="fa fa-bookmark"></i> Nombre</th>
                                              <th><i class="fa fa-bullhorn"></i> Apellido Paterno</th>
                                              <th><i class="fa fa-bullhorn"></i> Apellido Materno</th>
                                              <th><i class=" fa fa-edit"></i> Opción</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          <tbody id="resultado_lista">
                                          
                                          </tbody>
                                      </table>
                                  </div><!-- /content-panel -->
                              </div><!--fin col 6-->
                          </div>
                      </div><!-- div form>
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
    $("#crear_grupo").hide();
    $("#buscar_alumno").hide();
    $("#tablas_grupo").hide();
    $("#curp").keyup(function(){
      var busqueda=$("#curp").val();
      $.post("../control/ajax.php?option=14",{busqueda:busqueda}).done(function(data){
        $("#resultado_profesores").html(data);
      });
    });
    function elegir(tipo,id){
      switch(tipo){
        case 1://elegir
          localStorage.setItem("data_profesor",id);
          $("#periodo").attr("disabled",false);
          $("#grupo").attr("readonly",false);
          $("#materia").attr("disabled",false);
          $.post("../control/ajax.php?option=15",{profesor:id}).done(function(data){
            $("#resultado_grupos").html(data);
          });
          $("#crear_grupo").slideDown("slow");
        break;
        case 2://eliminar
          $.post("../control/ajax.php?option=16",{registro:id}).done(function(data){
            if(data=="success"){
              $("#info").html("<h3>Grupo Eliminado Correctamente</h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
            }
            else{
              $("#info").html("<h3>Existe un error: "+data+"</h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
            }
            elegir(1,localStorage.getItem("data"));
          });
        break;
        case 3://agregar alumno a grupo creado
          var periodo=localStorage.getItem("data_periodo");
          var grupo=localStorage.getItem("data_grupo");
          var alumno=id;
          var profesor=localStorage.getItem("data_profesor");
          var materia=localStorage.getItem("data_materia");
          $.post("../control/ajax.php?option=19",{periodo:periodo,grupo:grupo,alumno:alumno,profesor:profesor,materia:materia}).done(function(data){
              if(data=="success"){
                $("#info").html("<h3>Alumno Agregado Correctamente</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(2000);
                $.post("../control/ajax.php?option=18",{periodo:periodo,grupo:grupo,profesor:profesor}).done(function(data){
                  $("#resultado_lista").html(data);
                });
                $.post("../control/ajax.php?option=15",{profesor:id}).done(function(data){
                  $("#resultado_grupos").html(data);
                });
              }else{
                $("#info").html("<h3>"+data+"</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(2000);
              }
          });
        break;
        case 4://eliminar alumnos de grupo
          $.post("../control/ajax.php?option=20",{cursa_materia:id}).done(function(data){
            if(data=="success"){
                $("#info").html("<h3>Alumno Eliminado Correctamente</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(2000);
            } 
            else{
                $("#info").html("<h3>"+data+"</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(2000);
            }
          });
          $.post("../control/ajax.php?option=18",{periodo:periodo,grupo:grupo,profesor:profesor}).done(function(data){
            $("#resultado_lista").html(data);
          });
        break;
      }
      return false;
    }
    $("#crear").click(function(){
      if($("#grupo").val()!=""&&$("#periodo").val()!="0"&&$("#materia").val()!="0"){
        localStorage.setItem("data_periodo",$("#periodo").val());
        localStorage.setItem("data_grupo",$("#grupo").val());
        localStorage.setItem("data_materia",$("#materia").val());
        $("#periodo").attr("disabled",true);
        $("#materia").attr("disabled",true);
        $("#grupo").attr("readonly","readonly");
        $("#info").html("<h3>Grupo creado, agrege los alumnos al grupo</h3>");
        $("#info").slideDown(2000);
        $("#info").slideUp(4000);
        var periodo=localStorage.getItem("data_periodo");
        var grupo=localStorage.getItem("data_grupo");
        var profesor=localStorage.getItem("data_profesor");
        $.post("../control/ajax.php?option=18",{periodo:periodo,grupo:grupo,profesor:profesor}).done(function(data){
          $("#resultado_lista").html(data);
        });
        $("#buscar_alumno").slideDown("slow");
        $("#tablas_grupo").slideDown("slow");
        //mostrar tablas
      }
      else{
        $("#info").html("<h3>Selecciona un Periodo, materia e ingresa el grupo</h3>");
        $("#info").slideDown(2000);
        $("#info").slideUp(4000);
        return false;
      }
      
    });
    $("#alumno").keyup(function(){
      $.post("../control/ajax.php?option=17",{busqueda:$("#alumno").val()}).done(function(data){
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