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


  try{
    if(@isset($_POST['btnInsertService'])){
      $sql = "INSERT INTO o_services(service_id, position_id, title, description, photo_url) VALUES(
          ". $_POST['txtServiceID']. ",
          ". $_POST['txtPositionID']. ",
          '". $_POST['txtTitle']. "',
          '". $_POST['txtDescription']. "',
          '". $_POST['txtPhotoUrl']. "'
      )";

      $result = pg_query($connect, $sql);
      if (!$result)
      {
          echo pg_last_error($connect);
          exit;
      }else{
        echo "Record inserted!";
      }
    }
  }catch (Exception $e){
    echo $e->getMessage();
  }


  try{
    if(@isset($_POST['btnInsertPhoto'])){
      $sql = "INSERT INTO p_gallery(photo_id, position_id, title, description, photo_url) VALUES(
          ". $_POST['txtPhotoID']. ",
          ". $_POST['txtPositionID']. ",
          '". $_POST['txtTitle']. "',
          '". $_POST['txtDescription']. "',
          '". $_POST['txtPhotoUrl']. "'
      )";

      $result = pg_query($connect, $sql);
      if (!$result)
      {
          echo pg_last_error($connect);
          exit;
      }else{
        echo "Record inserted!";
      }
    }
  }catch (Exception $e){
    echo $e->getMessage();
  }

?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>
    <br>
      <?php
        echo '<form action="#" method="POST" name="displayServices">';
            $result = pg_query($connect, "SELECT * FROM o_services ORDER BY service_id ASC");
            if (!$result)
            {
              echo pg_last_error($connect);
              exit;
            }
            $lastID = 0;
            echo "<table>";
            while ($row = pg_fetch_array($result))
            {
                $lastID = $row['service_id'] + 1;
                if ($row['deleted'] == 1){
                  echo "<tr><td>Order ID: ". $row['position_id'] ."</td><td>Service: ". $row['title'] ."</td><td>Description: ". $row['description'] ."</td><td><a href='delete.php?id=". $row['service_id'] ."&met=undo'>Undo Delete</a></td></tr>";
                }else{
                  echo "<tr><td>Order ID: ". $row['position_id'] ."</td><td>Service: ". $row['title'] ."</td><td>Description: ". $row['description'] ."</td><td><a href='delete.php?id=". $row['service_id'] ."&met=del'>Delete</a></td></tr>";
                }
            }
            echo "</table>";
        echo '<br>
        </form>
        <form action="#" method="POST" name="insertService">
            <input type="text" name="txtServiceID" value="'. $lastID .'" disabled>
            <input type="text" name="txtPositionID" placeholder="Service Position ID">
            <input type="text" name="txtTitle" placeholder="Service Title">
            <input type="text" name="txtDescription" placeholder="Service Description">
            <input type="text" name="txtPhotoUrl" placeholder="Service Photo URL">
            <input type="submit" name="btnInsertService" value="Save">
        </form><br>';
    ?>
        
    <?php
        echo '<br>
        <form action="#" method="POST" name="displayServices">';
            $result = pg_query($connect, "SELECT * FROM p_gallery ORDER BY photo_id ASC");
            if (!$result)
            {
              echo pg_last_error($connect);
              exit;
            }
            $lastID = 0;
            echo "<table>";
            while ($row = pg_fetch_array($result))
            {
              $lastID = $row['photo_id'] + 1;
              if($row['deleted'] == 1){
                  echo "<tr><td>Order ID: ". $row['position_id'] ."</td><td>Photo: ". $row['title'] ."</td><td>Description: ". $row['description'] ."</td><td><a href='deletePhoto.php?id=". $row['photo_id'] ."&met=undo'>Undo Delete</a></td></tr>";
              }else{
                  echo "<tr><td>Order ID: ". $row['position_id'] ."</td><td>Photo: ". $row['title'] ."</td><td>Description: ". $row['description'] ."</td><td><a href='deletePhoto.php?id=". $row['photo_id'] ."&met=del'>Delete</a></td></tr>";
              }
            }
            echo "</table>";
        echo '<br>
        <form action="#" method="POST" name="insertPhoto">
            <input type="text" name="txtPhotoID" value="'. $lastID .'" disabled>
            <input type="text" name="txtPositionID" placeholder="Photo Position ID">
            <input type="text" name="txtTitle" placeholder="Photo Title">
            <input type="text" name="txtDescription" placeholder="Photo Description">
            <input type="text" name="txtPhotoUrl" placeholder="Photo Photo URL">
            <input type="submit" name="btnInsertPhoto" value="Save">
        </form>';
      
    ?>
  
        
    <?php
        echo '<br>
        <form action="#" method="POST" name="param">';
            $result = pg_query($connect, "SELECT * FROM design_config_param");
            echo '<script>$(document).ready(function () {
                  createCookie("height", $(window).height(), "10");
                });

                function createCookie(name, days) {
                  var expires;
                  if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toGMTString();
                  }
                  else {
                    expires = "";
                  }
                  console.log("name: " + name);
                  var value = document.getElementById(name).value;
                  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
                }</script>';
            if (!$result)
            {
              echo pg_last_error($connect);
              exit;
            }
            echo "<table>";
            while ($row = pg_fetch_array($result))
            {
              echo "<tr>
                <td>". $row['param_name'] ."</td>
                <td><input type='text' id='". $row['param_name'] ."' value='". $row['value'] ."'></td>
                <td><input type='submit' name='btnSave' value='Save' onclick='createCookie('". $row['param_name'] ."', 1)'></td>
              </tr>";
            }
            //$_COOKIE["height"];
            echo "</table>";
      
    ?>
</body>
</html> 
