<?php


class UserController extends Controller
{

    public function login()
    {
        $userModel = $this->model('User');


        $user = $userModel->login($_POST['email'], $_POST['password']);
        if(!$user) {
            $this->go('home', 'auth');
        }

        $_SESSION["userId"] = $user->id;
        $_SESSION["userIsAdmin"] = $user->is_admin;
        $_SESSION["userName"] = $user->name;
        $_SESSION["userEmail"] = $user->email;

        if ($_SESSION["userId"] && $_SESSION['userIsAdmin']) {
            $this->go('admin', 'dashboard');
        } else {
            $this->go('user', 'profile');
        }

    }

    public function profile()
    {
        if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
            $this->setView('user/user_profile');
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }
}