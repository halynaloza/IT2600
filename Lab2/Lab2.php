<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form</title>
<style>
        /* add this class for centralizing the content*/
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
        <!-- set form action page is to 'summary.php'-->
        <form action="summary.php">
          <p>
          Name<br>
          <input type="input" id="name" name="name" placeholder="Name">
          </p>
          <p>
          Major<br>
          <input type="input" id="major" name="major" placeholder="Major">
          </p>
          <p>
          Favorite Web Language<br>
          <input type="radio" id="html" name="fav_language" value="HTML">
          <label for="html">HTML</label><br>
          <input type="radio" id="css" name="fav_language" value="CSS">
          <label for="css">CSS</label><br>
          <input type="radio" id="javascript" name="fav_language" value="JavaScript">
          <label for="javascript">JavaScript</label><br>
          <input type="radio" id="PHP" name="fav_language" value="PHP">
          <label for="PHP">PHP</label>
          </p>
          <p>
          Development Environment<br>
          <!-- change checkboxs name to env and as treated as checkbox array-->
          <input type="checkbox" id="ide1" name="env[]" value="vscode">
          <label for="ide1"> Visual Studio Code</label><br>
          <input type="checkbox" id="ide2" name="env[]" value="brackets">
          <label for="ide2"> Brackets</label><br>
          <input type="checkbox" id="ide3" name="env[]" value="other">
          <label for="ide3"> Other</label> 
          <input type="text" id="othername" name="othername">
          </p>
          <p>
                <!-- create new button with type 'submit' for sending values of form to 'summary.php' page-->
                <input type="submit" value="Submit" name="save" />
          </p>
        </form> 
</div>
</body>
</html>