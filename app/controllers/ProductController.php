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



    public function adminColorList($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productColorModel = $this->model('ProductColor');
        $productData['productColors'] = $productColorModel->getByProductId($id);

        $productModel = $this->model('Product');
        $productData['product'] = $productModel->getById($id);

        $this->setView('admin/productColorsList', $productData);
        $this->view->pageTitle = SITENAME . " - Product Color List";
        $this->view->render();

    }

    public function adminColorAdd($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $colorModel = $this->model('Color');
        $data['colors'] = $colorModel->getAll();

        $productModel = $this->model('Product');
        $data['product'] = $productModel->getById($id);

        $this->setView('admin/productColorAdd', $data);
        $this->view->pageTitle = SITENAME . " - Product Color Add";
        $this->view->render();
    }

    public function adminDoColorAdd()
    {
        if (!Session::isAdmin()) {
            $this->go('home', 'auth');
        }

        if (!isset($_POST['product_id']) || !isset($_POST['color_id'])
            || empty($_POST['product_id']) || empty($_POST['color_id'])) {
            $_SESSION['err'] = 'All fields should be filled';
            $this->go('product', 'adminList' );
        }

        $productColorModel = $this->model('ProductColor');

        if ($productColorModel->add($_POST['product_id'], $_POST['color_id'])) {
            $_SESSION['success'] = true;
            $this->go('product', 'adminColorList', $_POST['product_id']);
        }
    }

    public function adminColorDelete($id = 0)
    {
        if (!Session::isAdmin() || $id == 0 ) {
            $this->go('home', 'auth');
        }

        $productColorModel = $this->model('ProductColor');
        $productColorModel->delete($id);
        $this->goBack();
    }



    public function adminColorSizeList($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productColorSizeModel = $this->model('ProductColorSize');
        $productData['productColorSizes'] = $productColorSizeModel->getByProductColorId($id);

        $productColorModel = $this->model('ProductColor');
        $productData['productColor'] = $productColorModel->getById($id);

        $this->setView('admin/productColorSizesList', $productData);
        $this->view->pageTitle = SITENAME . " - Product Color Size List";
        $this->view->render();
    }

    public function adminColorSizeAdd($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productColorModel = $this->model('ProductColor');
        $data['productColor'] = $productColorModel->getById($id);

        $sizeModel = $this->model('Size');
        $data['sizes'] = $sizeModel->getAll();

        $this->setView('admin/productColorSizeAdd', $data);
        $this->view->pageTitle = SITENAME . " - Product Color Size Add";
        $this->view->render();
    }

    public function adminDoColorSizeAdd()
    {
        if (!Session::isAdmin()) {
            $this->go('home', 'auth');
        }

        if (!isset($_POST['product_color_id']) || !isset($_POST['size_id']) || !isset($_POST['qty'])
            || empty($_POST['product_color_id']) || empty($_POST['size_id']) || empty($_POST['qty'])) {
            $_SESSION['err'] = 'All fields should be filled';
            $this->goBack();
        }

        $productColorSize = $this->model('ProductColorSize');

        if ($productColorSize->add($_POST['product_color_id'], $_POST['size_id'], $_POST['qty'])) {
            $_SESSION['success'] = true;
            $this->go('product', 'adminColorSizeList', $_POST['product_color_id']);
        }
    }

    public function adminColorSizeEdit($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productColorSizeModel = $this->model('ProductColorSize');
        $data['productColorSize'] = $productColorSizeModel->getById($id);

        $this->setView('admin/productColorSizeEdit', $data);
        $this->view->pageTitle = SITENAME . " - Product Color Size Edit";
        $this->view->render();
    }

    public function adminDoColorSizeEdit()
    {
        if (!Session::isAdmin()) {
            $this->go('home', 'auth');
        }

        if (!isset($_POST['product_color_size_id']) || !isset($_POST['qty'])
            || empty($_POST['product_color_size_id']) || empty($_POST['qty'])) {
            $_SESSION['err'] = 'All fields should be filled';
            $this->goBack();
        }

        $productColorSizeModel = $this->model('ProductColorSize');

        if ($productColorSizeModel->edit($_POST['product_color_size_id'], $_POST['qty'])) {
            $_SESSION['success'] = true;
            $this->go('product', 'adminColorSizeList', $_POST['product_color_id']);
        }
    }

    public function adminColorSizeDelete($id = 0)
    {
        if (!Session::isAdmin() || $id == 0 ) {
            $this->go('home', 'auth');
        }

        $productColorSizeModel = $this->model('ProductColorSize');
        $productColorSizeModel->delete($id);
        $this->goBack();
    }

}