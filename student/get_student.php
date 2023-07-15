<?php
include('includes/config.php');
if(!empty($_POST["year"])) 
{
 $cid=intval($_POST['year']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid year");exit;
 }
 else{
 $stmt = $dbh->prepare("SELECT id,Branch FROM branch order by Branch");
 $stmt->execute();
 ?><option value="">Select Branch </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
<option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['Branch']); ?></option>
<?php
 }
 }
}


    //code for semister

    if(!empty($_POST["branch"]))
    {
    $cid=intval($_POST['branch']);
    if(!is_numeric($cid)){

    echo htmlentities("invalid branch");exit;
    }
    else{
    $stmt = $dbh->prepare("SELECT id,semester_name FROM semester order by semester_name");
    $stmt->execute();
    ?><option value="">Select semister </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
    <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['semester_name']); ?></option>
    <?php
 }
 }
}

//code for student
if(!empty($_POST["semester"])) 
{
  $year=intval($_POST['year']);
        $branch=intval($_POST['branch']);
    $semister=intval($_POST['semester']);
   if(!is_numeric($semester)){
 
  echo htmlentities("invalid semester");exit;
 }
}else{


?>
<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>slno</th>
            <th>RollNumber</th>
            <th>branch</th>
            <th>semister</th>
            <th>year</th>
            <th>SubjectName</th>
            
           <th>enter mark</th>
            <th>action</th>

            

        </tr>
    </thead>
    <tbody>
        <?php
        $year=$_POST['year'];
        $branch=$_POST['branch'];
        $semester=$_POST['semester'];
        $sql = "SELECT * FROM tblsubjectcombination order by id ASC ";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {   ?>
        <tr>
            <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo htmlentities($result->id);?></td>

            <td><?php echo htmlentities($result->Branch);?></td>
            <td><?php echo htmlentities($result->semester);?></td>
            <td><?php echo htmlentities($result->year);?></td>
            <td><?php echo htmlentities($result->SubjectName);?></td>

            
            <td>
            </td>
            <td></td>

        </tr>
        <?php $cnt=$cnt+1;}} ?>
    </tbody>

</table>
<?php }?>