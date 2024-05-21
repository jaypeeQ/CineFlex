<?php
/*$hallrows = array(4, 6, 3);
$hallseats = array(5, 6, 9);
$hallnames = array("A", "B", "C");

foreach ($hallrows AS $hall => $rows) {
    echo $hall . $rows;
    echo '<br>';

}foreach ($hallnames AS $hall => $name) {
    echo $hall . $name;
    echo '<br>';
}foreach ($hallseats AS $hall => $seat) {
    echo $hall . $rows;
    echo '<br>';

}*/ $hallnumber = 3;
?>
<div>
        <form id="submit2" action="PHP/cinemaaddhalls.php" method="post">
            <?php

            if(isset($hallnumber)) {
            while($hallnumber != 0) {
            ?>
        <div class="inline-container p-3">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Hall Name: </label>
                <input type="text" class="form-control" name="hallname[]" placeholder="Hall Name">
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Rows: </label>
                <input type="number" class="form-control" name="rows[]" placeholder="Rows">
            </div>
            <div class="mb-3">
                <label class="form-label">Seats per row: </label>
                <input type="number" class="form-control" name="columns[]" placeholder="Columns">
            </div>
        </div>

        <?php
        $hallnumber = $hallnumber - 1 ;
                }
            }
        ?>
            <button type="submit">submit</button>
        <button type="submit" name="submit2" class="btn btn-secondary">Submit</button>
    </form>
</div>
