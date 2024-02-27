<?php

class TicketModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTicket() {
        return $this->db->get('tickets');
    }

    public function getTicketById($id) {
        return $this->db->where('id', $id)->get('tickets');
    }
    public function getTicketByCityId($id) {
        return $this->db->where('city_id', $id)->get('tickets');
    }
    public function getTicketByCompanyId($id) {
        return $this->db->where('company_id', $id)->get('tickets');
    }
    public function getTicketDateAndCity($city,$date_s) {
        return $this->db->where('city_id',$date_s)->where('date_s',$date_s)->get('tickets');
    }
    
    
    public function addTicket($data) {
        return $this->db->insert('tickets', $data);
    }

    
    public function deleteTicket($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tickets');
    }

}