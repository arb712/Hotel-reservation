<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}

ob_start();
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
            <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i><span></span>User Setting</a></li>
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
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           ADMINISTRATOR<small> accounts </small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('koneksi.php');
						$sql = "SELECT * FROM `user_log`";
						$re = mysqli_query($con,$sql)
				?>
                
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
											<th>User name</th>
                                            <th>Password</th>
                                            
											<th>Update</th>
											<th>Remove</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											$us = $row['username'];
											$ps = $row['password'];
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
													<td>".$id."</td>
													<td>".$us."</td>
													<td>".$ps."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=deleteuser.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$id."</td>
													<td>".$us."</td>
													<td>".$ps."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button></td>
													<td><a href=deleteuser.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
					<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
															Add New Admin
													</button>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Add new User name</label>
                                            <input name="newuser"  class="form-control" placeholder="Enter User name">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>New Password</label>
                                            <input name="newpassword"  class="form-control" placeholder="Enter Password">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="in" value="Add" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
						if(isset($_POST['in']))
						{
							$newus = $_POST['newuser'];
							$newps = $_POST['newpassword'];
							
							$newsql ="Insert into user_log (username,password) values ('$newus','$newps')";
							if(mysqli_query($con,$newsql))
							{
							echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
							
						
							}
						header("Location: usersetting.php");
						}
						?>
						
					<div class="panel-body">
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Change the User name and Password</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change User name</label>
                                            <input name="username" value="<?php echo $us; ?>" class="form-control" placeholder="Enter User name">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Password</label>
                                            <input name="password" value="<?php echo $ps; ?>" class="form-control" placeholder="Enter Password">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="up" value="Update" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
                <!-- /. ROW  -->
                <?php 
				if(isset($_POST['up']))
				{
					$usname = $_POST['username'];
					$passwr = $_POST['password'];
					
					$upsql = "UPDATE `user_log` SET `username`='$usname',`password`='$passwr' WHERE id = '$id'";
					if(mysqli_query($con,$upsql))
					{
					echo' <script language="javascript" type="text/javascript"> alert("User name and password update") </script>';
					
				
					}
				
				header("Location: usersetting.php");
				
				}
				ob_end_flush();
				
				
				
				
				?>
                                
                  
            
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
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