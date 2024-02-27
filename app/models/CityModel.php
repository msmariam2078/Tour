<?php

 class CityModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function addCities($data) {
        return $this->db->insert('cities', $data);
    }


   

    // public function deleteCity($id) {
    //     $this->db->where('id', $id);
    //     return $this->db->delete('cities');
    // }

    public function getCity() {
        return $this->db->get('cities');
    }

    public function getCityById($id) {
        return $this->db->where('id', $id)->getOne('cities');
    }


}

