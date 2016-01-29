<?php
/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 28.01.2016
 * Time: 12:33
 */
require '../includes/config.php';
require '../includes/Country.php';
require '../includes/City.php';
require '../includes/City_info.php';
require '../includes/Used_language.php';

$action = isset($_POST['action']) ? $_POST['action'] : 'Blya';
$city = isset($_POST['city']) ? $_POST['city'] : 'Blya';
$lang = isset($_POST['lang']) ? $_POST['lang'] : 'Blya';
/*
echo $action.'<br>';
echo $city.'<br>';
echo $lang.'<br>';
*/
$fix = new Used_language();
$fix->fix($action, $city, $lang);
