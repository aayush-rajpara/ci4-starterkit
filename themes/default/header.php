<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $this->renderSection('title') ?>ci4-starterkit</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<?php $this->renderSection('styles') ?>
</head>
<body>

	<div class="container">
		<?php $this->renderSection('content') ?>
	</div>

	

	<?php $this->renderSection('footer') ?>
</body>
</html>