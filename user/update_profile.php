<?php 
extract($_POST);
if(isset($update))
{
    //dob
    $dob=$bday;
    $query="update user set name='$n',mobile='$mob',gender='$gen',dob='$dob' where email='".$_SESSION['user']."'";
    //$query="insert into user values('','$n','$e','$pass','$mob','$gen','$dob')";
    mysqli_query($conn,$query);
    $err="<font color='blue'>Profie updated successfully !!</font>";
}

//select old data
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where email='".$_SESSION['user']."'");
$res=mysqli_fetch_assoc($sql);

?>
<h2 align="center">Update Your Profile</h2>

		<form method="post">
			<table class="table table-bordered">
                <tr>
                    <td colspan="2"><?php echo @$err;?></td>
                </tr>
				
				<tr>
					<td>Enter Your name</td>
					<td><input class="form-control" value="<?php echo $res['name'];?>"  type="text" name="n"/></td>
				</tr>
				<tr>
					<td>Enter Your email </td>
					<td><input class="form-control" type="email" readonly="true" value="<?php echo $res['email'];?>"  name="e"/></td>
				</tr>
				
				<tr>
					<td>Enter Your Mobile </td>
					<td><input class="form-control" type="text" value="<?php echo $res['mobile'];?>"  name="mob"/></td>
				</tr>
				
				<tr>
					<td>Select Your Gender</td>
					<td>
                    Male<input type="radio" <?php if($res['gender']=="m"){echo "checked";} ?> name="gen" value="m"/>
                    Female<input type="radio" <?php if($res['gender']=="f"){echo "checked";} ?> name="gen" value="f"/>	
					</td>
				</tr>
								
				<tr>
					<td>Enter Your DOB</td>
                    <td>
					<input type="date" name="bday" value="<?php echo $res['dob'];?>">
					</td>
				</tr>
				
				<tr>
                    <td colspan="2" align="center">
                    <input type="submit" class="btn btn-default" value="Update My Profile" name="update"/>
                    <input type="reset" class="btn btn-default" value="Reset"/>
					</td>
				</tr>
			</table>
		</form>