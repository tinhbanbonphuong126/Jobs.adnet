<?php
global $template;
global $vars;
global $act;
global $title;
global $url;
$url = "";
if(isset($_GET['act'])){
    $url = $_GET['act']."/";
}
if (isset($_GET['page'])){
    $url ="../".$_GET['act']."/";
}
include(BASE_DIR.'app/includes/admin/header.php');

if(!($_GET['act'] == 'login' || $_GET['act'] == 'submit-login'))
{
    include(BASE_DIR.'app/includes/admin/sidebar.php');
}

if($vars) extract($vars);
if($template) include(BASE_DIR."admin/pages/".$template);

include(BASE_DIR.'app/includes/admin/footer.php');