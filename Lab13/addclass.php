<?php
require_once "config.php";
if(!isset($_SESSION["user_id"])){
    header("Location: index.html");
}
if(isset($_GET["crn"])){
    $crn = $_GET["crn"];
    $semester = $_GET["semester"];
    $user_id = $_SESSION["user_id"];
    $insert_sql = mysqli_query($conn, "INSERT INTO `registrations` (`user_id`, `crn`, `semester`) VALUES ('$user_id', '$crn', '$semester');");
    header("Location: schedule.php");
}
?>