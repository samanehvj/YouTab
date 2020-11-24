<?php


class SizeController extends Controller
{
    public function adminList()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
            $sizeModel = $this->model('Size');
            $sizeData['sizes'] = $sizeModel->getAll();

            $this->setView('admin/sizesList', $sizeData);
            $this->view->pageTitle = SITENAME . " - Sizes List";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminAdd()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            $this->setView('admin/sizeAdd');
            $this->view->pageTitle = SITENAME . " - Size Add";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDoAdd()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['name']) ) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('size', 'adminAdd');
            }

            $sizeModel = $this->model('Size');

            if ($sizeModel->add($_POST['name'])) {
                $_SESSION['success'] = true;
                $this->go('size', 'adminList');
            }

        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminEdit($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $sizeModel = $this->model('size');
            $size =  $sizeModel->getById($id);
            $this->setView('admin/sizeEdit', $size);
            $this->view->pageTitle = SITENAME . " - size Edit";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDoEdit()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['name'])) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('size', 'adminList');
            }

            $sizeModel = $this->model('size');

            if ($sizeModel->edit($_POST['id'], $_POST['name'])) {
                $_SESSION['success'] = true;
                $this->go('size', 'adminList');
            }

        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDelete($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $sizeModel = $this->model('size');
            $sizeModel->delete($id);
            $this->go('size', 'adminList');
        } else {
            $this->go('home', 'auth');
        }
    }

}