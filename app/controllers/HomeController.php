<?php

class HomeController extends Controller 
{

    public function index() 
    {
        $this->setView('index');
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
        $this->setView('payment');
        $this->view->pageTitle = SITENAME . " - Payment";
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
            $this->go('home', 'dashboard');
        } else if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
            $this->go('home', 'profile');
        } else {
            $this->setView('auth');
            $this->view->pageTitle = SITENAME . " - Authenticate";
            $this->view->render();
        }
    }
}