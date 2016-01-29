<?php
/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 28.01.2016
 * Time: 12:09
 */

require '../includes/config.php';
require '../includes/Country.php';
require '../includes/City.php';
require '../includes/City_info.php';
require '../includes/Used_language.php';

$country = isset($_POST['country']) ? $_POST['country'] : '';
if($country == null){

}
elseif($country){
    $country_name = new City();
    $country_name->select_city_options($country);
}