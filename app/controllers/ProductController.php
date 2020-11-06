<?php


class ProductController extends Controller
{
    public function products()
    {
        $this->setView('product/products');
        $this->view->pageTitle = SITENAME . " - Product List";
        $this->view->render();
    }
}