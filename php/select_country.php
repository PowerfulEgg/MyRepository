<?php
/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 22.01.2016
 * Time: 17:47
 */

require "db_action.php";

$select_country = new Country;
$select_country->select_country_options();