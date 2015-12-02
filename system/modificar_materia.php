<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Modificar Materia</title>
  <?php
      include("../control/connection.php");
      include("../estructura/head.php");
      include("../control/security.php");
      if(!isset($_GET['id'])){
        header("location:materias.php");
      }
      $id=seguridad($_GET['id']);
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
          	<h3><i class="fa fa-angle-right"></i> Modificar Materia</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            	   <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Ingresa los datos de la materia</h4>
                      <form class="form-horizontal style-form" method="post" id="formulario" enctype="multipart/form-data">
                      <?php
                        $resultado=$mysqli->query("SELECT * FROM materia WHERE Estado='1'")or die("Error en: ".$mysqli->error);
                        $row=$resultado->fetch_array(MYSQLI_ASSOC);
                      ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Titulo</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $row['Titulo']; ?>" name="titulo" id="titulo" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Grado</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" value="<?php echo $row['Grado']; ?>" name="grado" id="grado" min="1" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Creditos</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" value="<?php echo $row['Creditos']; ?>" name="creditos" id="creditos" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Codigo</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $row['Codigo']; ?>" name="codigo" id="codigo" required>
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
    $("#formulario").submit(function(){
        var data=$("#formulario").serialize();
        var id="<?php echo $id; ?>";
        $.ajax({
          type: "POST",
          url: "../control/ajax.php?option=33&id="+id,
          data: data,
          success: function(data){
              $("#info").html("<h3>Procesando</h3>");
              $("#info").slideDown("slow");
              
          }
        }).done(function(data){
            if(data.indexOf("success")>=0){
              $("#info").html("<h3>Materia Modificada Correctamente</h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
              window.location.href="materias.php";
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