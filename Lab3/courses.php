<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=it1150", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT course_id, title, credit_hrs FROM courses";
$statement = $conn->prepare($sql);
//$statement->bindValue(':course_id', $course_id);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
?>
<table>
<?php foreach($courses as $course) { ?>
<tr>
  <td><?php echo $course['course_id']; ?></td>
  <td><?php echo $course['title']; ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>