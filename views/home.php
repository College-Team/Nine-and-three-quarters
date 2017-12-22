<!DOCTYPE html>
<html lang="en">

<head> 
    <title> SOCIAL </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='./Styles/bootstrap.min.css' />
    <link rel='stylesheet' href='./Styles/bootstrap.css' />
    
    <!-- <link rel="icon" type="image/png" href="my_site_icon.png" sizes="16x16"> -->
</head>

<body>
    
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">SOCIAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse col-md-6" id="navbarColor01">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
        </div>

        <div class="col-md-2 offset-md-2">
            <img src="profile-photo.jpg" height="50px"/>
            &nbsp;&nbsp;
            <label id="usrname"></label>
        </div>
            <form class="form-inline my-2 my-lg-0">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn"><img src="Settings-icon.png" height="30px"/></button>
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop2" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                    </div>
                </div>
            </form>
    </nav>

    <div class="row">
        <!-- Right Side -->
        <div class="col-md-3">

            <h5>Latest Posts</h5>
        </div>

        <!-- Left Side -->
        <div class="col-md-8">
            <div>
            <header>Share Post</header>
            <textarea id="captian" cols="50" rows="1" placeholder="Captian"></textarea>
            <textarea id="pdata" cols="50" rows="5" placeholder="Something in your mind !!"></textarea>

            <FOOTER>
                <div class="row">
                    <div>
                        <div class="form-group col-md-2">
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                    </div>  
                    <div class="form-group col-md-2 ">
                    <select class="form-control" id="privacy-select">
                        <option id="public" >Public</option>
                        <option id="friends">Friends</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                    <button type="button" class="btn " style="background-color: #EF3B3A; color: #FFFFFF;">POST</button>
                </div>
                </div>
                
                

            </FOOTER>

            </div>  


        </div>
        
    

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>





<script>

 var user="usrname": localStorage.getItem("name");


 $.ajax({
                type: "POST",
                url: "/social/controllers/home-controller.php",
                data: {
                    "userid": localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                usrname=res.fName;
        
                document.getElementById("usrname").innerHTML = user;
           
            })


    function new_post(){

        var state;
        var caption;
        var pdata;



    }


</script>

</html>