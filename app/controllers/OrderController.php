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

    public function adminDoEdit()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['is_delivered']) || empty($_POST['is_delivered'])
                || !isset($_POST['is_canceled']) || empty($_POST['is_canceled'])
                || !isset($_POST['id']) || empty($_POST['id']) ) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('order', 'adminList');
            }

            $orderModel = $this->model('Order');

            if ($orderModel->edit($_POST['id'], $_POST['is_delivered'], $_POST['is_canceled'])) {
                $_SESSION['success'] = true;
                $this->go('order', 'adminList');
            }

        } else {
            $this->go('home', 'auth');
        }
    }

}