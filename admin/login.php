<?php include_once("../functions.php"); ?>
<?php 
	$db = dbConnect();
	if($db->connect_errno == 0){
		if(isset($_POST["tblLogin"])){
			$username = $db->escape_string($_POST['username']);
			$pass = $db->escape_string($_POST['psw']);
			$sql = "SELECT username, nama FROM admin
					WHERE username = '$username' AND Pass = '$pass'";
			$res = $db->query($sql);
			if($res){
				if($res->num_rows == 1){
					$data = $res->fetch_assoc();
					session_start();
					$_SESSION["username"] = $data["username"];
					$_SESSION["nama"] = $data["nama"];
					$_SESSION["user_type"] = "admin";
					header("Location: homeAdmin.php");
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