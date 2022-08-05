<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Hapus Data Penggajian</title>
</head>
<body>
	<?php navbarAdmin(); ?>
	<h2>Hapus Data Penggajian</h2>
	<?php
		if(isset($_POST["tblHapus"])){
			$db=dbConnect();
			if($db->connect_errno==0){
				$idpenggajian  =$db->escape_string($_POST["id"]);
				// Susun query delete
				$sql="DELETE FROM penggajian WHERE idPenggajian='$idpenggajian'";
				// Eksekusi query delete
				$res=$db->query($sql);
				if($res){
					if($db->affected_rows>0) // jika ada data terhapus
						echo "Data berhasil dihapus.<br>";
					else // Jika sql sukses tapi tidak ada data yang dihapus
						echo "Penghapusan gagal karena data yang dihapus tidak ada.<br>";
				}
				else{ // gagal query
					echo "Data gagal dihapus.";
				}
				?>
				<a href="data-penggajian.php"><button>Lihat Data</button></a>
				<?php
			}
			else
				echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
		}
	?>
</body>
</html>