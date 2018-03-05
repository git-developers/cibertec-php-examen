<?php

require_once APP_PATH . "/../application/Controller.php";

class userController extends Controller
{

    public function index()
    {

        $this->_view->setJs(['jquery.min.js']);
        $this->_view->renderizar("index");


    }
}