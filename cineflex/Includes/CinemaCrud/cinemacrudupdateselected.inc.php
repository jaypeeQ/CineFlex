<?php
$cinemas = $db->Select('SELECT * FROM cinemas WHERE CinemaId = :cinemaid',[
        'cinemaid' => $_POST['cinemaidupdate'],
]);
    foreach($cinemas as $cinema)
        { ?>

            <div class="container mt-3" xmlns="http://www.w3.org/1999/html">
                <h2>Cinema CRUD</h2>

                <h3>Update Cinema: <?= $cinema['Name'] ?></h3>

                <div class="mb-3 mt-3">
                <form action="PHP/CinemaCrud/cinemaupdate.php" method="post">
                    <label class="form-label">Name: </label>
                    <input type="text" class="form-control" name="cinemaname" value="<?= $cinema['Name'] ?>" placeholder="Enter Cinema Name">
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">City: </label>
                <input type="text" class="form-control" name="city" value="<?= $cinema['City'] ?>" placeholder="Enter Cinema Name">
            </div>


            <div class="mb-3 mt-3">
                <label class="form-label">House Number: </label>
                <input type="text" class="form-control" name="housenumber" value="<?= $cinema['HouseNumber'] ?>" placeholder="Enter Cinema Address Number">
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">Phone Number: </label>
                <input type="text" class="form-control" name="phonenumber" value="<?= $cinema['PhoneNumber'] ?>" placeholder="Enter Company Telephone number">
            </div>

            <div class="mb-3 mt-3">
                <labelclass="form-label">Post Code: </label>
                <input type="text" class="form-control" name="postcode" value="<?= $cinema['Postcode'] ?>" placeholder="Enter Postcode">
            </div>


            <input type="hidden" name="cinemaid" value="<?= $cinema['CinemaId'] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
        }