<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Alta de Tipo de Documento</title>
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
            <h3><i class="fa fa-angle-right"></i> Control de Calificaciones</h3>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i>Calificaciones</h4>
                  <div class="form-horizontal style-form" id="formulario">
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Buscar Profesor</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="curp" id="curp" required>
                          </div>
                      </div>
                      <div class="row">
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
                                    <tbody id="resultado_profesores">
                                      
                                    </tbody>
                                </table>
                            </div><!-- /content-panel -->
                        </div><!-- /col-md-12 -->
                        <div class="col-md-12">
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
                        </div><!--fin col 12-->
                        <br>
                      </div><!--fin de row-->
                      <br>
                      <div class="form-group" id="in_unidad">
                        <label class="col-sm-2 col-sm-2 control-label">Ingresa la Unidad</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="unidad" id="unidad" required>
                        </div>
                      </div>
                      <div class="row" id="lista_captura">
                        <div class="col-md-12">
                          <div class="content-panel">
                                <table class="table table-striped table-advance table-hover">
                                  <h4><i class="fa fa-angle-right"></i> Lista Actual del Grupo</h4>
                                  <hr>
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-bookmark"></i> #</th>
                                        <th><i class="fa fa-bookmark"></i> Nombre</th>
                                        <th><i class="fa fa-bullhorn"></i> Apellido Paterno</th>
                                        <th><i class="fa fa-bullhorn"></i> Apellido Materno</th>
                                        <th><i class=" fa fa-edit"></i> Calificación</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="lista_capturar">
                                    
                                    </tbody>
                                </table>
                            </div><!-- /content-panel -->
                        </div><!--fin col 12-->
                      </div>
                      <br>
                      <div class="form-group" style="text-align:center;" id="boton_capturar">
                        <button class="btn btn-round btn-success" id="capturar" name="capturar">Capturar</button>
                      </div>
                      <div class="row" id="lista_cali_ac">
                        <div class="col-md-12">
                          <div class="content-panel">
                                <table class="table table-striped table-advance table-hover">
                                  <h4><i class="fa fa-angle-right"></i> Calificaciones Actuales</h4>
                                  <hr>
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-bookmark"></i> Nombre</th>
                                        <th><i class="fa fa-bullhorn"></i> Apellido Paterno</th>
                                        <th><i class="fa fa-bullhorn"></i> Apellido Materno</th>
                                        <th><i class="fa fa-question-circle"></i> Unidad</th>
                                        <th><i class=" fa fa-edit"></i> Calificación</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="calificaciones_actuales">
                                    
                                    </tbody>
                                </table>
                            </div><!-- /content-panel -->
                        </div><!--fin col 12-->
                      </div>
                  </div><!-- div del formulario-->
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
    $("#in_unidad").hide();
    $("#lista_captura").hide();
    $("#boton_capturar").hide();
    $("#lista_cali_ac").hide();
    $("#curp").keyup(function(){
      var busqueda=$("#curp").val();
      $.post("../control/ajax.php?option=14",{busqueda:busqueda}).done(function(data){
        $("#resultado_profesores").html(data);
      });
    });
    function elegir(opcion,id){
      switch(opcion){
        case 1:
          //obtenemos profesor
          $.post("../control/ajax.php?option=21",{profesor:id}).done(function(data){
            $("#resultado_grupos").html(data);
          });
        break;
        case 2:
        //mostrar todas las calificaciones (cursa materia)
          localStorage.setItem("data_cursa",id);
          $.post("../control/ajax.php?option=22",{cursa_materia:id}).done(function(data){
            $("#calificaciones_actuales").html(data);
          });
          $("#in_unidad").hide("slow");
          $("#lista_captura").hide("slow");
          $("#boton_capturar").hide("slow");
          $("#lista_cali_ac").slideDown("slow");
        break;
        case 3:
          //capturar calificaciones (cursa materia)
          $("#lista_cali_ac").hide();
          $("#in_unidad").slideDown("slow");
          $("#lista_captura").slideDown("slow");
          $("#boton_capturar").slideDown("slow");
          $.post("../control/ajax.php?option=23",{cursa_materia:id}).done(function(data){
            $("#lista_capturar").html(data);
          });
          $.post("../control/ajax.php?option=24",{cursa_materia:id}).done(function(data){
            //var array= data.split(",");
            localStorage.setItem("id",data);
          });
        break;
        case 4://editar calificacion (calificacion curso)
          var cali=prompt("Ingresa la calificacion (Solo numero)");
          if(/^([0-9])*$/.test(cali)){
            $.post("../control/ajax.php?option=26",{id:id,cali:cali}).done(function(data){
              if(data=="success"){
                $("#info").html("<h3>Calificación corregida</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(4000);
              }else{
                $("#info").html("<h3>Existe un error: "+data+"</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(4000);
              }
            });
          }
          else{
            $("#info").html("<h3>Ingresa solo numeros</h3>");
            $("#info").slideDown(2000);
            $("#info").slideUp(4000);
          }
          $.post("../control/ajax.php?option=22",{cursa_materia:localStorage.getItem("data_cursa")}).done(function(data){
            $("#calificaciones_actuales").html(data);
          });
        break;
      }
    }
    $("#capturar").click(function(){
      if($("#unidad").val()!=""&&$("#unidad").val()!="0"){
        var datos=localStorage.getItem("id");
        var array=datos.split(",");
        var unidad=$("#unidad").val();
        for(var i=1;i<array.length;i++){
          $.post("../control/ajax.php?option=25",{unidad:unidad,cali:$("#"+array[i]).val(),id:array[i]}).done(function(data){
            $("#info").html("<h3>Calificacion ingresada correctamente</h3>");
            $("#info").slideDown();
            $("#info").slideUp();
          });
        }
        $.post("../control/ajax.php?option=22",{cursa_materia:localStorage.getItem("data_cursa")}).done(function(data){
            $("#calificaciones_actuales").html(data);
          });

      }
      else{
        $("#info").html("<h3>Ingresa una unidad para poder continuar</h3>");
        $("#info").slideDown(2000);
        $("#info").slideUp(4000);
      }

    });
  </script>

  </body>
</html>