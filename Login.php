<?php include_once("functions.php"); ?>
<?php 
	$db = dbConnect();
	if($db->connect_errno == 0){
		if(isset($_POST["tblLogin"])){
			$id = $db->escape_string($_POST['id']);
			$pass = $db->escape_string($_POST['psw']);
			$sql = "SELECT idPegawai, nama FROM pegawai
					WHERE idPegawai = '$id' AND Pass = '$pass'";
			$res = $db->query($sql);
			if($res){
				if($res->num_rows == 1){
					$data = $res->fetch_assoc();
					session_start();
					$_SESSION["idPegawai"] = $data["idPegawai"];
					$_SESSION["nama"] = $data["nama"];
					$_SESSION["user_type"] = "pegawai";
					header("Location: homepegawai.php");
				}
				else
					// ID Pass Salah
					header("Location: index.php?error=3");
			}
		}
		else
			// Pencet tombol
			header("Location: index.php?error=2");
	}
	else
		// Koneksi Gagal.
		header("Location: index.php?error=1");
?>