<?php
  $sql = "DELETE FROM o_services WHERE service_id = ". $_GET['id'] ."";
echo $sql;
  //$result = pg_query($connect, $sql);
  //if (!$result)
  //{
  //  echo pg_last_error($connect);
  //}else{
  //  echo "<script>alert(Record deleted!)</script>";
  //  header("Location: https://la-ocasion.herokuapp.com/config.php"); 
  //}
?>
