<?php

session_start();
include '../login/db_login.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tokel</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Tokel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index_pembeli.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                    </ul>
                    <form class="d-flex">
                    <a href="../login/logout.php " class="link-light  text-decoration-none btn btn-danger form-control mt-1">Logout</a>
                    </form>
                </div>
            </div>
        </nav>
        <section class="py-5">
            <section class="wrapper">
            <div class="container px-4 px-lg-5 mt-5">
            <div class="col-lg-12 main-chart">
            <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                    echo $_SESSION['showAlert'];
                    } else {
                    echo 'none';
                    } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    }unset($_SESSION['showAlert']); ?></strong>
                </div>
                    <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <td colspan="7">
                            <h4 class="text-center m-0">Barang di keranjang</h4>
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Barang</th>
                            <th>Kategori Barang</th>
                            <th>
                            <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            require '../login/db_login.php';
                            $stmt = $db->prepare('SELECT * FROM barang_cart');
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grand_total = 0;
                            while ($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                            <td><img src="<?= $row['gambar_barang'] ?>" width="50"></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td>
                            <i class="fa-regular">Rp</i>&nbsp;&nbsp;<?= number_format($row['harga_barang'],2); ?>
                            </td>
                            <input type="hidden" class="pprice" value="<?= $row['harga_barang'] ?>">
                            <td>
                            <input type="number" class="form-control form-center ItemQty" value="<?= $row['stok_barang'] ?>" style="width:60px; margin-left:40px;">
                            </td>
                            <td><i class="fa-regular">Rp</i>&nbsp;&nbsp;<?= number_format($row['harga_barang'],2); ?></td>
                            <td>
                            <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $grand_total += $row['total_harga']; ?>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="3">
                            <a href="index_pembeli.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Lanjut
                                Belanja</a>
                            </td>
                            <td colspan="2"><b>Total Pembelian</b></td>
                            <td><b><i class="fa-regular">Rp</i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                            <td>
                            <a href="checkout.php" class="btn btn-warning <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                </div>
            </section>
        </section>
    </body>
</html>