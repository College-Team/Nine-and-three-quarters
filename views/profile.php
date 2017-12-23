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
<link rel="stylesheet" href="./Styles/bootstrap.css">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script  src="index.js"></script> -->

<style>
.button {
  padding: 5px 15px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #EF3B3A;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
}

.button:hover {background-color: #FF0000}

.button:active {
  background-color: #FF0000;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
  
</head>

<body>
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

  <div class ="row container">
    <div class  ="col-sm-4 container-fluid jumbotron" >
    <div class  ="well">
    <h3><span id="fN"></span>  <span id="lN"></span> </h3>
    <h4><span id="nN"></span></h4>
    <p><strong>Gender :</br> </strong><span id="gender"></span></p>
    <p><strong>Date of birth :</br> </strong><span id="bDate"></span></p>
    <p><strong>Marital Status :</br> </strong><span id="mStatus"></span></p>
    <p><strong>HomeTown : </br></strong><span id="homeTown"></span></p>
    <p><strong>About me : </br></strong><span id="about"></span></p>
    <button class="button" align="right" id="edit">Edit</button>
    </div>
<div>
<button class="button" id="friends">Friends</button>
</div>
</div>

    <div class  ="col-sm-8 container-fluid" id="posts_cont">
        
           
         <div class="card border-primary mb-3">
          <div class="card-header"><strong name="n"></strong>  <p>NOW</p> 
             <div class="form-group col-sm-3">
                    <select class="form-control" id="privacy-select">
                        <option id="public" >Public</option>
                        <option id="friends">Friends</option>
                    </select>
                </div>
          </div>
          <div class="card-body text-primary">
           <textarea id="caption" cols="70" rows="5"  placeholder="Something in your mind !!"></textarea>
          </div>
          <div class="card-footer">
            <div class="col-md-8">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clear_post()">Clear</button>
                    <button type="button" class="btn " style="background-color: #EF3B3A; color: #FFFFFF;" onclick="new_post()">POST</button>
                </div>
          </div>
        </div> 


        <!-- <div class="card border-primary mb-3">
          <div class="card-header"><strong name="n"></strong>  <p>TIMESTAMP</p></div>
          <div class="card-body text-primary">
            <p class="card-text">The Post Caption.</p>
          </div>
          <div class="card-footer">
            <span class="badge badge-pill btn" style="background-color: #EF3B3A; color: #FFFFFF;" value="6" onclick="like(this.value)" ><a>like</a></span>
            <button type="button" class="btn btn-primary" value="5" onclick="like(this.value)">Test button</button>

          </div>
        </div> -->
        <p id="test"></p>
    
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

// END OF MUST ATTACHED FUNCTIONS 

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
                url: "/Social/controllers/control_profile.php",
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
                hometown=res.homeTown;
                about=res.about;

                document.getElementById("usrname").innerHTML = firstname;

                document.getElementById("fN").innerHTML = firstname;
                document.getElementById("lN").innerHTML = lastname;
                document.getElementById("nN").innerHTML = nickname;
                document.getElementById("gender").innerHTML = gender;
                document.getElementById("bDate").innerHTML = bdata;
                document.getElementById("mStatus").innerHTML = mstatus;
                document.getElementById("homeTown").innerHTML = hometown;
                document.getElementById("about").innerHTML = about;
                document.getElementById("usrname").innerHTML = res.fName;
            })



 $.ajax({
                type: "POST",
                url: "/Social/controllers/show_posts-controller.php",
                data: {
                    "userid": localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);


        for(i = res.length-1; i >= 0 ; i--){

            p = '<div class="card border-primary mb-3" id="'+  res[i]["post_id"] +'d">';
            p += '<div class="card-header"><span><strong name="n"></strong></span><div align="right"><a onclick="delete_post('+ res[i]["post_id"] + ')">X</a></div>  <p>' + res[i]["post_date"] + '</p>'+ res[i]["state"] + ' </div>';
            p += '<div class="card-body text-primary">';
            p += '<p class="card-text">' + res[i]["caption"] + '</p>';
            p += '</div>';
            p += '<div class="card-footer">';
            p += '<span class="badge badge-pill btn" style="background-color: #EF3B3A; color: #FFFFFF;" id="'+  res[i]["post_id"] +'" onclick="like(this.id)">like</span> <p id="nol"></p>';
            p += '<span class="badge badge-pill btn" style="background-color: #EF3B3A; color: #FFFFFF;" id="'+  res[i]["post_id"] +'e">unlike</span> <p id="nol"></p>';
            p += '</div>';
            p += '</div>';

            document.getElementById("test").innerHTML += p ;
            $('#' + res[i]["post_id"] + "e").hide();
        }
                


                var input = document.getElementsByName("n");
                for(i = 0;i < input.length; i++)
                {
                    input[i].innerHTML = firstname + " " + lastname;
                }
     
            })
            

    function like(post_id){
                console.log(post_id);

         $.ajax({
                type: "POST",
                url: "/Social/controllers/control_like.php",
                data: {
                    "post_id": post_id,
                    "liker_id" : localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                
                    var notif = res["f_name"] + " " + res["l_name"] + " Liked your post"
                    console.log(notif);

                    $('#' + post_id).hide();
                    $('#' + post_id + 'e').show();
                    // document.getElementById(bt).
                    // document.getElementById("nol").innerHTML = res["count"]
        
            
            });
        }

        function delete_post(post_id){

            console.log(post_id);

            // id = post_id+'d';
            // var div = document.getElementById(id);
            // console.log(id);
            // var p = "<p> hello </p>";
            // // div.parentNode.replaceChild(p, div);
            // // div.replacewith(p);
            // div.innerHTML = p ;

            $.ajax({
                type: "POST",
                url: "/Social/controllers/delete-post_controller.php",
                data: {
                    "post_id": post_id
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);

                p = '<div class="alert alert-dismissible alert-success" id="post_not" >'
                p += '<button type="button" class="close" data-dismiss="alert">&times;</button>'
                p += '<strong>Done!</strong> Your Post has been deleted!'
                p += '</div>'

                id = post_id+'d';
                document.getElementById(id).innerHTML = p;
                $('#'+id).fadeOut(2200);
                
        
            
            });
        }


            $('#friends').click(function () {

                // localStorage.setItem("id", "userid");
                location.href = "/Social/views/friends.php"
            })

            $('#edit').click(function () {
             location.href = "/Social/views/editProfile.php"
            })

</script>
</html>
