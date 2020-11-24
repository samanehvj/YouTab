<?php


class ColorController extends Controller
{
    public function adminList()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
            $colorModel = $this->model('Color');
            $colorData['colors'] = $colorModel->getAll();

            $this->setView('admin/colorsList', $colorData);
            $this->view->pageTitle = SITENAME . " - Colors List";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminAdd()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            $this->setView('admin/colorAdd');
            $this->view->pageTitle = SITENAME . " - Color Add";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDoAdd()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['name']) || !isset($_POST['hex'])) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('color', 'adminAdd');
            }

            $colorModel = $this->model('Color');

            if ($colorModel->add($_POST['name'], $_POST['hex'])) {
                $_SESSION['success'] = true;
                $this->go('color', 'adminList');
            }

        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminEdit($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $colorModel = $this->model('Color');
            $color =  $colorModel->getById($id);
            $this->setView('admin/colorEdit', $color);
            $this->view->pageTitle = SITENAME . " - Color Edit";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDoEdit()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['name']) || !isset($_POST['hex'])) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('color', 'adminList');
            }

            $colorModel = $this->model('Color');

            if ($colorModel->edit($_POST['id'], $_POST['name'], $_POST['hex'])) {
                $_SESSION['success'] = true;
                $this->go('color', 'adminList');
            }

        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDelete($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $colorModel = $this->model('Color');
            $colorModel->delete($id);
            $this->go('color', 'adminList');
        } else {
            $this->go('home', 'auth');
        }
    }

}