<div class="card w-75 mb-3">
    <div class="card-header">
        <h1>Admin Login</h1>
    </div>
    <div class="card-body">
        <form id="formLogin" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="admin@admin.com" </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="contrasenya" class="form-control" value="admin">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-5 btn-lg">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .card {
        margin: 0 auto;
        margin-top: 10%;
    }
</style>
<script>
    document.getElementById("formLogin").addEventListener("submit", function(e) {
        e.preventDefault();
        let form = e.target;
        let formData = new FormData(form);
        let data = Object.fromEntries(formData);
        console.log(data);
        fetch('/apiAdmin/login', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
            },
        }).then(response => {
            if (response.status === 201) {
                window.location.href = '/admin';
            } else {
                alert('Usuario o contraseña incorrectos.');
            }
        });
    });
</script>