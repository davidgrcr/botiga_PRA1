<?php
function getProductGrilla($product, $quantity)
{
    $grilla = "<section class='product'>";
    $grilla .= "<figure><img src='img/products/" . $product->getImage() . "' alt='" . $product->getName() . "'></figure>";
    $grilla .= "<div>";
    $grilla .= "<p class='capitalize'>" . $quantity . " x " . $product->getName() . "</p>";
    $grilla .= "</div></section>
    ";
    return $grilla;
}
?>

<div class="summary_page">
    <h1>Order summary</h1>
    <section class="user_information">
        <h2>User information</h2>
        <div>
            <?php if (isset($_POST['name'])) : ?>
                <p><span>Name:</span> <?php echo $_POST['name']; ?></p>
                <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <?php endif; ?>

            <?php if (isset($_POST['email'])) : ?>
                <p><span>Email:</span> <?php echo $_POST['email']; ?></p>
                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
            <?php endif; ?>

            <?php if (isset($_POST['address'])) : ?>
                <p><span>Address:</span> <?php echo $_POST['address']; ?></p>
                <input type="hidden" name="address" value="<?php echo $_POST['address']; ?>">
            <?php endif; ?>
            <?php if (isset($_POST['password'])) : ?>
                <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
            <?php endif; ?>
            <input type="hidden" name="user_type" value="<?php echo (isset($_POST['password']) && isset($_POST['email'])) ? 'registered' : 'guest' ?>">
    </section>
    <section class="cart_information">
        <h2>Cart information</h2>
        <?php foreach ($items as $productId => $itemData) : ?>
            <?php $product = $itemData['product']; ?>
            <?php $quantity = $itemData['quantity']; ?>
            <?php echo getProductGrilla($product, $quantity); ?>
        <?php endforeach; ?>
    </section>
    <footer class="cart-footer">
        <button class="confirm primary"> Confrim Checkout!!</button>
    </footer>
</div>

<style>
    .summary_page .user_information,
    .summary_page .cart_information {
        border: 1px solid black;
        padding: 20px;
        margin: 20px auto;
        width: 100%;
        position: relative;
    }

    .summary_page section h2 {
        display: block;
        position: absolute;
        top: -30px;
        background-color: #ffffff;
        padding: 5px;
    }

    .summary_page span {
        font-weight: bold;
    }

    .summary_page .product {
        display: flex;
        gap: 20px;
        list-style: none;
        align-items: center;
        text-wrap: balance;
    }

    .summary_page img {
        width: 75px;
        aspect-ratio: auto 1 / 1;
    }
</style>
<script>
    document.querySelector('.confirm').addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const name = document.querySelector('input[name="name"]')?.value;
        const email = document.querySelector('input[name="email"]')?.value;
        const address = document.querySelector('input[name="address"]')?.value;
        const password = document.querySelector('input[name="password"]')?.value;
        const userType = document.querySelector('input[name="user_type"]')?.value;
        confirmCheckout({
            name,
            email,
            address,
            password,
            user_type: userType
        }).then((data) => {
            console.log(data);
            alert('Purchase completed successfully!');
            window.location.href = '/';
        }).catch((error) => {
            console.log(error);
            alert('There was an error with your purchase. Please try again later.');
        });
    });
</script>