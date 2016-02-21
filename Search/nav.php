<?php
/**
 * Created by PhpStorm.
 * User: sp
 * Date: 18/01/16
 * Time: 1:32 PM
 */
function display_negivation($total_pages, $current_page, $mobilename) {

    $nav_start = "<div class='well'>
<form class='navbar-form' role='search' class='col-md-3'>";

    $nav_end = "</form></div>";

    $page_nav = '';

    $start = $current_page -3;
    $end = $current_page +3;

    if($start <4) {
        $start = 1;
        $end = 7;
    }
    if($end > $total_pages) {
        $start = $total_pages -7;
        $end = $total_pages;
    }

    for($i=$start ; $i<=$end; $i++){
        if($i > 0 && $i <=$total_pages) {
            $page_nav .= "
        <div class='form-group'>
            <a href='?search=$mobilename&page=$i' class='btn btn-my-2'>$i</a>
        </div>
    ";
        }

    }

    $data = $nav_start.$page_nav.$nav_end;
    return $data;
}

?>