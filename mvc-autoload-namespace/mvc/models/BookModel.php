<?php
namespace MVC\Models;

class BookModel extends Database {

    public $table = "books";


    public function getAll() {

        $sqlSelect = "SELECT * FROM $this->table";
        /**
         * mysqli_query(tham số 1, tham số 2) là hàm thực hiện câu query mysql
         * tham số 1 chính là biến kết nối CSDL $connection
         * tham số 2 chính là câu query sql
         */
        $result = mysqli_query($this->connection, $sqlSelect);

        return $result;
    }


    public function getSingle($book_id = 0) {

        $sqlSelect = "SELECT * FROM $this->table WHERE id = " . $book_id;

        $result = mysqli_query($this->connection, $sqlSelect);

        $row = mysqli_fetch_assoc($result);

        return $row;
    }


    public function store($data) {

        $book_name = $data["book_name"];
        $book_price = $data["book_price"];
        $book_intro = $data["book_intro"];



        if (empty($book_name) || empty($book_price) || empty($book_intro)) {
            return false;
        }

        $sqlInsert = "INSERT INTO $this->table(book_name, book_price, book_intro) VALUES ('$book_name', '$book_price', '$book_intro')";

        if (mysqli_query($this->connection, $sqlInsert)) {
            return true;
        }

        return false;
    }

    public function update($data) {

        $book_name = $data["book_name"];
        $book_price = $data["book_price"];
        $book_intro = $data["book_intro"];
        $id = (int)$data['id'];

        if (!$id || empty($book_name) || empty($book_price) || empty($book_intro)) {
            return false;
        }

        $sql = "UPDATE $this->table SET book_name='$book_name',book_price='$book_price',book_intro='$book_intro' WHERE id = " . (int) $id;

        echo $sql;
        if (mysqli_query($this->connection, $sql)) {
            echo "Update thanh cong";
            /**
             * hàm header được dùng để chuyển hương url
             */
            header('Location: index.php');
            exit;
        } else {
            return false;
        }
    }


    public function delete($id) {

        $sqlDelete = "DELETE FROM $this->table WHERE id = $id";
        if (mysqli_query($this->connection, $sqlDelete)) {
            return true;
        }

        return false;

    }
}