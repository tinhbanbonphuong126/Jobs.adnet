<?php
/**
 * Created by PhpStorm.
 * User: QUE
 * Date: 3/9/2017
 * Time: 3:17 PM
 */
session_destroy();
header('location: ?act=login');
die;
