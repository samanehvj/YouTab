<?php


// connect admin login to dashboard
class AdminController extends Controller
{
    public function dashboard()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
//            $subscriberModel = $this->model('Subscriber');
//            $dashboardData['subscriberCount'] = $subscriberModel->count();

            $this->setView('admin/dashboard');
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }
}