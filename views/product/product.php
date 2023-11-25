<?php

echo "<article class='product_page'>";
echo "<section class='card'>";
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
        e.target.disabled = true;
        e.target.textContent = 'Adding...';
        setTimeout(() => {
            addToCart(e.target.dataset.productId, 1).then(() => {
                window.dispatchEvent(new Event('cart-updated'));
            }).finally(() => {
                e.target.disabled = false;
                e.target.textContent = 'Add to cart';
            });
        }, 500);
    });
</script>