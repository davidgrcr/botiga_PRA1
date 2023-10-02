<?php
	include_once 'db/Database.php';
	include_once 'model/CategoryDAO.php';

	$categories = CategoryDAO::getAllCategories();
	$content = '<div class="landing">';
	foreach ($categories as $category) {
		$content .= '<div class="card">
		<img src="img/categories/'. $category->getImage() .'" alt="'. $category->getName() .'">
		<a href="category.php?category_id=' . $category->getId() . '">' . $category->getName() . '</a>
		</div>';
	}
	$content .= '</div>';

	ob_start(); // Inicia la captura de salida
	include 'layout.php'; // Incluye el archivo una sola vez
	$layout = ob_get_clean(); // Guarda la salida en una variable y termina la captura

  	echo $layout;
?>
<style>
.landing {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 100%;
}
.landing .card {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	gap: 50px;
}
.landing img {
	width: 150px;
  	aspect-ratio: auto 1 / 1;
}
</style>