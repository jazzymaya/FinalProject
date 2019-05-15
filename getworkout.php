<!DOCTYPE html>
<html>
    <!--Again as explained on my index.html file, the majority of this code was taken from w3schools about their AJAX live search function. 
        This is their link "https://www.w3schools.com/php/php_ajax_database.asp"
    -->
<head>
<link rel="stylesheet" href="styles/stylesheet.css" />
</head>
<body>
<?php
// "q" is whatever BodyPart the user chooses
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','root','Final');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
// Here I am selecting my database "Final"
mysqli_select_db($con,"Final");
// Here is an SQL query showing all records where the BodyPart = the value of "q"
$sql="SELECT * FROM workouts WHERE BodyPart = '".$q."'";
$result = mysqli_query($con,$sql);

//The code then displays the data as a table
echo "<table>
<tr>
<th>Exercise</th>
<th>BodyPart</th>
<th>Sets</th>
<th>Reps</th>
<th>Intensity</th>
<th>Description</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Exercise'] . "</td>";
    echo "<td>" . $row['BodyPart'] . "</td>";
    echo "<td>" . $row['Sets'] . "</td>";
    echo "<td>" . $row['Reps'] . "</td>";
    echo "<td>" . $row['Intensity'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>