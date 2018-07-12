<?php
include 'StudentClass.php';
$obj=new StudentClass();
?>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 500;
}

td, th {
    border: 1px solid #dddddd;
    text-align: justify;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
</head>
  <body style="800" height ="500" text-align:center"> 
    <h1>STUDENT PAGE</h1>
     <div style="background-color:lightblue">
       <h3>Student Details </h3>
     </div>

<?php
$result=$obj->liststudent();
?> 
  <table border="0" align="center" width="400">
    	<thead>
            <tr> <a href="StudentReg.php" ><input type="button" value="Add New Student" height="200" width="1000">  </tr>
             <tr> <a href="DisplayPage.php" ><input type="button" value="Refresh" height="200" width="1000">  </tr> 
             <tr>
    			<th>Name</th>
                <th>Age</th>
                <th>Option</th>
                <th>Option</th>
    		</tr>
    	</thead>
  <tbody>
<?php
foreach($result as $row)
{
?>
    	<tr>
    		<td><label><?php echo $row['name']; ?></label></td>
            <td><label><?php echo $row['age']; ?></label></td>
            <td>  <?php echo "<a href='delete.php? id=",$row['id'],"'>Delete</a>"?></td>
            <td>  <?php echo "<a href='UpdationPage.php? id=",$row['id'],"'>Update</a>"?></td> </tr>
    		<?php } ?>
    	</tbody>
    </table>
</body>
</html>
