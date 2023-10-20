<div class="admin-order-detail">
    <h2 class="text-start"> Order #<?= $order['order_id'] ?></h2>
    <div class="card">
        <div class="card-header text-start fs-3">
            User information
        </div>
        <div class="card-body text-start">
            <blockquote class="blockquote mb-0">
                <?php if ($user->getName()) { ?>
                    <p>Name: <?php echo $user->getName() ?></p>
                <?php } ?>
                <p>Email: <?php echo $user->getEmail() ?></p>
                <p>Address: <?php echo $user->getAddress() ?></p>
                <p class="fw-bold">Type user: <?php echo $user->getUserType() ?></p>
            </blockquote>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header text-start fs-3">
            Product information
        </div>
        <div class="card-body text-start">
            <blockquote class="blockquote mb-0">
                <?php foreach ($products as $productId => $product) { ?>
                    <img class="me-5" width="50" src="/img/products/<?php echo $product['product']->getImage() ?> " alt="<?php echo $product['product']->getName() ?>">
                    <?php echo $product['quantity']  .' x '. $product['product']->getName() ?>
                    <hr>
                <?php } ?>
            </blockquote>
        </div>
    </div>
</div>
<style>
    .admin-order-detail {
        margin-top: 100px;
    }

    .admin-order-detail h2 {
        margin-bottom: 50px;
    }
</style>