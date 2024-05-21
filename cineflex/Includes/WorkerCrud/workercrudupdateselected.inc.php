<?php
$sqlworkercheck2 = 'SELECT * FROM workers WHERE WorkerNumber = :workernumber';
$sthworkercheck2 = $conn->prepare($sqlworkercheck2);
$sthworkercheck2->bindParam(':workernumber', $_POST['workernumberupdate']);

$sthworkercheck2->execute();

while($rsworkercheck2 = $sthworkercheck2->fetch(PDO::FETCH_ASSOC))
{ ?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <h2>Worker CRUD</h2>
    <form action="PHP/WorkerCrud/workerupdate.php" method="post">
        <h3>Update Worker info for: <?= $rsworkercheck2['FirstName'] . " " . $rsworkercheck2['Insertion'] . ". " . $rsworkercheck2['LastName'] ?>
        </h3>

        <div class="mb-3 mt-3">
            <label class="form-label">First Name: </label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?= $rsworkercheck2['FirstName'] ?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Insertion: </label>
            <input type="text" class="form-control" name="insertion" placeholder="Enter Insertion" value="<?= $rsworkercheck2['Insertion'] ?>">
        </div>


        <div class="mb-3 mt-3">
            <label class="form-label">Last Name: </label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?= $rsworkercheck2['LastName'] ?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Email: </label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?= $rsworkercheck2['Email'] ?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Birth Date: </label>
            <input type="date" class="form-control" name="birthdate" placeholder="Enter Birth date" value="<?= $rsworkercheck2['BirthDate'] ?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Phone Number: </label>
            <input type="text" class="form-control" name="phonenumber" placeholder="Enter Phone Number" value="<?= $rsworkercheck2['PhoneNumber'] ?>" required>
        </div>

        </p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php } ?>