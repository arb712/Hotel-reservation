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
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
    <?php 

            include 'koneksi.php';

            ?>
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
        <div class="container justify-content-center" style="width: 800px;margin: 0px auto;">
            <h4 style="display:flex;justify-content:center;padding-top:10px;">Reservation Data  <?php 
            $curdate=date("Y/m/d");
            echo  $curdate; ?></h4>
            <canvas id="reservationChart"></canvas>

            </div>
            <div class="container justify-content-center">
                <div class="row">
            <?php
						$rsql ="select * from room";
						$rre= mysqli_query($con,$rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['type'];
							$p = $rrow['place'];
							if($s=="Superior Room" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="Guest House")
							{
								$gh = $gh + 1;
							}
							if($s=="Single Room" )
							{
								$sr = $sr + 1;
							}
							if($s=="Deluxe Room" )
							{
								$dr = $dr + 1;
							}
							
						
						}
						?>
						
						<?php
						$csql ="select * from payment";
						$cre= mysqli_query($con,$csql);
						$cr =0 ;
						$csc =0;
						$cgh = 0;
						$csr = 0;
						$cdr = 0;
						while($crow=mysqli_fetch_array($cre))
						{
							$cr = $cr + 1;
							$cs = $crow['troom'];
							
							if($cs=="Superior Room"  )
							{
								$csc = $csc + 1;
							}
							
							if($cs=="Guest House" )
							{
								$cgh = $cgh + 1;
							}
							if($cs=="Single Room" )
							{
								$csr = $csr + 1;
							}
							if($cs=="Deluxe Room" )
							{
								$cdr = $cdr + 1;
							}
						
                        }

				
                    ?>
                    <div class="col-md-4"></div>
					<div class="col-md-4" style="padding-top:30px;">
                    <div class="panel panel-default" style="padding-bottom:30px;">
                        <div class="panel-heading" style="display:flex;justify-content:center;">
                           Available Room Details
                        </div>
                        <div class="panel-body" style="padding:20px 10px 20px 10px;">
						<table width="200px">
							
							<tr>
								<td><b>Superior Room	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
                                    $f1 =$sc - $csc;
                                    echo $f1;							
                                ?> </button></td> 
                                
							</tr>
							<tr>
								<td><b>Guest House</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
                                $f2 =  $gh -$cgh;
                                echo $f2;


								?> </button></td> 
							</tr>
							<tr>
								<td><b>Single Room	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php
                                $f3 =$sr - $csr;
                                echo $f3;


								?> </button></td> 
							</tr>
							<tr>
								<td><b>Deluxe Room</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
                                $f4 =$dr - $cdr; 
                                echo $f4;

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Available Rooms	</b> </td>
								<td> <button type="button" class="btn btn-danger btn-circle"><?php 
								
                                $f5 =$r-$cr; 
                                echo $f5;
								 ?> </button></td> 
							</tr>
						</table>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div style="padding-bottom:50px;">
                                    <h3 style="display:flex;justify-content:center;padding-top:10px;">PRINT REPORT DATA</h3>
                                    <a href="printres.php" style="margin-left:500px;" class='btn btn-primary'><i class="fa fa-book"></i><span></span>  Reservation</a>
                                </div>
            </div>
    </div>
</div>

<div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script>

            var ctx = document.getElementById("reservationChart").getContext('2d');

            var myChart = new Chart(ctx, {

                type: 'bar',

                data: {

                labels: ["Confirm", "Cancel", "Reject","Pending"],

                datasets: [{

                label: '',

                data: [

                <?php 

                $jumlah_confirm = mysqli_query($con,"select * from roombook where stat='Confirm'");

                echo mysqli_num_rows($jumlah_confirm);

                ?>, 

                <?php 

                $jumlah_cancel = mysqli_query($con,"select * from roombook where stat='Cancel'");

                echo mysqli_num_rows($jumlah_cancel);

                ?>, 

                <?php 

                $jumlah_reject = mysqli_query($con,"select * from roombook where stat='Reject'");

                echo mysqli_num_rows($jumlah_reject);

                ?>, 
                                <?php 

                $jumlah_masuk = mysqli_query($con,"select * from roombook where stat='Pending'");

                echo mysqli_num_rows($jumlah_masuk);

                 ?>,
                ],

            backgroundColor: [

            'rgba(255, 99, 132, 0.2)',

            'rgba(54, 162, 235, 0.2)',

            'rgba(255, 206, 86, 0.2)',
            
            'rgba(75, 192, 192, 0.2)'


            ],

            borderColor: [

            'rgba(255,99,132,1)',

            'rgba(54, 162, 235, 1)',

            'rgba(255, 206, 86, 1)',

            'rgba(75, 192, 192, 1)' 

            ],

            borderWidth: 1

            }]

            },

            options: {

            scales: {

            yAxes: [{

                ticks: {

                    beginAtZero:true

                }

            }]

            }

            }

            });

            </script>
</body>
</html>