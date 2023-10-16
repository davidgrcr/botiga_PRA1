<div class="checkout_page">
    <h1>Checkout</h1>
    <div class=forms>
    <div class="checkout_form_as_guess">
        <p>Checkout as a guess</p>
        <form action="/summary" method="post">
            <div class="form_group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email" required />
            </div>
            <div class="form_group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Your address" required />
            </div>
            <input type="submit" name="checkout_form_as_guess" value="Submit me!" />
        </form>
    </div>
    <div class="checkout_form_as_registered_user">
        <p>Checkout as a registered user</p>
        <form action="/summary" method="post">
        <div class="form_group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Your name"  />
            </div>
            <div class="form_group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your password" required />
            </div>
            <div class="form_group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Your email"  />
            </div>
            <div class="form_group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Your address" required />
            </div>
            <input type="submit" name="checkout_form_as_registered_user" value="Submit me!" />
        </form>
</div>
<style>
    .checkout_page .forms {
        display: flex;
        justify-content: space-between;
    }
    .checkout_page .form_group {
        margin-bottom: 20px;
    }
    .checkout_form_as_registered_user form,
    .checkout_form_as_guess form{
        width: 100%;
        border: 1px solid #ccc;
        padding: 20px;
    }

    .checkout_form_as_registered_user label,
    .checkout_form_as_guess label {
        width: 100px;
        display: inline-block;
    }
    .checkout_page input[type="submit"] {
        display: block;
        margin: 40px auto 0;
    }
</style>