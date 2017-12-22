<!DOCTYPE html>
<html lang="en">

<head> 
    <title> SOCIAL </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='./Styles/bootstrap.min.css' />
    <link rel='stylesheet' href='./Styles/bootstrap.css' />
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   
    <!-- <link rel="icon" type="image/png" href="my_site_icon.png" sizes="16x16"> -->
</head>
  <style>
#slot {
    border-bottom: 5px solid black;
    margin-top: 10px;
    margin-bottom: 20px;
    margin-right: 30px;
    margin-left: 30px;
}

button {
  padding: 5px 10px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #EF3B3A;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
  margin-bottom: 10px;
}

.button:hover {background-color: #FF0000}

.button:active {
  background-color: #FF0000;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
</head>
<body >

 <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" onclick="logo()">HOGWARTS COMMON ROOM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse col-md-6" id="navbarColor01">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
        </div>

        <div class="col-md-2 offset-md-2">
            <a href="profile.php"><img src="profile-photo.jpg" height="50px"/></a>
            &nbsp;&nbsp;
            <a href="profile.php"><label id="usrname"></label></a>
        </div>
            <form class="form-inline my-2 my-lg-0">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn"><img src="Settings-icon.png" height="30px"/></button>
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop2" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="register.php" onclick="logout()">Logout</a>
                    </div>
                    </div>
                </div>
            </form>
    </nav>



<div class="jumbotron container-fluid" id="list">
<div id="slot" class="row justify-content-around">

<h3 class="col-4">nouran  </h3>

<button class="col-1">Unfriend</button>
</div>

<div id="slot" class="row justify-content-around">

<h3 class="col-4">nouran  </h3>

<button class="col-1">Unfriend</button>
</div>
</div>



</body>

<script>

// MUST ATTACHED FUNCTIONS 

function logo(){
    if(localStorage.getItem("id")){
        window.location = "/Social/views/home.php";
    }
    else {
        window.location = "/Social/views/register.php";
    }
}


 function logout(){
        localStorage.setItem("id", "");
    }

    console.log(localStorage.getItem("id"));
 $.ajax({
    type: "POST",
    url: "/Social/controllers/home-controller.php",
    data: {
        "userid": localStorage.getItem("id")
    },
    dataType: "application/json"
})

            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
        
                document.getElementById("usrname").innerHTML = res.fName;
           
            })


// END OF MUST ATTACHED FUNCTIONS 

</script>


</html>