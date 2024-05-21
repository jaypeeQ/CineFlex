<?php
/*echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';*/


?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Time Starts</th>
            <th scope="col">Date Showing</th>
            <th scope="col">Hall Name</th>
            <th scope="col">Cinema</th>
            <?php if(isset($_SESSION['roleid'])) {
                ?>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            <?php } ?>
            <th scope="col">Reserve</th>

        </tr>
        <tr></tr>
        <tr></tr>
        </thead>
        <tbody>
        <?php
        $x = 0;
        $result = $db->Select('SELECT * FROM timeslot 
    INNER JOIN films ON FkFilmId = FilmId
    INNER JOIN languages ON LanguageId = FkLanguageId
    INNER JOIN posters ON FkPosterId = PosterId
    INNER JOIN halls ON FkHallId = HallId
    INNER JOIN cinemas ON FkCinemaId = CinemaId');
        foreach($result as $results) {
        ?>
        <tr>
            <th scope="row">
                <img src="data:image/jpeg;base64,<?= base64_encode($results['ImageBlob']) ?>" style="max-height: 200px">
            </th>
            <td><?= $results['Title'] ?></td>
            <td><?= $results['TimeStart'] ?></td>

            <td><?= $results['DateShowing'] ?></td>
            <td><?= $results['HallName'] ?></td>
            <td><?= $results['Name'] ?></td>
            <?php
            if(isset($_SESSION['roleid'])) {
                ?>


                <td><form action="" method="post">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="hidden" name="filmidupdate" value="<?= $results['FilmId'] ?>">
                    </form>
                </td>
                <td><form action="" method="post">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <input type="hidden" name="filmiddelete" value="<?= $results['FilmId'] ?>">
                    </form>
                </td>
                <?php
            }
            $x++;
            ?>
            <td>
                <form action="index.php?page=layoutseatingmanage" method="post">
                    <button type="submit" class="btn btn-primary">Reserve</button>

                    <input type="hidden" name="timeslotid" value="<?= $results['TimeslotId'] ?>">
                    <input type="hidden" name="posterid" value="<?= $results['PosterId'] ?>">
                    <input type="hidden" name="title" value="<?= $results['Title'] ?>">
                    <input type="hidden" name="hallname" value="<?= $results['HallName'] ?>">
                    <input type="hidden" name="hallid" value="<?= $results['HallId'] ?>">
                    <input type="hidden" name="cinemaname" value="<?= $results['Name'] ?>">
                    <input type="hidden" name="filmid" value="<?= $results['FilmId'] ?>">
                    <input type="hidden" name="cinemaid" value="<?= $results['CinemaId'] ?>">
                    <input type="hidden" name="timestart" value="<?= $results['TimeStart'] ?>">
                    <input type="hidden" name="dateshowing" value="<?= $results['DateShowing'] ?>">
                </form>
            </td>
        </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>