<!doctype html>
<html class="no-js" lang="es">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$Telefono = $_POST['Telefono'];
$Subject = $_POST['Subject'];
$archivo = $_FILES['adjunto'];

if ($Nombre=='' || $Email=='' ||  $Telefono=='' ||$Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("info@ximadijo.com"); // Dirección a la que llegaran los mensajes.
	
	
   
// Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo 
        //adjuntamos un archivo
            
    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Un nuevo mensaje desde el sitio web ximadijo.com";
    $mail->Body     =  "Nombre: $Nombre \n<br />".    
    "Email: $Email \n<br />".  
	"Telefono: $Telefono \n<br />".   
	"Asunto: $Subject \n<br />".
    "Mensaje: $Mensaje \n<br />";
    $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
    
    
    

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "tx10.fcomet.com:25";  // Servidor de Salida. 
    $mail->SMTPAuth = true; 
    $mail->Username = "info@ximadijo.com";  // Correo Electrónico
    $mail->Password = "eQ7SOU=Rnvg."; // Contraseña
    
    if ($mail->Send())
    echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>