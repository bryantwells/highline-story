<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

</head>
<body>

	<?php $dataFile = __DIR__ . '/data.json'; ?>
	<?php $data = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : []; ?>
	
	<?php include('components/viewer.php') ?>
	<?php include('components/admin.php') ?>
	<?php include('components/input.php') ?>

	<script src="/assets/js/main.js"></script>
	
</body>
</html>