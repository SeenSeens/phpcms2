<?php

$quanlixe = [
    'xe may'=>['2','2','200'],
    'oto'   =>['4','6','500'],
    'xe khach'=>['8','24','1000']
];
echo "<pre>";
print_r($quanlixe);
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
    <tr>
        <td>ten xe</td>
        <td>so banh</td>
        <td>so nguoi cho duoc</td>
        <td>trong luong xe</td>
    </tr>
    <?php
        foreach($quanlixe as $tenXe => $thongTinXe){
           echo '<tr>';
           echo  '<td>'.$tenXe .'</td>'; 
           foreach($thongTinXe as $key=>$val){
            echo  '<td>'.$val.'</td>'; 
           }
           echo '</tr>';
        }
        ?>
    <!-- <tr>
        <td>xe may</td>
        <td>2</td>
        <td>2</td>
        <td>200</td>
    </tr> -->
   
    </table>
</body>
</html>
