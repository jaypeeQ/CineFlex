
<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <form method="post" action="">
        <div class="mb-3 mt-3">
            <label class="form-label">Film name: </label>
            <select name="filmidshowing">
                <?php

                $films = $db->Select('SELECT * FROM films');
                foreach($films as $film)
                { ?>
                    <option value="<?= $film['FilmId'] ?>">
                        <?= $film['Title'] ?>
                    </option> <?php } ?>
            </select>
            <button type="submit" name="showingselected"  class="btn btn-primary">Submit</button>

    </form>
</div>