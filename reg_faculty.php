<?php
error_reporting(1);
	include('../dbconfig.php');
	extract($_POST);
	if(isset($save))
	{	
        $q=mysqli_query($conn,"select * from faculty where facid='$facid'");
        $r=mysqli_num_rows($q);	
		if($r)
		$err="<font color='red'>Faculty ID is alredy used. </font>";
        
        
		else
		{
            $q=mysqli_query($conn,"select * from faculty where email='$email'");
            $r=mysqli_num_rows($q);	
            if($r)
            $err="<font color='red'>This email already exists choose different email.</font>";
            
            else if($pass !== $pass1)
		      $err="<font color='red'>Passwords not matching </font>";
            
            else
            {	//`id`, `Name`, `designation`, `subject`, `semester`, `email`, `password`, `mobile`, `date`, `facid`
                mysqli_query($conn,"insert into faculty values('','$name','$Designation','$email','$pass','$mob',now(),'$facid','$dept' )");
                $err="<font color='green'>New Faculty Successfully Added.</font>";
                 $_SESSION['faculty_login']=$email;
                    header('location:faculty');
            }
        }
    }	
?>

<div class="row"> 
   <center><h1 class="page-header">Register Faculty</h1> </center> 
<div class="col-md-4 col-xs-1">
</div>

<div class="col-md-4 col-xs-10" >
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" value="<?php echo @$name;?>" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Designation:</label>
            	<input type="text" value="<?php echo @$Designation;?>" name="Designation" class="form-control" required>
        </div>
   	</div>
        
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email :</label>
            	<input type="email" value="<?php echo @$email;?>" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" name="email" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password" value="<?php echo @$pass;?>" pattern="(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="pass" class="form-control" required>
        </div>
    </div>
        
    <div class="control-group form-group">
    	<div class="controls">
        	<label>Confirm Password :</label>
            	<input type="password" value="<?php echo @$pass;?>" pattern="(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="pass1" class="form-control" required>
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$mob;?>" pattern="^[7-9]\d{9}$" class="form-control" maxlength="10" name="mob"  required>
        </div>
  	</div>
        
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Faculty ID:</label>
            	<input type="text" id="facid" value="<?php echo @$facid;?>" class="form-control" maxlength="10" name="facid"  required>
        </div>
  	</div>
        
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
        </div>
  	</div>
	</form>
<br> <br>
</div>
    <div class="col-md-4 col-xs-1">
</div>
    </div>