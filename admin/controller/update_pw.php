<?php
    require '../../include/db_connect.php';

    $id_admin = $_SESSION["user_id"];

    if(isset($_POST["edit_pw"])){
        if(!empty($_POST["old_pw"] || $_POST["new_pw"] || $_POST["confirm_new_pw"])){
            if(ganti_password($_POST) > 0){
                header("Location: admin_list.php");
            } else{
                echo "
                    <script>
                        alert('Password gagal diubah!');
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
       $page = $_GET["page"];

       if($page === "homepage"){
            header("Location: ../");
       } else if($page === "adminlist"){
            header("Location: admin_list.php");
       }
    }

    function ganti_password($data){
        global $conn;
        global $id_admin;

        $old_pw = $data["old_pw"];
        $new_pw = $data["new_pw"];
        $confirm_new_pw = $data["confirm_new_pw"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id_admin");

        $row = mysqli_fetch_assoc($result);

        if(password_verify($old_pw, $row["password"])){
            if($new_pw == $confirm_new_pw){
                $new_pw = password_hash($new_pw, PASSWORD_DEFAULT);
            } else{
                echo "
						<script>
							alert('Password tidak sama!');
						</script>
				";
				return false;
            }
        }

        mysqli_query($conn, "UPDATE user SET password = '$new_pw' WHERE user_id = $id_admin");

        return mysqli_affected_rows($conn);
    }
?>