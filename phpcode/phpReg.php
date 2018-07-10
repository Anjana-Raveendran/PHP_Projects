<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body>
      <?php
         // define variables and set to empty values
         $nameErr = $ageErr = "";
         $name = $age = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["age"])) {
               $emailErr = "Email is required";
            }else {
               $age = test_input($_POST["age"]);
               
            } 
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
     
      <h2>Absolute classes registration</h2>
     
      <p><span class = "error">* required field.</span></p>
     
      <form method = "post" action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
            <tr>
               <td>Age:</td>
               <td><input type = "text" name = "age">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
				
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
				
         </table>
			
      </form>
      
    
   
   </body>
</html>