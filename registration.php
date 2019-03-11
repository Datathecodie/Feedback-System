<?php 
extract($_POST);
if(isset($save))
{
    //check user alereay exists or not
    $sql=mysqli_query($conn,"select * from user where email='$e' ");
    $r=mysqli_num_rows($sql);

    $sql0=mysqli_query($conn,"select * from user where rollno='$rollno' ");
    $r0=mysqli_num_rows($sql0);
    
    if($r==true)
    $err= "<font color='red'><h3 align='center'>This email already exists</h3></font>";
    
     elseif($r0==true) 
    {
        $err= "<font color='red'><h3 align='center'>This Roll No already exists</h3></font>";
    }
    
    elseif($rollno[0] != $dept[0]) 
    {
         $err= "<font color='red'><h3 align='center'>Wrong Dept</h3></font>";
    }
    elseif($p != $p1) 
    {
         $err= "<font color='red'><h3 align='center'>Passwords Do not Match </h3></font>";
    }
    else
    {
        $dob=$bday;
        $pass=$p;
        $query="insert into user values('','$n','$e','$pass','$mob','$dept','$sem','$gen','$dob','$rollno')";
        mysqli_query($conn,$query);

        $err="<font color='blue'><h3 align='center'>Registration successful. Redirecting to Login Page in 5 sec <h3></font>";
        //get email
            $_SESSION['user']=$e;
            header('location:user');
    }
}

?>

		<div class="row">
		<div class="col-md-2 col-xs-1"></div>
		<div class="col-md-8 col-xs-10">
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">Registration Form</h2></caption>
	<tr>
		<td colspan="2"><?php echo @$err;?></td>
	</tr>
				
				<tr>
					<td>Enter Your Name</td>
					<td><input  type="text" pattern="[^0-9]+" name="n" class="form-control" required value ="<?php echo @$n;?>"/></td>
				</tr>
				<tr>
					<td>Enter Your Email ID</td>
					<td><input type="email" name="e" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" class="form-control" required value ="<?php echo @$e;?>"/></td>
				</tr>
				
				<tr>
					<td>Enter Your Password </td>
					<td><input type="password" name="p" pattern="(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" class="form-control" required placeholder="1 Uppercase character, 1 special character, 1 digit, 6+ letters " /></td>
				</tr>
                
                <tr>
					<td>Confirm Password </td>
					<td><input type="password" name="p1" class="form-control" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Mobile </td>
					<td><input type="text" name="mob" pattern="^[7-9]\d{9}$" class="form-control" required value ="<?php echo @$mob;?>"/></td>
				</tr>
				
				<tr>
					<td>Select Your Department</td>
					<td><select name="dept" class="form-control" required>
					<option></option>
					<option>IT</option>
					<option>ETC</option>
					<option>Computer</option>
					</select>
					</td>
				</tr>
				
				<tr>
					<td>Select Your Semester</td>
					<td><select name="sem" class="form-control" required >
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
					</select>
					</td>
				</tr>
				
				<tr>
					<td>Select Your Gender</td>
					<td>
                        Male<input type="radio" name="gen" value="m"/>
                        Female<input type="radio" name="gen" value="f"/>	
					</td>
				</tr>
				
				<tr>
					<td>Enter Your Date of Birth</td>
					<td>
					<input type="date" name="bday" value ="<?php echo @$bday;?>">
					</td>
				</tr>
			
            <tr>
					<td>Enter Your Roll No</td>
					<td>
					<input type="text" name="rollno" pattern="^[CEI][0-9][0-9][-][0-9][0-9]" placeholder="Format = C15-18" value ="<?php echo @$rollno;?>">
					</td>
				</tr>
            
				<tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Save" class="btn btn-info" name="save"/>
                        <input type="reset" value="Reset" class="btn btn-info"/>
					</td>
				</tr>
			</table>
		</form>
		</div>
		<div class="col-md-2 col-xs-1"></div>
		</div>