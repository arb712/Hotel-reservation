<?php


include ('koneksi.php');

			
			$id =$_GET['id'];		
			$newsql ="DELETE FROM `user_log` WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("Delete Success") </script>';
							
						
				}
			header("Location: usersetting.php");
		
?>