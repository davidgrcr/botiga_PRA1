<?php
	echo "<div class='landing landing_page'>";
	foreach ($categories as $category) {
		echo "<div class='card'>";
		echo "<img src='img/categories/{$category->getImage()}' alt='{$category->getName()}'>";
		echo "<a class='black_link' href='category/{$category->getId()}'>{$category->getName()}</a>";
		echo "</div>";
	}
	echo "</div>";
