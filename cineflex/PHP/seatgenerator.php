<?php
require_once '../Private/connection.php';

//POST method inputs

//$seatingplan = $_POST['SeatingPlanName'];
//$letter1 = $_POST['rows'];
//$number1 = $_POST['columns'];

//Testing inputs

$letter1 = 15 - 1;
$number1 = 12;
$seatingplan = "TestSeatingTable3";
$letters = range('A', 'Z');
foreach($letters AS $letter => $value) {
    if ($letter == $letter1) {
        break;
    }
}
echo $value; //The rows value in letters from the foreach loop range on A ~ Z.

//CREATE table for seatgeneration.
$sqlgeneratetable = "INSERT into " .$seatingplan." (SeatRow, SeatColumn, IsTaken)
                    VALUES (:row, :column, 0)";
$sthgeneratetable = $conn->prepare($sqlgeneratetable);
$sthgeneratetable->bindParam(':row', $letter);
$sthgeneratetable->bindParam(':column', $number);

$sthgeneratetable->execute();

$letters = range('A', $value);
$numbers = range(1, $number1);

foreach($letters AS $letter) {
    foreach($numbers AS $number) {
        echo "<td>", $letter ,"-", $number, "</td>";
        $sqlgeneratedata = "INSERT into " .$seatingplan." (SeatRow, SeatColumn, IsTaken)
                    VALUES (:row, :column, 0)";
        $sthgeneratedata = $conn->prepare($sqlgeneratedata);
        $sthgeneratedata->bindParam(':row', $letter);
        $sthgeneratedata->bindParam(':column', $number);

        $sthgeneratedata->execute();
    }
}
//testing purposes

$sqlshow = "SELECT * FROM " .$seatingplan." ";
$sthshow = $conn->prepare($sqlshow);
$sthshow->execute();
while ($rscheck = $sthshow->fetch(PDO::FETCH_ASSOC)): {
echo '<pre>', print_r($rscheck), '</pre>';
}endwhile;

