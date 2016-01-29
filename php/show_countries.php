<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 26.01.2016
 * Time: 20:46
 */

require '../includes/config.php';
require '../includes/Country.php';
require '../includes/City.php';
require '../includes/City_info.php';
require '../includes/Used_language.php';

$language = isset($_POST['lang']) ? $_POST['lang'] : '';
if($language == null){

}
elseif($language){
    $language_name = new Used_language();
    $language_name->show_other_countries($language);
}