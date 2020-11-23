<?php

//Add user when login to profile
class UserController extends Controller
{

    public function login()
    {
        $userModel = $this->model('User');
        $user = $userModel->getByEmail($_POST['email']);

        if(!$user) {
            $this->go('home', 'auth');
        }

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION["userId"] = $user->id;
            $_SESSION["userIsAdmin"] = $user->is_admin;
            $_SESSION["userName"] = $user->name;
            $_SESSION["userEmail"] = $user->email;
        }

        if (isset($_SESSION["userId"]) && $_SESSION['userIsAdmin']) {
            $this->go('admin', 'dashboard');
        } else if (isset($_SESSION["userId"])) {
            $this->go('user', 'profile');
        } else {
            $this->go('home', 'auth');
        }

    }
//i they do not have account they register
    public function register()
    {
        if (isset($_SESSION['userId'])
            || !isset($_POST['name'])
            || !isset($_POST['email'])
            || !isset($_POST['password'])) {
            $this->go('home', 'auth');
        }

        $userModel = $this->model('User');
        $user = $userModel->getByEmail($_POST['email']);

        if(isset($user->email)) {
            $this->go('home', 'auth');
            return;
        }

        $user = $userModel->add($_POST['name'], $_POST['email'], $_POST['password']);

        if(isset($user->id)) {
            $_SESSION["userId"] = $user->id;
            $_SESSION["userIsAdmin"] = $user->is_admin;
            $_SESSION["userName"] = $user->name;
            $_SESSION["userEmail"] = $user->email;
        }

        $this->go('home', 'auth');
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

    public function logout()
    {
        unset($_SESSION["userId"]);
        unset($_SESSION["userIsAdmin"]);
        unset($_SESSION["userName"]);
        unset($_SESSION["userEmail"]);
        $this->go("home", "login");
    }
}