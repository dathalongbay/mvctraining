<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php
$connection = mysqli_connect("localhost", "root",
    "", "mvc1");

$errors = [];

if (isset($_POST) && !empty($_POST)) {
    $data = $_POST;
    $book_name = $data["book_name"];
    $book_price = $data["book_price"];
    $book_intro = $data["book_intro"];
    if (empty($book_name) || empty($book_price) || empty($book_intro)) {
        return false;
    }

    $sqlInsert = "INSERT INTO books(book_name, book_price, book_intro) VALUES ('$book_name', '$book_price', '$book_intro')";

    if (mysqli_query($connection, $sqlInsert)) {
        header("Location: index.php");
        exit;
    } else {
        $errors[] = "Lưu thất bại";
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tạo sách mới</h1>

            <?php
            if (isset($errors) && is_array($errors) && !empty($errors)) {
                ?>
                <div class="alert alert-danger">
                    <?php echo implode("<br>", $errors) ?>
                </div>
                <?php
            }
            ?>

            <div>
                <form name="create" action="" method="post">
                    <div class="form-group">
                        <label>Tên sách</label>
                        <input type="text" class="form-control" name="book_name">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="book_price">
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea name="book_intro" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>