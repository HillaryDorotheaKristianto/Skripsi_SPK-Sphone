<?php
    require '../../include/db_connect.php';

    if(isset($_POST["add_admin"])){
        if(!empty($_POST["name"] || $_POST["username"] || $_POST["password"])){
            if(tambah_admin($_POST) > 0){
                header("Location: admin_list.php");
            } else{
                echo "
                    <script>
                        alert('Data Admin Baru Gagal Ditambahkan!');
                    </script>
                ";
                // echo mysqli_error($conn);
            }
        } else{
            echo "
                <script>
                    alert('Field tidak boleh kosong!');
                </script>
            ";
        }
    }else if(isset($_POST["cancel"])){
       header("Location: admin_list.php");
    }

    function tambah_admin($data){
        global $conn;

        $nama_admin = stripslashes($data["name"]);
        $username = stripslashes($data["username"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);

        // cek username udah ada atau belum
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
		if(mysqli_fetch_assoc($result)){
			echo "<script>
					alert('Username sudah terdaftar');
				 </script>";
			return false;
		}

        // var_dump($nama_admin); var_dump($username); var_dump($password);

        // enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

        // var_dump($password); die;

        // tambah data admin ke database
        $insert_admin = mysqli_query($conn, "INSERT INTO user VALUES('','$nama_admin', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
?>