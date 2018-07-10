<html>
<body>

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

<?php
include 'StudentClass.php';
$obj=new StudentClass();
if(isset($_GET['id'])&& $_GET['id']>0){
    $stud_id=(int)$_GET['id'];
    //print_r($stud_id);
    //$data = array_shift(($obj->listStudent($stud_id)));
      $test = $obj->listStudent($stud_id);
      $data =  array_shift($test);
  
}

if(isset($_POST['submit'])){
    $name=$_POST["name"];
    $age=$_POST["age"];
    $id=$_POST["id"];
   // echo $name;
    $result=$obj->update($name,$age,$id);
if ($result) {
   echo "Updated successfully... Thank you <br>";
}
$data["id"]="";
$data["name"]="";
$data["age"]="";

}
?>
 <h1>STUDENT PAGE</h1>
<input type="button" value="View Student" height="200" width="1000" onclick= "location.href= 'DisplayPage.php'">
<form name ="myform" method ="post" action ="UpdationPage.php" onsubmit="return validateform()">

<table width="200" border="0">
<tbody>
<tr>
   
     <td><input type="hidden" name= "id" value=<?php echo $data["id"]?> > </td>
     </tr>
     <tr>
     <td><label>Name</label></td>
     <td><input type="text" name= "name" value=<?php echo $data["name"]?> > </td>
</tr> 
  <tr>
     <td><label>Age</label></td>
     <td><input type="text" name= "age" value= <?php echo $data["age"]?>  > </td>
</tr> 
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value ="submit"></td> 
</tr> 
</tbody>
</table>
</form>


</body>
</html>
