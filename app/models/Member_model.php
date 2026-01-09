<?php
class Member_model {
    private $table = 'members';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMembers($limit, $offset, $keyword = '') {
        $query = "SELECT * FROM " . $this->table;
        if($keyword != '') {
            $query .= " WHERE name LIKE :keyword OR member_code LIKE :keyword";
        }
        $query .= " LIMIT :offset, :limit";
        
        $this->db->query($query);
        $this->db->bind('limit', $limit, PDO::PARAM_INT);
        $this->db->bind('offset', $offset, PDO::PARAM_INT);
        if($keyword != '') {
            $this->db->bind('keyword', "%$keyword%");
        }
        
        return $this->db->resultSet();
    }

    public function getTotalMembers($keyword = '') {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        if($keyword != '') {
            $query .= " WHERE name LIKE :keyword OR member_code LIKE :keyword";
        }
        $this->db->query($query);
        if($keyword != '') {
            $this->db->bind('keyword', "%$keyword%");
        }
        return $this->db->single()['total'];
    }

    public function tambahDataMember($data) {
        $query = "INSERT INTO members (member_code, name, address, phone) VALUES (:member_code, :name, :address, :phone)";
        $this->db->query($query);
        $this->db->bind('member_code', $data['member_code']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('address', $data['address']);
        $this->db->bind('phone', $data['phone']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMember($id) {
        $query = "DELETE FROM members WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
