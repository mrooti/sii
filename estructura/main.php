<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
        	  <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
        	  <h5 class="centered">
               <?php//mostrar nombres
                    include("../control/connection.php");
                    session_start();
                    if(isset($_SESSION['usuario'])&&isset($_SESSION['tipo'])){
                        $usuario=$_SESSION['usuario'];
                        $tipo=$_SESSION['tipo'];
                        switch($tipo){
                            case 1://alumno
                                $resultado=$mysqli->query("SELECT * FROM alumno WHERE Id_Alumno={$usuario}")or die("Error en: ".$mysqli->error);
                                $row=$resultado->fetch_array(MYSQLI_ASSOC);
                                echo $row['Nombres']." ".$row['Apellido_P']." ".$row['Apellido_M'];
                            break;
                            case 2://administrador
                                $resultado=$mysqli->query("SELECT * FROM administrador WHERE Id_Administrador={$usuario}")or die("Error en: ".$mysqli->error);
                                $row=$resultado->fetch_array(MYSQLI_ASSOC);
                                echo $row['Nombres']." ".$row['Apellido_P']." ".$row['Apellido_M'];
                            break;
                            case 3://tutor
                                $resultado=$mysqli->query("SELECT * FROM tutor WHERE Id_Tutor={$usuario}")or die("Error en: ".$mysqli->error);
                                $row=$resultado->fetch_array(MYSQLI_ASSOC);
                                echo $row['Nombres']." ".$row['Apellido_P']." ".$row['Apellido_M'];
                            break;
                            case 4://profesor
                                $resultado=$mysqli->query("SELECT * FROM profesor WHERE Id_Profesor={$usuario}")or die("Error en: ".$mysqli->error);
                                $row=$resultado->fetch_array(MYSQLI_ASSOC);
                                echo $row['Nombres']." ".$row['Apellido_P']." ".$row['Apellido_M'];
                            break;
                            default: 
                                echo "Bienvenido";
                            break;
                        }
                        
                    }
                    else{
                        echo "Bienvenido";
                    }
               ?>
              </h5>
        	  	<?php//mostrar menu adecuado
                    switch($tipo){
                        case 1://alumnos
                            echo "
                                <li class=\"mt\">
                                    <a href=\"index.html\">
                                        <i class=\"fa fa-dashboard\"></i>
                                        <span>Usuarios</span>
                                    </a>
                                    <ul class=\"sub\">
                                        <li><a  href=\"listar_administradores.php\">Administradores</a></li>
                                        <li><a  href=\"listar_alumnos.php\">Alumnos</a></li>
                                        <li><a  href=\"listar_profesores.php\">Profesores</a></li>
                                        <li><a  href=\"listar_tutores.php\">Tutores</a></li>
                                    </ul>
                                </li>
                                <li class=\"sub-menu\">
                                    <a href=\"javascript:;\" >
                                        <i class=\"fa fa-desktop\"></i>
                                        <span>Control</span>
                                    </a>
                                    <ul class=\"sub\">
                                        <li><a  href=\"#\">Periodo Escolar</a></li>
                                        <li><a  href=\"asigna_tutor.php\">Asignar Tutores</a></li>
                                        <li><a  href=\"#\">Listar Grupos</a></li>
                                        <li><a  href=\"crear_grupos.php\">Crear Grupos</a></li>
                                    </ul>
                                </li>
                                <li class=\"sub-menu\">
                                    <a href=\"javascript:;\" >
                                        <i class=\"fa fa-cogs\"></i>
                                        <span>Calificaciones</span>
                                    </a>
                                    <ul class=\"sub\">
                                        <li><a  href=\"calificaciones.php\">Control de Calificaciones</a></li>
                                    </ul>
                                </li>";
                        break;
                        case 2://administradores

                        break;
                        case 3://tutores

                        break;
                        case 4://profesores

                        break;
                    }
                ?>
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>