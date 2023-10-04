<?php
include_once 'db/Database.php';
include_once 'model/ProductDAO.php';

$product = ProductDAO::getProductById($_GET['product_id']);
$content = "<article class='product_page'><header>";
$content .= "</header><section class='product'>";
$content .= "<figure><img src='img/products/" . $product->getImage() . "' alt='" . $product->getName() . "'></figure>";
$content .= "<div>";
$content .= "<h1>" . $product->getName() . "</h1>";
$content .= "<p>" . $product->getDescription() . "</p>";
$content .= "<button class='add_product' data-product-id='". $product->getId() . "'. >Add to cart</button>";
$content .= "</div></section></article>";

ob_start(); // Inicia la captura de salida
include 'layout.php'; 
$layout = ob_get_clean(); // Guarda la salida en una variable y termina la captura
echo $layout;
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

.product_page  img {
    width: 150px;
    aspect-ratio: auto 1 / 1;
}
</style>