<?php
$img;
$encoded;
$myID = $_POST['userid'];
    $conn = new mysqli("localhost", "root", "root", "labfinal");
$qury1="SELECT gender FROM users WHERE user_id = $myID ;";
$result= mysqli_query($conn,$qury1);
$res = $result->fetch_assoc();
if($res==1){
        $img="M.PNG";
        $data=fopen($img,'rb');
        $size=filesize($img);
        $contents=fread($data,$size);
        fclose($data);
        $encoded=base64_encode($contents);
    }
    else{
        $img="F.JPG";
        $data=fopen($img,'rb');
        $size=filesize($img);
        $contents=fread($data,$size);
        fclose($data);
        $encoded=base64_encode($contents);
    
    
    }
    $qury = "UPDATE users SET profile_pic ='$encoded' WHERE user_id = $myID;";
    $result = mysqli_query($conn,$qury);
?>