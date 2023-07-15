<?php
session_start();

require_once('includes/configpdo.php');


require"dompdf/autoload.inc.php";

use Dompdf\Dompdf; 

ob_start();
//error_reporting(0);
?>

<html>
<style>
body {
  padding: 4px;
  text-align: center;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}


</style>


<?php
// code Student Data
$rollid=$_POST['rollid'];
$dob=$_POST['dob'];
$semester=$_POST['semester'];
$branch=$_POST['branch'];

$qery = "SELECT student.student_name,student.Branch,student.id,tblresult.id,tblresult.Semester  from student join tblresult on tblresult.id=student.id where student.id='$rollid' and student.DOB='$dob' and student.Branch='$branch' and Semester='$semester' ";
$stmt = $dbh->prepare($qery);

$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
<p><b>Student Name :</b> <?php echo htmlentities($row->student_name);?></p>
<p><b>Student Roll Id :</b> <?php echo htmlentities($row->id);?></p>
<p><b>Student Branchs:</b> <?php echo htmlentities($row->Branch);?></p>
<p><b>Student Semester:</b> <?php echo htmlentities($row->Semester);break;?></p>

<?php }

    ?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">#</th>
                                                            <th style="text-align: center"> Subject</th>    
                                                            <th style="text-align: center">Marks</th>
                                                        </tr>
                                               </thead>
  


                                                	<stbody>
<?php                                              
// Code for result

 $query ="select * from tblresult where id='$rollid' and Branch='$branch'";
$query= $dbh -> prepare($query);

$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){

    ?>

                                                		<tr>
<th scope="row" style="text-align: center"><?php echo htmlentities($cnt);?></th>
<td style="text-align: center"><?php echo htmlentities($result->SubjectName);?></td>
<td style="text-align: center"><?php echo htmlentities($totalmarks=$result->marks);?></td>
                                                		</tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Total Marks</th>
<td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
<th scope="row" colspan="2" style="text-align: center">Percntage</th>           
<td style="text-align: center"><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
</tr>

<tr>
                              
<td colspan="3" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
                                                             </tr>

 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid student details");
 }
?>
                                        </div>



                                                	</tbody>
                                                </table>
                    </div>
</html>






<?php
$html = ob_get_clean();


$dompdf = new dompdf();

$dompdf->set_option('enable_html5_parser', TRUE);

$dompdf->loadHtml($html); 
 

$dompdf->setPaper('A4', 'landscape'); 
 

$dompdf->render(); 
 

$dompdf->stream("result");
?>