<?php

/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 21.01.2016
 * Time: 18:57
 */
class City_info extends City {

    public function add_new_info($city_id, $population, $post) {
        $this->connect(HOST, USER, PASS, DATABASE);

        $query = $this->query("SELECT COUNT(*) FROM city_about");
        $query = $query->fetch_array();
        $rownum = $query[0];

        $count = 0;

        $check = $this->query("SELECT city_id FROM city_about");
        $check = $check->fetch_all();

        for ($i = 0; $i < $rownum; $i++){
            if ($check[$i][0] == $city_id){
                $count++;
            }
            elseif ($check[$i][0] != $city_id){
                continue;
            }
        }

        if($count == 0) {
            $query = "INSERT INTO city_about VALUES ($city_id, $population, '$post')";
            $res = $this->query($query);

            if ($res)
                echo 'New info added!<br>';
            else {
                echo 'Error while adding new info<br>';
                echo $this->error . '<br>';
            }
        }
        elseif ($count > 0) {
            echo 'This city have already info';
            die;
        }
    }

    public function show_info($city){
        $this->connect(HOST, USER, PASS, DATABASE);

        $query = $this->query("SELECT city_id FROM cities WHERE city_name='$city'");
        $city_id = $query->fetch_array();
        $id = $city_id[0];

        $query = $this->query("SELECT post FROM city_about WHERE city_id=$id");
        $post = $query->fetch_array();

        echo '<h2>'.$city.'</h2>';
        echo '<p>'.$post[0].'</p>';
        echo '<a href="javascript:PopUpHide()" class="close"><i class="fa fa-times"></i></a>';
    }

    /*
    public function delete() {
        $query = "DELETE * FROM caty_about";
        $res = $this->query($query);
    }
    */
}