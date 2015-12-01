<?php
require_once("../dompdf/dompdf_config.inc.php");
include("../control/connection.php");
include("../control/security.php");
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id=seguridad($_GET['id']);
    $miFecha= gmmktime(12,0,0,1,15,2089);
    $fecha=strftime("%A, %d de %B de %Y", $miFecha);
    $resultado=$mysqli->query("SELECT * FROM alumno")or die("Error en: ".$mysli->error);
    $row=$resultado->fetch_array(MYSQLI_ASSOC);
    $html =
      "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/><title>Constancia</title></head><body lang=ES-MX style='tab-interval:35.4pt'>

    <div class=WordSection1>

    <p class=MsoNormal align=right style='text-align:right'>Morelia, Michoacán a ".$fecha."</p>

    <p class=MsoNormal>A QUIEN CORRESPONDA</p>

    <p class=MsoNormal style='text-align:justify'>Por medio de lo siguiente, hago
    costar que el alumno ".$row['Nombres']." ".$row['Apellido_P']." ".$row['Apellido_M']." está actualmente inscrito al ciclo escolar actual en la Institución educativa
    de nivel básico.</p>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <p class=MsoNormal align=center style='text-align:center'>ATTE</p>

    <p class=MsoNormal align=center style='text-align:center'>________________________</p>

    <p class=MsoNormal align=center style='text-align:center'>Dirección de la
    institución </p>

    </div>

    </body>

    </html>";

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("constancia.pdf");
}
else{
    header("location: blank.php");
}



?>