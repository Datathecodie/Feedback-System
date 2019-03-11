<?php 
extract($_POST);
if(isset($sub))
{
    $user=$_SESSION['user'];

    $sql=mysqli_query($conn,"select * from feedback where student_id='$user' and faculty_id='$faculty'");
    $r=mysqli_num_rows($sql);

    if($r==true)
    echo "<h2 style='color:red'>You already given feedback to this faculty</h2>";

    else
    {
        $query="insert into feedback values('','$user','$faculty','$q1','$q2','$q3','$q4','$q5','$suggest',now())";
        mysqli_query($conn,$query);
        echo "<h2 style='color:green'>Thank you </h2>";
    }
}
?>

<form method="post">
<fieldset>
     <?php
        $facid1=$_GET['id'];
        $sql=mysqli_query($conn,"select * from faculty where id = '$facid1' "); // where dept = .. , sem = ... from faculty-subjects table
              $fac=mysqli_fetch_assoc($sql); 
        $facmail = $fac['email']; $facname = $fac['Name']; 
    ?>
<center><u>Student's Feedback Form for <?php echo($facname);?> </u></center><br>
 
<fieldset>
<h3>Please give your answer about the following question by circling the given grade on the scale:</h3>


<button type="button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Strongly Agree 5</button>
<button type="button" style="font-size:7pt;color:white;background-color:Brown;border:2px solid #336600;padding:3px">Agree 4</button>
<button type="button" style="font-size:7pt;color:white;background-color:blue;border:2px solid #336600;padding:3px">Neutral 3</button>
<button type="button" style="font-size:7pt;color:white;background-color:Black;border:2px solid #336600;padding:3px"> Disagree 2</button>
<button type="button" style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Strongly Disagree 1</button><br>

<!--<table class="table table-bordered" style="margin-top:50px">
    <tr>
        <th> Select Faculty :</th>
        <td>
            <select name="faculty" class="form-control">-->
            <?php
               /* $sql=mysqli_query($conn,"select * from faculty ");
                while($r=mysqli_fetch_array($sql))
                    echo "<option value='".$r['email']."'>".$r['Name']."</option>";
                */
             ?>
<!--            </select>
        </td>
    </tr>
</table>-->
   
   
 <input type="hidden" name="faculty" value="<?php echo $facmail;?>">
    
<table class="table table-bordered">
<tr>
    <td><b>1:</b> Rate the use of Teaching Aids(OHP/PPT/LCD) and Blackboard w.r.t Legibility, Visibility and Structure :</td>  
    <td><input type="radio" name="q1" value="5" required>5 &nbsp;
      <input type="radio" name="q1" value="4">4 &nbsp;
      <input type="radio" name="q1" value="3"> 3 &nbsp; 
    <input type="radio" name=" q1" value="2">2 &nbsp;
    <input type="radio" name="q1" value="1">1 </td>
</tr>
  
<tr>
    <td><b>2:</b>Rate Teacher's Usage of Examples and Illustrations:</td> 
    <td><input type="radio" name="q2" value="5" required>5 &nbsp;
      <input type="radio" name="q2" value="4">4 &nbsp;
      <input type="radio" name="q2" value="3">3 &nbsp;
    <input type="radio" name=" q2" value="2">2 &nbsp;
    <input type="radio" name="q2" value="1">1</td>
</tr>

<tr>
    <td>
    <b>3:</b>Rate Teacher's discussion and planning for syllabus coverage:</td> 
    <td>
    <input type="radio" name="q3" value="5" required>5 &nbsp;
      <input type="radio" name="q3" value="4">4 &nbsp;
      <input type="radio" name="q3" value="3"> 3 &nbsp;
    <input type="radio" name="q3" value="2">2 &nbsp;
    <input type="radio" name="q3" value="1">1</td>
</tr>
    
<tr>
    <td>
    <b>4:</b>Rate Efficiency in conducting class and engaging of classes as per the timetable:</td> 
    <td>
    <input type="radio" name="q4" value="5" required>5 &nbsp;
      <input type="radio" name="q4" value="4">4 &nbsp;
      <input type="radio" name="q4" value="3"> 3 &nbsp;
    <input type="radio" name="q4" value="2">2 &nbsp;
    <input type="radio" name="q4" value="1">1</td>
</tr>

<tr>
    <td>
    <b>5:</b>Rate Offering of assistance and counseling as and when needed:</td> 
    <td>
    <input type="radio" name="q5" value="5" required>5 &nbsp;
      <input type="radio" name="q5" value="4">4 &nbsp;
      <input type="radio" name="q5" value="3"> 3 &nbsp;
    <input type="radio" name="q5" value="2">2 &nbsp;
    <input type="radio" name="q5" value="1">1</td>
</tr>    
</table>


<b>6:</b>Suggestions for the Faculty:<br><br>
<center>
<textarea name="suggest" rows="5" cols="40" id="comments" style="font-family:sans-serif;font-size:1.2em;">

</textarea></center><br><br>


<p align="center"><button type="submit" style="font-size:7pt;color:white;background-color:brown;border:2px solid #336600;padding:7px" name="sub">Submit</button></p>

</fieldset>
    </fieldset>

  </form>
