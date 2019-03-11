<?php 

extract($_POST);
if(isset($save))
{
	if($e=="" || $p=="")
	$err="<font color='red'>fill all the fields first</font>";	
    
	else
	{	
        $sql=mysqli_query($conn,"select email from user where rollno='$e' and pass='$p'");
        $r=mysqli_num_rows($sql);
        
        $sql1=mysqli_query($conn,"select email from faculty where facid='$e' and password='$p'");
        $r1=mysqli_num_rows($sql1);
        
        $que=mysqli_query($conn,"select user and pass from admin where user='$e' and pass='$p'");
		$row=mysqli_num_rows($que);
        
        if($r==true)
        {
            //get email
            $rr1=mysqli_fetch_row($sql);
            $_SESSION['user']=$rr1[0];
            header('location:user');
        }
        
         else if($r1==true)
        {
            $rr1=mysqli_fetch_row($sql1);
            $_SESSION['faculty_login']=$rr1[0];
            header('location:faculty');
        }

		else if($row)
			{	
				$_SESSION['user']=$e;
				header('location:admin/dashboard.php');
			}    
        else
        $err="<font color='red'>Invalid login details</font>";
    }
}

?>
<div class="row">
		<div class="col-sm-2 col-xs-1"></div>
		<div class="col-sm-8 col-xs-10">

<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2><center>Login Form For Student/Faculty/Admin </center></h2></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter Your Roll No/Faculty ID/Admin Email </div>
		<div class="col-sm-5">
		<input type="text" name="e" class="form-control"/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter Your Password</div>
		<div class="col-sm-5">
		<input type="password" name="p" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<input type="submit" value="Login" name="save" class="btn btn-info"/>
		
		</div>
	</div>
</form>	
</div>
</div>