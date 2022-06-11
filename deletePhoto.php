<?php

  $host = "host=ec2-54-147-33-38.compute-1.amazonaws.com";
  $user = "user=rhkeojjsqvafai";
  $password = "password=9a47afa990330d719c42f76180006c71252e34bb02c1804e6b4b820459e0439b";
  $dbname = "dbname=derc23d3bc11l0";
  $port = "port=5432";

  $connect = pg_connect("$host $port $dbname $user $password");
  if (!$connect)
  {
      echo "Error : Unable to open database\n";
  }

  $result = pg_query($connect, "SELECT * FROM users");
  if (!$result)
  {
      echo pg_last_error($connect);
      exit;
  }

  while ($row = pg_fetch_array($result))
  {

      echo print_r($row);

  }
  $sql = "UPDATE p_gallery SET delete = 1 WHERE photo_id = ". $_GET['id'] ."";
  $result = pg_query($connect, $sql);
  if (!$result)
  {
    echo pg_last_error($connect);
  }else{
    echo "<script>alert(Record deleted!)</script>";
    header("Location: https://la-ocasion.herokuapp.com/config.php"); 
  }
?>
