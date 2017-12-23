
<?php
$user_id = $_POST['user_id'];
$friend_id = $_POST['friend_id'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");


$qury = "INSERT INTO friend_request (recieve_id, send_id, accept) VALUES ('$friend_id', '$user_id', '0','1');";
$result = $conn->query($qury);
$qury = "SELECT * FROM users WHERE user_id= '$liker_id';";
$result = $conn->query($qury);


if($result == null){
    echo "null";
}
else {
	$user = $result->fetch_assoc();
	header('Content-type: application/json');
	echo json_encode(array("status"=>$result,"f_name" => $user["f_name"], "l_name" => $user["l_name"]));
}

?>