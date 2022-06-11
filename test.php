<!DOCTYPE html>
<html>
<head>
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
    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="profile/js/frame.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="profile/styles/style.css">
    <title></title>
</head>
<body id="page-top" class="index" data-pinterest-extension-installed="cr1.3.4">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">La Ocasion</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden active">
                        <a href="#page-top"></a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#portfolio">Gallery</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    
    
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">La Ocasion</div>
                <div class="intro-heading">You Imagine We Create</div>
                <a href="#services" class="page-scroll btn btn-xl">Start</a>
            </div>
        </div>
    </header>
    
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row text-center">
                <?php
                    $services = pg_query($connect,"SELECT * FROM o_services ORDER BY position_id ASC");
                    if (!$services)
                    {
                    echo pg_last_error($connect);
                      exit;
                    }

                    while($row = pg_fetch_array($services))
                    {
                        echo '<div class="col-md-4">
                            <h4 class="service-heading">'. $row['title'] .'</h4>
                            <p class="text-muted">'. $row['description'] .'</p>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>
