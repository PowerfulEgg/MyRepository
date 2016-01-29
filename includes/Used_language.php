<?php

/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 21.01.2016
 * Time: 18:57
 */
class Used_language extends City {

    public function add_new_language($country_id, $city_id, $used_language_name) {
        $this->connect(HOST, USER, PASS, DATABASE);

        $count = 0;

        $table_rows = array('country_id', 'city_id', 'used_language_name');
        $keywords = array($country_id, $city_id, $used_language_name);

        $query = $this->query("SELECT COUNT(*) FROM used_languages");
        $query = $query->fetch_array();
        $rownum = $query[0];

        $check = $this->query("SELECT $table_rows[0] FROM used_languages");
        $check = $check->fetch_all();
        for ($i = 0; $i < $rownum; $i++){
            if($check[$i][0] == $keywords[0]){
                $count++;
                break;
            }
            elseif($check[$i][0] != $keywords[0]){
                continue;
            }
        }

        $check = $this->query("SELECT $table_rows[1] FROM used_languages");
        $check = $check->fetch_all();
        for ($i = 0; $i < $rownum; $i++){
            if($check[$i][0] == $keywords[1]){
                $count++;
                break;
            }
            elseif($check[$i][0] != $keywords[1]){
                continue;
            }
        }

        $check = $this->query("SELECT $table_rows[2] FROM used_languages");
        $check = $check->fetch_all();
        for ($i = 0; $i < $rownum; $i++){
            if($check[$i][0] == $keywords[2]){
                $count++;
                break;
            }
            elseif($check[$i][0] != $keywords[2]){
                continue;
            }
        }

        if($count == 3){
            echo 'This rows combination is already exists!';
            die;
        }
        else{
            $query = "INSERT INTO used_languages VALUES ($country_id, $city_id, '$used_language_name')";;
            $insert = $this->query($query);

            if($insert)
                echo 'New used language added!<br>';
            else {
                echo 'Error while adding new used language<br>';
                echo $this->error.'<br>';
            }
        }
    }

    public function show_other_countries($language){
        $this->connect(HOST, USER, PASS, DATABASE);

        $query = $this->query("SELECT country_id FROM used_languages WHERE used_language_name='$language'");

        $ids = $query->fetch_all();
        for ($i = 0; $i < count($ids); $i++){
            if($ids[$i][0] == $ids[$i-1][0]){
                continue;
            }
            else{
                $id = $ids[$i][0];
                $query = $this->query("SELECT country_name FROM countries WHERE country_id=$id");
                $country = $query->fetch_array();
                echo $country[0] . ' ';
            }
        }
    }

    public function fix ($action, $city, $lang) {
        $this->connect(HOST, USER, PASS, DATABASE);
        $query = $this->query("SELECT city_id FROM cities WHERE city_name='$city'");
        $id = $query->fetch_array();
        $city_id = $id[0];
        if ($action == 'delete') {
            $query = $this->query("DELETE FROM used_languages WHERE city_id=$city_id AND used_language_name='$lang'");
            if ($query)
                echo 'Удаление успешно завершено!<br>';
            elseif (!$query) {
                var_dump($query);
                echo 'СУКАААА!<br>';
            }
        }
        elseif ($action == 'add') {
            $query = $this->query("SELECT country_id FROM used_languages WHERE city_id=$city_id");
            $country = $query->fetch_array();
            $country_id = $country[0];

            $query = $this->query("INSERT INTO used_languages VALUES ($country_id, $city_id, '$lang')");
            if ($query)
                echo 'Информация обновлена!<br>';
            elseif (!$query) {
                var_dump($query);
                echo 'СУКАААА!<br>';
            }
        }
    }
}
