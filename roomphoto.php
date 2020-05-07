<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>DASHBOARD</h2>
        <ul>
            <li><a href="home.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="room.php"><i class="fa fa-bed"></i><span></span> Room List</a></li>
            <li><a href="booking.php"><i class="fa fa-book"></i><span></span> Booking</a></li>
            <li><a href="bookinglist.php"><i class="fas fa-list"></i><span></span> Booking List</a></li>
            <li><a href="roomphoto.php"><i class="fas fa-images"></i><span></span> Room & Extra Service</a></li>
            <li><a href="facilitieshotel.php"><i class="fas fa-hotel"></i><span></span>Hotel Facilities</a></li>
        </ul> 
    </div>
    <div class="main_content"> 
        <div class="header">MAIN DASHBOARD
          <div class="Link">
            <div class="container userCont">
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" style="color:black;text-decoration:none;">
                        <i class="fa fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" >
                        <li><a href="usersetting.php" style="color:black;"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php" style="color:black;padding-left:3px;"><i class="fas fa-sign-in-alt"style="padding-right:5px"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            </div>
          </div>
        </div>  
        <div class="badan">
            <div class="container">
            <h4>Room Photo</h4>
            <div class="row">
                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./roomphoto/superior.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Superior Room.</p><p class="card-text">Price = 320$</p>
                </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./roomphoto/deluxe.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Deluxe Room.</p><p class="card-text">Price = 220$</p>
                </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./roomphoto/guest.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Guest Room.</p><p class="card-text">Price = 180$</p>
                </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./roomphoto/single.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Single Room.</p><p class="card-text">Price = 150$</p>
                </div>
                </div>
                </div>
            </div>
            <br><br>
            <div class="container">
            <h4>Extra Service Room</h4>
            <div class="row">
            
                <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./mealsimg/2.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Breakfast Meals.</p><p class="card-text">Price = Depends on Type Room.</p>
                </div>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./mealsimg/3.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Half Board Meals.</p><p class="card-text">Price = Depends on Type Room.</p>
                </div>
                </div></div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./mealsimg/4.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Full Board Meals.</p><p class="card-text">Price = Depends on Type Room.</p>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>