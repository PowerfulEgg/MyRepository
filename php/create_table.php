<?php
/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 22.01.2016
 * Time: 19:28
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
    $country_name = new Country();
    $country_name->create_table($country);
}

$language = isset($_POST['lang']) ? $_POST['lang'] : '';
if($language == null){

}
elseif($language){
    $language_name = new Used_language();
    $language_name->show_other_countries($language);
}



