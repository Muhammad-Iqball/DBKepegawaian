<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","dbkepegawaian");
	return $db;
}

function getListGolongan(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * 
						 FROM golongan
						 ORDER BY idgolongan");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getListPegawai(){
	$db=dbConnect();
		if($db->connect_errno==0){
			$res=$db->query("SELECT * 
							 FROM pegawai
							 ORDER BY idPegawai");
			if($res){
				$data=$res->fetch_all(MYSQLI_ASSOC);
				$res->free();
				return $data;
			}
			else
				return FALSE; 
		}
		else
			return FALSE;
}

function getDataPegawai($id){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM pegawai 
								JOIN golongan ON pegawai.idgolongan = golongan.idgolongan
								WHERE idPegawai = '$id'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataPenggajian($id){
$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM penggajian 
								JOIN pegawai ON penggajian.idPegawai = pegawai.idPegawai 
								JOIN golongan ON pegawai.idgolongan = golongan.idgolongan
								WHERE idPenggajian = '$id'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function navbarPegawai(){
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="homepegawai.php">Home <span class="sr-only"></span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="riwayat-gaji.php">Riwayat Gaji</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="logout.php">Logout</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<?php
}

function navbarAdmin(){
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="homeAdmin.php">Home <span class="sr-only"></span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="data-pegawai.php">Data Pegawai</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="data-penggajian.php">Data Penggajian</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="data-golongan.php">Data Golongan</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../logout.php">Logout</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<?php
}

function isAdmin(){
	if(isset($_SESSION['username']) && $_SESSION['user_type'] == "admin"){
		return true;
	}
	else
		return false;
}