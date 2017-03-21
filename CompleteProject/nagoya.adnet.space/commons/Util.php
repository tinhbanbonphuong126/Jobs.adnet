<?php
/**
 * Created by PhpStorm.
 * User: QUE
 * Date: 3/8/2017
 * Time: 11:55 AM
 */
function Convert2digitDay($string)
{
$dt = DateTime::createFromFormat('d', $string);
return $dt->format('d');
}

function Convert2digitMonth($string)
{
$dt = DateTime::createFromFormat('m', $string);
return $dt->format('m');
}
function FindDayOfWeek($timestamp){
    $w = date( "w", $timestamp);
    $weekday = array( "日", "月", "火", "水", "木", "金", "土" );

    return $weekday[$w];
}