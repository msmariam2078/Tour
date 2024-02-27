<?php

class RatingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function addRating($data) {
        return $this->db->insert('ratings', $data);
    }


    public function updateRating($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('ratings', $data);
    }

    public function deleteRatingCustomer($id) {
        $this->db->where('customer_id', $id);
        return $this->db->delete('ratings');
    }

    public function getRatings() {
        return $this->db->get('ratings');
    }

    public function getRatingById($id) {
        return $this->db->where('id', $id)->getOne('ratings');
    }
    public function getRatingByHotelId($id) {
        return $this->db->where('hotel_id', $id)->get('ratings');
    }

}

