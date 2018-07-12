<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
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

<div class="topnav">
</div>
<h2></h2>
<?php
include 'StudentClass.php';
$obj=new StudentClass();
?>
<script> 
function validateform(){
var name=document.myform.name.value;
var age=document.myform.age.value;
if (name==null || name==" "|| name=="" || isNaN(name) !== true || /^[A-Za-z ]*$/.test(name) == false){
  alert("Name format Error");
  return false;
}
else if(age ==null || age=="" || age.length>2 || age < 1 || isNaN(age) ){
  alert("Age format Error");
  return false;
  }
}
</script>
<input type="button" value="View Students" height="200" width="1000" onclick= "location.href= 'DisplayPage.php'">
<h2>Registration Page</h2>
<form name ="myform" method ="post" action ="StudentReg.php" onsubmit="return validateform()">
<table width="200" border="0">
  <tbody>
    <tr>
      <td><label>Name</label></td>
      <td><input type="text" name= "name"> </td>
    </tr>

<tr>
      <td><label>Age</label></td>
      <td><input type="text" name= "age"> </td>
    </tr>
    <tr>
      <td><input type="submit" name="submit" value ="submit"></td>
    </tr>
  </tbody>
</table>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $age = $_POST["age"];
    // echo $name;
    $result=$obj->add($name,$age);
if ($result) {
    echo "Registred successfully... Thank you <br>";
}
}
?>
</div>
<div class="footer">
</div>
</body>
</html>
