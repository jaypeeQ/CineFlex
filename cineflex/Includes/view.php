<?php // Sample script to display records ////
require_once '../Private/connection.php';
$query="SELECT * FROM posters";
echo "<table><tr><th>ID</th><th>Name</th>
                <th>Profile</th></tr>";
foreach($conn->query($query) as $row){
    echo "<tr><td><a href=record-display.php?id=$row[ImageId]>$row[ImageId]</a></td>
<td>$row[Name]</td><td>"
        ."<img src='$row[image]' style='max-height: 768px;
    min-width: auto;'>";
        "'/></td>
</tr>";
}
echo "</table>";
