<?php
echo '<div class="category_page"><h1>' . $category->getName() . '</h1>';
echo '<ul class="products">';
foreach ($products as $product) {
    echo '<section class="product">
        <img src="/img/products/' . $product->getImage() . '" alt="' . $product->getName() . '">
        <a href="/product/' . $product->getId() . '">' . $product->getName() . '</a>
    </section>';
}
echo '</ul>';
echo '</div>';
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