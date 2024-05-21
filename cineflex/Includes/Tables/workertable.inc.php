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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <?php if(isset($_SESSION['roleid'])) {
                        if($_SESSION['roleid'] == 1) {
            ?>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
            <?php }
            }?>
        </tr>
        </thead>
        <tbody>
        <?php

        $result = $db->Select("SELECT FirstName, Insertion, LastName, PhoneNumber, Email, WorkerNumber FROM workers");
            $x = 1;
        foreach($result as $results) {
            ?>
            <tr>
                <th scope="row"><?= $x ?></th>
                <td><?= $results['FirstName'] . " " . $results['Insertion'] . " " . $results['LastName'] ?></td>
                <td><?= $results['Email'] ?></td>
                <td><?= $results['PhoneNumber'] ?></td>
                <?php
                if(isset($_SESSION['roleid'])) {
                    ?>
                <td><form action="" method="post">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="hidden" name="workernumberupdate" value="<?= $results['WorkerNumber'] ?>">
                    </form>
                </td>
                <td><form action="" method="post">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <input type="hidden" name="workeriddelete" value="<?= $results['WorkerNumber'] ?>">
                    </form>
                </td>
            </tr>
            <?php
            }
            $x++;
        }
        ?>
        </tbody>
    </table>
</div>