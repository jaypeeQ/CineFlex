<?php
use CineFlex\Classes\Database\DatabaseClass;

if(!isset($db)){
    include 'Classes\DatabaseClass.php';
    $db = new DatabaseClass();
}

?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
            <th scope="col">Cinema Name</th>
            <th scope="col">City</th>
            <th scope="col">Postcode</th>
            <th scope="col">House Number</th>
            <th scope="col">Phone Number</th>
            <?php if(isset($_SESSION['roleid'])) {
            ?>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
            <?php } ?>
        </tr>
        <tr></tr>
        <tr></tr>
        </thead>
        <tbody>
        <?php
            $results = $db->Select("SELECT * FROM cinemas");
        $x = 0;
        $y = 1;
        foreach($results AS $result)
        {
            ?>
            <tr>
                <th scope="row"><?= $y ?></th>
                <td><?= $result['Name'] ?></td>
                <td><?= $result['City'] ?></td>
                <td><?= $result['Postcode'] ?></td>
                <td><?= $result['HouseNumber'] ?></td>
                <td><?= $result['PhoneNumber'] ?></td>
                <?php
                if(isset($_SESSION['roleid'])) {
                    ?>

                <td><form action="" method="post">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="hidden" name="cinemaidupdate" value="<?= $result['CinemaId'] ?>">
                    </form>
                </td>
                <td><form action="" method="post">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <input type="hidden" name="cinemaiddelete" value="<?= $result['CinemaId'] ?>">
                    </form>
                </td>

            </tr>
            <?php
            }
                $y++;
            $x++;
        }

        ?>
        </tbody>
    </table>
</div>