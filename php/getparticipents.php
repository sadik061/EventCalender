<?php
$id = $_GET["event"];
echo '<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Participants</a>
  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Resource Person</a>
  
</div>
</nav>
<div class="tab-content" id="nav-tabContent">';

include 'database.php';
$data = array();
$query = "SELECT * FROM instructor natural join participents inner join institute on instructor.institute_id=institute.institute_id where event_id=" . $id." and present=0";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo '<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">';
foreach ($result as $row) {
echo  '<div class="particepents_red">
<div class="col-md-6">'.$row["name"].'</div>
<div class="col-md-5">'.$row["namee"].'</div>
<div >
<div class="col-md-1">
<i class="fa fa-times" onClick="remove('.$row["instructor_id"].',\''.$row["name"].'\')"></i></div>
        </div></div>';
   
}
echo '</div>';
$query = "SELECT * FROM instructor natural join participents inner join institute on instructor.institute_id=institute.institute_id where event_id=" . $id." and present=1";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$queryy = "SELECT * FROM resource_person where event_id=" . $id;
$statementt = $connect->prepare($queryy);
$statementt->execute();
$resultt = $statementt->fetchAll();
echo '<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><div class="form-group row">
<label for="inputPassword" class="col-sm-3 col-form-label">Name</label>
<div class="col-sm-9">
  <input type="text" class="form-control" id="rrname">
</div>
</div>
<div class="form-group row">
<label for="inputPassword" class="col-sm-3 col-form-label">Organization</label>
<div class="col-sm-9">
  <input type="text" class="form-control" id="rrorganization">
</div>
</div>
<button type="button" class="btn btn-primary" onclick="addr();">Add Resource Person</button><hr>';
foreach ($resultt as $row) {
    echo  '<div class="particepents_red">
    <div class="col-md-6">'.$row["namee"].'</div>
    <div class="col-md-5">'.$row["organization"].'</div>
    <div>
    <div class="col-md-1">
    <i class="fa fa-times" onClick="removeResource('.$row["id"].',\''.$row["namee"].'\')"></i>
    </div></div></div>';
       
    }
foreach ($result as $row) {
  echo  '<div class="particepents_red">
  <div class="col-md-6">'.$row["name"].'</div>
  <div class="col-md-5">'.$row["namee"].'</div>
  <div>
  <div class="col-md-1">
  <i class="fa fa-times" onClick="remove('.$row["instructor_id"].',\''.$row["name"].'\')"></i></div>
  </div></div>';   
}
echo '</div>';
?>