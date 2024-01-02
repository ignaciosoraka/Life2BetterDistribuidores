<?php
$destinatario = 'info@life2better.com';

// Validar la dirección de correo electrónico
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo "La dirección de correo electrónico no es válida.";
    exit();
}

$nombre = $_POST['nombre']; // Agregado: Obtener el nombre del formulario
$telefono = $_POST['telefono']; // Agregado: Obtener el teléfono del formulario
$provincia = $_POST['provincia']; // Modificado: Cambiar 'provincia' por 'pronvicia'
$intereses = $_POST['Intereses']; // Agregado: Obtener el valor seleccionado en "Tengo interés en"
$mensaje = $_POST['mensaje'];

$mensajeCompleto = "Mensaje de contacto:\n\n";
$mensajeCompleto .= "Nombre: " . $nombre . "\n";
$mensajeCompleto .= "Correo Electrónico: " . $email . "\n";
$mensajeCompleto .= "Teléfono: " . $telefono . "\n"; // Agregado: Incluir teléfono en el mensaje
$mensajeCompleto .= "Provincia: " . $provincia. "\n"; // Modificado: Incluir provincia en el mensaje
$mensajeCompleto .= "Tengo interés en: " . $intereses . "\n"; // Agregado: Incluir intereses en el mensaje
$mensajeCompleto .= "Mensaje: " . $mensaje . "\n";

$asuntoCorreo = "Consulta de " . $nombre;

$header = "From: Fibaro Representantes <" . $email . ">\r\n"; // Modificado: Agregar nombre del remitente
$header .= "Reply-To: " . $email . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($destinatario, $asuntoCorreo, $mensajeCompleto, $header)) {
    // Redirigir a la página de agradecimiento
    header("Location: gracias.html");
    exit();
} else {
    ?>
    <h3 class="error">Ocurrió un error, por favor vuelve a intentarlo</h3>
    <?php
}
?>

