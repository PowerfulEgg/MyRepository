<?php

/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 21.01.2016
 * Time: 18:56
 */
class Country extends mysqli {

    public function add_new_country($country_id, $country_name) {
        $this->connect(HOST, USER, PASS, DATABASE);

        $check_1 = "SELECT $this->country_name FROM countries";
        $result = $this->query($check_1);
        if($result) {
            $query = "INSERT INTO countries VALUES ($country_id, '$country_name')";
            $res = $this->query($query);

            if ($res)
                echo 'New country added!<br>';
            else {
                echo 'Error while adding new country<br>';
                echo $this->error . '<br>';
            }
        }
        elseif($result == null) {
            echo 'This country is already exist';
            die;
        }
    }

    public function select_country_options() {
        $this->connect(HOST, USER, PASS, DATABASE);

        $query = $this->query("SELECT COUNT(*) FROM countries");
        $query = $query->fetch_array();
        $rownum = $query[0];

        $options = $this->query("SELECT country_name FROM countries");
        $options = $options->fetch_all();

        for ($i = 0; $i < $rownum; $i++){
            echo '<option value="'.$options[$i][0].'">'.$options[$i][0].'</option>';
        }
    }

    public function create_table($country) {
        $this->connect(HOST, USER, PASS, DATABASE);

        $query = $this->query("SELECT country_id FROM countries WHERE country_name='$country'");
        $query = $query->fetch_array();
        $country_id = $query[0];

        $query = $this->query("SELECT used_language_name FROM used_languages WHERE country_id = $country_id");
        $used_languages_in_country = $query->fetch_all();
        $array = array();

        for ($i = 0; $i < count($used_languages_in_country); $i++) {
                $array[] = $used_languages_in_country[$i][0];
        }


        /* USED LANGUAGES IN SELECTED COUNTRY */
        $used_languages_in_country_unique = array_unique($array);

        echo '<tr>';
            echo '<td colspan="3">';
                    echo $country.'. Используемые языки: ';
                    for ($f = 0; $f < count($used_languages_in_country_unique); $f++){
                        if($used_languages_in_country_unique[$f] === $used_languages_in_country_unique[$f-1]){
                            continue;
                        }
                        elseif($used_languages_in_country_unique[$f] != $used_languages_in_country_unique[$f-1]) {
                            $ul = $used_languages_in_country_unique[$f];
                            echo '<span class="link" id="'.$ul.'">'.$ul.'</span> ';
                        }
                    }
            echo '</td>';
        echo '</tr>';

        echo '<tr><td>Название города</td><td>Численность населения</td><td>Используемые языки</td></tr>';

        $query_1 = $this->query("SELECT city_name FROM cities WHERE country_id=$country_id");

        while ($city_names = $query_1->fetch_assoc()){
            $a = $city_names["city_name"];
            $query = $this->query("SELECT city_id FROM cities WHERE city_name='$a'");
            $city_id = $query->fetch_array();

            $query = $this->query("SELECT population FROM city_about WHERE city_id=$city_id[0]");
            $city_population = $query->fetch_array();

            $query = $this->query("SELECT used_language_name FROM used_languages WHERE city_id=$city_id[0]");

            echo '<tr>';
                echo '<td>';
                    echo '<span class="popup" id="'.$city_names["city_name"].'">'.$city_names["city_name"].'</span>';
                echo '</td>';

                echo '<td>';
                    echo $city_population[0].' чел.';
                echo '</td>';

                echo '<td>';
                    while ($used_languages_in_city = $query->fetch_assoc()){
                        $g = $used_languages_in_city["used_language_name"];
                        echo '<span class="link" id="'.$g.'">'.$g.'</span> ';
                    }
                echo '</td>';
            echo '</tr>';
        }
    }
}