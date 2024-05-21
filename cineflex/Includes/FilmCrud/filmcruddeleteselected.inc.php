<?php
$films = $db->Select('SELECT * FROM films WHERE FilmId = :filmid',[
        'filmid' => $_POST['filmiddelete']
]);
foreach($films as $film)
{
    ?>
    <div class="container mt-3" xmlns="http://www.w3.org/1999/html">
        <h2>Film CRUD</h2>
        <form action="PHP/FilmCrud/filmdelete.php" method="post">
            <h3>Delete Cinema: <?= $film['Title'] ?></h3>

            <div class="form-check form-switch mt-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
            </div>
            <input type="hidden" name="filmid" value="<?= $film['FilmId'] ?>">
            <input type="hidden" name="posterid" value="<?= $film['FkPosterId'] ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>

    <?php
}