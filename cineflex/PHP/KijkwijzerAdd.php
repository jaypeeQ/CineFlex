<?php
use CineFlex\Classes\Database\DatabaseClass;
include "..\Classes\DatabaseClass.php";

echo '</pre> POST', print_r($_POST), '</pre>';
echo '<br>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '<br>';
echo '</pre> GET', print_r($_GET), '</pre>';
echo '<br>';
echo '</pre> FILES', print_r($_FILES), '</pre>';
echo '<br>';

$db = new DatabaseClass();
$x = 0;
$count = $_POST['instance'] + 1;

while($x > $count){

    $name = $_POST['kijkwijzer'][$x];
    $photo = file_get_contents($_FILES['file_up'][$x]['tmp_name']); // reading binary data
    echo $name;
//Insert Poster BLOB image file and image name in posters table.
    $id = $db->Insert("INSERT INTO `kijkwijzers`( `KijkwijzerName` , `KijkwijzerBlob`) values ( :kijkwijzername , :kijkwijzerblob )", [
        'kijkwijzername' => $name,
        'kijkwijzerblob' => $photo,
    ]);
    $x++;
    echo $id;

}