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
	<title>Form Tambah Penggajian</title>
</head>
<body>
	<?php navbarAdmin(); ?>
	<div class="w3-container">
	<h3>Tambah Penggajian</h3>
		<form action="penggajian-tambah.php" method="post">
			<div class="row-mb-3">
				<div class="col-sm-1">
					  <label for="exampleFormControlInput1" class="form-label">ID Penggajian</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="idPenggajian" maxlength="4" required>
				</div>
			</div>
			<div class="row-mb-3">
				<div class="col-md-2">
			      <label for="inputState">Pegawai</label>
			      <select id="inputState" class="form-control" name="idPegawai" required>
			        <option>--Pilih Pegawai--</option>
			        	<?php
							$datapegawai=getListPegawai();
							foreach($datapegawai as $data){
								echo "<option value=\"".$data["idPegawai"]."\">".$data["nama"]."</option>";
							}
						?>
			      </select>
			    </div>
			</div>
			<div class="row-mb-3">
				<div class="col-md-2">
			      <label for="inputState">Tanggal</label>  
					<input type="text" class="form-control" id="datepicker" name="tanggal">
					<script>
					$("#datepicker").datepicker({
					  dateFormat : "yy-mm-dd",
					  dayNamesMin: [ "Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab" ],
					  monthNames:[ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ]
					  
					});
					</script>
			    </div>
			</div>
			<div class="row-mb-3">
				<div class="col-sm-2">
					  <label for="exampleFormControlInput1" class="form-label">Total Gaji</label>
					  <input type="text" class="form-control" id="exampleFormControlInput1" name="gaji" required>
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
		</form>
	</div>
</body>
</html>