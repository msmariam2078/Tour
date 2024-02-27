<?php

class CompanyModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function addCompany($data) {
        return $this->db->insert('companies', $data);
    }


    public function updateCompany($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('companies', $data);
    }

    public function deleteCompany($id) {
        $this->db->where('id', $id);
        return $this->db->delete('companies');
    }

    public function getCompany() {
        return $this->db->get('companies');
    }

    public function getCompanyById($id) {
        return $this->db->where('id', $id)->getOne('companies');
    }
    public function getCompanyByTitle($title) {
        return $this->db->where('title', $title)->getOne('companies');
    }


}

