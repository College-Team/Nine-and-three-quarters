<?php 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email =$_POST['email'];
$password = $_POST['pass'];
$gender=$_POST['gender'];
//echo($gender);
$birthdate=$_POST['birthdate'];
$hashpass = hash('ripemd160', $password);
$conn = new mysqli("localhost", "root","root", "labfinal");
$result = $conn->query("INSERT INTO users(f_name,l_name,password,email,gender,birth_date) VALUES('$firstname','$lastname','$hashpass','$email','$gender','$birthdate');");
header('Content-type: application/json');
echo json_encode(array("status" => $result, "id" => $conn->insert_id));    
?>