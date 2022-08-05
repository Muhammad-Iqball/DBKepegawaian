<?php include_once("../functions.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Form Tambah Pegawai</title>
</head>
<body>
	<?php navbarAdmin(); ?>
	<div class="w3-container">
	<h3>Tambah Pegawai</h3>
		<form action="pegawai-tambah.php" method="post">
			<div class="row-mb-3">
				<div class="col-sm-1">
					  <label for="exampleFormControlInput1" class="form-label">ID Pegawai</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="id" maxlength="4" required>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Nama Pegawai</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" required>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-md-2">
			      <label for="inputState">Golongan</label>
			      <select id="inputState" class="form-control" name="idGolongan" required>
			        <option>--Pilih Golongan--</option>
			        	<?php
							$datagolongan=getListGolongan();
							foreach($datagolongan as $data){
								echo "<option value=\"".$data["idgolongan"]."\">".$data["namaGolongan"]."</option>";
							}
						?>
			      </select>
			    </div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="notelp" required>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-3">
				  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
				  <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="alamat" required></textarea>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Password</label>
					  <input type="password" class="form-control" id="exampleFormControlInput1" name="pass" required>
				</div><br>
			<button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
		</form>
	</div>
</body>
</html>