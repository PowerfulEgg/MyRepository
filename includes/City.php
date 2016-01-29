<?php

/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 21.01.2016
 * Time: 18:56
 */
class City extends Country {

    public function add_new_city($city_id, $city_name, $country_id) {
        $this->connect(HOST, USER, PASS, DATABASE);

        $check = "SELECT $this->city_name FROM cities";
        $result = $this->query($check);
        if($result) {
            $query = "INSERT INTO cities VALUES ($city_id, '$city_name', $country_id) ";
            $res = $this->query($query);

            if ($res)
                echo 'New city added!<br>';
            else {
                echo 'Error while adding a new city<br>';
                die;
            }
        }
        else if ($result == null) {
            echo 'This city already exists';
            die;
        }
    }

    public function select_city_options($country) {
        $this->connect(HOST, USER, PASS, DATABASE);

        $query = $this->query("SELECT country_id FROM countries WHERE country_name='$country'");
        $country_id = $query->fetch_array();
        $id = $country_id[0];

        $query = $this->query("SELECT city_name FROM cities WHERE country_id=$id");
        /*
        echo '<label for="select-city">Выберите город</label>>';
        echo '<select name="select-city" id="select-city-id">';
        */
            while($city_option = $query->fetch_assoc()){
                echo '<option value="'.$city_option['city_name'].'">'.$city_option['city_name'].'</option>';
            }
        /*
        echo '</select>';
        */
        }
}