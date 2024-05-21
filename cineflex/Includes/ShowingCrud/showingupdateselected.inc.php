<?php
$sqltimeslotcheck = 'SELECT TimeStart, Title, DateShowing, Name, FilmId FROM timeslot 
                    INNER JOIN films ON FilmId = FkFilmId 
                    INNER JOIN posters ON FkPosterId = PosterId 
                    INNER JOIN halls ON FkHallId = HallId
                    INNER JOIN cinemas ON FkCinemaId = CinemaId
                    WHERE TimeslotId = :timeslotupdate';
$sthtimeslotcheck = $conn->prepare($sqltimeslotcheck);
$sthtimeslotcheck->bindParam(':timeslotupdate', $_POST['timeslotupdate']);

$sthtimeslotcheck->execute();

while($rstimeslotcheck = $sthtimeslotcheck->fetch(PDO::FETCH_ASSOC))
{ ?>
        <div class="row">
            <div class="mb-3 mt-3">
                <label class="form-label">Timeslot: <?= $rstimeslotcheck['TimeStart'] ?></label>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Cinema: <?= $rstimeslotcheck['Name'] ?></label>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Date Showing: <?= $rstimeslotcheck['DateShowing'] ?></label>
            </div>
        </div>

    <div class="container mt-3" xmlns="http://www.w3.org/1999/html">
        <form method="post" action="">
            <label><?= $rstimeslotcheck['Title'] ?></label>
            <select name="timeslot">
                <option>09:00</option>
                <option>11:00</option>
                <option>13:00</option>
                <option>15:00</option>
                <option>17:00</option>
                <option>19:00</option>
                <option>21:00</option>
            </select>
            <select name="showingselectedcinemaid">
                <?php $sqlcinemacheck = 'SELECT * FROM cinemas';
                $sthcinemacheck = $conn->prepare($sqlcinemacheck);
                $sthcinemacheck->execute();

                while($rscinemacheck = $sthcinemacheck->fetch(PDO::FETCH_ASSOC))
                {
                    $cinemaname = $rscinemacheck['Name'];
                    ?>
                    <option value="<?= $rscinemacheck['CinemaId'] ?>">
                        <?= $rscinemacheck['Name'] ?>
                    </option> <?php } ?>
            </select>

            <input type="hidden" name="showingselectedfilmid" value="<?= $rstimeslotcheck['FilmId'] ?>">
            <input type="hidden" name="showingselectedtitle" value="<?= $rstimeslotcheck['Title'] ?>">
            <input type="hidden" name="showingselectedcinemaname" value="<?= $cinemaname ?>">

            <button type="submit" name="showingupdateselectedcinema" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php } ?>