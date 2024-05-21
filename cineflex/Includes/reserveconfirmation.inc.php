<?php


/*echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';*/

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
        foreach ($letters as $letter => $value) {
            foreach ($numbers as $number) {
                while ($result2 = $sthshow->fetch(PDO::FETCH_ASSOC)) {
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

        $x = 0;

    foreach ($letters2 as $letter => $value) {
        foreach ($numbers2 as $number => $value2) {
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

                if (in_array( $result['SeatId'], $_POST['seatid'])) {
                    echo '<td style="background-color: blue; font-size: 14px;max-height: 12px; max-width: 12px"> <input type="checkbox" checked name="seatid[]">  ' . 'Stoel ' . $result['SeatRow'] . ' - ' . $result['SeatNumber'] . '</td>';

                } elseif ($result['FkTimeSlotId']) {
                    echo '<td style="background-color: red; font-size: 14px;max-height: 12px; max-width: 12px"> <input type="checkbox">  ' . 'Stoel ' . $result['SeatRow'] . ' - ' . $result['SeatNumber'] . '</td>';

                } elseif (!$result['FkTimeSlotId']) {
                    echo '<td style="background-color: greenyellow; font-size: 14px;max-height: 12px; max-width: 12px"> <input type="checkbox" name="seatid[]" value="' . $result['SeatId'] . '">  ' . 'Stoel ' . $result['SeatRow'] . ' - ' . $result['SeatNumber'] . '</td>';

                }//Declares last fetch data into variable, to be compared at the start of while loop.
                 $lastseatrow = $result['SeatRow'];

            }


        }
//generates end of table row.
        echo '</tr>';


}
        ?>
        <div style="text-align: center"><h3>=========SCREEN=========</h3></div>
        </tbody>
    </table>
    <div class="container mt-3" xmlns="http://www.w3.org/1999/html" style="font-size: 20px">
        <h3>Confirmation Form</h3>
        <form action="PHP/ReserveCrud/reserveticket.php" method="post">
            <div class="mb-3 mt-3">
                <label class="form-label">Title: <?= $_POST['title'] ?></label>
                <input type="hidden" name="title" value="<?= $_POST['title'] ?>">
                <input type="hidden" name="filmid" value="<?= $_POST['filmid'] ?>">
            </div>
            <?php
            foreach ($_POST['seatid'] as $key => $seatid) {
                $sqlseat = "SELECT SeatRow, SeatNumber, SeatId FROM seats
                WHERE SeatId = :seatid
            ";
                $sthseat = $conn->prepare($sqlseat);
                $sthseat->bindParam(":seatid", $seatid);

                $sthseat->execute();
                $result = $sthseat->fetch(PDO::FETCH_ASSOC)

                ?>
                <div class="mb-3 mt-3">
                    <label class="form-label">Seat
                        Number: <?= $result['SeatRow'] . ' - ' . $result['SeatNumber'] ?></label>
                    <input type="hidden" name="seatid[]" value="<?= $result['SeatId'] ?>">
                    <input type="hidden" name="filmid" value="<?= $_POST['filmid'] ?>">
                </div>
                <?php
            }
            ?>
            <div class="mb-3 mt-3">
                <label class="form-label">Cinema: <?= $_POST['cinemaname'] ?></label>
                <input type="hidden" name="cinemaid" value="<?= $_POST['cinemaid'] ?>">
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Hall: <?= $_POST['hallname'] ?></label>
                <input type="hidden" name="hallid" value="<?= $_POST['hallid'] ?>">
                <input type="hidden" name="hallname" value="<?= $_POST['hallname'] ?>">
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Date: <?= $_POST['dateshowing'] ?></label>
                <input type="hidden" name="dateshowing" value="<?= $_POST['dateshowing'] ?>">
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Time: <?= $_POST['timestart'] ?></label>
                <input type="hidden" name="timestart" value="<?= $_POST['timestart'] ?>">
                <input type="hidden" name="timeslotid" value="<?= $_POST['timeslotid'] ?>">
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Confirm: </label>
                <input class="form-check-input" type="checkbox" name="confirm" required>
            </div>
            <div class="mb-3 mt-3">
                <button type="submit" name="comfirmreservation" class="btn btn-primary"> Submit</button>
            </div>
        </form>
        <form action="" method="post">
            <input type="hidden" name="dateshowing" value="<?= $_POST['dateshowing'] ?>" required>
            <input type="hidden" name="hallname" value="<?= $_POST['hallname'] ?>" required>
            <input type="hidden" name="hallid" value="<?= $_POST['hallid'] ?>" required>
            <input type="hidden" name="showingselectedcinemaname" value="<?= $_POST['cinemaname'] ?>" required>
            <input type="hidden" name="showingselectedcinemaid" value="<?= $_POST['cinemaid'] ?>" required>
            <input type="hidden" name="showingselectedfilmid" value="<?= $_POST['filmid'] ?>" required>
            <input type="hidden" name="showingselectedtitle" value="<?= $_POST['title'] ?>" required>
            <button type="submit" name="showingcinemaselected" class="btn btn-primary">Revert</button>

        </form>
    </div>
