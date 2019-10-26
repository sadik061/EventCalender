<?php
$id = $_GET["event"];

include 'database.php';
$data = array();

$query = "SELECT * FROM events where event_id=" . $id;
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
    echo '<div class="row">
    <div class="col-md-12 profile-text ">
      <div class=" hidden-sm hidden-xs">
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Event: </label>
          <div class="col-sm-8">
            <label id="event" class="col-form-label">'.$row["title"].'</label>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Venu: </label>
          <div class="col-sm-8">
            <label id="pvenu" class="col-form-label">'.$row["venu"].'</label>
          </div>
        </div>


      
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-4 col-form-label">Funded By: </label>
        <div class="col-sm-8">
          <label id="pfund" class="col-form-label">'.$row["funded_by"].'</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-4 col-form-label">Organized By: </label>
        <div class="col-sm-8">
          <label id="porganize" class="col-form-label">'.$row["organized_by"].'</label>
        </div>
      </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Start date: </label>
              <div class="col-sm-8">
                <label id="pstart" class="col-form-label">'.date('Y-m-d', strtotime($row["start_event"])).'</label>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">End date: </label>
              <div class="col-sm-8">
                <label id="pend" class="col-form-label">'.date('Y-m-d', strtotime($row["end_event"])).'</label>
              </div>
            </div>


      </div>
    </div>
    <!-- /col-md-4 -->
  </div>';
  $query = "SELECT * FROM instructor natural join participents where event_id=" . $id;
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  echo "<h5>List of participents</h5>";
  foreach ($result as $row) {
      if($row["Designation"]=="Midwives"){
  echo  '<div  style="border: 1px solid #dfd4d4;border-radius: 8px;padding: 0px 0px;padding-left: 10px;">
              '.$row["name"].' <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="remove('.$row["instructor_id"].')" >Remove</button>
          </div>';
      }else{
          echo  '<div  style="border: 1px solid #dfd4d4;border-radius: 8px;padding: 0px 0px;padding-left: 10px;" >
              '.$row["name"].' <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="remove('.$row["instructor_id"].')" >Remove</button>
          </div>';
      }
  
  }
}
