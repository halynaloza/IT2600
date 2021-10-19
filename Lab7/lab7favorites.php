<?php
session_start();
echo"Full Name :- ".$_SESSION["fullname"]."<br>";
echo"Course ID :- ".$_SESSION["courseid"]."<br>";
echo"Favorite programing language :-".$_COOKIE["favoritelanguage"]."<br>";
echo"Favorite operating system :-".$_COOKIE["favoriteopsystem"]."<br>";
?>