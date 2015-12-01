<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Alta de Tutor</title>
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
          	<h3><i class="fa fa-angle-right"></i> Alta de Tutor</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Ingresa los datos del tutor</h4>
                      <form class="form-horizontal style-form" method="post" id="formulario" enctype="multipart/form-data">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nombre" id="nombre" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido Paterno</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="apellido_p" id="apellido_p" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido Materno</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="apellido_m" id="apellido_m" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sexo</label>
                              <div class="col-sm-10">
                                  <select name="sexo" id="sexo" class="form-control" required>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dirección</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="direccion" id="direccion" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                              <div class="col-sm-10">
                                  <select name="estado" id="estado" class="form-control" required>
                                    <option value="0">Selecciona un Estado</option>
                                    <?php
                                        $resultado=$mysqli->query("SELECT * FROM Estado")or die("Error en: ".$mysqli->error);
                                        while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                          echo "<option value=\"{$row['Id_Estado']}\">{$row['Estado']}</option>";
                                        }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Municipio</label>
                              <div class="col-sm-10">
                                  <select name="municipio" id="municipio" class="form-control" required>
                                    
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Localidad</label>
                              <div class="col-sm-10">
                                  <select name="localidad" id="localidad" class="form-control" required>
                                    
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Código Postal</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="codigo" id="codigo" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Fecha_Nacimiento</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="fecha" id="fecha" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">CURP</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="curp" id="curp" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Correo Electronico</label>
                              <div class="col-sm-10">
                                  <input type="mail" class="form-control" name="mail" id="mail" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Telefono</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="telefono" id="telefono" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Repetir Contraseña</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="contrasena2" id="contrasena2" required>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12" style="text-align:center;">
                              <input type="submit" value="Guardar" id="guardar" name="guardar" class="btn btn-round btn-success">
                              <input type="reset" class="btn btn-round btn-warning" value="Limpiar" id="cancelar" name="cancelar">
                            </div>
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
    $("#estado").change(function(){
      if($("#estado").val()!=0){
        $.post("../control/ajax.php?option=1",{estado:$("#estado").val()}).done(function(data){
          $("#municipio").html(data);
        });
      }
    });
    $("#municipio").change(function(){
      $.post("../control/ajax.php?option=2",{municipio:$("#municipio").val()}).done(function(data){
        $("#localidad").html(data);
      });
    });
    $("#formulario").submit(function(){
      if($("#contrasena").val()==$("#contrasena2").val()){
        $("#contrasena").css("border","green solid 1px");
        $("#contrasena2").css("border","green solid 1px");
        var data=$("#formulario").serialize();
        $.ajax({
          type: "POST",
          url: "../control/ajax.php?option=6",
          data: data,
          success: function(data){
              $("#info").html("<h3>Procesando</h3>");
              $("#info").slideDown("slow");
              
          }
        }).done(function(data){
            if(data.indexOf("success")>=0){
              $("#info").html("<h3>Tutor Agregado Correctamente</h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
              return false;
            }
            else{
              $("#info").html("<h3>Existe un Problema "+data+" </h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
              return false;
            }
            return false;  
        });
        return false; 
      }
      else{
        $("#contrasena").css("border","red solid 1px");
        $("#contrasena2").css("border","red solid 1px");
        return false;
      }
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
