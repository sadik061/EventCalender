<?php
$instructor = 0;
if(isset($_GET["instructor"])){
    $instructor = $_GET["instructor"];
}

include 'database.php';

$query = "SELECT * FROM events inner join  participents on events.event_id=participents.event_id where participents.instructor_id=".$instructor;

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