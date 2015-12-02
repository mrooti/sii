<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Lista de Materias</title>
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
          	<h3><i class="fa fa-angle-right"></i> Listado de Materias</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Materias Activas</h4>
                      <div class="form-horizontal style-form">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="content-panel">
                                    <table class="table table-striped table-advance table-hover">
                                      <hr>
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-bookmark"></i> Titulo</th>
                                            <th><i class="fa fa-bookmark"></i> Grado</th>
                                            <th><i class="fa fa-bookmark"></i> Creditos</th>
                                            <th><i class="fa fa-bookmark"></i> Código</th>
                                            <th><i class=" fa fa-edit"></i> Opción</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="materias">
                                          <?php
                                            $resultado=$mysqli->query("SELECT * FROM materia WHERE Estado='1'")or die("Error en: ".$mysqli->error);
                                            while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                              echo "
                                                    <tr>
                                                      <td>{$row['Titulo']}</td>
                                                      <td>{$row['Grado']}</td>
                                                      <td>{$row['Creditos']}</td>
                                                      <td>{$row['Codigo']}</td>
                                                      <td><button class=\"btn btn-success btn-xs\" onclick=\"elegir(1,{$row['Id_Materia']});\">Editar</button> <button class=\"btn btn-danger btn-xs\" onclick=\"elegir(2,{$row['Id_Materia']});\">Eliminar</button></td>
                                                    </tr>
                                                  ";
                                            }

                                          ?>
                                        </tbody>
                                    </table>
                                </div><!-- /content-panel -->
                            </div><!-- /col-md-12 -->
                          </div>
                      </div>
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
    function elegir(option,id){
      switch(option){
        case 1:
          window.location.href="modificar_materia.php?id="+id;
        break;
        case 2:
          $.post("../control/ajax.php?option=32",{materia:id}).done(function(data){
            if(data=="success"){
              $("#info").html("<h3>Baja correcta</h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
            }
            else{
              $("#info").html("<h3>Existe un Problema "+data+" </h3>");
              $("#info").slideDown(2000);
              $("#info").slideUp(2000);
            }
          });
        break;
      }
    }
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