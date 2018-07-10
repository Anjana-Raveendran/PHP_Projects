<?php
include 'StudentClass.php';
$obj= new StudentClass();
?>

<html>
<body>
<form method ="post" action ="<?php echo $_SERVER['PHP_SELF']; ?>">   
<table width="200" border="0">
  <tbody>
    <tr>
      <td><label>id</label></td>
      <td><input type="text" name = "id"></tdi>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value ="submit"></td>
    </tr>
  </tbody>
</table>
</form>
<?php
if ($_SERVER[REQUEST_METHOD]=='POST'){
    $id = $_POST["id"];
   // echo "$id ";
    $result=$obj->delete($id);
if ($result) {
    echo "Deleted successfully... Thank you <br>";
}
}
?>

    </body>
</html>
