<?php
?>
<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
<form method="post" action="">

    <h4><?= $_POST['showingselectedtitle'] ?></h4>
    <h5>Showing at <?= $_POST['showingselectedcinemaname'] ?> on: <?= $_POST['timeslot'] ?></h5>
    <div class="container mt-3">
    <label for="hallid">Hall: </label>
    <select name="hallid" required>
                <?php $sqlhallcheck = 'SELECT * FROM halls WHERE FkCinemaId = :cinemaid';
                $sthhallcheck = $conn->prepare($sqlhallcheck);
                $sthhallcheck->bindParam(":cinemaid", $_POST['showingselectedcinemaid']);

                $sthhallcheck->execute();

                while($rshallcheck = $sthhallcheck->fetch(PDO::FETCH_ASSOC))

                { ?>
                    <option value="<?= $rshallcheck['HallId'] ?>">
                        <?= $rshallcheck['HallName'] ?>
                    </option> <?php } ?>
            </select>
        <input type="date" name="dateshowing" required>
    </div>
    <br>
    <button type="submit" name="showingupdateconfirm" class="btn btn-primary">Submit</button>
    <input type="hidden" name="title" value="<?= $_POST['showingselectedtitle'] ?>">
    <input type="hidden" name="filmid" value="<?= $_POST['showingselectedfilmid'] ?>">
    <input type="hidden" name="timeslot" value="<?= $_POST['timeslot'] ?>">
    <input type="hidden" name="cinemaid" value="<?= $_POST['showingselectedcinemaid'] ?>">
    <input type="hidden" name="cinemaname" value="<?= $_POST['showingselectedcinemaname'] ?>">

</form>
</div>