<h1> Create product</h1>
<form class="row g-3">
  <div class="col-md-6">
    <label for="name" class="form-label">
      Name
    </label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="col-md-6">
    <label for="category" class="form-label">Category</label>
    <select id="category" class="form-select" name="category" required>
      <option selected>Choose...</option>
      <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->getId() ?>">
          <?php echo $category->getName() ?>
        </option>
      <?php } ?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">
      Description
    </label>
    <input type="text" class="form-control" id="description" name="description" required>
  </div>
  <div class="col-md-6">
    <label for="productImg" class="form-label">Image</label>
    <input type="file" class="form-control" id="productImg" name="productImg" required>
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" id="create-product" class="btn btn-primary mt-5" type="button">Submit</button>
  </div>
</form>
<script>
  const name = document.getElementById('name');
  const category = document.getElementById('category');
  const description = document.getElementById('description');
  const productImg = document.getElementById('productImg');
  const button = document.querySelector('#create-product');

  button.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();

    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('category', category.value);
    formData.append('description', description.value);
    formData.append('productImg', productImg.files[0]);

    fetch('/apiAdmin/createProduct', {
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
            alert('Error al crear el producto. ' + data.message);
          });
        }
      }).catch(error => {
        console.log(error);
      });
  });
</script>