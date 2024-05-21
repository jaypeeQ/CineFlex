<?php
?>
<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <form method="post" action="">
        <div class="mb-3 mt-3">
            <label class="form-label">Film name: </label>
            <select name="timeslotupdate">
                <?php $sqltimeslotcheck = 'SELECT Title, TimeslotId FROM timeslot INNER JOIN films ON FkFilmId = FilmId';
                $sthtimeslotcheck = $conn->prepare($sqltimeslotcheck);
                $sthtimeslotcheck->execute();

                while($rstimeslotcheck = $sthtimeslotcheck->fetch(PDO::FETCH_ASSOC))
                { ?>
                    <option value="<?= $rstimeslotcheck['TimeslotId'] ?>">
                        <?= $rstimeslotcheck['Title'] ?>
                    </option> <?php } ?>
            </select>

            <button type="submit" name="updatetimeslotselected"  class="btn btn-primary">Submit</button>

    </form>
</div>