<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Summary</title>
<style>
        .main{
                margin: 0 auto;
                width: 500px;
                border: 1px solid blue;
                padding: 30px;
        }
</style>
</head>
<body>
<div class="main">
        <?php
                // check the form is submited with input values 
                if(isset($_REQUEST['save'])){
                        // if submitted read all input values using '$_REQUEST' method
                        $name = $_REQUEST['name'];
                        $major = $_REQUEST['major'];
                        $fav_language = $_REQUEST['fav_language'];
                        $env = $_REQUEST['env'];
                        $env_selected = '';
                        $othername = '';
                        
                        // the field 'Development Environment' contains array of values
                        // with in the PHP page parse the array to values
                        // first check any  checkbox is selected or not
                        if(!empty($env)){
                                // using php foreach Loop to iterate and fetch the values of checked checkboxs.
                                foreach($env as $selected){
                                        if($selected != 'other'){
                                                $env_selected .= $selected.'</br>';
                                        }else{
                                                $env_selected .= $_REQUEST['othername'];
                                        }
                                }
                        }
                }
        ?>
        <!-- finally display the all input values to the page using php echo command-->
        <table width="95%">
                <tr>
                        <th colspan="2">Summary</th>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                        <th align="left">Name: </th>
                        <td><?php echo $name; ?></td>
                </tr>
                <tr>
                        <th align="left">Major :</th>
                        <td><?php echo $major; ?></td>
                </tr>
                <tr>
                        <th align="left">Favorite Web Language : </th>
                        <td><?php echo $fav_language; ?></td>
                </tr>
                <tr>
                        <th align="left">Development Environment :</th>
                        <td><?php echo $env_selected; ?></td>
                </tr>
        </table>
</div>
</body>
</html>