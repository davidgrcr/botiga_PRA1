<h1>Create category</h1>
<form class="row g-3">
  <div class="col-md-6">
    <label for="name" class="form-label">
      Name
    </label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="col-md-6">
    <label for="categoryImg" class="form-label">Image</label>
    <input type="file" class="form-control" id="categoryImg" name="categoryImg" required>
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" id="create-category" class="btn btn-primary mt-5" type="button">Submit</button>
  </div>
</form>
<script>
  const name = document.getElementById('name');
  const categoryImg = document.getElementById('categoryImg');
  const button = document.querySelector('#create-category');

  button.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();

    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('categoryImg', categoryImg.files[0]);

    fetch('/apiAdmin/createCategory', {
        method: 'POST',
        headers: {
          enctype: 'multipart/form-data'
        },
        body: formData
      })
      .then(response => {
        if (response.status === 201) {
          window.location.href = '/admin/categories';
        } else {
          response.json().then(data => {
            alert('Error al crear la categoría. ' + data.message);
          });
        }
      }).catch(error => {
        console.log(error);
      });
  });
</script>