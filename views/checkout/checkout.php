<div class="checkout_page">
    <h1>Checkout</h1>
    <div class=forms>
        <section class="checkout_form_as_guess">
            <h2>Checkout as a guess</h2>
            <form action="/summary" method="post">
                <div class="form_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Your email" required />
                </div>
                <div class="form_group">
                    <label for="address">Address</label>
                    <textarea rows="3" name="address" placeholder="Your address" required></textarea>
                </div>
                <input type="submit" name="checkout_form_as_guess" value="Submit me!" />
            </form>
        </section>
        <section class="checkout_form_as_registered_user">
            <h2>Checkout as a registered user</h2>
            <form action="/summary" method="post">
                <div class="form_group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Your name" required />
                </div>
                <div class="form_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Your password" required />
                </div>
                <div class="form_group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Your email"  required />
                </div>
                <div class="form_group">
                    <label for="address">Address</label>
                    <textarea rows="3" name="address" placeholder="Your address" required></textarea>
                </div>
                <input type="submit" name="checkout_form_as_registered_user" value="Submit me!" />
            </form>
        </section>