<?php

$filmcheck = $db->Select
        ('SELECT * FROM films 
                        INNER JOIN posters ON FkPosterId = PosterId 
                            WHERE FilmId = :filmid',[
                                'filmid' => $_POST['filmidshowing'],
]);

    foreach($filmcheck AS $film){ ?>
    <div class="container mt-3" xmlns="http://www.w3.org/1999/html">
        <form method="post" action="">
            <label><?= $film['Title'] ?></label>
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
                <?php

                $cinemacheck = $db->Select('SELECT * FROM cinemas');

                foreach($cinemacheck AS $cinema)
                {
                    $cinemaname = $cinema['Name'];
                    ?>
                    <option value="<?= $cinema['CinemaId'] ?>">
                        <?= $cinema['Name'] ?>
                    </option> <?php } ?>
            </select>

            <input type="hidden" name="showingselectedfilmid" value="<?= $film['FilmId'] ?>">
            <input type="hidden" name="showingselectedtitle" value="<?= $film['Title'] ?>">
            <input type="hidden" name="showingselectedcinemaname" value="<?= $cinemaname ?>">

            <button type="submit" name="showingcinemaselected" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php } ?>