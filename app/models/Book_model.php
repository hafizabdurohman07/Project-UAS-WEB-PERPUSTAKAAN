<?php
class Book_model {
    private $table = 'books';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBooks($limit, $offset, $keyword = '') {
        $query = "SELECT * FROM " . $this->table;
        if($keyword != '') {
            $query .= " WHERE title LIKE :keyword OR isbn LIKE :keyword OR author LIKE :keyword";
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

    public function getTotalBooks($keyword = '') {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        if($keyword != '') {
            $query .= " WHERE title LIKE :keyword OR isbn LIKE :keyword OR author LIKE :keyword";
        }
        $this->db->query($query);
        if($keyword != '') {
            $this->db->bind('keyword', "%$keyword%");
        }
        return $this->db->single()['total'];
    }

    public function getBookById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataBuku($data) {
        $query = "INSERT INTO books (isbn, title, author, publisher, year, quantity) VALUES (:isbn, :title, :author, :publisher, :year, :quantity)";
        $this->db->query($query);
        $this->db->bind('isbn', $data['isbn']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('publisher', $data['publisher']);
        $this->db->bind('year', $data['year']);
        $this->db->bind('quantity', $data['quantity']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataBuku($id) {
        $query = "DELETE FROM books WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
