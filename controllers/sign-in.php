<?php
 
//$username = $_POST['username2'];
$email2=$_POST['email2'];
$password = $_POST['pass2'];
$hashpass = hash('ripemd160', $password);
// $hashed=substr($hashpass,0,20);
$conn = new mysqli("localhost", "root", "root", "labfinal");
// echo"$email2";
 //echo"$hashpass";
$qury = "SELECT * FROM users WHERE email ='$email2' AND password='$hashpass';";
$result = $conn->query($qury);
//echo($result);
if($result == null){
        echo "null";

}
else {
    $student = $result->fetch_assoc();
    header('Content-type: application/json');
   // echo json_encode(array("status"=>$result,"dep" => $student["department_id"], "id" => $student["student_id"] ));
   echo json_encode(array("status" => $result, "id" => result["user_id"],"name"=> result["f_name"]));    
}


?>