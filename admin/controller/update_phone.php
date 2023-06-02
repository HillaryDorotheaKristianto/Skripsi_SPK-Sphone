<?php
    require '../../include/db_connect.php';

    $phone_id = $_GET["phone_id"];

    $rams = query("SELECT * FROM ram");
    $memories = query("SELECT * FROM memory");
    $processors = query("SELECT * FROM processor");
    $brands = query("SELECT * FROM brand");
    $phone = query("SELECT * FROM phone WHERE phone_id = $phone_id")[0];
    // var_dump($phone);die;

    $halamanAktif = $_GET["p"];

    if(isset($_POST["edit_phone"])){
        if(ubah_phone($_POST) > 0){
            header("Location: ../?p=$halamanAktif");
            exit;
        } else{
            echo mysqli_error($conn);
            header("Location: ../?p=$halamanAktif");
        }
    } else if(isset($_POST["cancel"])){
        header("Location: ../?p=$halamanAktif");
        exit;
    }

    function ubah_phone($data){
        global $conn;
        global $phone_id;

        $user_id = $_SESSION['user_id'];

        $phone_brand = $data["phone_brand"];
        $phone_name = $data["phone_name"];
        $phone_release_year = $data["phone_release_year"];
        $phone_price = $data["phone_price"];
        $phone_ram = $data["phone_ram"];
        $phone_memory = $data["phone_memory"];
        $phone_processor = $data["phone_processor"];
        $phone_battery = $data["phone_battery"];
        $phone_front_camera = $data["phone_front_camera"];
        $phone_back_camera = $data["phone_back_camera"];

        // cek apakah user pilih gambar baru atau tidak
        $old_img = $data["old_phone_img"];
        if($_FILES["new_phone_img"] ["error"] === 4){
            $phone_img =  $old_img;
        } else{
            $phone_img = upload();
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
        $back_cameras = query("SELECT * FROM back_camera");
        // var_dump($phone_back_camera);
        for($bc=0; $bc<count($back_cameras); $bc++){
            if($phone_back_camera >= $back_cameras[$bc]["min_back_camera_quality_range"] && $phone_back_camera <= $back_cameras[$bc]["max_back_camera_quality_range"]){
                $phone_back_camera_id = $back_cameras[$bc]["back_camera_id"];
                // var_dump($phone_back_camera_id);
            }
        }

        $query_update = "UPDATE phone SET
                            price_id = $phone_price_id,
                            ram_id = $phone_ram,
                            memory_id = $phone_memory,
                            processor_id = $phone_processor,
                            battery_id = $phone_battery_id,
                            front_camera_id = $phone_front_camera_id,
                            back_camera_id = $phone_back_camera_id,
                            brand_id = $phone_brand,
                            phone_name = '$phone_name',
                            phone_release_year = '$phone_release_year',
                            phone_price = $phone_price,
                            phone_battery = $phone_battery,
                            phone_front_camera = $phone_front_camera,
                            phone_back_camera = $phone_back_camera,
                            phone_img = '$phone_img',
                            edit_by = $user_id

                            WHERE phone_id = $phone_id;
                        ";

        // var_dump($phone_img);die;

        mysqli_query($conn, $query_update);
        return mysqli_affected_rows($conn);
    }

    function upload(){
        $fileName = $_FILES['new_phone_img']['name'];
        $tmpName = $_FILES['new_phone_img']['tmp_name'];

        // cek apakah yg diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // var_dump($ekstensiGambar); die;
        
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

        return $newFileName;
    }
?>