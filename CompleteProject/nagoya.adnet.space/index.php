<?php

session_start();

include(dirname(__FILE__).'/app/Config.php');
include(dirname(__FILE__) . '/commons/Util.php');

function __autoload($class_name)
{
    $loadDirs = ['models', 'controllers'];
    foreach ($loadDirs as $loadDir) {
        $loadFile = dirname(__FILE__) . '/app/' . $loadDir . '/' . $class_name . '.php';
        if (file_exists($loadFile)) {
            include_once($loadFile);
            break;
        }
    }
}

$act = isset($_GET['act'])? $_GET['act']: 'home';

$mapAction = [
    'home' => 'HomeController@index',
    'viewmore' => 'HomeController@viewmore',
    'search' => 'SearchController@index',
    'introduction' => 'IntroductionController@index',
    'map' => 'MapController@index',
    'schedule' => 'ScheduleController@index',
    'situation' => 'SituationController@index',
    'about' => 'AboutController@index',
];

foreach ($mapAction as $action => $mapping)
{
    if ($act === $action) {
        $arr = explode('@', $mapping);
        //$object = new $arr[0](); // HomeController()
        //$object->$arr[1]();
        (new $arr[0]())->$arr[1]();
        break;
    }
}


