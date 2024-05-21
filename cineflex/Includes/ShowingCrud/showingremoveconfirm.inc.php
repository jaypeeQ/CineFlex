<?php

$sqltimecheck = 'SELECT TimeslotId, FilmId, Title, TimeStart, DateShowing, HallName, HallId, PosterImage FROM timeslot 
                    INNER JOIN films ON FilmId = FkFilmId
                    INNER JOIN posters ON PosterId = FkPosterId
                    INNER JOIN halls ON FkHallId = HallId
                WHERE TimeslotId = :timeslotremove';
$sthtimecheck = $conn->prepare($sqltimecheck);
$sthtimecheck->bindParam(":timeslotremove", $_POST['timeslotremove']);

$sthtimecheck->execute();

while($rstimecheck = $sthtimecheck->fetch(PDO::FETCH_ASSOC)){



?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">

    <form action="PHP/ShowingCrud/filmtimeslotremove.php" method="post">
        <div class="row">
            <div class="col">
                <div class="mb-3 mt-3">
                    <img class="form-label" src="<?=$rstimecheck['PosterImage'] ?>" style="max-height: 300px">
                </div>
            </div>
            <div class="col">
                <div class="mb-3 mt-3">
                    <label class="form-label">Title: <?= $rstimecheck['Title'] ?></label>
                    <input type="hidden" name="title" value="<?= $rstimecheck['Title'] ?>" required>
                    <input type="hidden" name="filmid" value="<?= $rstimecheck['FilmId'] ?>" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">Time: <?= $rstimecheck['TimeStart'] ?></label>
                    <input type="hidden" name="timestart" value="<?= $rstimecheck['TimeStart'] ?>" required>
                    <input type="hidden" name="timeslotid" value="<?= $rstimecheck['TimeslotId'] ?>" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">Date: <?= $rstimecheck['DateShowing'] ?></label>
                    <input type="hidden" name="dateshowing" value="<?= $rstimecheck['DateShowing'] ?>" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">Hall: <?= $rstimecheck['HallName'] ?></label>
                    <input type="hidden" name="hallid" value="<?= $rstimecheck['HallId'] ?>" required>
                    <input type="hidden" name="hallname" value="<?= $rstimecheck['HallName'] ?>" required>
                </div>


                <div class="mb-3 mt-3">
                    <label class="form-label">Confirm: </label>
                    <input class="form-check-input" type="checkbox" name="confirm" required>
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" name="confirmeddeletetimeslot" class="btn btn-primary"> Submit</button>
                </div>
            </div>
        </div>


    </form>

</div>

<?php } ?>