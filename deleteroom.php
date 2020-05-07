<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
ob_start();
?> 

<?php
include('koneksi.php');
$rsql ="select id from room";
$rre=mysqli_query($con,$rsql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DELETE ROOM</title>
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
            <li><a href="addroom.php" ><i class="fa fa-bed"></i><span></span> Add Room</a></li>
            <li><a href="deleteroom.php"><i class="fas fa-trash-alt"></i><span></span> Delete Room</a></li>
			
        </ul> 
    </div>
    <div class="main_content"> 
        <div class="header" ><h6 style="padding-right:5px;">DELETE ROOM</h6><i class="fas fa-trash-alt"></i>
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
        <div class="container wrapper">
        <div class="row">
                
                <div class="col-md-12 col-sm-12" style='padding-bottom:20px !important;'>
                    <div class="panel panel-primary">
                        <div class="container justify-content-center panel-heading">
                           Delete room
                        </div>
                        <div class="panel-body" >
						<form name="form" method="post">
                            <div class="form-group" style="padding:20px 15px 20px 15px;">
                                            <label>Select the Room ID *</label>
                                            <select name="id"  class="form-control" required>
												<option value selected ></option>
												<?php
												while($rrow=mysqli_fetch_array($rre))
												{
												$value = $rrow['id'];
												 echo '<option value="'.$value.'">'.$value.'</option>';
												
												}
												?>
                                                
                                            </select>
                              </div>
							  
								
							 <input type="submit" name="del" value="Delete Room" class="btn btn-primary"> 
							</form>
							<?php
							 include('koneksi.php');
							 
							 if(isset($_POST['del']))
							 {
								$did = $_POST['id'];
								
								
								$sql ="DELETE FROM `room` WHERE id = '$did'" ;
								if(mysqli_query($con,$sql))
								{
								 echo '<script type="text/javascript">alert("Delete the Room") </script>' ;
										
										header("Location: deleteroom.php");
								}else {
									echo '<script>alert("Sorry ! Check The System") </script>' ;
								}
							 }
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
           <?php
						include ('koneksi.php');
						$sql = "select * from room";
						$re = mysqli_query($con,$sql)
				?>
                <div class="row">
				
				
				<?php
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['type'];
											if($id == "Superior Room") 
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['type']."

														</div>
													</div>
												</div>";
											}
											else if ($id == "Deluxe Room")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-green'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-green'>
															".$row['type']."

														</div>
													</div>
												</div>";
											
											}
											else if($id =="Guest House")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-brown'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-brown'>
															".$row['type']."

														</div>
													</div>
												</div>";
											
											}
											else if($id =="Single Room")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-red'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-red'>
															".$row['type']."

														</div>
													</div>
												</div>";
											
											}
										}
									?>
                    
                </div>
            <?php
				
			ob_end_flush();
			?>
                    
            
				
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