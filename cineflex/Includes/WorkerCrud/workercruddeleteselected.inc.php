<?php
$sqlworkerdeletecheck = 'SELECT * FROM workers WHERE WorkerNumber = :workernumber';
$sthworkerdeletecheck = $conn->prepare($sqlworkerdeletecheck);
$sthworkerdeletecheck->bindParam(":workernumber", $_POST['workernumberdelete']);
$sthworkerdeletecheck->execute();
while($rsworkerdeletecheck = $sthworkerdeletecheck->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="container mt-3" xmlns="http://www.w3.org/1999/html">
        <h2>Cinema CRUD</h2>
        <form action="PHP/WorkerCrud/workerdelete.php" method="post">
            <h3>Remove Worker: <?= $rsworkerdeletecheck['FirstName'] . " " . $rsworkerdeletecheck['Insertion'] . ". " . $rsworkerdeletecheck['LastName'] ?>

            <div class="form-check form-switch mt-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            </div>
            <input type="hidden" name="workernumber" value="<?= $_POST['workernumberdelete'] ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>

    <?php
}