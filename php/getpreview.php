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
          <label for="inputPassword" class="col-sm-4 col-form-label">Funded By: </label>
          <div class="col-sm-8">
            <label id="pvenu" class="col-form-label">';
            
$queryy = "SELECT * FROM funded_by natural join funder where event_id=" . $id;
$statementt = $connect->prepare($queryy);
$statementt->execute();
$resultt = $statementt->fetchAll();
foreach ($resultt as $roww) {           
            echo '<div class="chip" style="    margin-bottom: 0rem;">' . $roww["name"] . '</div>';
}
            echo '</label>
          </div>
        </div>


      
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-4 col-form-label">Venu: </label>
        <div class="col-sm-8">
          <label id="pfund" class="col-form-label">'.$row["venu"].'</label>
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
                <label id="pstart" class="col-form-label">'.date('d-m-y', strtotime($row["start_event"])).'</label>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">End date: </label>
              <div class="col-sm-8">
                <label id="pend" class="col-form-label">'.date('d-m-y', strtotime($row["end_event"])).'</label>
              </div>
            </div>


      </div>
    </div>
    <!-- /col-md-4 -->
  </div>
  <p id="hidedetails" onclick="showdetails(1);" style="color:  #0D7EFF">Show more details</p>
  <p  class="details" onclick="showdetails(0);" style="color:  #0D7EFF;float: right;display:none;margin-bottom: 0rem;">Hide details</p>
  <div class="details" style="display:none;">';
  $query = "SELECT *  FROM instructor natural join participents inner join institute on instructor.institute_id=institute.institute_id where event_id=" . $id." and present=1";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  echo "<h5>List of Resource Person</h5>";
  foreach ($result as $row) {
          echo  '<div class="particepents_red">
          <div class="col-md-6">'.$row["name"].'</div>
          <div class="col-md-5">'.$row["namee"].'</div>
          </div>';
  }
  $query = "SELECT * FROM resource_person where event_id=" . $id;
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    echo  '<div  class="particepents_red">
        '.$row["namee"].'
    </div>';
}

  $query = "SELECT *  FROM instructor natural join participents inner join institute on instructor.institute_id=institute.institute_id where event_id=" . $id." and present=0";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  echo "<h5>List of Participants</h5>";
  foreach ($result as $row) {
          echo  '<div class="particepents_red">
          <div class="col-md-6">'.$row["name"].'</div>
          <div class="col-md-5">'.$row["namee"].'</div>
          </div>';
  }
  echo '</div>';
}
