<?php
require_once 'Private/connection.php';

/*echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';*/
//Takes Data from database to show seating layout by rows and columns.


//Generates Start of table.
?>
<div class="container mt-3" style="text-align: center">
    <div class="row">
        <div class="col-3">
            <th scope="row"><img src="<?= $_POST['posterimage'] ?>" style="max-height: 200px"></th>
        </div>
        <div class="col-9 justify-content-start">
            <h2><?= $_POST['title'] ?></h2> in <b><?= $_POST['cinemaname'] ?></b> in Hall: <?= $_POST['hallname'] ?>
            </h2>
        </div>
    </div>



<form action="index.php?page=reserveconfirmation" method="post">

<table class='table' style="align-items: center">
    <tbody>
    <?php



    $sqlshow = "SELECT SeatRow, SeatNumber, HallId, IsTaken, SeatId, HallName, FkFilmId FROM seats s
                INNER JOIN halls on s.FkHallId = HallId
                INNER JOIN timeslot as t ON t.FkHallId = HallId
                WHERE TimeSlotId = :timeslotid
            ";
    $sthshow = $conn->prepare($sqlshow);
    $sthshow->bindParam(":timeslotid", $_POST['timeslotid']);
    $sthshow->execute();

    $letters = range('A', 'Z');
    $numbers = range(1, 100);
    foreach($letters AS $letter => $value) {
        foreach($numbers AS $number) {
            while($result2 = $sthshow->fetch(PDO::FETCH_ASSOC)){
                $highestRow = $result2['SeatRow'];
                $highestNumber = $result2['SeatNumber'];
                }
            }
        }

    $sqlshow2 = "SELECT SeatRow, SeatNumber, SeatId, IF(FkTimeSlotId = :timeslotid, :timeslotid, NULL) as FkTimeSlotId FROM seats s
                LEFT JOIN reservedseat ON SeatID = FkSeatId
                WHERE FkHallId = :hallid
                ORDER BY SeatRow, SeatNumber
            ";
    $sthshow2 = $conn->prepare($sqlshow2);
    $sthshow2->bindParam(":timeslotid", $_POST['timeslotid']);
    $sthshow2->bindParam(":hallid", $_POST['hallid']);
    $sthshow2->execute();
    $letters2 = range('A', $highestRow);
    $numbers2 = range(1, $highestNumber);


        foreach ($letters2 as $letter => $value) {
            foreach ($numbers2 as $number => $value2) {
            }
            while ($result = $sthshow2->fetch(PDO::FETCH_ASSOC)) {

                //Checks fetched Row Data to compare to declared last fetch data.
                //generates start of table row
                if (isset($lastseatrow)) {
                    if ($result['SeatRow'] != $lastseatrow) {
                        echo '<tr>';
                    }
                }
                //Checks if Seat is taken by a customer.
                //If Seat is not taken, clickable, otherwise, disabled
                if ($result['FkTimeSlotId']) {
                    var_dump($result['FkTimeSlotId']);
                    echo '<td style="background-color: red; font-size: 14px;max-height: 12px; max-width: 12px"> <input type="checkbox">  ' . 'Stoel '. $result['SeatRow'] .' - '.  $result['SeatNumber'] . '</td>';

                } elseif(!$result['FkTimeSlotId'])   {
                    echo '<td style="background-color: greenyellow; font-size: 14px;max-height: 12px; max-width: 12px"> <input type="checkbox" name="seatid[]" value="' . $result['SeatId'] . '">  ' . 'Stoel '. $result['SeatRow'] .' - '.  $result['SeatNumber'] . '</td>';

                }
                $lastseatrow = $result['SeatRow'];
                //Declares last fetch data into variable, to be compared at the start of while loop.
            }echo '</tr>';
        }
                //generates end of table row.
    ?>
    <div style="text-align: center"><h3>=========SCREEN=========</h3></div>
    </tbody>
</table>

        <button type="submit" class="btn btn-primary">Edit</button>
        <input type="hidden" name="title" value="<?= $_POST['title'] ?>">
        <input type="hidden" name="hallname" value="<?= $_POST['hallname'] ?>">
        <input type="hidden" name="hallid" value="<?= $_POST['hallid'] ?>">
        <input type="hidden" name="cinemaname" value="<?= $_POST['cinemaname'] ?>">
        <input type="hidden" name="filmid" value="<?= $_POST['filmid'] ?>">
        <input type="hidden" name="cinemaid" value="<?= $_POST['cinemaid'] ?>">
        <input type="hidden" name="cinemaname" value="<?= $_POST['cinemaname'] ?>">
        <input type="hidden" name="timestart" value="<?= $_POST['timestart'] ?>">
        <input type="hidden" name="timeslotid" value="<?= $_POST['timeslotid'] ?>">
        <input type="hidden" name="dateshowing" value="<?= $_POST['dateshowing'] ?>">
    <input type="hidden" name="posterimage" value="<?= $_POST['posterimage'] ?>">


</form>
        <td>
            <form action="index.php?page=managecrud" method="post">
                <button type="submit" name="showingview" class="btn btn-primary">Back</button>
            </form>
        </td>
    </div>
