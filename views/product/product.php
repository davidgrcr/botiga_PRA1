<?php

echo "<article class='product_page'><header>";
echo "</header><section class='product'>";
echo "<figure><img src='/img/products/" . $product->getImage() . "' alt='" . $product->getName() . "'></figure>";
echo "<div>";
echo "<h1>" . $product->getName() . "</h1>";
echo "<p>" . $product->getDescription() . "</p>";
echo "<button class='add_product' data-product-id='" . $product->getId() . "'. >Add to cart</button>";
echo "</div></section></article>";

?>

<script>
    document.querySelector('.add_product').addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        addToCart(e.target.dataset.productId, 1).then(() => {
            window.dispatchEvent(new Event('cart-updated'));
        });

    });
</script>

<style>
    .product_page .product {
        display: flex;
        gap: 20px;
        list-style: none;
        align-items: center;
        text-wrap: balance;
    }

    .product_page img {
        width: 150px;
        aspect-ratio: auto 1 / 1;
    }
</style>