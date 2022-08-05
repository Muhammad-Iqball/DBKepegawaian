<?php
	session_start();
	if(!isset($_SESSION["idPegawai"])) // Access Denied
		header("Location: index.php?error=4");
?> 
<?php include_once("functions.php"); ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Riwayat Penggajian Pegawai</title>
</head>
<body>
	<div class="w3-container">
		<?php navbarPegawai();?>
		<h2>Riwayat Penggajian</h2><br>
		  <?php 
		  		$db = dbConnect();
		  		if($db->connect_errno == 0){
		  			$id = $_SESSION['idPegawai'];
		  			$sql = "SELECT * FROM penggajian 
				  			JOIN pegawai ON penggajian.idPegawai = pegawai.idPegawai 
				  			JOIN golongan ON pegawai.idgolongan = golongan.idgolongan
				  			WHERE penggajian.idPegawai = '$id'";
		  			$res = $db->query($sql);
		  			if($res){
		  	?>
		  				<div id="container" style="width: 60%">
							<table class="table table-sm">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Penerima</th>
							      <th scope="col">Tanggal Diterima</th>
							      <th scope="col">Gaji Pokok</th>
							      <th scope="col">Gaji Diterima</th>
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
							    	<td><?php echo $baris["nama"];?></td>
							    	<td><?php echo $baris["tanggal"];?></td>
							    	<td><?php echo $baris["gajiPokok"];?></td>
							    	<td><?php echo $baris["totalGaji"];?></td>
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