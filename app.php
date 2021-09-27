<?php
    $myfile = fopen("data.json", "r") or die("Unable to open file!");
    $jsonobj = fread($myfile, filesize("data.json"));
    # echo $jsonobj;

    $data_as_php = json_decode($jsonobj);
    $res_str = "";

    foreach($data_as_php as $key => $value) {
        # echo $key . " => " . $value . "<br>";
        $res_str .= $key . " has visited " . $value . " times.<br>";
    }

    echo $res_str;
    fclose($myfile);

    # $new_entry = json_encode(array("Felix"=>9));
    # $new_entry = json_encode($data_as_php->append("Felix:9"));
    # echo $new_entry;

    # $myfile2 = fopen("data.json", "a") or die("Unable to open file!");
    # fwrite($myfile2, $new_entry);
    # fclose($myfile2);

    # {"Elisabeth":10,"David":12,"Axel":4, "Sebastian":2}
?>