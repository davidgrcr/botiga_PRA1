<h1 class="mt-5 text-start">Products</h1>
<form action="/admin/products" method="get">
    <select name="opcion" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
        <option selected>Choose a caregory</option>
        <?php foreach ($categories as $category) { ?>
            <option value="<?php echo $category->getId() ?>" <?php echo $categoryId == $category->getId() ? 'selected' : '' ?>>
                <?php echo $category->getName() ?>
            </option>
        <?php } ?>
    </select>
</form>
<a href="/admin/createProduct" class="btn btn-success mt-5">Create</a>

<?php
if (count(($products)) == 0) {
    echo '<h2 class="mt-5 text-start">No products found.</h2>';
} else {
?>
    <table class="table table-dark table-striped mt-5 table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $product->getId() ?></td>
                    <td><?php echo $product->getName() ?></td>
                    <td>
                        <img src="/img/products/<?php echo $product->getImage() ?>" alt="" width="100">
                    </td>
                    <td>
                        <a href="/admin/editProduct/<?php echo $product->getId() ?>" class="btn btn-primary">Edit</a>
                        <button data-product-id="<?php echo $product->getId() ?>" class="btn btn-danger remove-product">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<script>
    document.querySelectorAll('.remove-product').forEach(button => {
        button.addEventListener('click', function(e) {
            const result = window.confirm("¿Estás seguro?");
            if (result) {
                let productId = e.target.dataset.productId;
                fetch('/apiAdmin/deleteProduct/' + productId, {
                    method: 'DELETE'
                }).then(async response => {
                    if (response.status === 200) {
                        window.location.href = '/admin/products?opcion=<?php echo $categoryId ?>';
                    } else {
                        const error = await response.json();
                        alert(`Error deleting product. ${error.message}`);
                    }
                });
            }
        });
    });
</script>