<?php

$sqlhallcheck = 'SELECT * FROM halls WHERE HallId = :hallid';
$sthhallcheck = $conn->prepare($sqlhallcheck);
$sthhallcheck->bindParam(":hallid", $_POST['hallid']);

$sthhallcheck->execute();

while($rshallcheck = $sthhallcheck->fetch(PDO::FETCH_ASSOC)){
    $hallname = $rshallcheck['HallName'];
}

?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">

    <form action="PHP/ShowingCrud/filmtimeslotupdate.php" method="post">
        <div class="mb-3 mt-3">
            <label class="form-label">Title: <?= $_POST['title'] ?></label>
            <input type="hidden" name="title" value="<?= $_POST['title'] ?>" required>
            <input type="hidden" name="filmid" value="<?= $_POST['filmid'] ?>" required>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Cinema: <?= $_POST['cinemaname'] ?></label>
            <input type="hidden" name="cinemaid" value="<?= $_POST['cinemaid'] ?>" required>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Hall: <?= $hallname ?></label>
            <input type="hidden" name="hallid" value="<?= $_POST['hallid'] ?>" required>
            <input type="hidden" name="hallname" value="<?= $hallname ?>" required>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Date: <?= $_POST['dateshowing'] ?></label>
            <input type="hidden" name="dateshowing" value="<?= $_POST['dateshowing'] ?>" required>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Time: <?= $_POST['timeslot'] ?></label>
            <input type="hidden" name="timeslot" value="<?= $_POST['timeslot'] ?>" required>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Confirm: </label>
            <input class="form-check-input" type="checkbox" name="confirm" required>
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" name="confirmedtimeslot" class="btn btn-primary"> Submit</button>
        </div>
    </form>
    <form action="" method="post">
        <input type="hidden" name="timeslot" value="<?= $_POST['timeslot'] ?>" required>
        <input type="hidden" name="dateshowing" value="<?= $_POST['dateshowing'] ?>" required>
        <input type="hidden" name="hallname" value="<?= $hallname ?>" required>
        <input type="hidden" name="hallid" value="<?= $_POST['hallid'] ?>" required>
        <input type="hidden" name="showingselectedcinemaname" value="<?= $_POST['cinemaname'] ?>" required>
        <input type="hidden" name="showingselectedcinemaid" value="<?= $_POST['cinemaid'] ?>" required>
        <input type="hidden" name="showingselectedfilmid" value="<?= $_POST['filmid'] ?>" required>
        <input type="hidden" name="showingselectedtitle" value="<?= $_POST['title'] ?>" required>
        <button type="submit" name="showingcinemaselected" class="btn btn-primary">Revert</button>

    </form>
</div>