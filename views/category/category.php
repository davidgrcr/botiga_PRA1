<?php
echo '<div class="category_page"><h1>' . $category->getName() . '</h1>';
echo '<ul class="products">';
foreach ($products as $product) {
    echo '<section class="card">
        <img src="/img/products/' . $product->getImage() . '" alt="' . $product->getName() . '">
        <a class="black_link" href="/product/' . $product->getId() . '">' . $product->getName() . '</a>
    </section>';
}
echo '</ul>';
echo '</div>';
