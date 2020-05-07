<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");

 ob_start();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BOOKING LIST</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>BOOKING LIST</h2>
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
        <div class="header">BOOKING LIST
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
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Room Booking </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('koneksi.php');
						$sql = "select * from roombook";
						$re = mysqli_query($con,$sql);
						$c = 0;
						while($row=mysqli_fetch_array($re) )
						{
								$new = $row['stat'];
								$cin = $row['cin'];
								$id = $row['id'];
								if($new=="Pending ")
								{
									$c = $c + 1;
									
								
								}
						
						}
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-primary" type="button">
												 Data Booking  <span class="badge"></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <p>New Bookings</p><?php echo $c ; ?>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
											<th>Room</th>
											<th>Bedding</th>
											<th>Meal</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$tsql = "select * from roombook";
									$tre = mysqli_query($con,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
                                        $co =$trow['stat']; 
                                        $id = $trow['id'];
										if($co=="Pending")
										{
											echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['FName']." ".$trow['LName']."</th>
												<th>".$trow['Email']."</th>
												<th>".$trow['Country']."</th>
												<th>".$trow['TRoom']."</th>
												<th>".$trow['Bed']."</th>
												<th>".$trow['Meal']."</th>
												<th>".$trow['cin']."</th>
												<th>".$trow['cout']."</th>
												<th>".$trow['stat']."</th>
												
                                                <th><a href='editbooking.php?rid=".$trow['id']." ' class='btn btn-primary'>Edit</a>
                                                <a href=deletebooking.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button>
                                                </th>
												</tr>";
										}	
									
									}
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
        </div>
        </div>
                                    </div>
                                </div>
                                <?php
								
								$rsql = "SELECT * FROM `payment`";
								$rre = mysqli_query($con,$rsql);
								$r =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Confirm")
										{
											$r = $r + 1;
										}
										
								
								}
						
								?>
                                     <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#panel-confirm">
											<button class="btn btn-success" type="button">
												 Confirmed Booking  <span class="badge"></span><?php echo $r ; ?>
											</button>
											</a>
                                        </h4>
                                    </div>
                            <div class="panel-body" id="panel-confirm">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <p>Confirmed Bookings</p><?php echo $r ; ?>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Room</th>
                                            <th>Bed</th>
											<th>No Room</th>
											<th>Total Biaya</th>
											<th>Meal</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Status</th>
											<th>Method Payment</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$tsql = "select * from payment";
									$tre = mysqli_query($con,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
                                        $co =$trow['stat'];
										$id = $trow['id'];
										$fname = $trow['fname'];
										$lname = $trow['lname'];
										$troom = $trow['troom'];
										$tbed = $trow['tbed'];
										$nroom = $trow['nroom'];
										$cin = $trow['cin'];
										$cout = $trow['cout'];
										$ttot = $trow['ttot'];
										$fintot = $trow['fintot'];
										// $meal = $trow['mepr'];
										// $btot = $trow['btot'];
										$noofdays = $trow['noofdays'];
										$mbayar = $trow['mbayar'];
										if($co=="Confirm")
										{
											echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['fname']." ".$trow['lname']."</th>
												<th>".$trow['troom']."</th>
												<th>".$trow['tbed']."</th>
												<th>".$trow['nroom']."</th>
												<th>".$trow['fintot']."</th>
												<th>".$trow['meal']."</th>
												<th>".$trow['cin']."</th>
												<th>".$trow['cout']."</th>
												<th>".$trow['stat']."</th>
												<th>".$trow['mbayar']."</th>
                                                <td><a href=invoice.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Payment</button></td>
													</tr>
                                                <td><a href=deletebooking.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button>
                                                </td>
												</th>";
										}	
									
									}
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
						</div>
						<!--  -->

			<!--  -->

                        <?php
								
								$rsql = "SELECT * FROM `roombook`";
								$rre = mysqli_query($con,$rsql);
								$r =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Reject")
										{
											$r = $r + 1;
										}
										
								
								}
						
								?>
                                                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#panel-reject">
											<button class="btn btn-danger" type="button">
												 Rejected Booking  <span class="badge"></span><?php echo $r ; ?>
											</button>
											</a>
                                        </h4>
                                    </div>
                            <div class="panel-body" id="panel-reject">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <p>Rejected Bookings</p><?php echo $r ; ?>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
											<th>Room</th>
											<th>Bedding</th>
											<th>Meal</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$tsql = "select * from roombook";
									$tre = mysqli_query($con,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
                                        $co =$trow['stat']; 
                                        $id = $trow['id'];
										if($co=="Reject")
										{
											echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['FName']." ".$trow['LName']."</th>
												<th>".$trow['Email']."</th>
												<th>".$trow['Country']."</th>
												<th>".$trow['TRoom']."</th>
												<th>".$trow['Bed']."</th>
												<th>".$trow['Meal']."</th>
												<th>".$trow['cin']."</th>
												<th>".$trow['cout']."</th>
												<th>".$trow['stat']."</th>
												
												<td><a href=deletebooking.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button>
                                                </td>
												</tr>";
										}	
									
									}
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                        <?php
								
								$rsql = "SELECT * FROM `roombook`";
								$rre = mysqli_query($con,$rsql);
								$r =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Cancel")
										{
											$r = $r + 1;
										}
										
								
								}
						
								?>
                                                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#panel-cancel">
											<button class="btn btn-warning" type="button">
												 Canceled Booking  <span class="badge"></span><?php echo $r ; ?>
											</button>
											</a>
                                        </h4>
                                    </div>
                            <div class="panel-body" id="panel-cancel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <p>Canceled Bookings</p><?php echo $r ; ?>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
											<th>Room</th>
											<th>Bedding</th>
											<th>Meal</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$tsql = "select * from roombook";
									$tre = mysqli_query($con,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
										$co =$trow['stat']; 
										if($co=="Cancel")
										{
											echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['FName']." ".$trow['LName']."</th>
												<th>".$trow['Email']."</th>
												<th>".$trow['Country']."</th>
												<th>".$trow['TRoom']."</th>
												<th>".$trow['Bed']."</th>
												<th>".$trow['Meal']."</th>
												<th>".$trow['cin']."</th>
												<th>".$trow['cout']."</th>
												<th>".$trow['stat']."</th>
												
												<td><a href=deletebooking.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button>
                                                </td>
												</tr>";
										}	
									
									}
									?>
                                        
                                    </tbody>
                                </table>
								
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