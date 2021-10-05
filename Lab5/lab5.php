<!DOCTYPE html>

<html>

<head>

<title>Investment Calculator</title>

<style>

    td, th { text-align: right }

    td {padding:4px; width: 110px; }

    tr:nth-child(even) {background-color: #e5e5e5; }

    tr {border-bottom:1px solid #cccccc; }

    .year {width:30px;}

</style>

</head>

<body>

    <h1>Simple Investment Calculator</h1>

    <?php

    setlocale(LC_MONETARY,"en_US");

   
    <h3>Investment Details</h3>

    <?php

    // TODO: Display the values that you read in from above: amount, rate, years, addamount, and extra.

    echo "Amount " . $newamount."<br>";
    echo "Rate " .$rate."<br>";
    echo "Years ".$years."<br>";
    echo "Add amount ".$addamount."<br>";
    echo "Extra ".$extra;

    ?>

    <h3>Annual Schedule</h3>

    <table>

        <tr>

            <th>Year</th>

            <th>Start Amount</th>

            <th>Interest</th>

            <th>End Amount</th>

        </tr>

    <?php

    // TODO: modify the loop, so it only loops for the number of years invested.

    for ($x=0; $x<$years; $x++) {

        $startamount = $newamount;

        $interest = $newamount * ($rate/100);

        // TODO: if "addamount" is equal to "Yes", add the amount from "extra" to $newamount.

      if($addamount==="Yes")
      {
          $newamount=$newamount+$extra;
      }
        $newamount = $newamount + $interest;

    ?>

    <tr>

        <td class="year"><?php echo ($x+1); ?>

        <td><?php printf ( "$%.02f" , $startamount ); ?></td>

        <td><?php printf ( "$%.02f" , $interest ); ?></td>

        <td><?php printf ( "$%.02f" , $newamount ); ?></td>

        <!-- TODO: if "addamount is equal to "Yes", display two additional columns: the extra amount and the $newamount after adding the extra. -->

    <?php

    }

    // TODO: For 2 extra credit points: Add a summary that includes amount invested, total interest earned, total extra amount added, and the final amount.

    ?>

</body>

</html>