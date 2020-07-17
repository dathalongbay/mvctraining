<?php
namespace MVC\Controllers;

use MVC\Models\BookModel;

class BookController {


    public function index() {

        echo "<br>" . __METHOD__;

        $model = new BookModel();

        $books = $model->getAll();

        include_once SITE_URL."/mvc/view/book/index.php";
    }


    public function create() {

        echo "<br>" . __METHOD__;

        $errors = array();

        if (isset($_POST) && !empty($_POST)) {
            $model = new BookModel();

            $status = $model->store($_POST);
            if ($status) {
                header("Location: index.php");
                exit;
            }
            $errors[] = "Lưu thất bại";
        }
        include_once SITE_URL."/mvc/view/book/create.php";
    }


    public function edit() {

        $errors = array();
        echo "<br>" . __METHOD__;

        if (isset($_POST) && !empty($_POST)) {
            $model = new BookModel();

            $status = $model->update($_POST);
            if ($status) {
                header("Location: index.php");
                exit;
            }
            $errors[] = "Sửa thất bại";
        }

        if (isset($_GET["id"])) {
            $id = (int) $_GET["id"];

            $model = new BookModel();

            $book = $model->getSingle($id);
        }

        include_once SITE_URL."/mvc/view/book/edit.php";
    }


    public function delete() {

        echo "<br>" . __METHOD__;
        $errors = array();

        if (isset($_POST) && !empty($_POST)) {
            $model = new BookModel();

            $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

            $status = $model->delete($id);
            if ($status) {
                header("Location: index.php");
                exit;
            }
            $errors[] = "Xóa thất bại";
        }

        if (isset($_GET["id"])) {
            $id = (int) $_GET["id"];

            $model = new BookModel();

            $book = $model->getSingle($id);
        }

        include_once SITE_URL."/mvc/view/book/delete.php";
    }

}