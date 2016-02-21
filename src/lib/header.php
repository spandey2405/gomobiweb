<?php

$homepage = "http://gomobisearch.com/";
$brand = "http://gomobisearch.com/Brands/";
$all = "http://gomobisearch.com/Search/?search=all";

?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $homepage; ?>">Go Mobi Search</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo $brand; ?>">Brands</a></li>
                <li>
                    <a href="<?php echo $all; ?>">All Mobiles</a>
                </li>
<!--                <li><a href="#">Upcomming Mobiles</a></li>-->
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>