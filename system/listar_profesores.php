<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listado de Profesores</title>
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
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Lista de Profesores</h3>
            <!-- SORTABLE TO DO LIST -->
               <div class="row mt" id="actual">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>Todos los profesores</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bookmark"></i> Profesores</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>CURP</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Cédula</th>
                                  <th><i class=" fa fa-edit"></i> Opciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                $cont=0;
                                $resultado=$mysqli->query("SELECT Id_Profesor, Nombres, Apellido_P, Apellido_M, CURP, Cedula FROM profesor")or die("Error en: ".$mysqli->error);
                                while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                                  echo '
                                  <tr>
                                    <td> '.$row['Nombres'].' '.$row['Apellido_P'].' '.$row['Apellido_M'].' </td>
                                    <td class="hidden-phone"> '.$row['CURP'].' </td>
                                    <td class="hidden-phone"> '.$row['Cedula'].' </td>
                                    <td>
                                        <button class="btn btn-success btn-xs" data-toggle="modal" href="#myModal'.$cont.'"><i class="fa fa-check" ></i></button>
                                        <a href="modificar_profesor.php?id='.$row['Id_Profesor'].'" class="btn btn-primary btn-xs"><i class="fa fa-pencil" ></i></a>
                                        <button class="btn btn-danger btn-xs delete" data="'.$row['Id_Profesor'].'" data-toggle="modal" href="#elimiModal" ><i class="fa fa-trash-o "></i></button>
                                    </td>
                                  </tr>';
                                  $cont++;
                                }
                              ?> 
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                      <hr>
                      <div class=" add-task-row">
                        <a class="btn btn-success btn-sm pull-left" href="alta_profesor.php">Alta Nuevo Profesor</a>
                      </div>
                      <?php
                        $cont2=0;
                        $resultado=$mysqli->query("SELECT p.Nombres, p.Apellido_P, p.Apellido_M, p.Sexo, p.Direccion, l.Localidad, m.Municipio, e.Estado, p.CP, p.Fecha_Nacimiento, p.CURP, p.Email, P.Telefono, p.Cedula ,p.Img FROM profesor p INNER JOIN localidad l INNER JOIN municipio m INNER JOIN estado e ON p.Id_Localidad=l.Id_Localidad AND l.Id_Municipio=m.Id_Municipio AND m.Id_Estado=e.Id_Estado WHERE p.Estado='1'")or die("Error en: ".$mysqli->error);
                        while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
                          echo' <!-- Modal -->
                                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal'.$cont2.'" class="modal fade">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                      <h4 class="modal-title">Datos del Profesor</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                        <div class="list-group">
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Nombre Completo: </h4>
                                                            <p class="list-group-item-text">'.$row['Nombres'].' '.$row['Apellido_P'].' '.$row['Apellido_M'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Sexo: </h4>
                                                            <p class="list-group-item-text">'.$row['Sexo'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Dirección: </h4>
                                                            <p class="list-group-item-text">'.$row['Direccion'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Ubicación:</h4>
                                                            <p class="list-group-item-text">'.$row['Localidad'].' '.$row['Municipio'].' '.$row['Estado'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Código Postal: </h4>
                                                            <p class="list-group-item-text">'.$row['CP'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Fecha de Nacimiento: </h4>
                                                            <p class="list-group-item-text">'.$row['Fecha_Nacimiento'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">CURP: </h4>
                                                            <p class="list-group-item-text">'.$row['CURP'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Email: </h4>
                                                            <p class="list-group-item-text">'.$row['Email'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Télefono: </h4>
                                                            <p class="list-group-item-text">'.$row['Telefono'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Cédula Profesonal: </h4>
                                                            <p class="list-group-item-text">'.$row['Cedula'].'</p>
                                                          </a>
                                                          <a class="list-group-item">
                                                            <h4 class="list-group-item-heading">Imagen: </h4>
                                                            <p class="list-group-item-text">'.$row['Img'].'</p>
                                                          </a>
                                                        </div>
                                                  </div>
                                                  <div class="modal-footer centered">
                                                      <button data-dismiss="modal" class="btn btn-theme03" type="button">Aceptar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                <!-- modal -->';
                          $cont2++;
                        }

                      ?>
                      <!-- Modal -->
                      <div class="modal fade" id="elimiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Eliminar Profesor</h4>
                            </div>
                            <div class="modal-body">
                              ¿Está seguro que desea eliminar el Profesor? No podrá deshacer los cambios.
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-primary" id="eliminar" data="0">Aceptar</button>
                            </div>
                          </div>
                        </div>
                      </div>  
                      <!-- FIN DEL MODAL -->   

                  </div><!-- /col-md-12 -->
                </div><!-- /row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Todos los derechos reservados. Sistema Integral de Información. 2015
              <a href="todo_list.html#" class="go-top">
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
    <script type="text/javascript">
    $(document).ready(function() {
      $('.delete').click(function(){
        var service = $(this).attr('data');
        $('#eliminar').attr('data',service);
      });
      $('#eliminar').click(function(){
        var service2 = $(this).attr('data');
        var dataString = 'id='+service2;
        $.ajax({
            type: "POST",
            url: "../control/ajax.php?option=41",
            data: dataString,
            success: function() {
              $("#elimiModal").modal('hide');            
                $("#info").html("<h3>Se ha eliminado el registro con éxito</h3>");
                $("#info").slideDown(2000);
                $("#info").slideUp(2000);
                location.reload();
              return false;
            }
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
});    
</script>
  </body>
</html>
