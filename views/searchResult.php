<!DOCTYPE html>
<html lang="en">

<head>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

     <script src="http://malsup.github.com/jquery.form.js"></script> 

	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='./Styles/bootstrap.min.css' />
    <link rel='stylesheet' href='./Styles/bootstrap.css' />
 </head>


<body>
    <!-- site search navigation bar  -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" onclick="logo()">HOGWARTS COMMON ROOM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse col-md-6" id="navbarColor01">
            <input class="form-control mr-sm-2" type="text" id="textField" placeholder="Search"><button class="button" id="search">GO!</button>
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
    <!-- search result navigation bar  -->

<div  style="background-color:rgb(30,40,50);" >
<ul class="nav nav-pills">
  <li class="active">
    <a  data-toggle="pill" href="#result1">People</a></li>
  <li ><a data-toggle="pill" href="#result2">Posts</a></li>
  
</ul>
    </div>
	
	<div class="tab-content container " style="margin-top:30px; font-size:30px;" >
   <div id="result1" class="tab-pane fade in active " >
 
   </div>
	
	
	<div id="result2" class="tab-pane fade" > 
   
    </div>
    </div>
    
</body>
<script>
var x= localStorage.getItem("sText");
console.log(x);
var html="";
var html1="";
$.ajax({
                type: "POST",
                url: "/Social/controllers/control_name_search.php",
                data: {
                    "searchText": localStorage.getItem("sText")
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                for(var k in res){
                    html+="<div> ";
                  html+=res[k]["f_name"]
                  html+="    ";
                  html+=res[k]["l_name"]
                    html+="</div>";

                    
                }document.getElementById("result1").innerHTML += html;
                console.log(res);
              

                
                });


$.ajax({
                type: "POST",
                url: "/Social/controllers/control_post_search.php",
                data: {
                    "searchText": localStorage.getItem("sText")
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                for(var k in res){
                    html1+="<div> ";
                  html1+=res[k]["f_name"]
                  html1+="    ";
                  html1+=res[k]["l_name"]
                  html1+="    ";
                  html1+=res[k]["caption"]

                    html1+="</div>";

                    
                }document.getElementById("result2").innerHTML += html1;
                console.log(res);
              

                
                });
               
            
        
   </script>   

   </html>