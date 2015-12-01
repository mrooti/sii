<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Asigna Tutores a Alumno</title>
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
          	<h3><i class="fa fa-angle-right"></i> Asigna Tutores a Alumno</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Ingresa los datos solicitados</h4>
                      <form class="form-horizontal style-form" method="post" id="formulario" enctype="multipart/form-data">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Buscar Alumno</label>
                              <div class="col-sm-10">
                                <input type="text" id="curp" name="curp" class="form-control" required>
                                <span class="help-block">Puedes buscar por Nombre, Apellido o CURP</span>   
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 mt">
                                <div class="content-panel">
                                      <table class="table table-hover" id="tabla">
                                      <h4><i class="fa fa-angle-right"></i> Resultado de Busqueda</h4>
                                      <hr>
                                          <thead>
                                          <tr>
                                              <th>Nombre</th>
                                              <th>Apellido Paterno</th>
                                              <th>Apellido Materno</th>
                                              <th>Opción</th>
                                          </tr>
                                          </thead>
                                          <tbody id="resultado">
                                          
                                          </tbody>
                                      </table>
                                  </div><!--/content-panel -->
                              </div><!-- /col-md-12 -->
                          </div>
                          <br>
                          <div class="form-group" id="lista_tutores">
                              <label class="col-sm-2 col-sm-2 control-label">Selecciona un Tutor</label>
                              <div class="col-sm-10">
                                <select id="tutor" name="tutor" class="form-control">
                                  <option value="0">Selecciona un tutor</option>
                                  <?php
                                    $resultado=$mysqli->query("SELECT * FROM tutor WHERE Estado='1'")or die("Error en: ".$mysqli->error);
                                    while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                      echo "<option value=\"{$row['Id_Tutor']}\">{$row['Nombres']} {$row['Apellido_P']} {$row['Apellido_M']}</option>";
                                    }
                                    $mysqli->close()
                                  ?>
                                </select>   
                              </div>
                          </div>
                          <div class="form-group" style="text-align:center;" id="boton_agregar">
                            <button class="btn btn-round btn-success" id="agregar" name="agregar">Agregar</button>
                          </div>
                          <div class="row" id="tutores_actuales">
                            <div class="col-md-12 mt">
                                <div class="content-panel">
                                      <table class="table table-hover" id="tabla_tutores">
                                      <h4><i class="fa fa-angle-right"></i>Tutores Actuales</h4>
                                      <hr>
                                          <thead>
                                          <tr>
                                              <th>Nombre</th>
                                              <th>Apellido Paterno</th>
                                              <th>Apellido Materno</th>
                                              <th>Opción</th>
                                          </tr>
                                          </thead>
                                          <tbody id="resultado_tutores">
                                          
                                          </tbody>
                                      </table>
                                  </div><!--/content-panel -->
                              </div><!-- /col-md-12 -->
                          </div>
                      </form>
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
    $("#lista_tutores").hide();
    $("#tutores_actuales").hide();
    $("#boton_agregar").hide();
    function ver(id){
      $("#lista_tutores").slideDown("slow");
      $("#tutores_actuales").slideDown("slow");
      $("#boton_agregar").slideDown("slow");
      localStorage.setItem("data",id);
      if(id=="-1"){
        $("#info").html("<h3>Existe un Problema al asignar </h3>");
        $("#info").slideDown(2000);
        $("#info").slideUp(2000);
        return false;
      }
      else if(id=="-2"){
        $("#info").html("<h4>El asesor que intentas asignar, ya esta asignado o esta en la papelera de reciclaje</h4>");
        $("#info").slideDown(2000);
        $("#info").slideUp(2000);
        return false;
      }
      else if(id=="0"){
        $("#info").html("<h3>Datos vacios</h3>");
        $("#info").slideDown(2000);
        $("#info").slideUp(2000);
        return false;
      }
      $.post("../control/ajax.php?option=11",{id:id}).done(function(data){
        $("#resultado_tutores").html(data);
      });
      return false;
    }
    function eliminar(id){
      $.post("../control/ajax.php?option=13",{tutor:id}).done(function(data){
        if(data=="success"){
          $("#info").html("<h3>Tutor eliminado</h3>");
          $("#info").slideDown(2000);
          $("#info").slideUp(2000);
          ver(localStorage.getItem("data"));
          return false;
        }
        else{
          $("#info").html("<h3>Ocurrio un error</h3>");
          $("#info").slideDown(2000);
          $("#info").slideUp(2000);
          return false;
        }
      });
    }
    $("#agregar").click(function(){
      $.post("../control/ajax.php?option=12",{alumno:localStorage.getItem("data"),tutor:$("#tutor").val()}).done(function(data){
        ver(data);
      });
      return false;
    });
    $("#curp").keyup(function(){
      var busqueda=$("#curp").val();
      $.post("../control/ajax.php?option=10",{busqueda:busqueda}).done(function(data){
        $("#resultado").html(data);
      });
    });
    $("#formulario").submit(function(){
      return false;
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