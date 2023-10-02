<?php
    include_once 'db/Database.php';
    include_once 'model/CategoryDAO.php';
	ob_start(); // Inicia la captura de salida
	include_once './views/header/header.php'; // Incluye el archivo una sola vez
	$header = ob_get_clean(); // Guarda la salida en una variable y termina la captura

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mi Aplicación</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/cart_services.js"></script>
</head>
<body>

<header>
    <!-- contenido del encabezado -->
	<?php echo $header; ?>
</header>

<main>
    <!-- contenido del cuerpo de la página -->
    <?php echo $content; ?>
</main>

<footer>
    <!-- contenido del pie de página -->
	<a href="admin.php">Admin</a>
</footer>

</body>
</html>