<?php
$categories = CategoryDAO::getAllCategories();
?>

<div class="header">
    <img width="150px" src="/img/logo.jpeg" alt="Logo">
    <nav>
        <ul>
            <li><a href="/">HOME</a></li>
            <?php
             foreach ($categories as $category) {
                 echo '<li><a href="category.php?category_id=' . $category->getId() . '">' . $category->getName() . '</a></li>';
             }
            ?>
        </ul>
    </nav>
    <a href="cart.php" class="cart">
        <svg width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M21 4H2v2h2.3l3.521 9.683A2.004 2.004 0 0 0 9.7 17H18v-2H9.7l-.728-2H18c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 4z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="16.5" cy="19.5" r="1.5"></circle></svg>
        (<span id="cart">0</span>)
    </a>
</div>

<style>
.header {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}

.header a {
    text-transform: uppercase;
}

.header ul {
    display: flex;
    list-style: none;
    justify-content: space-between;
    gap: 45px;
}

.header .cart {
    padding-right: 20px;
    text-decoration: none;

}
</style>

<script>
    const cart = document.querySelector('#cart');

    const updateCart = () => {
        getProductsFormCart().then(data => {
            let numberOfProducts = 0;
            Object.values(data?.products || []).forEach(product => {
                numberOfProducts += product;
            });
            cart.innerHTML = numberOfProducts;
        });
    }

    window.addEventListener('load', updateCart);
    window.addEventListener('cart-updated', updateCart);

</script>