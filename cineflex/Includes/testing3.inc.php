/*$query="INSERT INTO posters (PosterName, ImageBlob)
VALUES (:postername,:imageblob)";
$step=$conn->prepare($query);
$step->bindParam(':postername',$_POST['imagename']);
$step->bindParam(':imageblob',$photo);

if($step->execute()){

echo " Data with Photo is added ";
}
else{
echo " Not able to add data please contact Admin ";
print_r($step->errorInfo());
}*/