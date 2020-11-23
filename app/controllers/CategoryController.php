<?php


class CategoryController extends Controller
{
    public function adminList()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
            $categoryModel = $this->model('Category');
            $categoryData['categories'] = $categoryModel->getAll();

            $this->setView('admin/categoriesList', $categoryData);
            $this->view->pageTitle = SITENAME . " - Category List";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

}