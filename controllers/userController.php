<?php

require_once APP_PATH . "/../application/Controller.php";
require_once APP_PATH . "/../models/UserModel.php";
require_once APP_PATH . "/../entity/User.php";

class userController extends Controller
{

    public function __construct() {
        parent::__construct();

        $this->_view->setJs(['jquery.min']);
        $this->_view->setCss(['main']);
    }

    public function index()
    {
        $model = new UserModel();
        $this->_view->objects = $model->listUser();

        $this->_view->renderizar("index");
    }

    public function create()
    {

        if($_POST){

            $object = new User;
            $object->setName($_POST["name"]);
            $object->setCode($_POST["code"]);
            $object->setDni($_POST["dni"]);

            $model = new UserModel();
            echo $model->create($object);
            return;
        }

        $this->_view->renderizar("create");
    }

    public function delete()
    {
        if($_POST){
            $object = new User;
            $object->setId($_POST["id"]);

            $model = new UserModel();
            echo $model->delete($object);
            return;
        }
    }
}