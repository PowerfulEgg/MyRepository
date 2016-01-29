<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 27.01.2016
 * Time: 8:35
 */

require '../includes/config.php';
require '../includes/Country.php';
require '../includes/City.php';
require '../includes/City_info.php';
require '../includes/Used_language.php';

$city = isset($_POST['city']) ? $_POST['city'] : '';

$city_info = new City_info();
$city_info->show_info($city);