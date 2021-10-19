<?php

$server_side=array("PHP", "ASP.NET", "Ruby", "Java", "Scala", "JavaScript", "Python" );
sort($server_side);
echo"Server side language array by for loop :-";
for($i-0;$i<sizeof($server_side);$i++)
{
    echo "<br>".$server_side[$i];
}

$server_side_value-array(
    "Python" => 1.4,
    "ASP.NET" => 8.3,
    "Ruby" => 5.2,
    "PHP" => 78.9,
    "Java" => 3.6,
    "Scala" => 2.0
);
arsort($server_side_value);
echo"<br>Associative array by foreach lop in the table order :-";
echo"<table>";
foreach($server_side_value as $key -> $value)
{
    echo"<tr><td>".$key."</td><td>". $value. "%</td><tr>";
}
echo "</table";

session_start();
$_SESSION["fullname"]-"Halyna Rodriguez";
$_SESSION[courseid]-"IT2600";
setcookie("favoritelanguage","PHP", time()+(86400 * 30), "/");
setcookie("favoriteopsystem","Macintosh", time() + (86400 * 30), "/");
echo'<a href=" lab7fvavorites.php">lab7favorites</a>';
?>