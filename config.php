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

  try{
    if(isset(@$_POST['insertService'])){
      $sql = "INSERT INTO o_services(service_id, position_id, title, description, photo_url) VALUES(
          ". $_POST['txtServiceID']. ",
          ". $_POST['txtPositionID']. ",
          '". $_POST['txtTitle']. "',
          '". $_POST['txtDescription']. "',
          '". $_POST['txtPhotoUrl']. "'
      )";
    }
  }catch (Exception $e){
    echo $e->getMessage();
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="#" method="POST" name="insertService">
        <input type="text" name="txtServiceID" placeholder="Service ID">
        <input type="text" name="txtPositionID" placeholder="Service Position ID">
        <input type="text" name="txtTitle" placeholder="Service Title">
        <input type="text" name="txtDescription" placeholder="Service Description">
        <input type="text" name="txtPhotoUrl" placeholder="Service Photo URL">
    </form>
</body>
</html> 