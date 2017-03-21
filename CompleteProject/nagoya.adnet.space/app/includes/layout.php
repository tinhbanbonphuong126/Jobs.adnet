<?php
include(dirname(__FILE__).'/header.php');
$_GET['act'] = isset($_GET['act'])?$_GET['act'] : 'home';
global $template;
global $vars;
if($vars) extract($vars);
if($template) include($template);

include(dirname(__FILE__).'/footer.php');