<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <form action="PHP/FilmCrud/filmadd.php" method="post" enctype='multipart/form-data'>
        <h3>Add Film</h3>


        <div class="mb-3 mt-3">
            <label class="form-label">Title: </label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Length: </label>
            <input type="number" class="form-control" name="lengthminutes" placeholder="Enter Length in Minutes" required>
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

            $result = $db->Select('SELECT * FROM kijkwijzers WHERE KijkwijzerType = 2');
            foreach($result as $results) {

                ?>
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

            $result = $db->Select('SELECT * FROM genre');
            foreach($result as $results) {

             ?>
        <div class="mb-3 mt-3 form-check-inline">
                <input class="form-check-input" type="checkbox" name="genre[]" value="<?= $results['GenreId'] ?>">
                <label><?= $results['Genre'] ?></label>
        </div>
                   <?php
                   }
 ?>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Language: </label>
            <select name="languagechoice">
                <?php $result = $db->Select('SELECT * FROM languages ');
                foreach($result as $results)

                { ?>
                    <option value="<?= $results['LanguageId'] ?>">
                        <?= $results['Language'] ?>
                    </option> <?php } ?>
            </select>
        </div>

        <div class="mb-3 mt-3">


            <label>Select Image File:</label>
            Upload this file: <input type=file name='file_up'>
            <input type="text" name="imagename" placeholder="Enter Name Here">
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Description: </label>
            <textarea type="text" class="form-control" name="description" placeholder="Enter Description" required></textarea>
        </div>
        </p>
        <button type="submit" value='Upload Image' class="btn btn-primary">Submit</button>
    </form>
</div>