<?php
require_once '../../Private/connection.php';

session_start();
echo '</br>';
$x = 0;
$y = 0;

echo " <pre>", print_r($_POST), "</pre>";
echo '</br>';
echo " <pre>", print_r($_SESSION), "</pre>";
$count = $_POST['hallnumber'] + 1;
;


$sqlcinemacheck = 'SELECT CinemaId FROM cinemas WHERE Name = :cinemaname';
$sthcinemacheck = $conn->prepare($sqlcinemacheck);
$sthcinemacheck->bindParam(':cinemaname', $_SESSION['cinemaname']);
$sthcinemacheck->execute();
$rscinemacheck = $sthcinemacheck->fetch(PDO::FETCH_ASSOC);

while($x < $count) {
    echo 'while loop =' . $x . '</br>';
    $sqlcinemaadd = 'INSERT INTO halls (HallName, FkCinemaId) 
                VALUES ( :name, :cinemaid)';
    $sthcinemaadd = $conn->prepare($sqlcinemaadd);
    $sthcinemaadd->bindParam(':name', $_POST['hallname'][$x]);
    $sthcinemaadd->bindParam(':cinemaid', $rscinemacheck['CinemaId']);
    $sthcinemaadd->execute();

    $sqlhallcheck = 'SELECT HallId FROM halls WHERE FkCinemaId = :cinemaid';
    $sthcinemacheck = $conn->prepare($sqlhallcheck);
    $sthcinemacheck->bindParam(':cinemaid', $rscinemacheck['CinemaId']);
    $sthcinemacheck->execute();
    while ($rshallcheck = $sthcinemacheck->fetch(PDO::FETCH_ASSOC)) {

        $row = $_POST['rows'][$x] - 1;
        $seatnumber = $_POST['columns'][$x];
        $letters = range('A', 'Z');
        $numbers = range(1, $seatnumber);

        foreach ($letters as $letter => $value) {
            $seatrow = $value;
            foreach ($numbers as $number) {
                echo $seatrow, " - ", $number;
                echo '</br>';
                $sqlgeneratetable = "INSERT into seats (FkHallId, SeatRow, SeatNumber, IsTaken)
                    VALUES (:hallid, :row, :column, 0)";
                $sthgeneratetable = $conn->prepare($sqlgeneratetable);
                $sthgeneratetable->bindParam(':hallid', $rshallcheck['HallId']);
                $sthgeneratetable->bindParam(':row', $seatrow);
                $sthgeneratetable->bindParam(':column', $number);

                $sthgeneratetable->execute();
            }
            echo '</br>';
            if ($letter == $row) {
                break;
            }
        }
        echo '</br>';
    }
    $x++;
    $y++;
}
$_SESSION['cinemaname'] = NULL;
?>

<?php
header('Location: ../../index.php?page=cinemacrud');
?>