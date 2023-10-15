<?php
	ob_start();
	include_once './views/header/header.php';
	$header = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
	<script src="/js/cart_services.js"></script>
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
	<a class="link" href="admin.php">Admin</a>
</footer>

</body>
</html>