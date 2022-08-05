<?php include_once("../functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Hapus Pegawai</title>
</head>
<body>
	<?php navbarAdmin(); ?>
	<div class="w3-container">
	<h3>Hapus Pegawai</h3>
	<?php if(isset($_GET["idPegawai"])){
		$idpegawai = $_GET['idPegawai'];
		$db = dbConnect();
		if($data = getDataPegawai($idpegawai)){
	?>
		<form action="pegawai-hapus.php" method="POST">
			
			<input type="hidden" name="id" value="<?php echo $data["idPegawai"]; ?>">
			
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Nama Pegawai</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" required value="<?php echo $data["nama"]; ?>" readonly>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Golongan</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="golongan" required value="<?php echo $data["namaGolongan"]; ?>" readonly>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="notelp" required value="<?php echo $data["notelp"]; ?>" readonly>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-3">
				  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
				  <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="alamat" readonly><?php echo $data["alamat"]; ?></textarea>
				</div>
			</div><br>
			<button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
		</form>
	</div>
	<?php
	}
	else
		echo "Pegawai dengan Id : $idpegawai tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "Idpegawai tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>