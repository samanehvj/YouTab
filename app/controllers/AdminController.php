<?php


// connect admin login to dashboard
class AdminController extends Controller
{
    public function dashboard()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
            $this->setView('admin/dashboard');
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }
}