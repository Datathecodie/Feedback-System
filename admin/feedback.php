<?php 
$q=mysqli_query($conn,"select * from feedback");
$r=mysqli_num_rows($q);
if($r==false)
{
echo "<h3 style='color:Red'>No any records found ! </h3>";
}
else
{
?>

<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_feedback.php?id='+id;
     }
}
    function chart(id)
{
        window.location.href='feedback1.php?id='+id;
}
</script>	


<div class="row">
	<div class="col-sm-12" style="color:orange;">
		<h1 align="center" >Feedback</h1>
	</div>
</div>
<div class="row">

<div class="col-sm-12">

<table class="table table-bordered">

	<thead >
	
	<tr class="success">
		<th>Sr.No</th>
		<th>Student</th>
		<th>Teacher</th>
		<th>Quest1</th>
		<th>Quest2</th>
		<th>Quest3</th>
		<th>Quest4</th>
		<th>Quest5</th>
		<th>Suggestions</th> <th>Click For Charts</th>
		</tr>
		</thead>
		
		<?php
		$i=1;
	while($row=mysqli_fetch_array($q))
		{
			echo "<tr>";
			echo "<td>".$i."</td>";
            $q1=mysqli_query($conn,"select name from user where email = '$row[1]'");
            $row1=mysqli_fetch_row($q1);
			echo "<td>".$row1[0]."</td>";// find student name
			
            $q1=mysqli_query($conn,"select name,id from faculty where email = '$row[2]'");
            $row1=mysqli_fetch_row($q1);
        
            echo "<td>".$row1[0]."</td>";//find faculty name
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td>".$row[8]."</td>";
			//echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>"; 
            echo "<td><a href='#' onclick='chart($row1[1])'>  Click </a> </td>";
			echo "</tr>";
		$i++;
		}
		
		?>

</table>
</div>
</div>
<?php }?>