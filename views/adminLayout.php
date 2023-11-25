<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/admin_styles.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="/js/cart_services.js"></script>
	<script src="/js/auth_services.js"></script>

</head>

<body>

	<header>
		<?php
		session_start();
		if (isset($_SESSION['email']) && isset($_SESSION['contrasenya'])) { ?>
			<nav class="navbar navbar-expand-lg bg-body-tertiary">
				<div class="container-fluid">
					<a href="/admin" class="navbar-brand">Admin</a>
					<div class=" navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="/admin">Orders</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/admin/categories">Categories</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/admin/products">Products</a>
							</li>
						</ul>
					</div>
					<button onclick="logOut()" class="btn btn-outline-success">Log out</button>

				</div>
				</div>
			</nav>
		<?php }
		?>
	</header>

	<main>
		<div class="container text-center">
			<?php if (isset($_SESSION['email']) && isset($_SESSION['contrasenya'])) { ?>
				<div class="row align-items-end">
					<div class="col"></div>
					<div class="col-8">
						<?php echo $content; ?>
					</div>
					<div class="col"></div>
				<?php } else { ?>
					<div class="row align-items-center">

						<div class="col-8 offset-2">
							<?php echo $content; ?>
						</div>

					<?php } ?>
	</main>

	<footer>
	</footer>

</body>

</html>