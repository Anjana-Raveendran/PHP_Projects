<html>
<body>

<?php
include 'StudentClass.php';
$obj=new StudentClass();
$nameErrr = $ageErrr = "";
$name = $age ="";
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"]) || (!preg_match("/^[a-zA-Z ]*$/",($_POST["name"]))) || ($_POST["name"]) == null || ($_POST["name"])==" ") {
                $nameErrr = "Only letters and white space allowed";
            }
            else {
                $name = test_input($_POST["name"]);
            }
            if (empty($_POST["age"]) || ($_POST["age"]) == null || is_numeric($_POST["age"]) == false || filter_var($_POST["age"], FILTER_VALIDATE_INT) !=true || filter_var($_POST["age"], FILTER_VALIDATE_INT) === 0) {
                $ageErrr = "invalid Age";
            }
            else {
                $age = test_input($_POST["age"]);
            }
            print_r($name);
            print_r($age);
          }
         function test_input($data) {
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
         }
         if(isset($_GET['id'])&& $_GET['id']>0){
             $stud_id=(int)$_GET['id'];
             $test = $obj->listStudent($stud_id);
             $data =  array_shift($test);
         }
         if(isset($_POST['submit'])){
             $name=$_POST["name"];
             $age=$_POST["age"];
             $id=$_POST["id"];
             if (empty($nameErrr) && empty($ageErrr)){
                 $result=$obj->update($name,$age,$id);
                 if ($result) {
                 echo "Updated successfully... Thank you <br>";
                 }
             }
             $data["id"]="";
             $data["name"]="";
             $data["age"]="";
         }
?>
 <h1>STUDENT PAGE</h1>
<input type="button" value="View Student" height="200" width="1000" onclick= "location.href= 'DisplayPage.php'">
 <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table width="200" border="0">
<tbody>
<tr><td><input type="hidden" name= "id" value=<?php echo $data["id"]?> > </td> </tr>
<tr> <td><label>Name</label></td>
<td><input type="text" name= "name" value=<?php echo $data["name"]?> >
<span class = "error">*  <?php echo $nameErrr;?></span></td>
</tr><tr> <td><label>Age</label></td>
<td><input type="text" name= "age" value= <?php echo $data["age"]?>  > 
<span class = "error">* <?php echo $ageErrr;?></span></td>
</tr> <td>&nbsp;</td>
 <td><input type="submit" name="submit" value ="submit"></td> </tr> 
</tbody>
</table>
</form>
</body>
</html>
