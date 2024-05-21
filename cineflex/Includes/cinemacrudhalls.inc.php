<?php
if(isset($_POST['hallnumber'])) {
    $hallnumber = $_POST['hallnumber'];
    $value = 'value = ' . $hallnumber;
}else
$value = '';

/*echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';*/




?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
    <h2>Cinema CRUD</h2>
    <h3>Add Cinema Halls for <?= $_SESSION['cinemaname'] ?></h3>
    <?php if(!isset($_POST['submit1'])) { ?>
    <form id="submit1" method="post" action="">
        <div class="mb-3 mt-3">
            <label class="form-label"> Halls: </label>

            <input id="hallnumber" class="form-control" type="number" name="hallnumber" required
                    <?php  echo $value ?>>

                <button class="btn btn-primary">Submit</button>

        </div>
    </form>
    <?php } ?>
</div>

</br>
<div>
        <form id="submit2" action="PHP/CinemaCrud/cinemaaddhalls.php" method="post">
            <input type="hidden" name="hallnumber" value="<?= $_POST['hallnumber'] ?>">
            <?php
            if(isset($_POST['hallnumber'])) {
            while($_POST['hallnumber'] != 0) {
            ?>
        <div class="inline-container p-3">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Hall Name: </label>
                <input type="text" class="form-control" name="hallname[]" placeholder="Hall Name" required>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Rows: </label>
                <input type="number" class="form-control" name="rows[]" placeholder="Rows" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Seats per row: </label>
                <input type="number" class="form-control" name="columns[]" placeholder="Columns" required>
            </div>
        </div>

        <?php
                $_POST['hallnumber'] = $_POST['hallnumber'] - 1 ;
                }
            }
        ?>
            <button class="btn btn-primary">Submit</button>
    </form>
</div>









