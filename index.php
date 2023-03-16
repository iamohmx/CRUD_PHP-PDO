<?php
require_once 'viewProducts.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product-CRUD By Iamohmx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container py-2">
        <h1 class="text-center">Products Management By Iamohmx</h1>
        <p class="text-center">I make for improve my skill PHP PDO and MySQL, I use bootstrap for make web beautiful site.</p>
        <div class="py-3"></div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
            <i class="bi bi-database-fill-add"></i> เพิ่มข้อมูลสินค้า
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addProductLabel"><i class="bi bi-folder-plus"></i> เพิ่มข้อมูลสินค้า</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Here -->
                        <form action="addProduct.php" method="post">
                            <div class="mb-3">
                                <label for="p_name" class="form-label">ชื่อสินค้า</label>
                                <input type="text" name="p_name" class="form-control" id="p_name" placeholder="ชื่อสินค้า" required>
                            </div>
                            <div class="mb-3">
                                <label for="p_price" class="form-label">ราคาสินค้า</label>
                                <input type="number" name="p_price" class="form-control" id="p_price" placeholder="ราคาสินค้า" required>
                            </div>
                            <div class="mb-3">
                                <label for="p_desc" class="form-label">รายละเอียดสินค้า</label>
                                <textarea class="form-control" name="p_desc" id="p_desc" rows="3" placeholder="รายละเอียดสินค้า" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="p_img" class="form-label">รูปภาพสินค้า</label>
                                <input type="text" name="p_img" class="form-control" id="p_img" placeholder="รูปภาพสินค้า(ใส่เป็นลิงก์)" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="submit" name="addProduct" class="btn btn-success" value="บันทึกสินค้า">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">Products</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <table class="table table-striped table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            if (!empty($result)) {
                                foreach ($result as $row) :
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['p_name']; ?></td>
                                        <td><?php echo $row['p_desc']; ?></td>
                                        <td><?php echo number_format($row['p_price'], 2); ?></td>
                                        <td width="10%">
                                            <img src="<?php echo $row['p_img']; ?>" class="card-img-top" alt="">
                                        </td>
                                        <td>
                                            <a href="editProduct.php?id=<?php echo $row['id']; ?>" role="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModalid<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                            <a href="deleteProduct.php?id=<?php echo $row['id']; ?>" role="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $row['id']; ?>"><i class="bi bi-trash3-fill"></i> ลบ</a>
                                            <!-- add Modal -->
                                            <div class="modal fade" id="editModalid<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="ModalLabel"><i class="bi bi-pencil-square"></i> แก้ไขข้อมูลสินค้า</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form Here -->
                                                            <form action="editProduct.php?id=<?php echo $row['id'] ?>" method="post">
                                                                <div class="mb-3">
                                                                    <label for="p_name" class="form-label">ชื่อสินค้า</label>
                                                                    <input type="text" name="p_name" class="form-control" id="p_name" value="<?php echo $row['p_name'] ?>" placeholder="ชื่อสินค้า" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="p_price" class="form-label">ราคาสินค้า</label>
                                                                    <input type="number" name="p_price" class="form-control" id="p_price" value="<?php echo $row['p_price'] ?>" placeholder="ราคาสินค้า" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="p_desc" class="form-label">รายละเอียดสินค้า</label>
                                                                    <textarea class="form-control" name="p_desc" id="p_desc" rows="3" placeholder="รายละเอียดสินค้า" required><?php echo $row['p_desc'] ?></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="p_img" class="form-label">รูปภาพสินค้า</label>
                                                                    <input type="text" name="p_img" class="form-control" id="p_img" value="<?php echo $row['p_img'] ?>" placeholder="รูปภาพสินค้า(ใส่เป็นลิงก์)" required>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <input type="hidden" name="id" value="<?php $row['id']; ?>">
                                                                    <input type="submit" name="editProduct" class="btn btn-info" value="แก้ไขสินค้า">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- delete Modal -->
                                            <div class="modal fade" id="deleteModalid<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="ModalLabel"><i class="bi bi-pencil-square"></i> ลบข้อมูลสินค้า</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form Here -->
                                                            <form action="deleteProduct.php?id=<?php echo $row['id'] ?>" method="post">
                                                                <div class="mb-3">
                                                                    <label for="p_name" class="form-label">ชื่อสินค้า</label>
                                                                    <input type="text" name="p_name" class="form-control" id="p_name" value="<?php echo $row['p_name'] ?>" placeholder="ชื่อสินค้า" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="p_price" class="form-label">ราคาสินค้า</label>
                                                                    <input type="number" name="p_price" class="form-control" id="p_price" value="<?php echo $row['p_price'] ?>" placeholder="ราคาสินค้า" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="p_desc" class="form-label">รายละเอียดสินค้า</label>
                                                                    <textarea class="form-control" name="p_desc" id="p_desc" rows="3" placeholder="รายละเอียดสินค้า" disabled><?php echo $row['p_desc'] ?></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="p_img" class="form-label">รูปภาพสินค้า</label>
                                                                    <input type="text" name="p_img" class="form-control" id="p_img" value="<?php echo $row['p_img'] ?>" placeholder="รูปภาพสินค้า(ใส่เป็นลิงก์)" disabled>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <input type="hidden" name="id" value="<?php $row['id']; ?>">
                                                                    <input type="submit" name="deleteProduct" class="btn btn-danger" value="ลบสินค้า">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            }

                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>