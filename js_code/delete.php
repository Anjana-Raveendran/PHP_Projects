<html
<body>
<?php
include 'StudentClass.php';
$obj= new StudentClass();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET["id"];
    $result=$obj->delete($id);
if ($result) {
    echo "Deleted successfully... Thank you <br>";
}
}
?>
<input type="button" value="View Students" height="200" width="1000" onclick= "location.href= 'DisplayPage.php'">
</body>
</html>
