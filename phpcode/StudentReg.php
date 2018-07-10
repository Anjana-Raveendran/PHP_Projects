<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Style the content */
.content {
    background-color: #ddd;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

/* Style the footer */
.footer {
    background-color: #f1f1f1;
    padding: 10px;
}
</style>
</head>
<body>
<?php

include 'StudentClass.php';
$obj=new StudentClass();
         // define variables and set to empty values
         $nameErrr = $ageErrr = "";
         $name = $age = "";
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $namecheck=($_POST["name"]) ;
            if (empty($_POST["name"]) || (!preg_match("/^[a-zA-Z ]*$/",($_POST["name"]))) || $namecheck == null) {
                $nameErrr = "Only letters and white space allowed";
                //echo "$namecheck";
            }
            else {
                $name = test_input($_POST["name"]);
              //  echo "$namecheck  ";
            }
            if (empty($_POST["age"]) || ($_POST["age"]) == null || is_numeric($_POST["age"]) == false || filter_var($_POST["age"], FILTER_VALIDATE_INT) !=true || filter_var($_POST["age"], FILTER_VALIDATE_INT) === 0) {
  	        	$ageErrr = "invalid Age";
                }
            else {
                $age = test_input($_POST["age"]);
                }

            }
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
         if(empty($nameErrr) && empty($ageErrr)){
             $result=$obj->add($name,$age);
             if ($result) {
                 echo "Registred successfully... Thank you <br>";
             }
         }
   ?>
<div class="topnav">
</div>
<div class="content">
  <h2></h2>

<input type="button" value="View Students" height="200" width="1000" onclick= "location.href= 'DisplayPage.php'">

<h2>Registration Page</h2>
 <form method = "post" action = "<?php
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" pattern="[A-Za-z\s]+" name = "name" >
                  <span class = "error"> <?php echo $nameErrr;?></span>
               </td>
            </tr>
            <tr>
               <td>Age:</td>
               <td><input type = "text" pattern="[0-9]+"  name = "age">
                  <span class = "error"> <?php echo $ageErrr;?></span>
               </td>
            </tr>
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
         </table>
      </form>
</div>
<div class="footer">
</div>
</body>
</html>
