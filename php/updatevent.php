<?php

//update.php

include 'database.php';

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event , funded_by=:funded_by,Description=:Description, organized_by=:organized_by,venu=:venu
 WHERE event_id=:event_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':event_id'   => $_POST['id'],
   'funded_by' => $_POST['fund'],
   ':Description' => $_POST['Description'],
   ':organized_by' => $_POST['organize'],
   ':venu' => $_POST['venu'],
  )
 );
}

?>