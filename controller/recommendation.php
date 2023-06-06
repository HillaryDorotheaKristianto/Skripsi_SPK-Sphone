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
        if($_POST["usage"] === "study"){
            $minRamFilter = 4;
            $minBatteryFilter = 4000;
            $minFrontCamFilter = 5;
        } else if($_POST["usage"] === "work"){
            $minRamFilter = 6;
            $minBatteryFilter = 5000;
            $minFrontCamFilter = 0;
        } else if($_POST["usage"] === "content"){
            $minRamFilter = 4;
            $minBatteryFilter = 5000;
            $minFrontCamFilter = 0;
        } else if($_POST["usage"] === "game"){
            $minRamFilter = 4;
            $minBatteryFilter = 4000;
            $minFrontCamFilter = 0;
        } else{
            $minRamFilter = 0;
            $minBatteryFilter = 0;
            $minFrontCamFilter = 0;
        }

        $phones = query("SELECT * FROM phone 
                        JOIN price ON phone.price_id=price.price_id 
                        JOIN ram ON phone.ram_id=ram.ram_id 
                        JOIN memory ON phone.memory_id=memory.memory_id 
                        JOIN processor ON phone.processor_id=processor.processor_id 
                        JOIN battery ON phone.battery_id=battery.battery_id 
                        JOIN front_camera ON phone.front_camera_id=front_camera.front_camera_id
                        JOIN back_camera ON phone.back_camera_id=back_camera.back_camera_id
                        WHERE ram.ram_capacity >= $minRamFilter AND phone.phone_battery >= $minBatteryFilter AND phone.phone_front_camera >= $minFrontCamFilter
                        ");

        // var_dump($phones);

        // min max bobot
        $minPriceBobot = query("SELECT MIN(price.price_bobot) as 'min_price' FROM phone JOIN price ON phone.price_id=price.price_id");
        $maxRamBobot = query("SELECT MAX(ram.ram_bobot) as 'max_ram' FROM phone JOIN ram ON phone.ram_id=ram.ram_id");
        $maxMemoryBobot = query("SELECT MAX(memory.memory_bobot) as 'max_memory' FROM phone JOIN memory ON phone.memory_id=memory.memory_id");
        $maxProcessorBobot = query("SELECT MAX(processor.processor_bobot) as 'max_processor' FROM phone JOIN processor ON phone.processor_id=processor.processor_id");
        $maxBatteryBobot = query("SELECT MAX(battery.battery_bobot) as 'max_battery' FROM phone JOIN battery ON phone.battery_id=battery.battery_id");
        $maxFrontCamBobot = query("SELECT MAX(front_camera.front_camera_bobot) as 'max_front_cam' FROM phone JOIN front_camera ON phone.front_camera_id=front_camera.front_camera_id");
        $maxBackCamBobot = query("SELECT MAX(back_camera.back_camera_bobot) as 'max_back_cam' FROM phone JOIN back_camera ON phone.back_camera_id=back_camera.back_camera_id");

        // var_dump($minPriceBobot);
        // var_dump($maxRamBobot);
        // var_dump($maxMemoryBobot);
        // var_dump($maxProcessorBobot);
        // var_dump($maxBatteryBobot);
        // var_dump($maxFrontCamBobot);
        // var_dump($maxBackCamBobot);

        // saw
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

        // normalisasi
        foreach($phones as $key => $phone){
            $r[$key]["phone_id"] = $phone["phone_id"];
            $r[$key]["phone_name"] = $phone["phone_name"];
            $r[$key]["phone_ram"] = $phone["ram_capacity"];
            $r[$key]["phone_memory"] = $phone["memory_capacity"];
            $r[$key]["phone_img"] = $phone["phone_img"];
            $r[$key]["price"] = $minPriceBobot[0]["min_price"]/$phone["price_bobot"];
            $r[$key]["ram"] = $phone["ram_bobot"]/$maxRamBobot[0]["max_ram"];
            $r[$key]["memory"] = $phone["memory_bobot"]/$maxMemoryBobot[0]["max_memory"];
            $r[$key]["processor"] = $phone["processor_bobot"]/$maxProcessorBobot[0]["max_processor"];
            $r[$key]["battery"] = $phone["battery_bobot"]/$maxBatteryBobot[0]["max_battery"];
            $r[$key]["front_cam"] = $phone["front_camera_bobot"]/$maxFrontCamBobot[0]["max_front_cam"];
            $r[$key]["back_cam"] = $phone["back_camera_bobot"]/$maxBackCamBobot[0]["max_back_cam"];

            // var_dump($r);
        }

        // nilai preferensi (v)
        foreach($r as $key => $r_saw){
            $v[$key]["phone_id"] = $r_saw["phone_id"];
            $v[$key]["phone_name"] = $r_saw["phone_name"];
            $v[$key]["phone_ram"] = $r_saw["phone_ram"];
            $v[$key]["phone_memory"] = $r_saw["phone_memory"];
            $v[$key]["phone_img"] = $r_saw["phone_img"];
            $v[$key]["price"] = $w[0] * $r_saw["price"];
            $v[$key]["ram"] = $w[1] * $r_saw["ram"];
            $v[$key]["memory"] = $w[2] * $r_saw["memory"];
            $v[$key]["processor"] = $w[3] * $r_saw["processor"];
            $v[$key]["battery"] = $w[4] * $r_saw["battery"];
            $v[$key]["front_cam"] = $w[5] * $r_saw["front_cam"];
            $v[$key]["back_cam"] = $w[6] * $r_saw["back_cam"];
            $v[$key]["v"] = $v[$key]["price"] + $v[$key]["ram"] + $v[$key]["memory"] + $v[$key]["processor"] + $v[$key]["battery"] + $v[$key]["front_cam"] + $v[$key]["back_cam"];

            // var_dump($v);
        }

        // merging $v datas into array
        $v_total = array();
        foreach($v as $k => $val){
            $v_total[] = array_merge($v_total, $v);

            // var_dump($v_total);
        }

        $counter = 0;
        foreach($v_total as $v_saw){
            // get first iteration of $v_total[] foreach loop
            if($counter == 0){
                $saw_phones = $v_saw;

                // var_dump($saw_phones);
            }
            $counter++;
        }

        // sorting
        foreach($saw_phones as $key => $value){
            $sort["v"][$key] = $value["v"];

            // var_dump($sort["v"][$key]);
        }

        array_multisort($sort["v"], SORT_DESC, $saw_phones);

        // var_dump($sort["v"]);

        $result['saw_phones_5'] = array_slice($saw_phones, 0, 5);
        $result['saw_phones_10'] = array_slice($saw_phones, 5, 10);
        $result['saw_phones_all'] = array_slice($saw_phones, 0, count($phones));

        var_dump($result['saw_phones_all']);

        $_SESSION["saw_phones_5"] = $result['saw_phones_5'];
        $_SESSION["saw_phones_10"] = $result['saw_phones_10'];

//-------------------------------------------------------------------------------------------------------------------------------------------------

        // wp
        $w_total = array_sum($w);

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

        // nilai preferensi (s)
        foreach($phones as $key => $phone){
            $s[$key]["phone_id"] = $phone["phone_id"];
            $s[$key]["phone_name"] = $phone["phone_name"];
            $s[$key]["phone_ram"] = $phone["ram_capacity"];
            $s[$key]["phone_memory"] = $phone["memory_capacity"];
            $s[$key]["phone_img"] = $phone["phone_img"];
            $s[$key]["price"] = pow($phone["price_bobot"],$w[0]);
            $s[$key]["ram"] = pow($phone["ram_bobot"],$w[1]);
            $s[$key]["memory"] = pow($phone["memory_bobot"],$w[2]);
            $s[$key]["processor"] = pow($phone["processor_bobot"],$w[3]);
            $s[$key]["battery"] = pow($phone["battery_bobot"],$w[4]);
            $s[$key]["front_cam"] = pow($phone["front_camera_bobot"],$w[5]);
            $s[$key]["back_cam"] = pow($phone["back_camera_bobot"],$w[6]);
            $s[$key]["s_product"] = $s[$key]["price"] * $s[$key]["ram"] * $s[$key]["memory"] * $s[$key]["processor"] * $s[$key]["battery"] * $s[$key]["front_cam"] * $s[$key]["back_cam"];

            // var_dump($s[$key]["s_product"]);
        }

        $s_array = [];
        for($i=0; $i<count($phones); $i++){
            array_push($s_array, $s[$i]["s_product"]);
        }

        $s_total = array_sum($s_array);
        // var_dump($s_total);

        // nilai vektor (v)
        foreach($s as $key => $s_wp){
            $v_wp[$key]["phone_id"] = $s_wp["phone_id"];
            $v_wp[$key]["phone_name"] = $s_wp["phone_name"];
            $v_wp[$key]["phone_ram"] = $s_wp["phone_ram"];
            $v_wp[$key]["phone_memory"] = $s_wp["phone_memory"];
            $v_wp[$key]["phone_img"] = $s_wp["phone_img"];
            $v_wp[$key]["v_wp"] = $s_wp["s_product"]/$s_total;
        
            // var_dump($v_wp[$key]["v_wp"]);
        }
        
        // merging $v datas into array
        $v_total_wp = array();
        foreach($v_wp as $k => $val){
            $v_total_wp[] = array_merge($v_total_wp, $v_wp);

            // var_dump($v_total_wp);
        }

        $counter_wp = 0;
        foreach($v_total_wp as $vWp){
            // get first iteration of $v_total[] foreach loop
            if($counter_wp == 0){
                $wp_phones = $vWp;

                // var_dump($wp_phones);
            }
            $counter_wp++;
        }

        // sorting
        foreach($wp_phones as $key => $value){
            $sort_wp["v_wp"][$key] = $value["v_wp"];
        }

        array_multisort($sort_wp["v_wp"], SORT_DESC, $wp_phones);

        // var_dump($sort_wp["v_wp"]);

        $result['wp_phones_5'] = array_slice($wp_phones, 0, 5);
        $result['wp_phones_10'] = array_slice($wp_phones, 5, 10);
        $result['wp_phones_all'] = array_slice($wp_phones, 0, count($phones));

        var_dump($result['wp_phones_all']);

        $_SESSION["wp_phones_5"] = $result['wp_phones_5'];
        $_SESSION["wp_phones_10"] = $result['wp_phones_10'];

//-------------------------------------------------------------------------------------------------------------------------------------------------

        // saw wp
        $counter_saw_wp = 0;
        foreach($v as $key => $value){
            foreach($v_wp as $k => $val){
                $v_saw_wp[$k]["phone_id"] = $val["phone_id"];
                $v_saw_wp[$k]["phone_name"] = $val["phone_name"];
                $v_saw_wp[$k]["phone_ram"] = $val["phone_ram"];
                $v_saw_wp[$k]["phone_memory"] = $val["phone_memory"];
                $v_saw_wp[$k]["phone_img"] = $val["phone_img"];
                $v_saw_wp[$k]["v_saw"] = $value ["v"];
                $v_saw_wp[$k]["v_wp"] = $val["v_wp"];
                $v_saw_wp[$k]["v_saw_wp"] = (($value["v"] + $val["v_wp"])/2);
            }

            $v_avg_saw_wp[] = array_merge(array(), $v_saw_wp[$counter_saw_wp]);

            $counter_saw_wp++;
        }

        // sorting
        foreach($v_avg_saw_wp as $key => $value){
            $sort_saw_wp["v_saw_wp"][$key] = $value["v_saw_wp"];
        }

        array_multisort($sort_saw_wp["v_saw_wp"], SORT_DESC, $v_avg_saw_wp);

        // var_dump($sort_saw_wp["v_saw_wp"]);

        $result["saw_wp_phones_5"] = array_slice($v_avg_saw_wp, 0, 5);
        $result['saw_wp_phones_10'] = array_slice($v_avg_saw_wp, 5, 10);
        $result['saw_wp_phones_all'] = array_slice($v_avg_saw_wp, 0, count($phones));

        var_dump($result['saw_wp_phones_all']);

        $_SESSION["saw_wp_phones_5"] = $result["saw_wp_phones_5"];
        $_SESSION["saw_wp_phones_10"] = $result["saw_wp_phones_10"];


        die;

        header("Location: rec_result.php"); exit;
    }
?>