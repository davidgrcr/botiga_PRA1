<h1>Edit Product <?php echo $product->getName() ?></h1>
<form class="row g-3" action="" method="post">
    <input type="hidden" class="form-control" id="id" name="id" readonly value="<?php echo $product->getId() ?>">
    <div class="col-md-6">
        <label for="name" class="form-label">
            Name
        </label>
        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $product->getName() ?>">
    </div>
    <div class="col-md-6">
    <label for="category" class="form-label">Category</label>
    <select id="category" class="form-select" name="category" required>
      <option selected>Choose...</option>
      <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->getId() ?>" <?php echo $product->getCategoryId() == $category->getId() ? 'selected' : '' ?>>
          <?php echo $category->getName() ?>
        </option>
      <?php } ?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">
      Description
    </label>
    <input type="text" class="form-control" id="description" name="description" required value="<?php echo $product->getDescription() ?>">
  </div>
    <div class="col-md-6" id="product-img-container">
        <p>
            Image
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
            </svg>
        </p>
        <img src="/img/products/<?php echo $product->getImage() ?>" alt="" width="100" data-img-file="<?php echo $product->getImage() ?>">
        <input type="file" class="form-control d-none" id="productImg" name="productImg">
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" id="edit-product" class="btn btn-primary mt-5">Submit</button>
    </div>
</form>
<script>
    const id = document.getElementById('id');
    const name = document.getElementById('name');
    const productImg = document.querySelector('#product-img-container img');
    const productImgInut = document.querySelector('#productImg');
    const category = document.getElementById('category');
    const description = document.getElementById('description');
    const button = document.querySelector('#edit-product');

    button.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();

        let productImgToSend = null;

        if (productImgInut.classList.contains('d-none')) {
            productImgToSend = productImg.dataset.imgFile;
        } else {
            productImgToSend = productImgInut.files.length ? productImgInut.files[0] : null;
        }

        const formData = new FormData();
        formData.append('id', id.value);
        formData.append('name', name.value);
        formData.append('category', category.value);
        formData.append('description', description.value);

        if (productImgToSend && productImgToSend != 'undefined') formData.append('productImg', productImgToSend);

        fetch('/apiAdmin/editProduct', {
                method: 'POST',
                headers: {
                    enctype: 'multipart/form-data'
                },
                body: formData
            })
            .then(response => {
                if (response.status === 201) {
                    window.location.href = '/admin/products?opcion=' + category.value;
                } else {
                    response.json().then(data => {
                        alert('Error al editar la categoría. ' + data.message);
                    });
                }
            }).catch(error => {
                console.log(error);
            });
    });

    const imageToogle = () => {
        if (productImgInut.classList.contains('d-none')) {
            productImgInut.classList.remove('d-none');
            productImg.classList.add('d-none');
        } else {
            productImgInut.classList.add('d-none');
            productImg.classList.remove('d-none');
        }
    }

    document.querySelector('#product-img-container svg').addEventListener('click', () => {
        imageToogle();
    });
</script>