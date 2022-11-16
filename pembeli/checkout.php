<?php
	require '../login/db_login.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(nama_barang, '(',total_harga,')') AS ItemQty, total_harga FROM barang_cart";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_harga'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
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
                <a href="../login/logout.php" class="link-light text-decoration-none btn btn-danger form-control mt-1">Logout</a>
                </form>
            </div>
        </div>
    </nav>
        <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center p-2">Selesaikan Pembelian Anda!!</h4>
            <div class="jumbotron p-3 mb-2 text-center">
            <h6 class="lead"><b>Barang : </b><?= $allItems; ?></h6>
            <h6 class="lead"><b>Harga Kurir : </b>Gratis</h6>
            <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
            </div>
            <form action="" method="post" id="beli">
            <input type="hidden" name="barang" value="<?= $allItems; ?>">
            <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
            <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
            </div>
            <div class="form-group">
                <textarea name="alamat" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
            </div>
            <h6 class="text-center lead">Select Payment Mode</h6>
            <div class="form-group">
                <select name="payments" class="form-control">
                <option value="" selected disabled>-Select Payment Mode-</option>
                <option value="cod">Cash On Delivery</option>
                <option value="netbanking">Net Banking</option>
                <option value="cards">Debit/Credit Card</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Beli" class="btn btn-danger btn-block">
            </div>
            </form>
        </div>
        </div>
        </div>
    </section>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Mengirim data Formulir ke server
    $("#beli").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Muat total jumlah item yang ditambahkan ke keranjang dan tampilkan di bilah navigasi
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>