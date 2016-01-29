<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 27.01.2016
 * Time: 11:16
 */

require '../includes/config.php';
require '../includes/Country.php';
require '../includes/City.php';
require '../includes/City_info.php';
require '../includes/Used_language.php';

$country = isset($_POST['country']) ? $_POST['country'] : '';

$select_country = new City;
$select_country->select_city_options($country);