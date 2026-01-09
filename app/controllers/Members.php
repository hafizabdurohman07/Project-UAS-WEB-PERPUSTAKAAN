<?php
class Members extends Controller {
    public function index($page = 1) {
        $data['title'] = 'Daftar Anggota';
        $limit = 5;
        $offset = ($page - 1) * $limit;
        
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        
        $data['members'] = $this->model('Member_model')->getAllMembers($limit, $offset, $keyword);
        $total_records = $this->model('Member_model')->getTotalMembers($keyword);
        
        $data['current_page'] = $page;
        $data['total_pages'] = ceil($total_records / $limit);
        $data['keyword'] = $keyword;

        $this->view('templates/header', $data);
        $this->view('members/index', $data);
        $this->view('templates/footer');
    }

    public function add() {
        if ($this->model('Member_model')->tambahDataMember($_POST) > 0) {
            header('Location: ' . BASEURL . '/members');
            exit;
        }
    }

    public function delete($id) {
        if ($this->model('Member_model')->hapusDataMember($id) > 0) {
            header('Location: ' . BASEURL . '/members');
            exit;
        }
    }
}
