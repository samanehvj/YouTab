<?php


//show sitename on view
class HomeController extends Controller 
{

    public function index() 
    {
        $categoryModel = $this->model('Category');
        $data['topCategories'] = $categoryModel->getTop(3);

        $productModel = $this->model('Product');
        $data['topProducts'] = $productModel->getTop(5);

        $productColorModel = $this->model('ProductColor');
        $productColorImageModel = $this->model('ProductColorImage');

        foreach ($data['topProducts'] as $i => $p) {
            $pc = $productColorModel->getOneByProductId($p->id);
            $pci = $productColorImageModel->getOneByProductColorId($pc->id);

            $data['topProducts'][$i]->img = $pci->img;
        }

        $this->setView('index', $data);
        $this->view->pageTitle = SITENAME . " - HOME";
        $this->view->render();
    }

    
    public function about() 
    {
        $this->setView('about');
        $this->view->pageTitle = SITENAME . " - ABOUT";
        $this->view->render();
    }



    public function contact()
    {
        $this->setView('contact');
        $this->view->pageTitle = SITENAME . " - Contact";
        $this->view->render();
    }

    public function cart()
    {
        $this->setView('cart');
        $this->view->pageTitle = SITENAME . " - Cart";
        $this->view->render();
    }


    public function payment()
    {
        if (!Session::isLogin()) {
            $this->go('home', 'auth');
        }
        $this->setView('payment', $_SESSION['totalPay']);
        $this->view->pageTitle = SITENAME . " - Payment";
        $this->view->render();
    }

    public function successPayment()
    {
        if (!Session::isLogin()) {
            $this->go('home', 'auth');
        }

        $orderModel = $this->model('Order');
        $orderModel->add($_SESSION['userId'], $_SESSION['totalPay']);
        $order = $orderModel->getLastByUserId($_SESSION['userId']);

        $orderDetailModel = $this->model('OrderDetail');
        $productColorSizeModel = $this->model('ProductColorSize');

        foreach ($_SESSION['cart'] as $cartItem) {
            $orderDetailModel->add($order->id, $cartItem['product_color_size_id'], $cartItem['product_price'], 1);
            $productColorSizeModel->decrease($cartItem['product_color_size_id'], 1);
        }

        unset($_SESSION['cart']);
        unset($_SESSION['totalPay']);
        unset($_SESSION['totalPrice']);

        $this->setView('success_payment', $order->id);
        $this->view->pageTitle = SITENAME . " - Success Payment";
        $this->view->render();

    }

    public function product_detail()
    {
        $this->setView(' product_detail');
        $this->view->pageTitle = SITENAME . " -  product_detail";
        $this->view->render();
    }

    public function pageNotFound()
    {
        $this->setView('pageNotFound');
        $this->view->render();
    }



    public function auth()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && !empty($_SESSION['userId'])) {
            $this->go('admin', 'dashboard');
        } else if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
            $this->go('user', 'profile');
        } else {
            $this->setView('auth');
            $this->view->pageTitle = SITENAME . " - Authenticate";
            $this->view->render();
        }
    }


}