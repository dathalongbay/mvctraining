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
$book_id = (int) $_GET["id"];
$sqlSelect = "SELECT * FROM books WHERE id = " . $book_id;

$result = mysqli_query($connection, $sqlSelect);

$book = mysqli_fetch_assoc($result);


$errors = array();

if (isset($_POST) && !empty($_POST)) {
    $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

    $sqlDelete = "DELETE FROM books WHERE id = $id";
    $status = mysqli_query($connection, $sqlDelete);

    if ($status) {
        header("Location: index.php");
        exit;
    } else {
        $errors[] = "Xóa thất bại";
    }

}



?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Xoá sách </h1>

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
                <form name="edit" action="" method="post">
                    <input type="hidden" name="id" value="<?php echo (int) $book['id'] ?>">
                    <input type="hidden" name="action" value="delete">
                    <div class="form-group">
                        <label>Tên sách : <?php echo $book["book_name"] ?></label>
                    </div>
                    <button type="submit" class="btn btn-danger">Xoá nhân viên</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>