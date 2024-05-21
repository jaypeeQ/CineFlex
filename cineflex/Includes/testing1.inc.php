<?php
?>
<table class='table'>
    <tbody>
    <?php

        /*$letters = range('A', 'Z');
        $numbers = range(1, 100);*/


        /*foreach($letters AS $letter => $value) {
            echo "<tr>";
            foreach($numbers AS $number) {*/
                $x = 0;
                while($result = $sthshow->fetch(PDO::FETCH_ASSOC)){


                    if($x == 0) {
                        echo '<tr>';
                    }

                    if(isset($result['IsTaken'])) {
                        if ($result['IsTaken'] == 0) {

                            ?>
                            <td style="background-color: blue; font-size: 14px"> <input type="checkbox"> <?= $result['SeatRow'].$result['SeatNumber'] ?> O </td>
                        <?php }
                        elseif ($result['IsTaken'] == 1) {
                            $x++;?>
                            <td style="background-color: red;"> <input type="checkbox" disabled> <?= $result['SeatRow'].$result['SeatNumber'] ?> X </td>
                        <?php }
                        }
                        ?>
                    <?php
                        if($result['SeatNumber'] == $x) {
                            $x = 0;
                            echo '</tr>';
                        }

                }

        ?>
        </tbody>
</table>
