<?php
$films = $db->Select('SELECT * FROM films INNER JOIN posters ON PosterId = FkPosterId WHERE FilmId = :filmid',[
    'filmid' => $_POST['filmidupdate']
]);
foreach($films as $film)
{ ?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <h2>FILM CRUD</h2>
    <form action="PHP/FilmCrud/filmupdate.php" method="post">
        <h3>Update Film: <?= $film['Title'] ?> </h3>
        <input type="hidden" name="filmid" value="<?= $film['FilmId'] ?>">

        <div class="mb-3 mt-3">
            <label class="form-label">Title: </label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?= $film['Title'] ?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Length: </label>
            <input type="text" class="form-control" name="lengthminutes" placeholder="Enter Length in Minutes" value="<?= $film['LengthMinutes'] ?>" required>
        </div>


        <div class="mb-3 mt-3">
            <legend class="col-form-label-lg">Kijkwijzer Age: </legend>
            <?php

            $result = $db->Select('SELECT * FROM kijkwijzers WHERE KijkwijzerType = 1');
            foreach($result as $results) {

                ?>
                <div class="mb-3 mt-3 form-check-inline">
                    <input class="form-check-input" type="radio" name="kijkwijzerage" value="<?= $results['KijkwijzerId'] ?>" >
                    <img src="data:image/jpeg;base64,<?= base64_encode($results['KijkwijzerBlob']) ?>" style="max-height: 60px">

                </div>
                <?php
            }
            ?>
        </div>

        <div class="mb-3 mt-3">
            <legend>Kijkwijzer Type: </legend>
            <?php
            $kijkwijzercheck = $db->Select('SELECT * FROM filmkijkwijzer WHERE FkFilmId = :filmid',[
                'filmid' => $_POST['filmidupdate'],
            ]);

            $result = $db->Select('SELECT * FROM kijkwijzers WHERE KijkwijzerType = 2');
            foreach($result as $results) {

                ?>
                <?php if($kijkwijzercheck['FkFilmId']) {
                    ?>
                    <input class="form-check-input" type="checkbox" name="kijkwijzertype[]" value="<?= $results['GenreId'] ?>" checked>
                    <?php
                } ?>
                <div class="mb-3 mt-3 form-check-inline">
                    <input class="form-check-input" type="checkbox" name="kijkwijzertype[]" value="<?= $results['KijkwijzerId'] ?>" >
                    <img src="data:image/jpeg;base64,<?= base64_encode($results['KijkwijzerBlob']) ?>" style="max-height: 60px">

                </div>
                <?php
            }
            ?>
        </div>

        <div class="mb-3 mt-3">
            <legend>Genre: </legend>
            <?php
            $genrecheck = $db->Select('SELECT * FROM filmgenre WHERE FkFilmId = :filmid',[
                    'filmid' => $_POST['filmidupdate'],
            ]);

            $result = $db->Select('SELECT * FROM genre');
            foreach($result as $results) {
                ?>
                <div class="mb-3 mt-3 form-check-inline">
                <?php if($genrecheck['FkFilmId']) {
                        ?>
                    <input class="form-check-input" type="checkbox" name="genre[]" value="<?= $results['GenreId'] ?>" checked>
                    <?php
                } ?>
                    <input class="form-check-input" type="checkbox" name="genre[]" value="<?= $results['GenreId'] ?>">
                    <label><?= $results['Genre'] ?></label>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Language: </label>
            <select name="languageid">
                <?php $sqlgenrecheck = 'SELECT * FROM languages';
                $sthgenrecheck = $conn->prepare($sqlgenrecheck);
                $sthgenrecheck->execute();

                while($rsgenrecheck = $sthgenrecheck->fetch(PDO::FETCH_ASSOC))
                { ?>
                    <option value="<?= $rsgenrecheck['LanguageId'] ?>">
                        <?= $rsgenrecheck['Language'] ?>
                    </option> <?php } ?>
            </select>
        </div>

        <div class="mb-3 mt-3">
            <label>Select Image File:</label>
            Upload this file: <input type=file name='file_up'>
            <input type="text" name="imagename"
                   <?php
                   if($film['PosterName']) {
                       ?> value="<?= $film['PosterName'] ?>" <?php
                   }
                   ?>
                   placeholder="Enter Name Here">

        </div>
        <div class="mb-3 mt-3">

        <label>Old Picture: </label>
        </div>
        <img src="data:image/jpeg;base64,<?= base64_encode($film['ImageBlob']) ?>" style="max-height: 200px">

        <div class="mb-3 mt-3">
            <label class="form-label">Description: </label>
            <textarea type="text" class="form-control" name="description" placeholder="Enter Description" required><?= $film['Description'] ?></textarea>
        </div>
        </p>
        <input type="hidden" name="oldposter" value="<?= $film['PosterId'] ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php } ?>