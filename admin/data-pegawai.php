<?php include_once("../functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Data Pegawai</title>
</head>
<body>
	<div class="w3-container">
		<?php navbarAdmin();?>
		<h2>Data Pegawai</h2><br>
		<form method="post"action="">
			Nama Pegawai <input type="text" name="dicari"> <input type="submit" name="tblCari" value="Cari">
		</form><br>
		  <?php 
		  		$db = dbConnect();
		  		if($db->connect_errno == 0){
		  			if(isset($_POST["tblCari"])){
						$nama = $db->escape_string($_POST["dicari"]);
						$sql = "SELECT * FROM pegawai 
								JOIN golongan ON pegawai.idgolongan = golongan.idgolongan 
								WHERE nama LIKE '%$nama%'";
					}
					else
						$sql = "SELECT * FROM pegawai 
								JOIN golongan ON pegawai.idgolongan = golongan.idgolongan";
		  			$res = $db->query($sql);
		  			if($res){
		  	?>
		  				<a href="form-tambahpegawai.php"><button>Tambah Data</button></a><br>
		  				<div id="container" style="width: 60%">
							<table class="table table-sm">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">ID Pegawai</th>
							      <th scope="col">Nama</th>
							      <th scope="col">Golongan</th>
							      <th scope="col">Nomor Telepon</th>
							      <th scope="col">Alamat</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
			<?php
				$i = 1; 
				$data = $res->fetch_all(MYSQLI_ASSOC);
				foreach($data as $baris){
			?>
							  <tbody>
							    <tr>
							    	<td><?php echo $i; $i++?></td>
							    	<td><?php echo $baris["idPegawai"];?></td>
							    	<td><?php echo $baris["nama"];?></td>
							    	<td><?php echo $baris["namaGolongan"];?></td>
							    	<td><?php echo $baris["notelp"];?></td>
							    	<td><?php echo $baris["alamat"];?></td>
							    	<td><a href="form-editpegawai.php?idPegawai=<?php 
echo $baris["idPegawai"];?>"><button>Edit</button></a> <a href="pegawai-konfirmasi-hapus.php?idPegawai=<?php echo $baris["idPegawai"];?>"><button>Hapus</button></a></td>
							    </tr>
							  </tbody>
			<?php 
				}
			?>
							</table>
			<?php 
				$res->free();
					}
					else
						echo "Gagal Query".(DEVELOPMENT?" : ".$db->error:"")."<br>";
				}

				else
					echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
			?>
						</div>
	</div>
</body>
</html>