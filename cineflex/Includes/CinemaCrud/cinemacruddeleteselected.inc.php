<?php
$cinemas = $db->Select('SELECT * FROM cinemas WHERE CinemaId = :cinemaid',[
    'cinemaid' => $_POST['cinemaiddelete'],
]);
foreach($cinemas as $cinema)
{
    ?>
    <div class="container mt-3" xmlns="http://www.w3.org/1999/html">
        <h2>Cinema CRUD</h2>
        <form action="PHP/CinemaCrud/cinemadelete.php" method="post">
            <h3>Delete Cinema: <?= $cinema  ['Name'] ?></h3>

            <div class="form-check form-switch mt-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
            </div>
            <input type="hidden" name="cinemaid" value="<?= $_POST['cinemaiddelete'] ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>

    <?php
}