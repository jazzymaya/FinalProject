<?php
//Connecting to the database called "Final"
$con = mysqli_connect('localhost','root','root','Final');
 
// Check connection, throw an error if you cannot connect
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error($con));
}
 
// Escape user inputs for security
$Exercise = mysqli_real_escape_string($con, $_GET['Exercise']);
$BodyPart = mysqli_real_escape_string($con, $_GET['BodyPart']);
$Sets = mysqli_real_escape_string($con, $_GET['Sets']);
$Reps = mysqli_real_escape_string($con, $_GET['Reps']);
$Intensity = mysqli_real_escape_string($con, $_GET['Intensity']);
$Description = mysqli_real_escape_string($con, $_GET['Description']);

// Using an SQL Insert for the records. Notice how I didnt include the column heading as a part of the SQL. For some reason when I did include it, the headings
// "Sets" and "Description" would turn the color blue instead of orange. (I am using Visual Studio) As a workaround, I just didnt include them. 
// I really don't need to add them anyways since I am adding data to all fileds but I am still confused as to why it didnt work.
$sql = "INSERT INTO workouts VALUES ('$Exercise', '$BodyPart', '$Sets', '$Reps', '$Intensity', '$Description')";
if(mysqli_query($con, $sql)){
    echo "Workout added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// close connection
mysqli_close($con);
?>
