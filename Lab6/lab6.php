<html>

<head>

<title>PHP Test</title>

<style>

* { font-family:Arial, Helvetica, sans-serif; }

input { width:220px; }

</style>

</head>

<body>

<?php


///print_r($_POST);


$first_name = ucfirst(trim($_POST['first']));
$middle_name = ucfirst(trim($_POST['middle']));
$get_first_char = ucfirst($middle_name[0]);
$last_name = trim($_POST['last']);
$combine_name = $first_name.' '.$get_first_char.'. '.$last_name;


$RequestedString = trim($_POST['split']);
/*now, spliting the requested string with dash (-)
using explode function , will return an array*/
$splitString = explode("-",$RequestedString);

$shuffleReqString = str_shuffle(trim($_POST['shuffle']));

$RequestedStringInLowerCase = strtolower(trim($_POST['tolower']));

$compare1 = trim($_POST['compare1']);
$compare2 = trim($_POST['compare2']);

/*using strcmp() function, if returns 0, the two
strings are equal; if less than 0, the string1 is less
than string2; if greater than 0 , then string1 is greater
than string2*/
$strcmpResult = strcmp($compare1,$compare2);

/*using strcmp() function, if returns 0, the two
strings are equal; if less than 0, the string1 is less
than string2; if greater than 0 , then string1 is greater
than string2*/
$strcasecmpResult = strcasecmp($compare1,$compare2);


/*Solution 6 */
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];

$maximumValue = max($num1,$num2);
$mininmumValue = min($num1,$num2);
$averagevalue = (($num1 + $num2)/2);
?>

<h1>Lab 6 Instructions</h1>


For each of the problems, please output the values you create using the string, number, and date functions.
<br>

<form action="lab6.php" method="post">

<p>1.

<i>Combine the first, last, and middle name to display as:

[first name] [middle initial]. [last name]

For example: Steven, Paul, and Jobs would display as "Steven P. Jobs".</i><br>

<b>First Name</b><br>

<input type="text" name="first" value="Steven"><br><br>

<b>Middle Name</b><br>

<input type="text" name="middle" value="Paul"><br><br>

<b>Last Name</b><br>

<input type="text" name="last" value="Jobs">

<b><p>Solution 1: Combined Name is : <?php echo $combine_name; ?></p></b>
</p>

<p>2.

<i>Split the following string on each dash - character. Display each word on its own line.</i><br>

<input type="text" name="split" value="Emma-is-a-data-scientist" readonly>
<br><br>
<b> Solution 2: (Spliting String with - (dash) and dispaly each word) : </b>

<?php foreach ($splitString as $key => $eachWord)
{
    echo "<b id='".$key."'><p style='margin-left:90px;'>".$eachWord."</p></b>";

} ?>
</p>

<p>3.

<i>Randomly shuffle and output the value for the following string.</i><br>

<input type="text" name="shuffle" value="abcdefghijklmnopqrstuvwxyz" readonly>

<br> <b><p> Solution 3: (Randomly shuffle and display value) : <?php echo $shuffleReqString; ?></p></b>
</p>

<p>4.

<i>Convert the following to all lowercase and output the value.</i><br>

<input type="text" name="tolower" value="SteveJobs@Tri-C.edu" readonly>

<br> <b><p> Solution 4: Required output in lowercase : <?php echo $RequestedStringInLowerCase; ?> </p></b>
</p>

<p>5.

<i>Use both strcmp() and strcasecmp() to compare the following values.</i><br>

<b>First Compare Value</b><br>

<input type="text" name="compare1" value="11000 W PLEASANT VALLEY RD" readonly><br><br>

<b>Second Compare Value</b><br>

<input type="text" name="compare2" value="11000 W Pleasant Valley Rd" readonly>

<br> <b><p> Solution 5: </b></p>
<b><p> 1. When comapring two string with using strcmp(), output is
<?php
if($strcmpResult == 0)
{
echo "value is : ".$strcmpResult.",that means both the string are equal";

}elseif($strcmpResult < 0)
{
echo "value is : ".$strcmpResult." , that means string1 is less than string2";
}
else
{
echo "value is : ".$strcmpResult." , that means string1 is greater than string2";
}
?> </p></b>

<b><p> 2. When comapring two string with using strcasecmp(), output is
<?php
if($strcasecmpResult == 0)
{
echo "value is : ".$strcasecmpResult.",that means both the string are equal";

}elseif($strcasecmpResult < 0)
{
echo "value is : ".$strcasecmpResult." , that means string1 is less than string2";
}
else
{
echo "value is : ".$strcasecmpResult." , that means string1 is greater than string2";
}
?> </p></b>
</p>

<p>6.

<i>For the following numbers, find the minimum, maximum, and average values.</i><br>

<b>Number 1</b><br>

<input type="text" name="num1" value="2401" readonly><br><br>

<b>Number 2</b><br>

<input type="text" name="num2" value="1100" readonly>

<br><b><p>Solution 6 :</p>
<b><p>Required Maximum value : <?php echo $maximumValue; ?> </p>
<b><p>Required Minimum value : <?php echo $mininmumValue; ?> </p>
<b><p>Required Average value : <?php echo $averagevalue; ?> </p>
</p> <br>

<p>7.

<i>Generate a random integer between 0 and 100.</i>
<br><b><p>Solution 7: </p>
<b><p> <?php echo(rand(0,100)); ?></p></b>
</p>

<p>8.

<i>Use sprintf() to output the following value in currency format with two decimal places and a $ sign.</i><br>

<input type="text" name="currency" value="125.9712" readonly>
<br><b><p>Solution 8: </p>
<b><p>
<?php
$foo = $_POST['currency'];
echo number_format((float)$foo, 2, '.', ''). '$';
?>
</p></b>
</p>

<p>9.

<i>Output the following date and time in two different formats.</i><br>

<b>Year</b><br>

<input type="text" name="year" value="2021" readonly><br><br>

<b>Month</b><br>

<input type="text" name="month" value="11" readonly><br><br>

<b>Day</b><br>

<input type="text" name="day" value="01" readonly><br><br>

<b>Hour</b><br>

<input type="text" name="hour" value="12" readonly><br><br>

<b>Minute</b><br>

<input type="text" name="minute" value="05" readonly>


<br><b><p>Solution 9: </p>
<b><p>Type 1. AND Type 2 Format:
<?php

$ReqDate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'].':'.$_POST['hour'].':'.$_POST['minute'].'00';
$timestamp = strtotime($ReqDate);
echo date('d/m/Y:h:i:s', $timestamp);
echo ' And ';
echo date('d-m-Y:h:m:s', $timestamp);

?>
</p></b>
</p>

<p>10.

<i>Using the date/time values from the previous problem, calculate how many hours there are from now until then.</i>
<br><b><p>Solution 10: </p>
<b><p>
<?php

$ReqDate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'].':'.$_POST['hour'].':'.$_POST['minute'].'00';
$date = date('m/d/Y h:i:s', time());

$starttimestamp = strtotime($date);
$endtimestamp = strtotime($ReqDate);

$difference = abs($endtimestamp - $starttimestamp)/3600;
echo "Required Hours: " .$difference.' hours elapsed';

?>
</p></b>
</p>

<input type="submit">

</form>

</body>

</html>