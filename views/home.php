<?php
	echo "<div class='landing'>";
	foreach ($categories as $category) {
		echo "<div class='card'>";
		echo "<img src='img/categories/{$category->getImage()}' alt='{$category->getName()}'>";
		echo "<a href='category/{$category->getId()}'>{$category->getName()}</a>";
		echo "</div>";
	}
	echo "</div>";
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