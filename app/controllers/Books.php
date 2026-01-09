<?php
class Books extends Controller {
    public function index($page = 1) {
        $data['title'] = 'Daftar Buku';
        $limit = 5;
        $offset = ($page - 1) * $limit;
        
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        
        $data['books'] = $this->model('Book_model')->getAllBooks($limit, $offset, $keyword);
        $total_records = $this->model('Book_model')->getTotalBooks($keyword);
        
        $data['current_page'] = $page;
        $data['total_pages'] = ceil($total_records / $limit);
        $data['keyword'] = $keyword;

        $this->view('templates/header', $data);
        $this->view('books/index', $data);
        $this->view('templates/footer');
    }

    public function add() {
        if ($this->model('Book_model')->tambahDataBuku($_POST) > 0) {
            $_SESSION['flash'] = 'Buku berhasil ditambahkan!';
            header('Location: ' . BASEURL . '/books');
            exit;
        } else {
            $_SESSION['flash'] = 'Gagal menambahkan buku!';
            header('Location: ' . BASEURL . '/books');
            exit;
        }
    }

    public function delete($id) {
        if ($this->model('Book_model')->hapusDataBuku($id) > 0) {
            header('Location: ' . BASEURL . '/books');
            exit;
        }
    }
}
