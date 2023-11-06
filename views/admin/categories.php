<h1 class="mt-5 text-start">Categories</h1>
<a href="/admin/createCategory" class="btn btn-success mt-5">Create</a>
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
        <?php foreach ($categories as $category) { ?>
            <tr>
                <th scope="row">1</th>
                <td><?php echo $category->getId() ?></td>
                <td><?php echo $category->getName() ?></td>
                <td>
                    <img src="/img/categories/<?php echo $category->getImage() ?>" alt="" width="100">
                </td>
                <td>
                    <a href="/admin/editCategory/<?php echo $category->getId() ?>" class="btn btn-primary">Edit</a>
                    <button data-category-id="<?php echo $category->getId() ?>" class="btn btn-danger remove-category">Delete</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    document.querySelectorAll('.remove-category').forEach(button => {
        button.addEventListener('click', function(e) {
            const result = window.confirm("¿Estás seguro?");
            if (result) {
                let categoryId = e.target.dataset.categoryId;
                fetch('/apiAdmin/deleteCategory/' + categoryId, {
                    method: 'DELETE'
                }).then(async response => {
                    if (response.status === 200) {
                        window.location.href = '/admin/categories';
                    } else {
                        const error = await response.json();
                        alert(`Error deleting category. ${error.message}`);
                    }
                });
            }
        });
    });
</script>