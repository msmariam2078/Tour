<?php

class HotelModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function addHotel($data) {
        return $this->db->insert('hotels', $data);
    }


   

    public function deleteHotel($id) {
        $this->db->where('id', $id);
        return $this->db->delete('hotels');
    }

   

    public function getHotelById($id) {
        return $this->db->where('id', $id)->getOne('hotels');
    }



    
    public function getHotelByCityId($id) {
        return $this->db->where('city_id', $id)->get('hotels');
    }

}

