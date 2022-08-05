<?php include_once("../functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<title>Data Penggajian</title>
</head>
<body>
	<div class="w3-container">
		<?php navbarAdmin();?>
		<h2>Data Penggajian Pegawai</h2><br>
		<form method="post"action="">
			Nama Pegawai <input type="text" name="dicari"> <input type="submit" name="tblCari" value="Cari">
		</form><br>
		  <?php 
		  		$db = dbConnect();
		  		if($db->connect_errno == 0){
		  			if(isset($_POST["tblCari"])){
						$nama = $db->escape_string($_POST["dicari"]);
						$sql = "SELECT * FROM penggajian 
								JOIN pegawai ON penggajian.idPegawai = pegawai.idPegawai 
								JOIN golongan ON pegawai.idgolongan = golongan.idgolongan 
								WHERE nama LIKE '%$nama%' ORDER BY idPenggajian";
					}
					else
						$sql = "SELECT * FROM penggajian 
								JOIN pegawai ON penggajian.idPegawai = pegawai.idPegawai 
								JOIN golongan ON pegawai.idgolongan = golongan.idgolongan ORDER BY idPenggajian";
		  			$res = $db->query($sql);
		  			if($res){
		  	?>
		  				<a href="form-tambahpenggajian.php"><button>Tambah Data</button></a><br>
		  				<div id="container" style="width: 70%">
							<table class="table table-sm">
							  <thead>
							    <tr>
							      <th scope="col">ID Penggajian</th>
							      <th scope="col">ID Pegawai</th>
							      <th scope="col">Nama Pegawai</th>
							      <th scope="col">Golongan</th>
							      <th scope="col">Tanggal Penggajian</th>
							      <th scope="col">Gaji Pokok</th>
							      <th scope="col">Total Gaji</th>
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
							    	<td><?php echo $baris["idPenggajian"];?></td>
							    	<td><?php echo $baris["idPegawai"];?></td>
							    	<td><?php echo $baris["nama"];?></td>
							    	<td><?php echo $baris["namaGolongan"];?></td>
							    	<td><?php echo $baris["tanggal"];?></td>
							    	<td><?php echo $baris["gajiPokok"];?></td>
							    	<td><?php echo $baris["totalGaji"];?></td>
							    	<td><a href="form-editpenggajian.php?idPenggajian=<?php 
echo $baris["idPenggajian"];?>"><button>Edit</button></a> <a href="penggajian-konfirmasi-hapus.php?idPenggajian=<?php echo $baris["idPenggajian"];?>"><button>Hapus</button></a></td>
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