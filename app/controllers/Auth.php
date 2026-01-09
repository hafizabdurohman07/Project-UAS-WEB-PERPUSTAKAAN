<?php
class Auth extends Controller {
    public function index() {
        if(isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        $data['title'] = 'Login';
        $this->view('auth/login', $data);
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model('User_model')->login($username, $password);

        if($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['full_name'] = $user['full_name'];
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            $_SESSION['flash'] = 'Username atau password salah!';
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
        exit;
    }
}
