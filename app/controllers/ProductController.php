<?php


class ProductController extends Controller
{
    //get function product
    public function products()
    {
        $productModel = $this->model('Product');
        $productColorModel = $this->model('ProductColor');
        $productColorImageModel = $this->model('ProductColorImage');

        $categoryModel = $this->model('Category');
        $colorModel = $this->model('Color');


        $data['products'] = $productModel->getAll();
        $data['categories'] = $categoryModel->getAll();
        $data['colors'] = $colorModel->getAll();


        foreach ($data['products'] as $index => $product) {
            if(isset($_GET['category'])
                && !empty($_GET['category'])
                && $product->category_id != $_GET['category']
            ) {
                unset($data['products'][$index]);
                continue;
            }

            $productColors = $productColorModel->getByProductId($product->id);

            if(isset($_GET['color'])
                && !empty($_GET['color'])
            ) {
                $haveThisColor = false;
                foreach ($productColors as $i => $pc) {
                    if($pc->color_id == $_GET['color']) {
                        $haveThisColor = true;
                    }
                }
                if (!$haveThisColor) {
                    unset($data['products'][$index]);
                    continue;
                }
            }

            $data['products'][$index]->colors = $productColors;

            $productImage = $productColorImageModel->getOneByProductColorId($productColors[0]->id);
            $data['products'][$index]->img = $productImage->img;
        }

        $this->setView('product/products', $data);
        $this->view->pageTitle = SITENAME . " - Product List";
        $this->view->render();
    }

    //get function productDetails
    public function productDetail($pId = 0)
    {
        if( $pId == 0){
            $this->go('product', 'products');
        }

        $productModel = $this->model('Product');
        $producColortModel = $this->model('ProductColor');
        $productColorSizeModel = $this->model('ProductColorSize');
        $productColorImageModel = $this->model('ProductColorImage');

        $product = $productModel->getById($pId);
        $product->colors = $producColortModel->getByProductId($product->id);

        foreach ($product->colors as $i => $v) {
            $product->colors[$i]->sizes = $productColorSizeModel->getByProductColorId($v->id);
            $product->colors[$i]->images = $productColorImageModel->getByProductColorId($v->id);
        }


//        echo "<pre>";
//        print_r($product);
//        echo "</pre>";
//        die();

        $this->setView('product/product_detail', $product);
        $this->view->pageTitle = SITENAME . " - Product Detail";
        $this->view->render();
    }

    //get function AddToCart
    public function addToCart()
    {
        if (isset($_POST['product_id'])) {
            $_SESSION['cart'][] = $_POST;
        }

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $this->setView('cart');
            $this->view->pageTitle = SITENAME . " - Cart";
            $this->view->render();
            return;
        }

        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $i => $cartItem) {
            $totalPrice += $cartItem['product_price'];

            $pc = explode(',', $cartItem['product_color']);
            $pcs = explode(',', $cartItem['product_color_size']);

            $_SESSION['cart'][$i]['product_color_id'] = $pc[0];
            $_SESSION['cart'][$i]['product_color_name'] = $pc[1];

            $_SESSION['cart'][$i]['product_color_size_id'] = $pcs[0];
            $_SESSION['cart'][$i]['product_color_size_name'] = $pcs[1];

        }

        // Add shipping fee
        $_SESSION['totalPrice'] = $totalPrice;
        $_SESSION['totalPay'] = $totalPrice + 20;

        $data['cartItems'] = $_SESSION['cart'];
        $data['totalPrice'] =  $_SESSION['totalPrice'];
        $data['totalPay'] =  $_SESSION['totalPay'];

        $this->setView('cart', $data);
        $this->view->pageTitle = SITENAME . " - Cart";
        $this->view->render();

    }

    //get function deleteFromCart
    public function deleteFromCart($id = -1)
    {
        if(isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        $this->go('product', 'addToCart');
    }


    // Start working on Product
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


    // Start working on Product Colors
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


    // Start working on Product Color Sizes
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


    //Start working on Product Color Images
    public function adminColorImageList($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productColorImageModel = $this->model('ProductColorImage');
        $productData['productColorImages'] = $productColorImageModel->getByProductColorId($id);

        $productColorModel = $this->model('ProductColor');
        $productData['productColor'] = $productColorModel->getById($id);

        $this->setView('admin/productColorImagesList', $productData);
        $this->view->pageTitle = SITENAME . " - Product Color Image List";
        $this->view->render();
    }

    public function adminColorImageAdd($id = 0)
    {
        if (!Session::isAdmin() || $id == 0) {
            $this->go('home', 'auth');
        }

        $productColorModel = $this->model('ProductColor');
        $data['productColor'] = $productColorModel->getById($id);

        $this->setView('admin/productColorImageAdd', $data);
        $this->view->pageTitle = SITENAME . " - Product Color Image Add";
        $this->view->render();
    }

    public function adminDoColorImageAdd()
    {
        if (!Session::isAdmin()) {
            $this->go('home', 'auth');
        }

        if (!isset($_POST['product_color_id']) || empty($_POST['product_color_id'])) {
            $_SESSION['err'] = 'All fields should be filled';
            $this->goBack();
        }

        if ($_FILES['image']['size'] == 0) {
            $_SESSION['err'] = 'Image field should not be empty';
            echo 'Image size err';
            $this->goBack();
        }

        $productColorModel = $this->model('ProductColor');
        $productColor = $productColorModel->getById($_POST['product_color_id']);

        $target_dir = "imgs/" . strtolower($productColor->category_name) . "/";
        $newName =  $productColor->category_name . "_" . time();


        // check the extension of the uploaded file
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        //create unique file name for each subscriber image file
        $target_file = $target_dir . $newName . '.' . $ext;

        //set allowed file type to be submit
        $allowFileType = array('png', 'jpg', 'jpeg');

        //if the file extension is not allowed redirect to main
        if (!in_array($ext, $allowFileType)) {
            $_SESSION['err'] = 'Image is not valid only (png, jpg and jpeg) but ext is: ' . $ext;
            $this->goBack();
        }

        if (!file_exists($target_dir )) {
            mkdir($target_dir);
        }

        //try to move uploaded file to assignment directory and then add data to database
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $productColorImage = $this->model('ProductColorImage');

            if ($productColorImage->add($_POST['product_color_id'], $target_file)) {
                $_SESSION['success'] = true;
                $this->go('product', 'adminColorImageList', $_POST['product_color_id']);
            }
        }
    }

    public function adminColorImageDelete($id = 0)
    {
        if (!Session::isAdmin() || $id == 0 ) {
            $this->go('home', 'auth');
        }

        $productColorImageModel = $this->model('ProductColorImage');
        $productColorImage = $productColorImageModel->getById($id);
        unlink($productColorImage->img);
        $productColorImageModel->delete($id);
        $this->goBack();
    }
}