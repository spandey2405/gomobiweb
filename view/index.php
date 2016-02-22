<?php
/**
 * Created by PhpStorm.
 * User: sp
 * Date: 20/02/16
 * Time: 1:50 AM
 */
$BaseURL = 'http://gomobisearch.com/';
$BaseDir = '../';
$staticContentUrlJson = 'http://static.gomobisearch.com/json/';
$staticContentUrlIMG = 'http://static.gomobisearch.com/images/';

$request_url = $_SERVER['REQUEST_URI'];
$mobilename = str_replace('/','',split('view/',$request_url)[1]);
$url_query = str_replace('+','[[plus]]',$mobilename);
$url = "http://api.gomobisearch.com/gomobi/web/v1/mobile/?u=$url_query";
$mobilename = ucfirst(str_replace('-',' ', $mobilename));
include $BaseDir.'src/lib/curlurl.php';
$response = CallAPI("GET", $url);
$response_dic = json_decode($response, true)['payload'];
$specification_json_file = $response_dic['filejson'];
$image = $staticContentUrlIMG.$response_dic['image'];
$des = $response_dic['des'];
$name = $response_dic['name'];

$specification = file_get_contents($staticContentUrlJson.$specification_json_file);
$specification = json_decode($specification, true);
?>
<html>
<head>
    <title><?php ucfirst($name); ?> | GoMobiSearch</title>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $des; ?>"/>
    <meta name="keywords" content="Buy Mobiles, Samsung , Apple , Iphones , Sony Mobiles , Acer Mobiles , Compare Mobiles, <?php echo $name; ?>"/>
    <link rel="shortcut icon" href="<?php echo $image; ?>" type="image/x-icon" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,700italic|Roboto+Mono:400,700|Material+Icons">
    <script src="<?php echo $BaseURL; ?>src/theme/js/jquery-2.2.0.min.js"></script>
    <link href="<?php echo $BaseURL; ?>src/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $BaseURL; ?>src/theme/css/main.css" rel="stylesheet">
    <style>
        .panel-body h4 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include '../src/lib/header.php'; ?>

    <div class="container">
        <br><br>
        <ol class="breadcrumb">
            <li><a href="<?php echo $BaseURL; ?>">Home</a></li>
            <li class="active"><a href="#"><?php echo ucfirst($name); ?></a></li>
        </ol>


    <div class="col-md-12">

        <div class="col-md-10" style="padding: 10px;">
            <div class="col-md-3"><img src="<?php echo $image; ?>"></div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><b><?php echo ucfirst($name); ?></b></div>
                    <div class="panel-body">
                        <?php echo $des; ?>
                    </div>
                    <div class="panel-footer">
                        <a href="https://amazon.in" class="btn btn-primary">Buy From Flipkart</a>
                        <a href="https://flipkart.com" class="btn btn-success">Buy From Amazon</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Specification</h3></div>
                <div class="panel-body">
                    <table class='table table-striped'><tbody>
                    <?php
                    $current_heading = "";
                    $heading = "";
                    foreach($specification as $spec_cat=>$spec_data) {
                        if ($spec_cat == "Tests") {}
                        else {
                            $heading = $spec_cat;
                        foreach($spec_data as $spec_data_title=> $spec_data_info){
                            if ($heading == $current_heading) {
                                $heading_content = "";
                            }
                            else {
                                $heading_content = $spec_cat;
                                $heading = $current_heading;
                            }
                            echo "<tr width='15%'><th>$heading_content</th><td width='15%'>$spec_data_title</td><td width='70%'>$spec_data_info</td></tr>";
                        }
                        echo '';
                        }
                    }
                    ?>
                        </tbody></table>
                </div>

            </div>
        </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</body>
</html>
