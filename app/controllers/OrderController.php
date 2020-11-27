<?php


class OrderController extends Controller
{
    public function adminList()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
            $orderModel = $this->model('Order');
            $data['orders'] = $orderModel->getAll();

            $this->setView('admin/ordersList', $data);
            $this->view->pageTitle = SITENAME . " - Orders List";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminEdit($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $orderModel = $this->model('Order');
            $order =  $orderModel->getById($id);
            $this->setView('admin/orderEdit', $order);
            $this->view->pageTitle = SITENAME . " - Order Edit";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

}