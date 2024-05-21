<?php

use CineFlex\Classes\Database\DatabaseClass;
include "Classes\DatabaseClass.php";
$db = new DatabaseClass();

if(isset($_POST['insert'])) {
    $name = $_POST['kijkwijzer'];
    $photo = file_get_contents($_FILES['file_up']['tmp_name']); // reading binary data
    echo $name;
//Insert Poster BLOB image file and image name in posters table.
    $id = $db->Insert("INSERT INTO `kijkwijzers`( `KijkwijzerName` , `KijkwijzerBlob`) values ( :kijkwijzername , :kijkwijzerblob )", [
        'kijkwijzername' => $name,
        'kijkwijzerblob' => $photo,
    ]);
}
?>

<form action="" method="post" enctype='multipart/form-data'>
        <div class="mb-3 mt-3">
            <label>Select Image File:</label>
            Upload this file: <input type=file name='file_up'>
            <input type="text" name="kijkwijzer" placeholder="Enter Name Here">
        </div>
    <button type="submit" name="insert" class="btn btn-primary">Submit</button>
</form>

<?php

$data = $db->Select('SELECT * FROM kijkwijzers');
foreach ($data as $datum){
    ?>
    <img src="data:image/jpeg;base64,<?= base64_encode($datum['KijkwijzerBlob']) ?>" style="max-height: 200px">

<?php
}
?>
