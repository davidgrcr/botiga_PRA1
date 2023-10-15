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
	$title = 'Shoes Store';
	ob_start();
	include 'layout.php';
	$layout = ob_get_clean();
  	echo $layout;
?>
<style>
.landing {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 50%;
	margin: 0 auto;
}
.landing .card {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	gap: 50px;
	text-transform: capitalize;
}
</style>