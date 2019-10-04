<?php
$id = $_GET["search"];
if ($_GET["search"] != "") {
    echo "SHowing result for '" . $_GET["search"] . "'";
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
$query = "SELECT * FROM institute LEFT join instructor on instructor.institute_id=institute.institute_id where name like '%" . $id . "%' LIMIT " . $this_page_first_result . "," .  $results_per_page;

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
  <div class="message-header">
  </div>
  <div class="row">
    <div class="col-md-2 centered hidden-sm hidden-xs">
      <img src="img/institute.png" class="img-circle" width="65">
    </div>
    <div class="col-md-9">
      <p>
        name:' . $row["name"] . '
      </p>
      <p>Contact:' . $row["contact"] . '</p>
      <p>Designation:' . $row["Designation"] . '</p>
    </div>
    <div class="col-md-1 centered hidden-sm hidden-xs">
    <button type="button" class="btn btn-secondary" id="remove" onClick="remove(' . $row["instructor_id"] . ')" >Remove</button>
    <button type="button" class="btn btn-secondary" id="edit" onClick="edit(' . $row["instructor_id"] . ',\'' . $row["name"] . '\',\'' . $row["Designation"] . '\',\'' . $row["contact"] . '\',' . $row["institute_id"] . ',\''.$row["namee"].'\')" >Edit</button>
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