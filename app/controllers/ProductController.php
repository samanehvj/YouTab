<?php


class ProductController extends Controller
{
    public function products()
    {
        $this->setView('product/products');
        $this->view->pageTitle = SITENAME . " - Product List";
        $this->view->render();
    }

    public function productDetail()
    {
        $this->setView('product/product_detail');
        $this->view->pageTitle = SITENAME . " - Product Detail";
        $this->view->render();
    }

    public function adminList()
    {
        if (!Session::isAdmin()) {
           $this->go('home', 'auth');
        }

        $productModel = $this->model('Product');
        $productData['products'] = $productModel->getAll();

        $caetgoryModel = $this->model('Category');
        $productData['categories'] = $caetgoryModel->getAll();

        $this->setView('admin/productsList', $productData);
        $this->view->pageTitle = SITENAME . " - Product List";
        $this->view->render();
    }

    public function adminAdd()
    {
        if (!Session::isAdmin()) {
            $this->go('home', 'auth');
        }

        $categoryModel = $this->model('Category');
        $data['categories'] = $categoryModel->getAll();

        $this->setView('admin/productAdd', $data);
        $this->view->pageTitle = SITENAME . " - Product Add";
        $this->view->render();
    }

    public function adminDoAdd()
    {
        if (!Session::isAdmin()) {
            $this->go('home', 'auth');
        }

        if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['category'])
            || empty($_POST['name']) || empty($_POST['price']) || empty($_POST['category'])) {
            $_SESSION['err'] = 'All fields should be filled';
            $this->go('product', 'adminAdd');
        }

        $productModel = $this->model('Product');

        if ($productModel->add($_POST['name'], $_POST['price'], $_POST['category'])) {
            $_SESSION['success'] = true;
            $this->go('product', 'adminList');
        }

    }

    public function adminEdit($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productModle = $this->model('Product');
        $data['product'] =  $productModle->getById($id);

        $categoryModel = $this->model('Category');
        $data['categories'] = $categoryModel->getAll();

        $this->setView('admin/productEdit', $data);
        $this->view->pageTitle = SITENAME . " - Product Edit";
        $this->view->render();

    }

    public function adminDoEdit()
    {
        if (!Session::isAdmin()) {
            $this->go('hoem', 'auth');
        }

        if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['category'])
            || empty($_POST['name']) || empty($_POST['price']) || empty($_POST['category'])) {
            $_SESSION['err'] = 'All fields should be filled';
            $this->go('product', 'adminList');
        }

        $productModel = $this->model('Product');

        if ($productModel->edit($_POST['id'], $_POST['name'], $_POST['price'], $_POST['category'])) {
            $_SESSION['success'] = true;
            $this->go('product', 'adminList');
        }
    }

    public function adminDelete($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }
        $productModel = $this->model('Product');
        $productModel->delete($id);
        $this->go('product', 'adminList');

    }
}