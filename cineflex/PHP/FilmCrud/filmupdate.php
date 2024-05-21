<?php
use CineFlex\Classes\Database\DatabaseClass;

require_once '../../Private/connection.php';
include "..\..\Classes\DatabaseClass.php";

$db = new DatabaseClass();
if($_FILES['file_up']['size'] > 1 && $_FILES['cover_image']['error'] > 1) {
    $photo = file_get_contents($_FILES['file_up']['tmp_name']); // reading binary data

    $posterupdate = $db->Insert("UPDATE posters 
                    SET PosterName = :postername,
                        ImageBlob = :posterimage
                        WHERE PosterId = :posterid ",[
        'postername' => $_POST['imagename'],
        'posterimage' => $photo,
        'posterid' => $_POST['oldposter'],
    ]);

}

echo '</pre> POST', print_r($_POST), '</pre>';
echo '</pre> SESSION', print_r($_SESSION), '</pre>';
echo '</pre> GET', print_r($_GET), '</pre>';


$filmupdate = $db->Update("UPDATE films 
                    SET Title = :title,
                        LengthMinutes = :lengthminutes,
                        FkLanguageId = :languageid,
                        Description = :description
                        WHERE FilmId = :filmid", [
                            'title' => $_POST['title'],
                            'lengthminutes' => $_POST['lengthminutes'],
                            'languageid' => $_POST['languageid'],
                            'description' => $_POST['description'],
                            'filmid' => $_POST['filmid'],
]);

$genreremove = $db->Remove('DELETE FROM `filmgenre` WHERE FkFilmId = :filmid ', [
    'filmid' => $_POST['filmid'],
]);

foreach($_POST['genre'] as $genre) {
    $filmgenre = $db->Insert("INSERT INTO `filmgenre`( `FkFilmId` , `FkGenreId`) values ( :filmid , :genre )", [
        'filmid' => $_POST['filmid'],
        'genre' => $genre,
    ]);
}

$kijkjwijzerremove = $db->Remove('DELETE FROM filmkijkwijzer WHERE FkFilmId = :filmid',[
    'filmid' => $_POST['filmid'],
]);

$filmkijkwijzer = $db->Insert("INSERT INTO `filmkijkwijzer`( `FkFilmId` , `FkKijkwijzerId`) values ( :filmid , :kijkwijzer )", [
    'filmid' => $_POST['filmid'],
    ':kijkwijzer' => $_POST['kijkwijzerage'],
]);
foreach($_POST['kijkwijzertype'] as $kijkwijzertype) {
    $filmgenre = $db->Insert("INSERT INTO `filmkijkwijzer`( `FkFilmId` , `FkKijkwijzerId`) values ( :filmid , :kijkwijzer )", [
        'filmid' => $_POST['filmid'],
        ':kijkwijzer' => $kijkwijzertype,
    ]);
}
header('Location: ../../index.php?page=films');
