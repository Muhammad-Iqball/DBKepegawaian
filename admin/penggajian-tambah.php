<?php include_once("../functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Simpan Data Penggajian</title>
</head>
<body>
	<?php navbarAdmin(); ?>
	<h1>Penyimpanan Data Penggajian</h1>
	<?php 
		if(isset($_POST["tblTambah"])){
			$db = dbConnect();
			if($db->connect_errno == 0){
				$id = $db->escape_string($_POST['idPenggajian']);
				$idPegawai = $db->escape_string($_POST['idPegawai']);
				$tanggal = $db->escape_string($_POST['tanggal']);
				$total = $db->escape_string($_POST['gaji']);
				$sql = "INSERT INTO penggajian (idPenggajian, idPegawai, tanggal, totalGaji)
						VALUES ('$id', '$idPegawai', '$tanggal', '$total')";
				$res = $db->query($sql);
				if($res){
					if($db->affected_rows>0){
						?>
						Data berhasil disimpan.<br>
						<a href="data-penggajian.php"><button>Lihat Data</button></a>
						<?php
					}	
				}
				else{
					?>
					Gagal Menambahkan Data.
					<a href="javascript:history.back()"><button>Kembali</button></a>
					<?php
				}
			}
			else
				echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
		}
	?>
</body>
</html>