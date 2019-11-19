<?php
$id = $_GET["search"];
$designation = "";
$institute ="";
if(isset($_GET["designation"])){
  $designation= $_GET["designation"];
}
if(isset($_GET["institute"])){
  $institute= $_GET["institute"];
  if($_GET["institute"]!="Select an Institute"){
    $institute= $_GET["institute"];
  }
  else{
    $institute ="";
  }
}

if ($_GET["search"] != "") {
    echo "Showing result for '" . $_GET["search"] . "'";
}
include 'database.php';
$data = array();

$query = "SELECT * FROM instructor where name like '%" . $id . "%'";
$statement = $connect->prepare($query);
$statement->execute();
$results_per_page = 10;
$number_of_results = $statement->rowCount();
$number_of_pages = ceil($number_of_results / $results_per_page);
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$this_page_first_result = ($page - 1) * $results_per_page;
$query = "SELECT * FROM institute LEFT join instructor on instructor.institute_id=institute.institute_id where name like '%" . $id . "%' and Designation like '%" . $designation . "%' and namee like '%" . $institute . "%' ORDER BY instructor_id DESC LIMIT " . $this_page_first_result . "," .  $results_per_page;
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$from = $this_page_first_result + 1;
$to = $this_page_first_result + $results_per_page;
if ($to > $number_of_results) {
    $to = $number_of_results;
}

foreach ($result as $row) {
    echo '<div class="message-p pn">
  <div class="row">
    
    <div class="col-md-5">
      <h4  style="padding-left: 2%;"><b>' . $row["name"] . '</b>
      </h4>
      <p>' . $row["Designation"] . '</p>
      
      
    </div>
    <div class="col-md-5">
      <p>
        Institute name: <b>' . $row["namee"] . ', '. $row["area"].'</b>
      </p>
      <p>Email: <b>' . $row["email"] . '</b></p>
      <p>Contact: <b>' . $row["contact"] . '</b></p>
      </div>
      <div class="col-md-2">
      <div class=" pull-right hidden-sm hidden-xs">
    <button class="btn btn-xs" id="edit" onClick="edit(' . $row["instructor_id"] . ',\'' . $row["name"] . '\',\'' . $row["Designation"] . '\',\'' . $row["contact"] . '\',' . $row["institute_id"] . ',\''.$row["namee"].'\',\''.$row["email"].'\')" ><i class="fa fa-pencil "></i></button>
    <button class="btn btn-xs" id="remove" onClick="remove(' . $row["instructor_id"] . ')" ><i class="fa fa-trash-o"></i></button>
    </div>
    </div>
  </div>
</div>';

}
echo '<div class="row-fluid">
<div class="span6">
  <div class="dataTables_info" id="hidden-table-info_info">Showing ' . $from . ' to ' . $to . ' of ' . $number_of_results . ' entries</div>
</div>
<div class="span6">
  <div class="dataTables_paginate paging_bootstrap pagination">
    <ul>';
for ($page = 1; $page <= $number_of_pages; $page++) {
    echo '<li><a href="instructor.php?page=' . $page . '&search=' . $id . '">' . $page . '</a></li>';
}
echo '</ul>
  </div>
</div>
</div>';

?>