<?php 

$q=mysqli_query($conn,"select * from subjectfaculty where fmail='".$_SESSION['faculty_login']."'");
$r=mysqli_num_rows($q);
if($r==false)
echo "<h3 style='color:Red'>No Subjects found. </h3>";

else
{
?>

<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Subject ?')
	 if(a)
     {
        window.location.href='delete_feedback.php?id='+id;
     }
}
</script>	


<div class="row">
	<div class="col-sm-12" style="color:orange;">
		<h1 align="center" >Subjects</h1>
	</div>
</div>
<div class="row">

<div class="col-sm-12">

<table class="table table-bordered">

	<thead>
	
	<tr class="success">
		<th>Sr.No</th>
<!--		<th>Student</th>
		<th>Teacher</th>-->
		<th>Subject</th>
		<th>Sem</th>
		<th>Dept</th>
		<th>Delete</th>
		</tr>
		</thead>
		
		<?php

		$i=1; 
    //
    
	while($row=mysqli_fetch_array($q))
		{
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
			echo "</tr>";
		$i++;
		}
    ?>	
	
		
</table>
</div>
</div>

    <script src="../css/canvasjs.min.js"></script>
<?php }?>