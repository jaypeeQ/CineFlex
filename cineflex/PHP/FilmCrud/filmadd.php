<?php
use CineFlex\Classes\Database\DatabaseClass;
include "..\..\Classes\DatabaseClass.php";

$db = new DatabaseClass();
$photo = file_get_contents($_FILES['file_up']['tmp_name']); // reading binary data

//Insert Poster BLOB image file and image name in posters table.
$id = $db->Insert("INSERT INTO `posters`( `PosterName` , `ImageBlob`) values ( :postername , :imageblob )", [
    'postername' => $_POST['imagename'],
    'imageblob' => $photo,
]);

//Selects the poster id, from the newly created sql query above.
$results = $db->Select("SELECT PosterId, PosterName FROM posters WHERE PosterName = :postername", [
    'postername' => $_POST['imagename'],
]);

//takes in result from the select statement.
foreach($results AS $result) {
    $posterid = $result['PosterId'];
}

//Inserts Film details into films table from given data and from poster id above.
$film = $db->Insert("INSERT INTO `films`( `Title` , `LengthMinutes` , `FkPosterId` , `FkLanguageId`, `Description`) 
                             VALUES (:title, :lengthminutes, :posterid, :languagechoice, :description)", [
    'title' => $_POST['title'],
    'lengthminutes' => $_POST['lengthminutes'],
    'posterid' => $posterid,
    'languagechoice' => $_POST['languagechoice'],
    'description' => $_POST['description'],
]);

//Takes newly added FilmId from films.
$filmselect = $db->Select("SELECT FilmId, Title FROM films WHERE Title = :title", [
    'title' => $_POST['title'],
]);
foreach($filmselect as $film) {
    $filmid = $film['FilmId'];
}

//Takes inputted genre(s) from form into a joining table for films and genres.
foreach($_POST['genre'] as $genre) {
    $filmgenre = $db->Insert("INSERT INTO `filmgenre`( `FkFilmId` , `FkGenreId`) values ( :filmid , :genre )", [
        'filmid' => $filmid,
        'genre' => $genre,
    ]);
}

//Takes inputted kijkwijzerage and kijkwijzertype(s) from form into a joining table for films and genres.

$filmkijkwijzer = $db->Insert("INSERT INTO `filmkijkwijzer`( `FkFilmId` , `FkKijkwijzerId`) values ( :filmid , :kijkwijzer )", [
    'filmid' => $filmid,
    ':kijkwijzer' => $_POST['kijkwijzerage'],
]);
foreach($_POST['kijkwijzertype'] as $kijkwijzertype) {
    $filmgenre = $db->Insert("INSERT INTO `filmkijkwijzer`( `FkFilmId` , `FkKijkwijzerId`) values ( :filmid , :kijkwijzer )", [
        'filmid' => $filmid,
        'kijkwijzer' => $kijkwijzertype,
    ]);
}

header('Location: ../../index.php?page=films');

?>