<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "it1150";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["submit"])){
    $courseid = mysqli_real_escape_string($conn, $_POST["courseid"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $credits = mysqli_real_escape_string($conn, $_POST["credits"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $prereq = mysqli_real_escape_string($conn, $_POST["prereq"]);

    $sql = mysqli_query($conn, "INSERT INTO `courses` (`course_id`, `title`, `credit_hrs`, `description`, `prerequisites`) VALUES ('$courseid', '$title', '$credits', '$desc', '$prereq');");
    if($sql){
        echo "<p style='text-align: center; font-size: 30px; color: green'>Your course has been successfully added!</p> 
        <p style='text-align: center;'><a href='courses.php'>Courses List</a></p>";
    }else{
        echo "<p style='text-align: center; font-size: 30px; color: red'>Something went wrong, please try again</p> 
              <p style='text-align: center;'><a href='courses.php'>Courses List</a></p>";
    }
}else{
    header("Location: courses.php");
}
?>