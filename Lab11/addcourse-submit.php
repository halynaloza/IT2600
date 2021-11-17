<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "it1150";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $credits = $_POST['credits'];
    $desc = $_POST['desc'];
    $prereq = $_POST['prereq'];

    $sql = mysqli_query($conn, "INSERT INTO courses (course_id, title, credit_hrs, description, prerequisites) VALUES (NULL, '$title', '$credits', '$desc', '$prereq')");
    if ($sql){
        ?>
        <div>
            <p>Course Added</p>
            <a href="course.php"><button>Back to Courses</button></a>
        </div>
        <?php
    } else {
        echo mysqli_error($conn, $sql);
    }
}
?>