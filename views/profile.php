<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
  <title>welcome</title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="./Styles/bootstrap.min.css">
<link rel="stylesheet" href="./Styles/bootstrap.min.css">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script  src="index.js"></script> -->
  
</head>

<body>

    <div class ="row container">
    <div class  ="col-sm-4 container-fluid well" >

    <h3><span id="fN"></span>  <span id="lN"></span> </h3>
    <h4><span id="nN"></span></h4>
    <p><strong>Gender : </strong><span id="gender"></span></p>
    <p><strong>Date of birth : </strong><span id="bDate"></span></p>
    <p><strong>Marital Status : </strong><span id="mStatus"></span></p>
    <p><strong>HomeTown : </strong><span id="homeTown"></span></p>
    <p><strong>About me : </br></strong>i am dead<span id="about"></span></p>
    
    </div>
    <div class  ="col-sm-8 container-fluid">
    
    helloooooo

    </div>
    
    
    
    </div>
</body>

<script>

var firstname;
var lastname;
var nickname;
var gender;
var bData;
var mstatus;
var homeTown;
var about;
 $.ajax({
                type: "POST",
                url: "/social/controllers/control_profile.php",
                data: {
                    "userid": localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                firstname=res.fName;
                lastname=res.lName;
                nickname=res.nName;
                gender=res.gender;
                bdata=res.bDate;
                mstatus=res.mStatus;
                hometown=res.hTown;
                about=res.about;
                document.getElementById("fN").innerHTML = firstname;
                document.getElementById("lN").innerHTML = lastname;
                document.getElementById("nN").innerHTML = nickname;
                document.getElementById("gender").innerHTML = gender;
                document.getElementById("bDate").innerHTML = bdata;
                document.getElementById("mStatus").innerHTML = mstatus;
                document.getElementById("homeTown").innerHTML = homeTown;
                document.getElementById("about").innerHTML = about;
            })


</script>
</html>
