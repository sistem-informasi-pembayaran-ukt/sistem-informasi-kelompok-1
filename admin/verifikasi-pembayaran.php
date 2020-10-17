<?php

require_once "../database/pdo.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <title>Pembayaran</title>
</head>

<h3>Data Mahasiswa </h3>
<div class="col mt-5 ml-5 mr-5">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            foreach ($rows as $row) {
            ?>
                <tbody>
                    <tr>
                        <td><?= ($row['product_name']) ?></td>
                        <td><?= ($row['color']) ?></td>
                        <td><?= ($row['size']) ?></td>
                        <td><?= ($row['price']) ?></td>
                        <td><img src="../product-images/<?= ($row['img']) ?>" width='100' height='100'></td>
                        <td>
                            <form method="post" action="product-admin.php?edit=<?= $row['product_id'] ?>">
                                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                <input type="submit" class=" btn btn-sm  btn-success" value="Edit" name="edit">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="product-admin.php?delete=<?$row['product_id']?>">
                                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                <input type="submit" class=" btn btn-sm btn-success" value="Del" name="delete">
                            </form>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

<body>

        

</body>

</html>