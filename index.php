<?php
/**
 * Created by PhpStorm.
 * User: sp
 * Date: 20/02/16
 * Time: 12:10 AM
 */

$BaseDir = '';
$staticContentUrlJson = 'http://static.gomobisearch.com/json/';
$staticContentUrlIMG = 'http://static.gomobisearch.com/images/';
include $BaseDir.'src/lib/curlurl.php';
$url = "http://api.gomobisearch.com/gomobi/web/v1/mobiles/?u=iphone&total=32";
$response = CallAPI("GET", $url);
$response_dic = json_decode($response, true)['payload']['data'];
$no_of_mobiles = json_decode($response, true)['payload']['No Of Mobiles']
?>
<html>
<head>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,700italic|Roboto+Mono:400,700|Material+Icons">
    <script src="src/theme/js/jquery-2.2.0.min.js"></script>
    <link href="<?php echo $BaseDir;?>src/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $BaseDir;?>src/theme/css/main.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Go Mobi Search</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Brands</a></li>
                <li><a href="#">All Mobiles</a></li>
                <li><a href="#">Upcomming Mobiles</a></li>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="jumbotron">
    <h1>Search Mobile</h1>
    <h3>Search For Any Mobile , Get review , get Specification All At One Place</h3><br>
    <form class='navbar-form' method="post" action="Search/">
        <div class='form-group'>
            <input type='text' class='form-control searchtop' placeholder='Search Eg : Samsung Galaxy' name="search">
        </div>
        <button type='submit' class='btn btn-my'>Search Mobile</button>
    </form>
</div>
<div class="container">
    <?php
    $data = '';
    foreach ($response_dic as $key=>$mobile_info) {
        $name = ucfirst($mobile_info['name']);
        $image = $staticContentUrlIMG.$mobile_info['image'];
        $des = $mobile_info['des'];
        $des = substr($des, 0, 60);
        $data = $data.'<div class="col-sm-5 col-md-3">';
        $data = $data.'<div class="thumbnail">';
        $data = $data."<center><h4>$name</h4></center>";
        $data = $data."<img src='$image' style='height: 150px; margin-top: 10px; margin-bottom: 10px;'>";
        $data = $data."<div class='caption'>";
        $data = $data."<p>$des...</p>";
        $data = $data."</div>";
        $data = $data."<p><a href='' style='float:right;' class='btn btn-my-2'>Check It Out</a></p>";
        $data = $data."</div></div>";
    }
    ?>

    <?php echo $data; ?>
</div>
</body>
</html>
