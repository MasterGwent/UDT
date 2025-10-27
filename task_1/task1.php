<?php
#1
$json = file_get_contents('mock_data.json');
$data = json_decode($json, true);
#2
foreach ($data['users'] as $user) {
    echo $user['NAME']."\n" . "-" . $user['EMAIL']."\n";
}
#3
foreach ($data['deals'] as $d) {
    if($d["STATUS"] == "WON" || $d["STATUS"] == "LOSE"){
        echo $d["ID"]."\n" . "-" . $d["TITLE"]."\n" . "-" . $d["STATUS"]."\n" . "-" . $d["AMOUNT"]."\n";
    }
}