<?php

  $host = "ec2-54-147-33-38.compute-1.amazonaws.com";
    $user = "rhkeojjsqvafai";
    $password = "9a47afa990330d719c42f76180006c71252e34bb02c1804e6b4b820459e0439b";
    $dbname = "derc23d3bc11l0";
    $port = "5432";
    
    try{
      //Set DSN data source name
        $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";
    
    
      //create a pdo instance
      $pdo = new PDO($dsn, $user, $password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
      echo "<script>console.log(". $e->getMessage() .")</script>";
    }
?>



