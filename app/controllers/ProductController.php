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
}