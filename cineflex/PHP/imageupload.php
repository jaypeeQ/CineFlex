<?php
require_once '../Private/connection.php';

    $query = "insert into posters(name, image) values(:name, :image)";
    $step = $conn->prepare($query);
    $step->bindParam(':image', $image);
    $step->bindParam(':name', $_POST['name']);

//}
if($step->execute()){

    echo " Data with Photo is added ";
}
else{
    echo " Not able to add data please contact Admin ";
    print_r($step->errorInfo());
}

?>