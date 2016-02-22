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
$url = "http://api.gomobisearch.com/gomobi/web/v1/mobiles/?page=1";
$response = CallAPI("GET", $url);
$response_dic = json_decode($response, true)['payload']['data'];
$no_of_mobiles = json_decode($response, true)['payload']['No Of Mobiles']
?>
<html>
<head>
    <title>Go Mobi Search</title>
    <meta charset="UTF-8">
    <meta name="description" content="Search Mobile, search for any mobile, check latest mobile launch, get reviews , compare prices , get all specification at one place.. All at one place GomobiSearch"/>
    <meta name="keywords" content="Buy Mobiles, Samsung , Apple , Iphones , Sony Mobiles , Acer Mobiles , Compare Mobiles"/>
    <link rel="shortcut icon" href="images/yco5bRMcE.png" type="image/x-icon" />
    <meta property="og:title" content="Go Mobi Search"/>
    <meta property="og:image" content="http://gomobisearch.com/images/top-10-mobiles.png"/>
    <meta property="og:site_name" content="Go Mobi Search"/>
    <meta property="og:description" content="Search Mobile, search for any mobile, check latest mobile launch, get reviews , compare prices , get all specification at one place.. All at one place GomobiSearch"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,700italic|Roboto+Mono:400,700|Material+Icons">
    <script src="src/theme/js/jquery-2.2.0.min.js"></script>
    <link href="<?php echo $BaseDir;?>src/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $BaseDir;?>src/theme/css/main.css" rel="stylesheet">
    <style>
        .btn-my-2 {
            background-color: #607d8b;
            box-shadow: 0 0 4px rgba(0,0,0,.14),0 4px 8px rgba(0,0,0,.28);
            color: #fff;
            font: 16px Roboto,sans-serif;
            letter-spacing: .01em;
            font-weight: 100;
            margin: 0px;
            opacity: 0.8;
            margin-right:20px;
        }
        .btn-my-2:hover {
            color:white;
            opacity: 1;
        }
    </style>
</head>
<body>
<?php include $BaseDir.'src/lib/header.php'; ?>
<div class="jumbotron">
    <h1>Search Mobile</h1>
    <h3>Search For Any Mobile , Get review , get Specification All At One Place</h3><br>
    <form class='navbar-form' method="get" action="Search/">
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
        $link = str_replace('.json','/',$mobile_info['filejson']);
        $des = substr($des, 0, 60);
        $data = $data.'<div class="col-sm-5 col-md-3 box-mobile">';
        $data = $data.'<div class="thumbnail">';
        $data = $data."<center><h4>$name</h4></center>";
        $data = $data."<img src='$image' style='height: 150px; margin-top: 10px; margin-bottom: 10px;'>";
        $data = $data."<div class='caption'>";
        $data = $data."<p>$des...</p>";
        $data = $data."</div>";
        $data = $data."<p><a href='view/$link' style='float:right;' class='btn btn-my-2'>Check It Out</a></p>";
        $data = $data."</div></div>";
    }
    ?>

    <?php echo $data; ?>
</div>
</body>
</html>
