<!--<!DOCTYPE html>
<html lang="en">
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
</body>
</html>-->



<?php
		include "connect.php";
		
		if(isset($_POST['btn-login']))
{		
		$Usernameorid =$_POST['Usernameorid'];
		$Deptno =$_POST['Deptno'];
		$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from scientist where Usernameorid='$Usernameorid'")));
		if($one=='0')
		{
			$Fname =$_POST['Fname'];
			$Lname =$_POST['Lname'];
			$Password =$_POST['Password'];
			$Dob =$_POST['Dob'];
			$Bg =$_POST['Bg'];
			$Pno1 =$_POST['Pno1'];
			$Emailid =$_POST['Emailid'];
			$Address =$_POST['Address'];
			$uora =$_POST['uora'];
			$Doj =$_POST['Doj'];
			$Mname =$_POST['Mname'];
			$Designation =$_POST['Designation'];
			$Salary =$_POST['Salary'];
			
			if ($mysqli->query("INSERT into scientist(Usernameorid,Fname,Lname,Password,Dob,Bg,Pno1,Emailid,Address,uora,Deptno,Doj,Mname,Designation,Salary) values ('$Usernameorid','$Fname','$Lname','$Password','$Dob','$Bg','$Pno1','$Emailid','$Address','$uora','$Deptno','$Doj','$Mname','$Designation','$Salary')") === TRUE) 
			{
				if(empty($_FILES["image"]["tmp_name"]))
				{
				}
				else{
						$check = getimagesize($_FILES["image"]["tmp_name"]);
						if($check !== false){
						$image = $_FILES['image']['tmp_name'];
						$imgContent = addslashes(file_get_contents($image));
						$mysqli->query("UPDATE scientist set Photo='$imgContent' where Usernameorid='$Usernameorid'");
					}
				}
				$err = "<b>Registration successful</b></br>";
			}
			else
			{
				$err = "<b>unsuccessful Registration</b></br>";
			}
		}
		else
			$err = "<b>Register Number Already Exists</b>";
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
		
<?php
//Turn off
error_reporting(0);
  include "Head.php";
  ?>
</head>
<body>
	
	<?php
//Turn off
error_reporting(0);
  include "AHeader.php";
  ?>
<br/>
	

		<div class="container">
			<div class="row">
				<div class="contact2-caption clearfix">
					<div class="contact2-heading text-center">
						<h2>Add Admin/Scientist</h2>
					</div>
					<center><font size="3"><?php echo @$err;?></font></center>
					<div class="col-md-6 col-md-offset-1 contact2-form">

						<form class="form" action="" method="post" enctype="multipart/form-data">
							<input type="text" placeholder="User Name or ID" name="Usernameorid" required>
							<input type="text" placeholder="First Name" name="Fname" required>
							<input type="text" placeholder="Last Name" name="Lname" required>
							<input type="password" placeholder="Password" name="Password" required>
							<font size="4"><p align="left">Date of Birth:</p><input type="date" name="Dob" required>
							<p align="left">Blood Group:
							<select type="text" name="Bg" style="width: 100%; height: 40px; background: #fff; font-size: 13px; color: #084a5c; font-family: 'Open Sans', sans-serif; padding: 12px; border: 0; margin-bottom: 12px;">
								<option value=""></option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="O+">O+</option>
								<option value=""O->O-</option>
							</select></p></font>
							<input type="number" placeholder="Phone Number" name="Pno1" required>
							<input type="email" placeholder="Email-ID" name="Emailid" required>
							<textarea placeholder="Address" name="Address" required></textarea>
							<font size="4"><p align="left">Admin/Scientist:
							<select type="text" name="uora" style="width: 100%; height: 40px; background: #fff; font-size: 13px; color: #084a5c; font-family: 'Open Sans', sans-serif; padding: 12px; border: 0; margin-bottom: 12px;" required>
									<option value=""></option>
									<option value="Admin">Admin</option>
								    <option value="Scientist">Scientist</option>
								</select></p></font>
							<font size="4"><p align="left">Department:	
							<select type="number" name="Deptno" style="width: 100%; height: 40px; background: #fff; font-size: 13px; color: #084a5c; font-family: 'Open Sans', sans-serif; padding: 12px; border: 0; margin-bottom: 12px;" required>
							<?php
								$qr="select Deptid,Deptname from department";
								$res=mysqli_query($mysqli,$qr);
								echo "<option value=''></option>";
								while($row=mysqli_fetch_assoc($res))
								{
										echo "<option value=\"".$row['Deptid']. "\">".$row['Deptname']."</option>";
								}
							?>
							</select></p></font>
							<font size="4"><p align="left">Date of Joining:<input type="date" name="Doj" required></p></font>
							<font size="4"><p align="left">Mission Working:
							<select type="text" name="Mname" style="width: 100%; height: 40px; background: #fff; font-size: 13px; color: #084a5c; font-family: 'Open Sans', sans-serif; padding: 12px; border: 0; margin-bottom: 12px;" required>
							<?php
								$qr="select mname from mission";
								$res=mysqli_query($mysqli,$qr);
								echo "<option value=''></option>";
								while($row=mysqli_fetch_assoc($res))
								{
										echo "<option value=\"".$row['mname']. "\">".$row['mname']."</option>";
								}
							?>
							</select></p></font>
							
							<input type="text" placeholder="Designation" name="Designation" required>
							<input type="number" placeholder="Salary" name="Salary" required>
							<input type="file" placeholder="Photo" name="image">
							<input class="submit-btn" type="submit" value="SUBMIT"  name="btn-login">
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
//Turn off
error_reporting(0);
  include "Footer.php";
  ?>

</body>
</html>