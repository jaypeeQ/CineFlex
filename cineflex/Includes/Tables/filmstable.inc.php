<?php
use CineFlex\Classes\Database\DatabaseClass;

if(!isset($db)) {
    include "Classes\DatabaseClass.php";

    $db = new DatabaseClass();
}

?>

<div class="container mt-3" xmlns="http://www.w3.org/1999/html">

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Length</th>
            <th scope="col">Genre</th>
            <th scope="col">Language</th>
            <th scope="col">Description</th>
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

        $x = 0;
        $result = $db->Select('SELECT * FROM films 
                                INNER JOIN posters ON FkPosterId = PosterId
                                INNER JOIN languages ON LanguageId = FkLanguageId ');

        foreach($result AS $results)
        {
            ?>
            <tr>
            <th scope="row">
                <form method="post" action="index.php?page=filminfo">
                        <button class="border-0" name="filmid" value="<?= $results['FilmId'] ?>">
                            <img src="data:image/jpeg;base64,<?= base64_encode($results['ImageBlob']) ?>" style="max-height: 200px">
                        </button>
                </form>

            </th>
            <td><?= $results['Title'] ?></td>
            <td><?= $results['LengthMinutes'] ?></td>
            <td><?php $genreselect = $db->Select('SELECT * FROM filmgenre INNER JOIN genre ON FkGenreId = GenreId WHERE FkFilmId = :filmid', [
                    'filmid' => $results['FilmId']
                ]);
                foreach($genreselect AS $genre)
                {
                    $filmgenre = $genre['Genre'];
                    echo $filmgenre . ", ";
            }
                }?></td>
            <td><?= $results['Language'] ?></td>

            <td><?= $results['Description'] ?></td>
            <?php
            if(isset($_SESSION['roleid'])) {
                ?>


                <td><form action="index.php?page=managecrud" method="post">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="hidden" name="filmidupdate" value="<?= $results['FilmId'] ?>">
                    </form>
                </td>
                <td><form action="index.php?page=managecrud" method="post">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <input type="hidden" name="filmiddelete" value="<?= $results['FilmId'] ?>">
                    </form>
                </td>

                </tr>
                <?php
            }
            $x++;

        ?>
        </tbody>
    </table>
</div>