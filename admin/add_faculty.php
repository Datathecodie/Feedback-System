<?php
error_reporting(1);
	include('../dbconfig.php');
	extract($_POST);
	if(isset($save))
	{	
		if(strlen($mob)<10 || strlen($mob)>10)
		$err="<font color='red'>Mobile number must be 10 digit</font>";

		else
		{
            $q=mysqli_query($conn,"select * from faculty where email='$email'");
            $r=mysqli_num_rows($q);	
            if($r)
            $err="<font color='red'>This email already exists choose different email.</font>";
        
            else
            {	//`id`, `Name`, `designation`, `subject`, `semester`, `email`, `password`, `mobile`, `date`, `facid`
                mysqli_query($conn,"insert into faculty values('','$name','$Designation','$email','$pass','$mob',now(),'$facid','$dept' )");
                $err="<font color='green'>New Faculty Successfully Added.</font>";
            }
        }
    }	
?>

<h1 class="page-header">Add Faculty</h1>
<div class="col-lg-8" style="margin:15px;">
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
            	<input type="email" value="<?php echo @$email;?>"  name="email" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password" value="<?php echo @$pass;?>"  name="pass" class="form-control" required>
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$mob;?>" class="form-control" maxlength="10" name="mob"  required>
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

</div>