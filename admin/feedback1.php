<?php 
include('../dbconfig.php');
 $q1=mysqli_query($conn,"select email from faculty where id = '".$_GET['id']."' ");
            $row1=mysqli_fetch_row($q1);

$q=mysqli_query($conn,"select * from feedback where faculty_id='$row1[0]' ");
$r=mysqli_num_rows($q);
if($r==false)
echo "<h3 style='color:Red'>No records found. </h3>";

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
</script>	


<div class="row">
    <?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>back</a>"; 
?>
	<div class="col-sm-12" style="color:orange;">
		<h1 align="center" >Feedback</h1>
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
		<th>Quest1</th>
		<th>Quest2</th>
		<th>Quest3</th>
		<th>Quest4</th>
		<th>Quest5</th>
		<th>Suggestions</th>
		</tr>
		</thead>
		
		<?php

		$i=1; 
    $qst1=array(0,0,0,0,0); $qst2=array(0,0,0,0,0); $qst3=array(0,0,0,0,0); $qst4=array(0,0,0,0,0); $qst5=array(0,0,0,0,0);
    
	while($row=mysqli_fetch_array($q))
		{
			echo "<tr>";
			echo "<td>".$i."</td>";
/*			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";*/
			echo "<td>".$row[3]."</td>";
        
            $qst1[($row[3]-1)]++; 
            $qst2[($row[4]-1)]++; 
            $qst3[($row[5]-1)]++; 
            $qst4[($row[6]-1)]++; 
            $qst5[($row[7]-1)]++;
        
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td>".$row[8]."</td>";
			//echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
			echo "</tr>";
		$i++;
		}
		    $dataPoints1 = array(
	array("label"=> "Excellent", "y"=> $qst1[4]),
	array("label"=> "Good", "y"=> $qst1[3]),
	array("label"=> "Average", "y"=> $qst1[2]),
	array("label"=> "Poor", "y"=> $qst1[1]),
	array("label"=> "Worse", "y"=> $qst1[0]),
);
		$dataPoints2 = array(
	array("label"=> "Excellent", "y"=> $qst2[4]),
	array("label"=> "Good", "y"=> $qst2[3]),
	array("label"=> "Average", "y"=> $qst2[2]),
	array("label"=> "Poor", "y"=> $qst2[1]),
	array("label"=> "Worse", "y"=> $qst2[0]),
);$dataPoints3 = array(
	array("label"=> "Excellent", "y"=> $qst3[4]),
	array("label"=> "Good", "y"=> $qst3[3]),
	array("label"=> "Average", "y"=> $qst3[2]),
	array("label"=> "Poor", "y"=> $qst3[1]),
	array("label"=> "Worse", "y"=> $qst3[0]),
);$dataPoints4 = array(
	array("label"=> "Excellent", "y"=> $qst4[4]),
	array("label"=> "Good", "y"=> $qst4[3]),
	array("label"=> "Average", "y"=> $qst4[2]),
	array("label"=> "Poor", "y"=> $qst4[1]),
	array("label"=> "Worse", "y"=> $qst4[0]),
);$dataPoints5 = array(
	array("label"=> "Excellent", "y"=> $qst5[4]),
	array("label"=> "Good", "y"=> $qst5[3]),
	array("label"=> "Average", "y"=> $qst5[2]),
	array("label"=> "Poor", "y"=> $qst5[1]),
	array("label"=> "Worse", "y"=> $qst5[0]),
);
    
    ?>
		
	
		
</table>
</div>
</div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Q1. Rate the use of Teaching Aids(OHP/PPT/LCD) and Blackboard w.r.t Legibility, Visibility and Structure "
	},
	subtitles: [{
		text: "No. of students."
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 12,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
           var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Q2. Rate Teacher's Usage of Examples and Illustrations"
	},
	subtitles: [{
		text: "No. of students."
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 12,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Q3. Rate Teacher's discussion and planning for syllabus coverage "
	},
	subtitles: [{
		text: "No. of students."
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 12,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();var chart = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Q4. Rate Efficiency in conducting class and engaging of classes as per the timetable"
	},
	subtitles: [{
		text: "No. of students."
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 12,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();var chart = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Q5. Rate Offering of assistance and counseling as and when needed"
	},
	subtitles: [{
		text: "No. of students."
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 12,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
    <div id="chartContainer1" style="height: 250px; width: 100%;"></div>
     <div id="chartContainer2" style="height: 250px; width: 100%;"></div>
 <div id="chartContainer3" style="height: 250px; width: 100%;"></div>
 <div id="chartContainer4" style="height: 250px; width: 100%;"></div>
 <div id="chartContainer5" style="height: 250px; width: 100%;"></div>
    <script src="../css/canvasjs.min.js"></script>
<?php }?>