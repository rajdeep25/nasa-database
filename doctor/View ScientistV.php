<?php
		include "connect.php";
		?>
<!DOCTYPE html>
<html lang="en"> 
<head>	
<?php
//Turn off
error_reporting(0);
  include "Head.php";
  ?>
<style>
html, body{
  min-height: 100%;
}
body{
  position: relative;
	background-color: rgb(113, 113, 113);
}
.page{
	
  position: absolute;
  top: 50%;
  left: 5%;
  width: 90%;
  height: auto;
  z-index: 10;
  
	background-color:white;
}
div.gallery {
    margin: 15px;
    border: 0px solid #ccc;
    float: center;
    width: 400px;
	background-color:#2a2a2a;
}

div.gallery:hover {
    border: 3px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}



.image {
  display: block;
  width: 100%;
  height: auto;
}
.gallery{
  position: relative;
  width: 30%;
}

tr.noBorder td {
  border: 0;
}

.gallery:hover {
  opacity: 0.8;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
</style>
</head>
<body>
	
	<?php
//Turn off
error_reporting(0);
  include "Header.php";
  ?>
<br/>
<div class="container" align="center">
			<div class="row">
				<div class="contact2-caption clearfix">
					<div class="contact2-heading text-center">
						<h2>Our Team</h2>
					</div>
					<form class="form" action="" method="post">
					<select type="text" name="Usernameorid" style="width: 40%; height: 40px; position: relative; left: -250px; background: #fff; font-size: 13px; color: #084a5c; font-family: 'Open Sans', sans-serif; padding: 12px; border: 0; margin-bottom: 12px;">
							<?php
								$qr="select Usernameorid,Fname,Lname from scientist";
								$res=mysqli_query($mysqli,$qr);
								echo "<option value=''>!-------------------------------------- Select Scientist --------------------------------------!</option>";
								echo "<option value=''></option>";
								while($row=mysqli_fetch_assoc($res))
								{
									echo "<option value=\"". $row['Usernameorid']. "\">" .$row['Fname']." ".$row['Lname']."</option>";
								}
							?>
					</select>
					<input type="submit" value="SEARCH" name="btn-login" style="width: 180px; height: 40px; font-size: 24px; color: #fff; position: relative; left: -150px; background-color:#2a2a2a; padding: 0; border: 0; font-family: 'BenchNine', sans-serif; font-weight: bold;">
						</form>		
					<?php
						if(isset($_POST['btn-login']))
					{	
							$search_value=$_POST['Usernameorid'];
							if($search_value!==""){
							$query = "CALL scientistname($search_value)";
							$result = mysqli_query($mysqli, $query);
							while($row = $result->fetch_array(MYSQLI_ASSOC))
							{
								$a = $row['Usernameorid'];
								$b = $row['Fname'];
								$c = $row['Lname'];
								$d = $row['Dob'];
								$e = $row['Bg'];
								$f = $row['Pno1'];
								$g = $row['Emailid'];
								$h = $row['Address'];
								$i = $row['Deptno'];
								$j = $row['Doj'];
								$k = $row['Mname'];
								$l = $row['Designation'];
								$m = $row['Salary'];	
								echo<<<abc
									<font color="white" face="verdana">
									<table>
									<tr class="noBorder">
									<td align="center">
									<div class="gallery"> 
									<img src="getImage2.php?Usernameorid=$a" width="300" height="375" />
									<div class="info">$a</div>
									</div>
									</td>	
									<td>
									<div class="info">User Name or ID: $a<br/>Full Name: $b $c</br>Date of Birth: $d<br/>Blood Group: $e<br/>Phone Numer: $f<br/>Email-ID: $g<br/>Address: $h<br/>Deptno: $i<br/>Date of Joining: $j<br/>Mission Working: $k(Currently working Mission)<br/>Designation: $l<br/>Salary: $m</div>
									</td>
									</tr>		 
									</table> 
abc;
							
						}
							}
							else
							{
								$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from scientist")));
	if($one>'0')
	{   
	     $query = "SELECT * from scientist";
		 $result = mysqli_query($mysqli, $query);	
		 while($row = $result->fetch_array(MYSQLI_ASSOC))
		 {
			 $a = $row['Usernameorid'];
			 $b = $row['Fname'];
			 $c = $row['Lname'];
			 $d = $row['Dob'];
			 $e = $row['Bg'];
			 $f = $row['Pno1'];
			 $g = $row['Emailid'];
			 $h = $row['Address'];
			 $i = $row['Deptno'];
			 $j = $row['Doj'];
			 $k = $row['Mname'];
			 $l = $row['Designation'];
			 $m = $row['Salary'];
			 //$p = $row['Photo'];
			
			echo<<<abc
		<font color="white" face="verdana">
		 <table>
		<tr class="noBorder">
		<td align="center">
		<div class="gallery"> 
	 	<img src="getImage2.php?Usernameorid=$a" width="300" height="375" />
  		<div class="info">$a</div>
 		</div>
		</td>	
		<td>
		<div class="info">User Name or ID: $a<br/>Full Name: $b $c</br>Date of Birth: $d<br/>Blood Group: $e<br/>Phone Numer: $f<br/>Email-ID: $g<br/>Address: $h<br/>Deptno: $i<br/>Date of Joining: $j<br/>Mission Working: $k(Currently working Mission)<br/>Designation: $l<br/>Salary: $m</div>
		</td>
</tr>
		 
</table> 
abc;
		 }
	}
	else
		echo "<b>No Details to Display</b>";
}
					}
					if(empty($_POST['btn-login']))
					{
						$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from scientist")));
	if($one>'0')
	{   
	     $query = "SELECT * from scientist";
		 $result = mysqli_query($mysqli, $query);	
		 while($row = $result->fetch_array(MYSQLI_ASSOC))
		 {
			 $a = $row['Usernameorid'];
			 $b = $row['Fname'];
			 $c = $row['Lname'];
			 $d = $row['Dob'];
			 $e = $row['Bg'];
			 $f = $row['Pno1'];
			 $g = $row['Emailid'];
			 $h = $row['Address'];
			 $i = $row['Deptno'];
			 $j = $row['Doj'];
			 $k = $row['Mname'];
			 $l = $row['Designation'];
			 $m = $row['Salary'];
			 //$p = $row['Photo'];
			
			echo<<<abc
		<font color="white" face="verdana">
		 <table>
		<tr class="noBorder">
		<td align="center">
		<div class="gallery"> 
	 	<img src="getImage2.php?Usernameorid=$a" width="300" height="375" />
  		<div class="info">$a</div>
 		</div>
		</td>	
		<td>
		<div class="info">User Name or ID: $a<br/>Full Name: $b $c</br>Date of Birth: $d<br/>Blood Group: $e<br/>Phone Numer: $f<br/>Email-ID: $g<br/>Address: $h<br/>Deptno: $i<br/>Date of Joining: $j<br/>Mission Working: $k(Currently working Mission)<br/>Designation: $l<br/>Salary: $m</div>
		</td>
</tr>
		 
</table> 
abc;
		 }
	}
						
					}
					
?>
<br><br><br>	
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
