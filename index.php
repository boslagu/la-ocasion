/*<?php

    $host = "ec2-54-147-33-38.compute-1.amazonaws.com";
    $user = "rhkeojjsqvafai";
    $password = "9a47afa990330d719c42f76180006c71252e34bb02c1804e6b4b820459e0439b";
    $dbname = "derc23d3bc11l0";
    $port = "5432";
    
    $db_handle = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);

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
?>*/

<?php

    $host = "host=ec2-54-147-33-38.compute-1.amazonaws.com";
    $user = "user=rhkeojjsqvafai";
    $password = "password=9a47afa990330d719c42f76180006c71252e34bb02c1804e6b4b820459e0439b";
    $dbname = "dbname=derc23d3bc11l0";
    $port = "port=5432";

    $connect= pg_connect( "$host $port $dbname $user $password"  );
    if(!$connect){
      echo "Error : Unable to open database\n";
    }

 $result = pg_query($connect,"SELECT * FROM users");
    if (!$result)
    {
    echo pg_last_error($connect);
      exit;
    }

    while($row = pg_fetch_array($result))
    {

    $coor = $row[0];
    echo $coor;

    }
?>



