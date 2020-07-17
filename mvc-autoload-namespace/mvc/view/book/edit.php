<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Sửa sách</h1>

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
                    <div class="form-group">
                        <label>Tên sách</label>
                        <input type="text" class="form-control" name="book_name" value="<?php echo $book["book_name"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Giá tiền</label>
                        <input type="number" class="form-control" name="book_price" value="<?php echo $book["book_price"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea name="book_intro" class="form-control"><?php echo $book["book_intro"] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>