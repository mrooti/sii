<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
        	  <p class="centered"><a href="blank.php"><img src="../assets/img/ui-danro.jpg" class="img-circle" width="60"></a></p>
        	  <h5 class="centered">
               <?php
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
        	  	<?php 
                    $tipo=$_SESSION['tipo'];
                    switch($tipo){
                        case 1://alumnos
                            echo "
                                <li class=\"mt\">
                                    <a href=\"index.html\">
                                        <i class=\"fa fa-dashboard\"></i>
                                        <span>Materias</span>
                                    </a>
                                    <ul class=\"sub\">
                                        <li><a  href=\"materias_alumno.php\">Grupos y Calificaciones</a></li>
                                    </ul>
                                </li>
                                ";
                        break;
                        case 2://administradores
                            //<li><a  href=\"#\">Periodo Escolar</a></li>
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
                                        <li><a  href=\"asigna_tutor.php\">Asignar Tutores</a></li>
                                        
                                        <li><a href=\"materias.php\">Materias</a></li>
                                        <li><a  href=\"crear_grupos.php\">Crear Grupos</a></li>
                                        <li><a href=\"constancias.php\">Constancia</a></li>
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
                        case 3://tutores
                            echo "
                                <li class=\"mt\">
                                    <a href=\"index.html\">
                                        <i class=\"fa fa-dashboard\"></i>
                                        <span>Materias</span>
                                    </a>
                                    <ul class=\"sub\">
                                        <li><a  href=\"materias_alumno_tutor.php\">Grupos y Calificaciones</a></li>
                                    </ul>
                                </li>
                                ";
                        break;
                        case 4://profesores
                            echo "
                                <li class=\"mt\">
                                    <a href=\"index.html\">
                                        <i class=\"fa fa-dashboard\"></i>
                                        <span>Calificaciones</span>
                                    </a>
                                    <ul class=\"sub\">
                                        <li><a  href=\"calificaciones_profesor.php\">Grupos y Calificaciones</a></li>
                                    </ul>
                                </li>
                                ";
                        break;
                    }
                ?>
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>