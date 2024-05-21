<?php
use CineFlex\Classes\Database\DatabaseClass;
include "Classes\DatabaseClass.php";

$db = new DatabaseClass();
?>
<div class="container mt-3" xmlns="http://www.w3.org/1999/html">
<div class="row">
    <div class="col-3">
    <div class="d-flex justify-content-start flex-shrink-0 bg-light border">

        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center w-100 p-3">
            <form method="post" action="">

            <li class="">
                <button type="submit" value="filmcrud" name="filmcrud" class="nav-link active border-bottom w-100 p-3">
                    Manage Films
                </button>
            </li>
            <li class="">
                <button name="cinemacrud" value="cinemacrud" class="nav-link active border-bottom w-100 p-3">
                    Manage Cinemas
                </button>
            </li>

            <li class="nav-item">
                <button name="showingcrud" value="showingcrud" class="nav-link active border-bottom justify-content-start w-100 p-3">
                    Manage Timeslot
                </button>
            </li>
                <?php
                if(isset($_SESSION['loggedin'])){
                    if($_SESSION['roleid'] == 1){
                        ?><li class="nav-item">
                            <button name="workercrud" value="workercrud" class="nav-link active border-bottom w-100 p-3">
                                Manage Workers
                            </button>
                        </li>
                <?php
                    }
                }
                ?>

        </ul>
            </form>
    </div>
    </div>
    <div class="col-9">
        <div class="d-flex justify-content-start flex-shrink-0 bg-light p-4 border">
                <?php
                /*echo '</pre> POST', print_r($_POST), '</pre>';
                echo '</pre> SESSION', print_r($_SESSION), '</pre>';
                echo '</pre> GET', print_r($_GET), '</pre>';*/
                //Tables for viewing
                if(isset($_POST['filmview'])) {
                    include "Includes/Tables/filmstable.inc.php";
                }if(isset($_POST['cinemaview'])) {
                    include "Includes/Tables/cinematable.inc.php";
                }if(isset($_POST['workerview'])) {
                    include "Includes/Tables/workertable.inc.php";
                }if(isset($_POST['showingview'])) {
                    include "Includes/Tables/showingtable2.inc.php";
                }
                    if(isset($_POST['filmcrud'])){
                        include "Includes/filmcrud.inc.php";
                    }elseif(isset($_POST['cinemacrud'])){
                        include "Includes/cinemacrud.inc.php";
                    }elseif(isset($_POST['workercrud'])){
                        include "Includes/workerscrud.inc.php";
                    }elseif(isset($_POST['showingcrud'])){
                        include "Includes/showingcrud.inc.php";
                    }
                ?>

            <?php
            //Film Crud
                if(isset($_POST['filmadd'])) {
                    include "Includes/FilmCrud/filmcrudadd.inc.php";
                }
                if(isset($_POST['filmupdate'])) {
                    include "Includes/FilmCrud/filmcrudupdate.inc.php";
                }
                if(isset($_POST['filmidupdate'])) {
                    include "Includes/FilmCrud/filmcrudupdateselected.inc.php";
                }
                if(isset($_POST['filmremove'])) {
                    include "Includes/FilmCrud/filmcruddelete.inc.php";
                }
                if(isset($_POST['filmiddelete'])) {
                    include "Includes/FilmCrud/filmcruddeleteselected.inc.php";
                }
                //Cinema Crud
                if(isset($_POST['cinemaadd'])) {
                    include "Includes/CinemaCrud/cinemacrudadd.inc.php";
                }
                if(isset($_POST['cinemaupdate'])) {
                    include "Includes/CinemaCrud/cinemacrudupdate.inc.php";
                }
                if(isset($_POST['cinemaidupdate'])) {
                    include "Includes/CinemaCrud/cinemacrudupdateselected.inc.php";
                }
                if(isset($_POST['cinemaremove'])) {
                    include "Includes/CinemaCrud/cinemacruddelete.inc.php";
                }
                if(isset($_POST['cinemaiddelete'])) {
                    include "Includes/CinemaCrud/cinemacruddeleteselected.inc.php";
                }
                //Worker Crud
                if(isset($_POST['workeradd'])) {
                    include "Includes/WorkerCrud/workercrudadd.inc.php";
                }
                if(isset($_POST['workerupdate'])) {
                    include "Includes/WorkerCrud/workercrudupdate.inc.php";
                }
                if(isset($_POST['workernumberupdate'])) {
                    include "Includes/WorkerCrud/workercrudupdateselected.inc.php";
                }
                if(isset($_POST['workerremove'])) {
                    include "Includes/WorkerCrud/workercruddelete.inc.php";
                }
                if(isset($_POST['workernumberdelete'])) {
                    include "Includes/WorkerCrud/workercruddeleteselected.inc.php";
                }
                //Showtimes Crud
                if(isset($_POST['showing'])) {
                    include "Includes/ShowingCrud/showing.inc.php";
                }
                if(isset($_POST['showingselected'])) {
                    include "Includes/ShowingCrud/showingselected.inc.php";
                }
                if(isset($_POST['showingcinemaselected'])) {
                    include "Includes/ShowingCrud/showingcinemaselected.inc.php";
                }
                if(isset($_POST['showingconfirm'])) {
                    include "Includes/ShowingCrud/showingconfirm.inc.php";
                }
                if(isset($_POST['showingupdate'])) {
                    include "Includes/ShowingCrud/showingupdate.inc.php";
                }
                if(isset($_POST['updatetimeslotselected'])) {
                    include "Includes/ShowingCrud/showingupdateselected.inc.php";
                }
                if(isset($_POST['showingupdateselectedcinema'])) {
                    include "Includes/ShowingCrud/showingupdateselectedcinema.inc.php";
                }
                if(isset($_POST['showingupdateconfirm'])) {
                    include "Includes/ShowingCrud/showingupdateconfirm.inc.php";
                }
                if(isset($_POST['removetimeslotselected'])) {
                    include "Includes/ShowingCrud/showingremoveconfirm.inc.php";
                }
                if(isset($_POST['showingremove'])) {
                    include "Includes/ShowingCrud/showingremove.inc.php";
                }
                if(isset($_POST['confirmeddeletetimeslot'])) {
                    include "Includes/ShowingCrud/showingremove.inc.php";
                }

                ?>



        </div>
    </div>

</div>
</div>