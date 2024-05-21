<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <h2>Worker CRUD</h2>

    <h3>Remove Worker</h3>

    <form method="post" action="">
        <div class="mb-3 mt-3">
            <label class="form-label">Cinema Name: </label>
            <select name="workernumberdelete">
                <?php

                $sqlworkercheck = 'SELECT * FROM workers';
                $sthworkercheck = $conn->prepare($sqlworkercheck);

                $sthworkercheck->execute();

                while($rsworkercheck = $sthworkercheck->fetch(PDO::FETCH_ASSOC))
                { ?>
                    <option value="<?= $rsworkercheck['WorkerNumber'] ?>">
                        <?= $rsworkercheck['FirstName'] , " " , $rsworkercheck['Insertion'] . ". " . $rsworkercheck['LastName'] ?>
                    </option> <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
