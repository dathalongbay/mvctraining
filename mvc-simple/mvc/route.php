<?php
/**
 * Created by PhpStorm.
 * User: T3H
 * Date: 6/11/2019
 * Time: 6:29 PM
 */

class Route {


    public function run() {
        /**
         * url : index.php?controller=book&action=index
         * $controller = new BookController();
         * $controller->index();
         *
         * url : index.php?controller=book&action=edit
         * $controller = new BookController();
         * $controller->edit();
         *
         * url : index.php?controller=book&action=delete
         * $controller = new BookController();
         * $controller->delete();
         *
         * url : index.php?controller=book&action=create
         * $controller = new BookController();
         * $controller->create();
         * $_REQUEST = $_POST + $_GET
         *
         * http://localhost/appmvc1/index.php?controller=book&action=index
         *
         * http://localhost/appmvc1/index.php?controller=book&action=create
         *
         * http://localhost/appmvc1/index.php?controller=book&action=edit
         *
         * http://localhost/appmvc1/index.php?controller=book&action=delete
         */



        /*
         * Cách thủ công
         * if ($_REQUEST["controller"] == 'book') {
            $controller = new BookController();

            if ($_REQUEST["action"] == 'index') {
                $controller->index();
            }

            if ($_REQUEST["action"] == 'edit') {
                    $controller->edit();
            }
        }*/



        $controller = isset($_REQUEST["controller"]) ? trim($_REQUEST["controller"]) : "book";
        $controller = ucfirst($controller); // Book
        $controllerName = $controller."Controller"; // MVC\Controllers\BookController


        echo '<br>$controller : ' . $controller;
        echo '<br>$controllerName : ' . $controllerName;

        if (class_exists($controllerName)) {
            $controllerObject = new $controllerName();

            $action = isset($_REQUEST["action"]) ? trim($_REQUEST["action"]) : 'index';
            echo '<br>$action : ' . $action;

            if (method_exists($controllerObject, $action)) {
                /**
                 * $controllerObject->index()
                 * $controllerObject->edit()
                 * $controllerObject->delete()
                 */
                return $controllerObject->$action();
            } else {
                $controllerObject = new ErrorController();

                return $controllerObject->redirect404();
            }
        } else {
            $controllerObject = new ErrorController();

            return $controllerObject->redirect404();
        }



    }

}