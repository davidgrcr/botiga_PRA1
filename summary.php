<?php
include_once 'db/Database.php';
include_once 'model/ProductDAO.php';

if (!isset($_POST['checkout_form_as_guess']) && !isset($_POST['checkout_form_as_registered_user'])) {
    header('Location: cart.php');
}

session_start();
ob_start(); // Inicia la captura de salida
?>
<div class="checkout_page">
    <h1>Order summary</h1>
    <section class="user_information">
        <h2>User information</h2>
        <div>
        <?php if (isset($_POST['name'])): ?>
            <p>Name: <?php echo $_POST['name']; ?></p>
        <?php endif; ?>

        <?php if (isset($_POST['email'])): ?>
            <p>Email: <?php echo $_POST['email']; ?></p>
        <?php endif; ?>

        <?php if (isset($_POST['address'])): ?>
            <p>Address: <?php echo $_POST['address']; ?></p>
        <?php endif; ?>
    </section>
    <section class="cart_information">
        <h2>Cart information</h2>
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
    </section>
</div>
<?php 
$content = ob_get_clean();
include 'layout.php';
$layout = ob_get_clean(); // Guarda la salida en una variable y termina la captura
echo $layout;
?>

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

</style>