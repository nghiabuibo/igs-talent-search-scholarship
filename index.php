<!DOCTYPE html>
<html lang="vi-VN">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<link href="http://gmpg.org/xfn/11" rel="profile"/>
	<title>
		Tra cứu học bổng - Ivy Global School
	</title>
	<meta content="vi_VN" property="og:locale"/>
	<meta content="article" property="og:type"/>
	<meta content="Tra cứu học bổng - Ivy Global School" property="og:title"/>
	<meta content="Tra cứu học bổng - Ivy Global School" property="og:description"/>
	<meta content="Ivy Global School" property="og:site_name"/>
	<meta content="assets/imgs/og-image2.jpg" property="og:image"/>
	<meta content="summary" name="twitter:card"/>
	<meta content="Tra cứu học bổng - Ivy Global School" name="twitter:description"/>
	<meta content="Tra cứu học bổng - Ivy Global School" name="twitter:title"/>
	<meta content="assets/imgs/bg.jpg" name="twitter:image"/>
	<meta name="msapplication-TileImage" content="https://ivyglobalschool.org/media/0scluqrx/logo-favicon.ico" />
	<link rel="shortcut icon" href="https://ivyglobalschool.org/media/0scluqrx/logo-favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="https://ivyglobalschool.org/media/0scluqrx/logo-favicon.ico">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container mt-5 pt-5">
		<div class="row">
			<div class="section-col col-xl-6 col-lg-8 col-md-10 offset-xl-3 offset-lg-2 offset-md-1">
				<div class="search">
					<form action="search.php" method="POST" id="search_form">
						<p class="textmuted fw-bold h6 mb-4 text-center">TRA CỨU HỌC BỔNG IGS TALENT SEARCH</p>
						<div class="row g-3 mb-4">
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Họ và tên" aria-label="Họ và tên" name="name" required="required">
							</div>
							<div class="col-md-6">
								<input type="tel" pattern="^(0|\+84|84)\d{9}$" class="form-control" placeholder="Số điện thoại" aria-label="Số điện thoại" name="phone">
							</div>
							<div class="col-md-3 mb-2 d-none">
								<select name="template" class="form-select" required="required">
									<option value="scholarship" selected="selected">Certificate</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<button class="btn btn-igs w-100" type="submit" >
									<span class="icon spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
									<span class="text">Tra cứu <svg xmlns="http://www.w3.org/2000/svg" width="12" class="ms-2" fill="#fff" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<div class="table-responsive text-center">
					<div class="d-flex justify-content-center mt-3">
						<div class="spinner-grow text-light d-none" id="table_loading" role="status">
							<span class="visually-hidden">Loading...</span>
						</div>
					</div>
					<table class="table table-light table-hover table-striped mt-5 d-none" id="search_result">
						<thead>

						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>