<?php
include "MysqlConnector.php";
class StudentClass{
    var $id;
    var $name;
    var $age;

    function __construct(){
       $this->connection =  new MysqlConnector();
    }

    function listStudent($stud_id=0){
        $sql = "select * from student_details";
	if($stud_id > 0){
		$sql.=" where id=".$stud_id;
	}
        $result = $this->connection->select($sql);
        $arr=array();
        if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
            $arr[]=$row;
  }
        }
        return $arr;
    }
    function add($name,$age){
        $sql = "INSERT INTO  student_details (name,age) VALUES ('$name','$age')" ;
        //$sql = "INSERT INTO student_details('id', 'name', 'age') VALUES (1,'anjana',12)";
        $result = $this->connection->modify($sql);
        return $result;
       // var_dump($result);
        if($result==true)
        {
        echo "inserted successfully";
        }
        else
        echo "error";
    }

    function update($name,$age,$id){
        $sql = "UPDATE student_details SET name='$name', age='$age' WHERE id='$id'";
        $result = $this->connection->modify($sql);
       
        if($result==true)
        {
           return $result;
        }
    }
    function delete($id){
        $sql = "DELETE FROM student_details WHERE id='$id'";
        $result = $this->connection->modify($sql);
        return $result;
        if($result==true)
        {
            echo "Record with id $id Deleted sucessfully";
        }
        else
            echo "error";
    }
}

