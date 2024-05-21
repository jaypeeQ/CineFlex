<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <h2>Cinema CRUD</h2>

    <h3>Update Cinema</h3>

    <form method="post" action="">
        <div class="mb-3 mt-3">
            <label class="form-label">Cinema Name: </label>
            <select name="cinemaidupdate">
                <?php
                $cinemas = $db->Select('SELECT * FROM cinemas');
                foreach($cinemas as $cinema) {
                    ?>
                    <option value="<?= $cinema['CinemaId'] ?>">
                        <?= $cinema['Name'] ?>
                    </option> <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>