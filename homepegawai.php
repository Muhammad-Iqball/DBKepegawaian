<?php
	session_start();
	if(!isset($_SESSION["idPegawai"])) // Access Denied
		header("Location: index.php?error=4");
?> 

<?php include_once("functions.php") ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Home Pegawai</title>
</head>
<body>
	<div class="w3-container">
		<?php navbarPegawai(); ?>
		<div id="w3-container">
			<br>
			<h3>Selamat Datang <?php echo $_SESSION["nama"];?></h3>
		</div>
	</div>
</body>
</html>