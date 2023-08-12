<?php include '../function.php' ?>
<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Admin Giriş</title>
	<!-- General CSS Files -->
	<link rel="stylesheet" href="assets/css/app.min.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/components.css">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="background-image-body">
	<div class="loader"></div>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="card card-auth">
							<div class="card-header card-header-auth">
								<h4>Giriş</h4>
							</div>
							<div class="card-body">
								<form action="<?=base_url("function.php")?>" method="POST">
									<div class="card-body">
										<div class="form-group">
											<label><i class="fa fa-user"></i> Kullanıcı Adı</label>
											<input type="text" name="username" class="form-control" required="">
										</div>
										<div class="form-group">
											<label><i class="fa fa-key"></i> Şifre</label>
											<input type="password" name="password" class="form-control" required="">
										</div>
									</div>
									<button style="border-radius: 0px;" name="login" type="submit" class="btn btn-lg btn-block btn-auth-color" tabindex="4">
										Giriş Yap
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- General JS Scripts -->
	<script src="assets/js/app.min.js"></script>
	<!-- JS Libraies -->
	<!-- Page Specific JS File -->
	<!-- Template JS File -->
	<script src="assets/js/scripts.js"></script>

</body>

</html>