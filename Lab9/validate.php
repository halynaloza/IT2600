<?php
$password = $_POST['pwd'];
$error = "";
if(strpbrk($password,'!')){
$error .= "<br>!";
}
if(strpbrk($password,"^")){
$error .= "<br>^";
}
if($error!=""){
$error = "Contains invalid character<br>the illegal character(s) are".$error."<br>";
}else{
$error = "Password accepted.";
}
echo $error;
$error = "";
$weather = strtolower($_POST['weather']);
if(strpbrk($weather,'sunny')){
$error .= "<br>Wear sunscreen";
}
if(strpbrk($weather,'cold')){
$error .= "<br>Wear a hat";
}
if(strpbrk($weather,'raining')){
$error .= "<br>Bring an umbrella";
}
if($error!=""){
$error = "Weather Condition Descriptions are:".$error."<br>";
}else{
$error = "No Keyword found.";
}
$error = "";
$givenString = strtolower($_POST['favseason']);
$spring = substr_count($givenString,'spring');
$summer = substr_count($givenString,'summer');
$fall = substr_count($givenString,'fall');
$winter = substr_count($givenString,'winter');
echo "Spring: ".$spring."<br>Summer: ".$summer."<br>Fall: ".$fall."<br>Winter: ".$winter."<br>";

if($_POST['operand2']=="0"){
$error .= "Division by zero is invalid";
}else{
$error = $_POST['operand1']/$_POST['operand2'];
}
echo $error;
?>
