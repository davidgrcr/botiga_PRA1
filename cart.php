<?php
include_once 'db/Database.php';
include_once 'model/ProductDAO.php';
// Iniciar la sesión
session_start();

// Comprobar si la matriz del carrito ya existe, si no, crear una
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$title = 'Cart | Shoes Store';

ob_start();
?>
<table class="cart-container">
    <thead>
        <tr class="cart-header">
            <th class="product-info">Product</th>
            <th class="product-quantity">Quantity</th>
            <th class="product-remove">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
            <?php $product = ProductDAO::getProductById($productId); ?>
            <tr class="cart-item">
                <td class="product-info">
                    <img src="img/products/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getName(); ?>">
                    <a href="product.php?product_id= <?php echo $product->getId() ?>"><?php echo  $product->getName()  ?></a>
                </td>
                <td class="product-quantity">
                    <input type="number" value="<?php echo $quantity; ?>" min="1" max="10" data-product-id="<?php echo $product->getId(); ?>">
                </td>
                <td class="product-remove">
                    <button class="link remove_product" data-product-id="<?php echo $product->getId(); ?>">(X) Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<footer class="cart-footer">
    <a class="to_pay" href="checkout.php">Checkout ></a>
</footer>

<?php

// Almacenar el contenido en la variable $content y limpiar el búfer
$content = ob_get_clean();
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
    
    const controllers = {};

    document.querySelectorAll('.product-quantity input').forEach(input => {
        input.addEventListener('input', function() {
            const productId = this.dataset.productId;

            // Si ya hay un controlador para este producto, aborta la petición
            if (controllers[productId]) {
                controllers[productId].abort();
            }

            // Crea un nuevo AbortController para este producto
            controllers[productId] = new AbortController();
            const signal = controllers[productId].signal;

            updateProductQuantity(productId, this.value, signal).then(() => {
                window.dispatchEvent(new Event('cart-updated'));
            });
        });
    });
</script>

<style>
.cart-container {
  width: 80%;
  border-collapse: collapse;
  margin : 0 auto;
}

.cart-container th,
.cart-container td {
  text-align: left;
  padding: 8px;
}

.cart-container .product-info {
  width: 50%;
}

.cart-container .product-info span {
  text-transform: capitalize;
}

.product-info img {
  max-width: 50px;
  vertical-align: middle;
}

.product-info span {
  vertical-align: middle;
}

.to_pay {
    background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.to_pay:hover {
    background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>