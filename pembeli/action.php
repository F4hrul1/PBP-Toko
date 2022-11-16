<?php
	session_start();
	require '../login/db_login.php';

	// Tambahkan produk ke tabel keranjang
	if (isset($_POST['pid_barang'])) {
      $pid_barang = $_POST['pid_barang'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pkategori = $_POST['pkategori'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $db->prepare('SELECT id_barang FROM barang_cart WHERE id_barang=?');
	  $stmt->bind_param('s',$pid_barang);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $id_barang = $r['id_barang'] ?? '';

	  if (!$id_barang) {
	    $query = $db->prepare('INSERT INTO barang_cart (nama_barang,harga_barang,gambar_barang,stok_barang,total_harga,kategori_barang) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pkategori);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	}

	// Dapatkan jumlah item yang tersedia di tabel keranjang
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $db->prepare('SELECT * FROM barang_cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Hapus satu item dari keranjang
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $db->prepare('DELETE FROM barang_cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Hapus semua item sekaligus dari troli
	if (isset($_GET['clear'])) {
	  $stmt = $db->prepare('DELETE FROM barang_cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Tetapkan harga total produk di tabel keranjang
	if (isset($_POST['stok_barang'])) {
	  $pstok_barang = $_POST['stok_barang'];
	  $pid_barang = $_POST['pid_barang'];
	  $pprice = $_POST['pprice'];

	  $tprice = $pstok_barang * $pprice;

	  $stmt = $db->prepare('UPDATE barang_cart SET stok_barang=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$pstok_barang,$tprice,$pid_barang);
	  $stmt->execute();
	}

	// Checkout dan simpan info pelanggan di tabel pesanan
	if (isset($_POST['action']) && isset($_POST['action']) == 'pembelian') {
	  $nama = $_POST['nama'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
      $alamat = $_POST['alamat'];
      $payments = $_POST['payments'];
	  $barang = $_POST['barang'];
	  $grand_total = $_POST['grand_total'];

	  $data = '';

	  $stmt = $db->prepare('INSERT INTO pembelian (nama,email,phone,alamat,payments,barang,jumlah_pembayaran)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$nama,$email,$phone,$alamat,$payments,$barang,$grand_total);
	  $stmt->execute();
	  $stmt2 = $db->prepare('DELETE FROM barang_cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $barang . '</h4>
								<h4>Your Name : ' . $nama . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $payments . '</h4>
						  </div>';
	  echo $data;
	}
?>