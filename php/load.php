<?php

//load.php
include 'database.php';
$data = array();

$query = "SELECT * FROM events ORDER BY event_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["event_id"],
  'title'   => $row["title"],
  'extendedProps' => [
    'Description' => $row["Description"],
    'funded_by' => $row["funded_by"]
  ],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
  'className' => 'important',
  'allDay' => false,
  'backgroundColor' => 'orange'
 );
}

echo json_encode($data);

?>