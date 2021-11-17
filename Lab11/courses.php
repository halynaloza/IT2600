<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <style>
        * { font-family: Arial, Helvetica, sans-serif; }
        table { max-width: 900px; margin-left: auto; margin-right: auto; border-collapse: collapse; }
        td, th { border: 1px solid teal; padding: 4px; }
        th { background-color: teal; color: white; font-size: 1.1em; font-weight: bold; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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

$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

?>
<a href="addcourse.php"><i class="fas fa-plus-circle"></i> Add Course</a>
<div style="width: 80%; margin: auto">
    <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Course Id</th>
            <th>Title</th>
            <th>Credit Hrs</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["course_id"]. "</td><td>" . $row["title"]. "</td>" .
                    "<td>" . $row["credit_hrs"]. "</td><td>" . $row["description"]. "</td></tr>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
        ?>
        </tbody>
    </table>
</div>
    <script>
        $(document).ready(function () {
            $('#selectedColumn').DataTable({
                searching: false, paging: false, info: false
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>
</html>