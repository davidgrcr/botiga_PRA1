<?php
include_once 'db/Database.php';
include_once 'model/ProductDAO.php';
// Iniciar la sesión
session_start();

// Comprobar si la matriz del carrito ya existe, si no, crear una
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

ob_start();
?>
<div class="cart-container">
    <div class="cart-header">
        <div class="product-info">Producto</div>
        <div class="product-quantity">Cantidad</div>
        <div class="product-remove">Eliminar</div>
    </div>
    <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
        <?php $product = ProductDAO::getProductById($productId); ?>
        <div class="cart-item">
            <div class="product-info">
                <img src="img/products/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getName(); ?>">
                <?php echo $product->getName(); ?>
            </div>
            <div class="product-quantity">
                <input type="number" value="<?php echo $quantity; ?>" min="1">
            </div>
            <div class="product-remove">
                <button class="remove_product" data-product-id="<?php echo $product->getId(); ?>">Eliminar</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php

// Almacenar el contenido en la variable $content y limpiar el búfer
$content = ob_get_clean();

// echo $content;
ob_start(); // Inicia la captura de salida
include 'layout.php'; 
$layout = ob_get_clean(); // Guarda la salida en una variable y termina la captura
echo $layout;
?>
<script>
    document.querySelectorAll('.remove_product').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            removeProductFromCart(e.target.dataset.productId).then(() => {
                window.location.reload();
            });
        });
    });
</script>

<style>
.cart-container {
    display: flex;
    flex-direction: column;
    width: 80%;
    margin: 0 auto;
}

.cart-header,
.cart-item {
    display: flex;
    justify-content: space-between;
}

.product-info,
.product-quantity,
.product-remove {
    flex-basis: 33.33%;
}

.product-info img {
    max-width: 50px;
    margin-right: 10px;
}
</sytle>