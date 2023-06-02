<?php
    require '../../include/db_connect.php';

    $rams = query("SELECT * FROM ram");
    $memories = query("SELECT * FROM memory");
    $processors = query("SELECT * FROM processor");
    $brands = query("SELECT * FROM brand");

    if(isset($_POST["add_phone"])){
        if(!empty($_FILES["phone_img"] || $_POST["phone_name"] || $_POST["phone_price"] || $_POST["phone_ram"] || $_POST["phone_memory"] || $_POST["phone_processor"] || $_POST["phone_battery"] || $_POST["phone_front_camera"] || $_POST["phone_back_camera"])){
            if(tambah_phone($_POST) > 0){
                header("Location: ../");
                exit;
            } else{
                echo "
                   <script>
                       alert('Data Smartphone Baru Gagal Ditambahkan!');
                    </script>
                ";
            }
        } else{
            echo mysqli_error($conn);
        }
    } else if(isset($_POST["cancel"])){
        header("Location: ../");
        exit;
    }

    function tambah_phone($data){
        global $conn;

        $user_id = $_SESSION['user_id'];

        $phone_name = stripslashes($data["phone_name"]);
        $phone_release_year = stripslashes($data["phone_release_year"]);
        $phone_brand = stripslashes($data["phone_brand"]);
        $phone_price = stripslashes($data["phone_price"]);
        $phone_ram = stripslashes($data["phone_ram"]);
        $phone_memory = stripslashes($data["phone_memory"]);
        $phone_processor = stripslashes($data["phone_processor"]);
        $phone_battery = stripslashes($data["phone_battery"]);
        $phone_front_camera = stripslashes($data["phone_front_camera"]);
        $phone_back_camera = stripslashes($data["phone_back_camera"]);

        //gambar smartphone
        $phone_img = img_upload();

        if(!$phone_img){
            return false;
        }

        //mengambil price id
        $prices = query("SELECT * FROM price");
        for($p=0; $p<count($prices); $p++){
            // var_dump($prices[$i]["min_price_range"]);
            if($phone_price >= $prices[$p]["min_price_range"] && $phone_price <= $prices[$p]["max_price_range"]){
                $phone_price_id = $prices[$p]["price_id"];
                // var_dump($phone_price_id);
            }
        }

        //mengambil battery id
        $batteries = query("SELECT * FROM battery");
        // var_dump($phone_battery);
        for($b=0; $b<count($batteries); $b++){
            if($phone_battery >= $batteries[$b]["min_battery_capacity_range"] && $phone_battery <= $batteries[$b]["max_battery_capacity_range"]){
                $phone_battery_id = $batteries[$b]["battery_id"];
                // var_dump($phone_battery_id);
            }
        }

        //mengambil front camera id
        $front_cameras = query("SELECT * FROM front_camera");
        // var_dump($phone_front_camera);
        for($fc=0; $fc<count($front_cameras); $fc++){
            if($phone_front_camera >= $front_cameras[$fc]["min_front_camera_quality_range"] && $phone_front_camera <= $front_cameras[$fc]["max_front_camera_quality_range"]){
                $phone_front_camera_id = $front_cameras[$fc]["front_camera_id"];
                // var_dump($phone_front_camera_id);
            }
        }

        //mengambil back camera id
        // var_dump($phone_back_camera);
        $back_cameras = query("SELECT * FROM back_camera");
        for($bc=0; $bc<count($back_cameras); $bc++){
            if($phone_back_camera >= $back_cameras[$bc]["min_back_camera_quality_range"] && $phone_back_camera <= $back_cameras[$bc]["max_back_camera_quality_range"]){
                $phone_back_camera_id = $back_cameras[$bc]["back_camera_id"];
                // var_dump($phone_back_camera_id);
            }
        }

        //cek apakah data smartphone udah ada atau belum
        $result = mysqli_query($conn, "SELECT * FROM phone WHERE phone_name = '$phone_name' AND ram_id = '$phone_ram' AND memory_id = '$phone_memory' AND processor_id = '$phone_processor' AND phone_battery = '$phone_battery' AND phone_front_camera = '$phone_front_camera' AND phone_back_camera = '$phone_back_camera'");
        // var_dump($result);die;

        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('Data smartphone sudah ada');
                 </script>";
            return false;
        }

        // die;


        mysqli_query($conn, "INSERT INTO phone VALUES('', '$phone_price_id', '$phone_ram', '$phone_memory', '$phone_processor', '$phone_battery_id', '$phone_front_camera_id', '$phone_back_camera_id', '$phone_brand', '$phone_name', '$phone_release_year', '$phone_price', '$phone_battery', '$phone_front_camera', '$phone_back_camera', '$phone_img', '$user_id', '')");

        // var_dump($result);die;
        return mysqli_affected_rows($conn);
    }

    function img_upload(){
        $fileName = $_FILES['phone_img']['name'];
        $tmpName = $_FILES['phone_img']['tmp_name'];
        $error = $_FILES['phone_img']['error'];

        // cek apakah yg diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // cek apakah tidak ada gambar yg diuplaod
        if($error === 4){
            $newFileName = "default.png";
        } else{
            if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
                echo "
                        <script>
                            alert('Yang diupload bukan gambar!');
                        </script>
                    ";
                return false;
            }

            // lolos pengecekan, gambar siap diupload
            // generate nama gambar baru
            $newFileName = uniqid();
            $newFileName .= '.';
            $newFileName .= $ekstensiGambar;
            move_uploaded_file($tmpName, '../../assets/phones/'.$newFileName);
        }

        return $newFileName;
    }
?>