<table class="cart-container">
    <thead>
        <tr class="cart-header">
            <th class="product-info">Product</th>
            <th class="product-quantity">Quantity</th>
            <th class="product-remove">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $productId => $itemData): ?>
            <?php $product = $itemData['product']; ?>
            <?php $quantity = $itemData['quantity']; ?>
            <tr class="cart-item">
                <td class="product-info">
                    <img src="/img/products/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getName(); ?>">
                    <a href="/product/<?php echo $product->getId() ?>">
                        <?php echo  $product->getName()  ?>
                    </a>
                </td>
                <td class="product-quantity">
                    <input type="number" value="<?php echo $quantity; ?>" min="1" max="10" data-product-id="<?php echo $product->getId(); ?>">
                </td>
                <td class="product-remove">
                    <button class="link remove_product" data-product-id="<?php echo $product->getId(); ?>">
                        (X) Delete
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<footer class="cart-footer">
    <a class="to_pay" href="/checkout">Checkout ></a>
</footer>

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
</style>