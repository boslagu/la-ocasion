<?php
 
  try{
      $sql = "DELETE FROM o_services WHERE service_id = ". $_GET['id'] ."";

      echo "<script>alert(". $_GET['id'] .")</script>";
      echo "<script>alert(". $sql .")</script>";
      // $result = pg_query($connect, $sql);
      // if (!$result)
      // {
      //     echo pg_last_error($connect);
      //     exit;
      // }else{
      //   echo "Record inserted!";
      // }
    }
  }catch (Exception $e){
    echo $e->getMessage();
  }

?>
