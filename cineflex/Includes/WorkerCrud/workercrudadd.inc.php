<?php

?>
<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <h2>Worker CRUD</h2>
    <form action="PHP/WorkerCrud/workeradd.php" method="post">
        <h3>Add Worker</h3>

        <div class="mb-3 mt-3">
            <label class="form-label">First Name: </label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Insertion: </label>
            <input type="text" class="form-control" name="insertion" placeholder="Enter Insertion">
        </div>


        <div class="mb-3 mt-3">
            <label class="form-label">Last Name: </label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Email: </label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Birth Date: </label>
            <input type="date" class="form-control" name="birthdate" placeholder="Enter Birth date" required>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Phone Number: </label>
            <input type="text" class="form-control" name="phonenumber" placeholder="Enter Phone Number" required>
        </div>

        <?php
        include "Includes/WorkerCrud/workercrudpassword.inc.php";
        ?>

        </p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
