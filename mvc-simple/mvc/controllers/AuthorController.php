<?php
class AuthorController {


    public function index() {
        echo "<br>" . __METHOD__;

        // include view
        include_once SITE_URL."/mvc/view/author/index.php";
    }


    public function create() {
        echo "<br>" . __METHOD__;

        // include view
        include_once SITE_URL."/mvc/view/author/create.php";
    }

    public function edit() {
        echo "<br>" . __METHOD__;

        // include view
        include_once SITE_URL."/mvc/view/author/edit.php";
    }

    public function delete() {
        echo "<br>" . __METHOD__;

        // include view
        include_once SITE_URL."/mvc/view/author/delete.php";
    }

}