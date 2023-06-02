<?php
    require '../include/db_connect.php';

    if(isset($_POST["recommend"])){
        $_SESSION["recommend"] = true;

        $phones = query("SELECT * FROM phone 
                JOIN price ON phone.price_id=price.price_id 
                JOIN ram ON phone.ram_id=ram.ram_id 
                JOIN memory ON phone.memory_id=memory.memory_id 
                JOIN processor ON phone.processor_id=processor.processor_id 
                JOIN battery ON phone.battery_id=battery.battery_id 
                JOIN front_camera ON phone.front_camera_id=front_camera.front_camera_id
                JOIN back_camera ON phone.back_camera_id=back_camera.back_camera_id
                ");

        // usage filter
        $usage = $_POST["usage"];
        if($_POST["usage"] === "study" || $_POST["usage"] === "game"){
            $minRamFilter = 4;
            $minBatteryFilter = 4000;
        } else if($_POST["usage"] === "work"){
            $minRamFilter = 6;
            $minBatteryFilter = 5000;
        } else if($_POST["usage"] === "content"){
            $minRamFilter = 4;
            $minBatteryFilter = 5000;
        } else{
            $minRamFilter = 0;
            $minBatteryFilter = 0;
        }

        // min max bobot
        $minPriceBobot = query("SELECT MIN(price.price_bobot) as 'min_price' FROM phone JOIN price ON phone.price_id=price.price_id");
        $maxRamBobot = query("SELECT MAX(ram.ram_bobot) as 'max_ram' FROM phone JOIN ram ON phone.ram_id=ram.ram_id");
        $maxMemoryBobot = query("SELECT MAX(memory.memory_bobot) as 'max_memory' FROM phone JOIN memory ON phone.memory_id=memory.memory_id");
        $maxProcessorBobot = query("SELECT MAX(processor.processor_bobot) as 'max_processor' FROM phone JOIN processor ON phone.processor_id=processor.processor_id");
        $maxBatteryBobot = query("SELECT MAX(battery.battery_bobot) as 'max_battery' FROM phone JOIN battery ON phone.battery_id=battery.battery_id");
        $maxFrontCamBobot = query("SELECT MAX(front_camera.front_camera_bobot) as 'max_front_cam' FROM phone JOIN front_camera ON phone.front_camera_id=front_camera.front_camera_id");
        $maxBackCamBobot = query("SELECT MAX(back_camera.back_camera_bobot) as 'max_back_cam' FROM phone JOIN back_camera ON phone.back_camera_id=back_camera.back_camera_id");

        // saw
        // nilai bobot kriteria
        // $w_price = $_POST["w_price"];
        // $w_ram = $_POST["w_ram"];
        // $w_memory = $_POST["w_memory"];
        // $w_processor = $_POST["w_processor"];
        // $w_battery = $_POST["w_battery"];
        // $w_front_cam = $_POST["w_front_camera"];
        // $w_back_cam = $_POST["w_back_camera"];
        $usage = $_POST["usage"];

        $w = [
            $_POST["w_price"],
            $_POST["w_ram"],
            $_POST["w_memory"],
            $_POST["w_processor"],
            $_POST["w_battery"],
            $_POST["w_front_camera"],
            $_POST["w_back_camera"] 
        ];

        // var_dump($w);

        foreach($phones as $key => $phone){
            // var_dump($phones);

            // normalisasi
            $r_price = intval($phone["price_bobot"])/intval($minPriceBobot[0]["min_price"]);
            $r_ram = intval($maxRamBobot[0]["max_ram"])/intval($phone["ram_bobot"]);
            $r_memory = intval($maxMemoryBobot[0]["max_memory"])/intval($phone["memory_bobot"]);
            $r_processor = intval($maxProcessorBobot[0]["max_processor"])/intval($phone["processor_bobot"]);
            $r_battery = intval($maxBatteryBobot[0]["max_battery"])/intval($phone["battery_bobot"]);
            $r_front_cam = intval($maxFrontCamBobot[0]["max_front_cam"])/intval($phone["front_camera_bobot"]);
            $r_back_cam = intval($maxBackCamBobot[0]["max_back_cam"])/intval($phone["back_camera_bobot"]);
        
            // nilai preferensi (v)
            $v_price = $w[0] * $r_price;
            $v_ram = $w[1] * $r_ram;
            $v_memory = $w[2] * $r_memory;
            $v_processor = $w[3] * $r_processor;
            $v_battery = $w[4] * $r_battery;
            $v_front_cam = $w[5] * $r_front_cam;
            $v_back_cam = $w[6] * $r_back_cam;
            $v_total = $v_price + $v_ram + $v_memory + $v_processor + $v_battery + $v_front_cam + $v_back_cam;
            $v_total = intval($v_total);

            var_dump(array($v_total));
            // var_dump(gettype(array($v_total) ));
            echo "<br>";
        }

        // var_dump(gettype($v_total));
        // var_dump($v_total);
        // var_dump(array($v_total));
        // var_dump($sort_v);

        // var_dump($saw_phones);
        // } // penutup foreach ori

//-------------------------------------------------------------------------------------------------------------------------------------------------

        // wp
        // $w_total = $w[0] + $w[1] + $w[2] + $w[3] + $w[4] + $w[5] + $w[6];
        $w_total = array_sum($w);

        // normalisasi bobot 
        $w = [
            -($w[0]/$w_total), //price
            $w[1]/$w_total, //ram
            $w[2]/$w_total, //memory
            $w[3]/$w_total, //processor
            $w[4]/$w_total, //battery
            $w[5]/$w_total, //front cam
            $w[6]/$w_total  //back cam
        ];

        // var_dump($w);

        foreach($phones as $key => $phone){
            // normalisasi
            // $w_price_wp = -($w_price/$w_total);
            // $w_ram_wp = $w_ram/$w_total;
            // $w_memory_wp = $w_memory/$w_total;
            // $w_processor_wp = $w_processor/$w_total;
            // $w_battery_wp = $w_battery/$w_total;
            // $w_front_cam_wp = $w_front_cam/$w_total;
            // $w_back_cam_wp = $w_back_cam/$w_total;

            // nilai preferensi (s)
            // $s_price = pow(intval($phone["price_bobot"]),$w_price_wp);
            // $s_ram = pow(intval($phone["ram_bobot"]),$w_price_wp);
            // $s_memory = pow(intval($phone["memory_bobot"]),$w_price_wp);
            // $s_processor = pow(intval($phone["processor_bobot"]),$w_price_wp);
            // $s_battery = pow(intval($phone["battery_bobot"]),$w_price_wp);
            // $s_front_cam = pow(intval($phone["front_camera_bobot"]),$w_price_wp);
            // $s_back_cam = pow(intval($phone["back_camera_bobot"]),$w_price_wp);
            // $s_total = $s_price * $s_ram * $s_memory * $s_processor * $s_battery * $s_front_cam * $s_back_cam;
            
            // nilai vektor (v)
            // $v_price_wp = $s_price/$s_total;
            // $v_ram_wp = $s_ram/$s_total;
            // $v_memory_wp = $s_memory/$s_total;
            // $v_processor_wp = $s_processor/$s_total;
            // $v_battery_wp = $s_battery/$s_total;
            // $v_front_cam_wp = $s_front_cam/$s_total;
            // $v_back_cam_wp = $s_back_cam/$s_total;
            // $v_total_wp = $v_price_wp + $v_ram_wp + $v_memory_wp + $v_processor_wp + $v_battery_wp + $v_front_cam_wp + $v_back_cam_wp;

            // $array_s = array($s_total);
            // $sort_s = rsort($array_s);


            // nilai preferensi (s)
            // $s[$key]["phone_id"] = $phone["phone_id"];
            // $s[$key]["phone_name"] = $phone["phone_name"];
            // $s[$key]["phone_price"] = $phone["phone_price"];
            // $s[$key]["phone_img"] = $phone["phone_img"];
            $s[$key]["price"] = pow($phone["price_bobot"],$w[0]);
            $s[$key]["ram"] = pow($phone["ram_bobot"],$w[1]);
            $s[$key]["memory"] = pow($phone["memory_bobot"],$w[2]);
            $s[$key]["processor"] = pow($phone["processor_bobot"],$w[3]);
            $s[$key]["battery"] = pow($phone["battery_bobot"],$w[4]);
            $s[$key]["front_cam"] = pow($phone["front_camera_bobot"],$w[5]);
            $s[$key]["back_cam"] = pow($phone["back_camera_bobot"],$w[6]);


            // var_dump($s[$key]["ram"]);
            // var_dump($s);
            echo "<br>";
        }

        // foreach($s as $key => $value){
        //     $s[$key]["s"] = $value["price"] * $value["ram"] * $value["memory"] * $value["processor"] * $value["battery"] * $value["front_cam"] * $value["back_cam"];
        //     // var_dump($s);
        // }

        // var_dump($s);


        die;

        // header("Location: rec_result.php"); exit;
    }
?>