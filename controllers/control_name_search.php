<?php
$searchText=$_POST['searchText'];
//$user_Id = $_POST['userid'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labfinal";


$conn = new mysqli($servername, $username, $password, $dbname);


$qury = "SELECT * FROM users WHERE   f_name LIKE '%$searchText%' OR l_name LIKE '%$searchText%' OR home_town LIKE '%$searchText%' OR email='$searchText';";
$result = $conn->query($qury);
if($result == null){
    echo "null";
}
else {
    $rows = array();
	while($r = mysqli_fetch_assoc($result)) {
    	$rows[] = $r;
    	// $rows[] = array('data' => $r);
}
header('Content-type: application/json');
echo json_encode($rows);
}


?>