<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Bienvenido</title>
  <?php
      include("../control/connection.php");
      include("../estructura/head.php");
  ?> 
  </head>
  <body onload="getTime()">
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
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div id="showtime"></div>
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
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../assets/img/ny.jpg", {speed: 500});
    </script>
  <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
        var tipo=localStorage.getItem("data_tipo_user");
        $.post("../control/ajax.php?option=28",{permiso:tipo}).done(function(data){
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
        $.post("../control/ajax.php?option=29",{terminar:tipo}).done(function(data){
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
