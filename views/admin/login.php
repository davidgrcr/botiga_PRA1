<div class="container text-center">
<div class="row align-items-end">
        <div class="col"></div>
        <div class="col-6">
        <h2>Admin Login</h2>
            <form action="/auth" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="contrasenya" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<style>
    form {
        margin-top: 100px;
        border: 2px solid grey;
        padding: 20px;

    }
</style>
