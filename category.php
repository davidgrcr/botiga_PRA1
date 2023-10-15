<?php
include_once 'db/Database.php';
include_once 'model/CategoryDAO.php';
include_once 'model/ProductDAO.php';
    
    $category = CategoryDAO::getCategoryById($_GET['category_id']);
    $products = ProductDAO::getProductsByCategoryId($_GET['category_id']);

    $content = '<div class="category_page"><h1>' . $category->getName() . '</h1>';
    $content .= '<ul class="products">';

    foreach ($products as $product) {
        $content .= '<section class="product">
            <img src="img/products/' . $product->getImage() . '" alt="' . $product->getName() . '">
            <a href="product.php?product_id=' . $product->getId() . '">' . $product->getName() . '</a>
        </section>';
    }
    $content .= '</ul>';
    $content .= '</div>';
    $title = ucfirst($category->getName()) . ' | Shoes Store';
	ob_start();
	include 'layout.php';
	$layout = ob_get_clean();
	echo $layout;
?>

<style>
.category_page .products {
    list-style: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 25px;
}

.category_page .products .product {
    display: flex;
    gap: 20px;
    list-style: none;
    align-items: center;
    min-width: 500px;
}
</style>