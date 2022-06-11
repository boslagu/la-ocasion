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
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <?php
                    $services = pg_query($connect,"SELECT * FROM o_services ORDER BY position_id ASC");
                    if (!$services)
                    {
                    echo pg_last_error($connect);
                      exit;
                    }

                    while($row = pg_fetch_array($services))
                    {
                        echo '<div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                <img src="'. $row['photo_url'] .'" class="img-size" alt="">
                            </a>
                            <div class="portfolio-caption">
                                <h4>'. $row['title'] .'</h4>
                                <p class="text-muted">'. $row['description'] .'</p>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </section>
    
    
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Gallery</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                
                <?php
$gallery = pg_query($connect, "SELECT * FROM p_gallery ORDER BY position_id ASC");
if (!$gallery)
{
    echo pg_last_error($connect);
    exit;
}

while ($row = pg_fetch_array($gallery))
{
    echo '
                        <div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                <img src="' . $row['photo_url'] . '" class="img-size" alt="">
                            </a>
                            <div class="portfolio-caption">
                                <h4>' . $row['title'] . '</h4>
                                <p class="text-muted">' . $row['description'] . '</p>
                            </div>
                        </div>';
}
?>
            </div>
        </div>
    </section>
    
    

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">This is just a sample about. Please insert an information to change this phrase.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        
                        <?php
$about = pg_query($connect, "SELECT * FROM about_timeline ORDER BY position_id ASC");
if (!$about)
{
    echo pg_last_error($connect);
    exit;
}

$cnt = 0;
while ($row = pg_fetch_array($about))
{
    $cnt++;
    if ($cnt % 2 == 0)
    {
        echo '
                                    <li>
                                        <div class="timeline-image">
                                            <!-- <img class="img-circle img-responsive" src="img/about/1.jpg" alt=""> -->
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4>' . $row['date'] . '</h4>
                                                <h4 class="subheading">' . $row['title'] . '</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p class="text-muted">' . $row['description'] . '</p>
                                            </div>
                                        </div>
                                    </li>';
    }
    else
    {
        echo '
                                    <li class="timeline-inverted">
                                        <div class="timeline-image">
                                            <!-- <img class="img-circle img-responsive" src="img/about/1.jpg" alt=""> -->
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4>2009-2011</h4>
                                                <h4 class="subheading">' . $row['title'] . '</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p class="text-muted">' . $row['description'] . '</p>
                                            </div>
                                        </div>
                                    </li>';
    }
}
?>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    
    

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">La Ocasion oweners and partners.</h3>
                </div>
            </div>
            <div class="row">
                
                <?php
$team = pg_query($connect, "SELECT * FROM team ORDER BY position_id ASC");
if (!$team)
{
    echo pg_last_error($connect);
    exit;
}

while ($person = pg_fetch_array($team))
{

    $media = pg_query($connect, "SELECT * FROM media ORDER BY media_id ASC");
    if (!$media)
    {
        echo pg_last_error($connect);
        exit;
    }

    $contacts = pg_query($connect, "SELECT * FROM contact ORDER BY contact_id ASC");
    if (!$contacts)
    {
        echo pg_last_error($connect);
        exit;
    }

    echo '
                        <div class="col-sm-4">
                            <div class="team-member">
                                <img  class="img-responsive img-circle" alt="" src="'. $person['avatar'] .'">
                                <!-- <img src="http://www.mycatspace.com/wp-content/uploads/2013/08/adopting-a-cat.jpg" class="img-responsive img-circle" alt=""> -->
                                <h4>' . $person['name'] . '</h4>
                                <p class="text-muted">' . $person['description'] . '</p>
                                <p class="text-muted">Contacts</p>';

    while ($row = pg_fetch_array($contacts))
    {
        echo '<p class="text-muted">' . $row['contact'] . '</p>';
    }
    echo '<p class="text-muted">Social Media</p><ul class="list-inline social-buttons">
                                ';
    while ($row = pg_fetch_array($media))
    {
        echo '<li><a href="' . $row['url'] . '"><i class="fa fa-' . $row['platform'] . '"></i></a>
                                    </li>';
    }
    echo '
                                </ul>
                            </div>
                        </div>';
}
?>
                
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>
    
        
      

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
