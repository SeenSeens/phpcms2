<?php

// $arr  = array("stt" => "09", "msv" => "2018", "name" => "TuanIT", "khoa" => "2015", "xl" => "12");

// echo "<pre>";
// print_r ($arr);

$arr2 = [
    "STT" => ["09", "08", "07"], 
    "MSV" => ["2018", "2017", "2016"],
    "Name" => ["TuanIT", "Cuong", "Sang"],
    "Khoa" => ["2015", "2016", "2017"],
    "Xep loai" => ["vip", "gà", "sida"],
];
// echo "<pre>";
// print_r ($arr2);


// $arr1 = array("01", "1500", "Tuan", "2018", "10");

// echo "<pre>";
// print_r ($arr1);

// foreach ($arr2 as $key => $value) {
//     if(is_array($value)) {
//         foreach ($value as $values => $item) {
//             echo "<pre>";
//             echo $item;
//         }
//     }
// }

// foreach($arr2 as $value) {
//     echo "<pre>";
//     echo print_r($value);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
    


<table class="table">
    <thead>
        <tr>
        <?php foreach ($arr2 as $key => $value) { ?>
            <th scope="col"><?= $key; ?></th>
        <?php } ?> 
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arr2 as $key => $value) { ?>
            <?php foreach ($value as $values => $item) { ?>
                <td><?= $item;?></td></tr>
            <?php } ?> 
        <?php } ?>
    </tbody>             
</table>




<!-- <table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
                <td>09</td>
                <td>08</td>
                <td>07</td>
            <th scope="col">MSV</th>
                <td>2018</td>
                <td>2017</td>
                <td>2016</td>
            <th scope="col">Name</th>
                <td>TuanIT</td>
                <td>Cuong</td>
                <td>Sang</td>
            <th scope="col">Khoa</th>
                <td>2015</td>
                <td>2016</td>
                <td>2017</td>
            <th scope="col">Xep loai</th>
                <td>vip</td>
                <td>gà</td>
                <td>sida</td>
            </tr>
    </thead>
    
</table>

<tr>
    <th scope="col">STT</th>
</tr>
<tr>
    <td>09</td>
</tr>
<tr>
    <td>08</td>
</tr>
<tr>
    <td>07</td>
</tr> -->

</body>
</html>

ALTER TABLE `comments` ADD FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;